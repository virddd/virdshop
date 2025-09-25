<?php

include 'database.php';

session_start();


if (isset($_POST["akun"])) {
    if ($_POST["akun"] == "masuk") {
        $nama_user = $_POST["nama_masuk"];
        $pass_user = $_POST["sandi_masuk"];

        $sql = "SELECT nama_user, pass_user FROM data_user WHERE ";
        $sql .= " nama_user=? AND pass_user=?";

        $statemenet = $db->prepare($sql);
        $statemenet->bind_param("ss", $nama_user, $pass_user);
        $statemenet->execute();

        $loged = $statemenet->get_result();
        // $query_cek = "SELECT * FROM data_user WHERE nama_user = '$nama_user' AND pass_user = '$pass_user'";
        // $sql = mysqli_query($db, $query_cek);

        if ($loged->num_rows > 0) {
            $cek = mysqli_query($db, "SELECT * FROM data_user WHERE nama_user='$nama_user'");
            // $result = mysqli_fetch_array($cek);
            if (mysqli_num_rows($cek) !== 0) {
                $result = mysqli_fetch_assoc($cek);
                $_SESSION['id_user'] = $result['id_user'];
                $_SESSION['nama_user'] = $result['nama_user'];
                $_SESSION['nama_lengkap_user'] = $result['nama_lengkap_user'];
                $_SESSION['alamat_user'] = $result['alamat_user'];
                $_SESSION['tahun_lahir_user'] = $result['tahun_lahir_user'];
                $_SESSION['pass_user'] = $result['pass_user'];
                $date = date('Y-m-d H:i:s');
                $id_user = $_SESSION['id_user'];
                mysqli_query($db, 'UPDATE data_user SET is_online = 1, riwayat = "$date" WHERE id_user = $id_user ');

                if ($result['id_user'] == '1') {
                    header('location: ../pages/admin.php?from=admin');
                } else {
                    header('location: ../index.php?from=halo');
                }
            } else {
                echo "<script>alert('Nama akun atau kata sandi salah')</script>";
                header("location: ../pages/masuk.php");
            }
        } else {
            header('location: ../pages/masuk.php?from=not-found');
        }
    } else if ($_POST["action"] == "keluar") {
        $date = date('Y-m-d H:i:s');
        $id_user = $_SESSION['id_user'];
        mysqli_query($db, 'UPDATE data_user SET is_online = 0, riwayat = "$date" WHERE id_user = $id_user ');
        session_unset();
        session_destroy();
    }
}


