<?php

include 'database.php';

session_start();


if (isset($_POST["akun"])) {
    if ($_POST["akun"] == "masuk") {
        $nama_user = $_POST["nama_masuk"];
        $pass_user = $_POST["sandi_masuk"];

        $query_cek = "SELECT * FROM data_user WHERE nama_user = '$nama_user' AND pass_user = '$pass_user'";
        $sql = mysqli_query($db, $query_cek);

        //$row_cek = mysqli_fetch_array($sql);
        //if ($row_cek["nama_user"] == $nama_user) {
        //    var_dump($row_cek);
        //    die();
        //}

        if (mysqli_num_rows($sql) !== 0) {
            $result = mysqli_fetch_assoc($sql);
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['nama_user'] = $result['nama_user'];
            $_SESSION['nama_lengkap_user'] = $result['nama_lengkap_user'];
            $_SESSION['alamat_user'] = $result['alamat_user'];
            $_SESSION['tahun_lahir_user'] = $result['tahun_lahir_user'];
            $_SESSION['pass_user'] = $result['pass_user'];
            
            if ($result['id_user'] == '1') {
                header('location: ../pages/admin.php');
            } else {
                header('location: ../index.php');
            }
        }

        else {
            echo "<script>alert('Nama akun atau kata sandi salah')</script>";
            header("location: ../pages/masuk.php");
        }
    } else if ($_POST["akun"] == "keluar") {
        session_destroy();
    }
}


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
            header("location: ../pages/masuk.php");
            echo "<script>alert('Registrasi berhasil')</script>";
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

        

if ($_SESSION['id_user'] !== null) {

if (isset($_GET['idproduk'])){

    $id_produk = $_GET['idproduk'];
    $id_user = $_SESSION['id_user'];
    $nama_user = $_SESSION['nama_user'];

    $query_cek_produk = mysqli_query($db, "SELECT * FROM data_produk WHERE id_produk = $id_produk");
    $result_produk = mysqli_fetch_assoc($query_cek_produk);
    $nama_produk = $result_produk['nama_produk'];
    

    $query_cek = mysqli_query($db, "SELECT jumlah_pesanan FROM data_keranjang WHERE id_user = $id_user AND id_produk = $id_produk");


    if(mysqli_num_rows($query_cek) > 0){
        mysqli_query($db, "UPDATE data_keranjang SET jumlah_pesanan = jumlah_pesanan + 1 WHERE id_user = $id_user AND id_produk = $id_produk");
        header('location: ../index.php');
        exit;
    } else {
        $cek = mysqli_query($db, "INSERT INTO data_keranjang (id_user, nama_user, id_produk, nama_produk, jumlah_pesanan) VALUES ('$id_user', '$nama_user', '$id_produk', '$nama_produk', 1)");

        header("location: ../index.php");
    }


}

if (isset($_GET["hapus_keranjang"])) {
    $id_produk = $_GET["hapus_keranjang"];
    $id_user = $_SESSION['id_user'];

    $query_hapus = "DELETE FROM data_keranjang WHERE id_user = $id_user AND id_produk = $id_produk";
    $sql_hapus = mysqli_query($db, $query_hapus);

    if ($sql_hapus) {
        echo "<script>alert('Produk berhasil dihapus dari keranjang')</script>";
        header('location: ../pages/cart.php');
        exit;
    } else {
        echo mysqli_error($db);
    }
}
} else {
    var_dump($_SESSION['id_user']);
}
?>