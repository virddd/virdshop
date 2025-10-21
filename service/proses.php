<?php
include 'database.php';

if (isset($_POST['registrasi'])) {

    var_dump($_POST['registrasi']);
    //var_dump($_FILES);

    die();
}

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'add') {

        // var_dump($_POST);
        //var_dump($_FILES);

        // die();

        $nama_produk = $_POST['nama_produk'];
        $kategori_produk = $_POST['kategori_produk'];
        $harga_produk = $_POST['harga_produk'];
        $gambar_produk = $_FILES['gambar_produk']['name'];

        $dir = '../assets/img/product_image/';
        $tmp_file = $_FILES['gambar_produk']['tmp_name'];
        move_uploaded_file($tmp_file, $dir . $gambar_produk);


        $query = "INSERT INTO data_produk (nama_produk, kategori_produk, harga_produk, gambar_produk) VALUES ('$nama_produk', '$kategori_produk', '$harga_produk', '$gambar_produk')";
        $sql = mysqli_query($db, $query);

        if ($sql) {
            //echo "<script>alert('Produk berhasil ditambahkan')</script>";
            header('location: ../pages/produk.php?from=add');
        } else {
            echo mysqli_error($db);
        }

        //echo $nama_produk.' | '.$kategori_produk.' | '.$harga_produk.' | '.$gambar_produk;
        //echo '<br>Data berhasil ditambahkan ';

    } else if ($_POST['aksi'] == 'edit') {

        $id_produk = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
        $kategori_produk = $_POST['kategori_produk'];
        $harga_produk = $_POST['harga_produk'];

        $query = "UPDATE data_produk SET nama_produk = '$nama_produk', kategori_produk = '$kategori_produk', harga_produk = '$harga_produk' WHERE id_produk = '$id_produk';";
        $sql = mysqli_query($db, $query);

        $query_show = "SELECT * FROM data_produk WHERE id_produk = $id_produk";
        $sql_show = mysqli_query($db, $query_show);
        $result = mysqli_fetch_assoc($sql_show);

        if ($_FILES['gambar_produk']['name'] == "") {

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
            //echo "<script>alert('Update produk berhasil')</script>";
            header('location: ../pages/produk.php?from=edit');
        } else {
            echo mysqli_error($db);
        }

    } else if ($_POST['aksi'] == 'add_ui') {
        $nama_event = $_POST['nama_event'];
        $gambar_ui = $_FILES['gambar_ui']['name'];

        $dir = '../assets/img/ui/';
        $tmp_file = $_FILES['gambar_ui']['tmp_name'];
        move_uploaded_file($tmp_file, $dir . $gambar_ui);

        $query = "INSERT INTO data_ui (nama_event, gambar_ui) VALUES ('$nama_event', '$gambar_ui')";
        $sql = mysqli_query($db, $query);

        if ($sql) {
            header('location: ../pages/produk.php?from=add_ui');
        } else {
            echo mysqli_error($db);
        }

    } else if ($_POST['aksi'] == 'edit_ui') {

        $id_ui = $_POST['id_ui'];
        $nama_event = $_POST['nama_event'];
        $gambar_ui = $_FILES['gambar_ui']['name'];

        $query = "UPDATE data_ui SET nama_event = '$nama_event' WHERE id_ui = $id_ui";
        $sql = mysqli_query($db, $query);

        $query_show = "SELECT * FROM data_ui WHERE id_ui = $id_ui";
        $sql_show = mysqli_query($db, $query_show);
        $result = mysqli_fetch_assoc($sql_show);

        if ($_FILES['gambar_ui']['name'] == '') {
            $gambar_ui = $result['gambar_ui'];
        } else {
            $gambar = $_FILES['gambar_ui']['name'];
            $result2 = $result['gambar_ui'];
            unlink('../assets/img/ui/' . $result2);
            $dir = '../assets/img/ui/';
            $tmp_file = $_FILES['gambar_ui']['tmp_name'];
            move_uploaded_file($tmp_file, $dir . $gambar);

            $sql = mysqli_query($db, "UPDATE data_ui SET nama_event = '$nama_event', gambar_ui = '$gambar' WHERE id_ui = $id_ui");

            if ($sql) {
                header('location: ../pages/produk.php?from=edit_ui');
            } else {
                echo mysqli_error($db);
            }
        }
    } else if ($_POST['aksi'] == 'hapus_ui') {
        $id_ui = $_POST['id_ui'];
        $gambar_ui = $_POST['gambar_ui'];

        // var_dump($_POST);
        // die();

        $unlink = unlink("../assets/img/ui/" . $gambar_ui);

        if ($unlink) {

            $query = "DELETE FROM data_ui WHERE id_ui = $id_ui";
            $sql = mysqli_query($db, $query);

            if ($sql) {
                header('location: ../pages/produk.php?from=hapus_ui');
            } else {
                echo mysqli_error($db);
            }
        }

    }
} if (isset($_POST['action'])) {
        if ($_POST['action'] == 'hapus') {
            // Validasi dan sanitasi input
            if (!isset($_POST['id_produk']) || empty($_POST['id_produk'])) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'ID produk tidak valid']);
                exit;
            }

            $id_produk = mysqli_real_escape_string($db, $_POST['id_produk']);

            // Mulai transaction
            mysqli_begin_transaction($db);

            try {
                // Ambil data produk untuk hapus gambar
                $query_show = "SELECT * FROM data_produk WHERE id_produk = '$id_produk'";
                $sql_show = mysqli_query($db, $query_show);

                if (!$sql_show) {
                    throw new Exception("Error query select: " . mysqli_error($db));
                }

                $result = mysqli_fetch_assoc($sql_show);

                if (!$result) {
                    throw new Exception("Produk tidak ditemukan");
                }

                // Hapus gambar jika ada
                if (!empty($result["gambar_produk"])) {
                    $image_path = "../assets/img/product_image/" . $result["gambar_produk"];
                    if (file_exists($image_path)) {
                        if (!unlink($image_path)) {
                            // Log error tapi jangan stop proses
                            error_log("Gagal hapus gambar: " . $image_path);
                        }
                    }
                }

                // Hapus dari keranjang
                $query2 = "DELETE FROM data_keranjang WHERE id_produk = '$id_produk'";
                if (!mysqli_query($db, $query2)) {
                    throw new Exception("Error hapus keranjang: " . mysqli_error($db));
                }

                // Hapus produk
                $query = "DELETE FROM data_produk WHERE id_produk = '$id_produk'";
                if (!mysqli_query($db, $query)) {
                    throw new Exception("Error hapus produk: " . mysqli_error($db));
                }

                // Cek apakah ada baris yang terhapus
                if (mysqli_affected_rows($db) == 0) {
                    throw new Exception("Tidak ada produk yang terhapus");
                }

                // Commit transaction
                mysqli_commit($db);

                http_response_code(200);
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Produk berhasil dihapus',
                    'id_produk' => $id_produk
                ]);

            } catch (Exception $e) {
                // Rollback jika ada error
                mysqli_rollback($db);

                http_response_code(500);
                echo json_encode([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]);
            }

        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Action tidak valid']);
        }
    } 
    // else {
    //     http_response_code(400);
    //     echo json_encode(['status' => 'error', 'message' => 'No action specified']);
    // }
    
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'hapus_akun') {
        $id_user = $_POST['id_user'];

        $query = "DELETE FROM data_user WHERE id_user = $id_user";
        $sql = mysqli_query($db, $query);
    }
}

?>