if (isset($_SESSION['id_user']) != null) {

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add_cart') {

            // error_log('Masuk ke add_cart condition');
            // error_log('ID Produk: ' . (isset($_POST['id_produk']) ? $_POST['id_produk'] : 'NOT SET'));
            // error_log('Harga: ' . (isset($_POST['harga']) ? $_POST['harga'] : 'NOT SET'));

            // echo 'DEBUG: Masuk ke add_cart<br>';
            // echo 'ID Produk: ' . $_POST['id_produk'] . '<br>';
            // echo 'Harga: ' . $_POST['harga'] . '<br>';
            // echo 'User ID: ' . $_SESSION['id_user'] . '<br>';

            // // Test response
            // echo 'success';

            $id_user = $_SESSION['id_user'];
            $id_produk = $_POST['id_produk'];
            $harga = $_POST['harga'];
            $nama_user = $_SESSION['nama_user'];

            $query_cek_produk = mysqli_query($db, "SELECT * FROM data_produk WHERE id_produk = $id_produk");
            $result_produk = mysqli_fetch_assoc($query_cek_produk);
            $nama_produk = $result_produk['nama_produk'];


            $query_cek = mysqli_query($db, "SELECT jumlah_pesanan FROM data_keranjang WHERE id_user = $id_user AND id_produk = $id_produk");


            if (mysqli_num_rows($query_cek) > 0) {
                mysqli_query($db, "UPDATE data_keranjang SET jumlah_pesanan = jumlah_pesanan + 1, jumlah_harga = jumlah_pesanan * $harga WHERE id_user = $id_user AND id_produk = $id_produk");
                exit;
            } else {
                $cek = mysqli_query($db, "INSERT INTO data_keranjang (id_user, nama_user, id_produk, nama_produk, jumlah_pesanan, jumlah_harga) VALUES ('$id_user', '$nama_user', '$id_produk', '$nama_produk', 1, $harga)");

            }

        } else if ($_POST['action'] == 'hapus') {
            $harga = $_POST['harga'];
            $id_user = $_SESSION['id_user'];
            $id_produk = $_POST['id_produk'];

            $query_cek = mysqli_query($db, "SELECT jumlah_pesanan FROM data_keranjang WHERE id_user = $id_user AND id_produk = $id_produk");


            if (mysqli_num_rows($query_cek) > 0) {
                $del = mysqli_query($db, "UPDATE data_keranjang SET jumlah_pesanan = jumlah_pesanan - 1, jumlah_harga = jumlah_pesanan * $harga WHERE id_user = $id_user AND id_produk = $id_produk");
                // $_SESSION["del"] = $del;
                if ($del) {
                    mysqli_query($db, "DELETE FROM data_keranjang WHERE jumlah_pesanan < 1");
                }
            } else if ($query_cek <= 0) {
                $hapus = mysqli_query($db, "DELETE FROM data_keranjang WHERE id_user = $id_user AND id_produk = $id_produk");

                if ($hapus) {
                    echo "produk dihapus";
                } else {
                    echo mysqli_error($db);
                }
            }


        } else if ($_POST['action'] == 'remove_cart') {
            $id_produk = $_POST['id_produk'];
            $id_user = $_SESSION['id_user'];

            $query_hapus = "DELETE FROM data_keranjang WHERE id_user = $id_user AND id_produk = $id_produk";
            $sql_hapus = mysqli_query($db, $query_hapus);

            if ($sql_hapus) {
                echo "produk dihapus";
            } else {
                echo mysqli_error($db);
            }
            exit;


        } else if ($_POST['action'] == 'set_cart') {
            if (isset($_POST['kuantitas']) && isset($_POST['id_produk'])) {
                $id_produk = $_POST['id_produk'];
                $id_user = $_SESSION['id_user'];
                $keranjang = (int) $_POST['kuantitas'];

                // echo "=== REQUEST DEBUG ===<br>";
                // echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";
                // echo "Content Type: " . (isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : 'NOT SET') . "<br>";
                // echo "<br>";
                // $id_user = $_SESSION['id_user'];
                // $id_produk = $_POST['id_produk'];
                // $keranjang = (int) $_POST['kuantitas'];

                //echo "POST Data:<br>";
                // if (empty($_POST)) {
                //     echo "POST is EMPTY!<br>";
                // } else {
                //     echo "<pre>";
                //     print_r($_POST);
                //     echo "</pre>";
                // }

                $query_cek = mysqli_query($db, "SELECT jumlah_pesanan FROM data_keranjang WHERE id_user = $id_user AND id_produk = $id_produk");
                $query_cek_harga = mysqli_query($db, "SELECT harga_produk FROM data_produk WHERE id_produk = $id_produk");
                $cek_harga = mysqli_fetch_assoc($query_cek_harga);
                $harga = $cek_harga['harga_produk'];

                if (mysqli_num_rows($query_cek) > 0) {
                    mysqli_query($db, "UPDATE data_keranjang SET jumlah_pesanan = $keranjang, jumlah_harga = jumlah_pesanan * $harga WHERE id_user = $id_user AND id_produk = $id_produk");
                } else if ($query_cek && mysqli_affected_rows($db) > 0) {
                    //$hapus = mysqli_query($db, "DELETE FROM data_keranjang WHERE id_user = $id_user AND id_produk = $id_produk");
                    echo "success";

                } else {
                    echo "data tidak lengkap";
                }
            }
            exit;
        }
    }
} else {
    // var_dump($_SESSION['id_user']);
    if (isset($_POST['registrasi'])) {
        if ($_POST['registrasi'] == 'tambah') {

            $nama_user = $_POST["nama"];
            $nama_lengkap_user = $_POST["nama_lengkap"];
            $tahun_lahir = $_POST["ttl"];
            $alamat_user = $_POST["alamat"];
            $pass_user = $_POST["sandi"];



            $query = "INSERT INTO data_user (nama_user, nama_lengkap_user, alamat_user, tahun_lahir_user, pass_user) VALUES ('$nama_user', '$nama_lengkap_user', '$alamat_user', '$tahun_lahir', '$pass_user')";
            $sql = mysqli_query($db, $query);

            if ($sql) {
                header("location: ../pages/masuk.php?from=user");
                //echo "<script>alert('Registrasi berhasil')</script>";
            } else {
                echo mysqli_error($db);
            }

            /*} else if ($_POST['registrasi'] == 'edit') {

                $id_produk = $_POST['id_produk'];
                $nama_produk = $_POST['nama_produk'];
                $kategori_produk = $_POST['kategori_produk'];
                $harga_produk = $_POST['harga_produk'];

                $query = "UPDATE data_produk SET nama_produk = '$nama_produk', kategori_produk = '$kategori_produk', harga_produk = '$harga_produk' WHERE id_produk = '$id_produk';";
                $sql = mysqli_query($db, $query);

                $query_show = "SELECT * FROM data_produk WHERE id_produk = $id_produk";
                $sql_show = mysqli_query($db, $query_show);
                $result = mysqli_fetch_assoc($sql_show);

                if($_FILES['gambar_produk']['name'] == "") {

                    $gambar = $result['gambar_produk'];

                } else {
                    $gambar = $_FILES['gambar_produk']['name'];
                    $result2 = $result["gambar_produk"];
                    unlink('../assets/img/product_image/' . $result2);
                    $dir = '../assets/img/product_image/';
                    $tmp_file = $_FILES['gambar_produk']['tmp_name'];
                    move_uploaded_file($tmp_file, $dir . $gambar);

                    $query = "UPDATE data_produk SET nama_produk = '$nama_produk', kategori_produk = '$kategori_produk', harga_produk = '$harga_produk', gambar_produk = '$gambar' WHERE id_produk = '$id_produk';";
                    $sql = mysqli_query($db, $query);
                }

                if ($sql) {
                    echo "<script>alert('Update produk berhasil')</script>";
                    header('location: ../pages/admin.php');
                } else {
                    echo mysqli_error($db);
                }
            }*/


        }
    }
}




?>