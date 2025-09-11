<?php
include 'database.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'add') {

        //var_dump($_POST);
        //var_dump($_FILES);

        //die();

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
            echo "<script>alert('Produk berhasil ditambahkan')</script>";
            header('location: ../pages/admin.php');
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
    }
}

if (isset($_GET['hapus'])) {
    $id_produk = $_GET['hapus'];

    $query_show = "SELECT * FROM data_produk WHERE id_produk = $id_produk";
    $sql_show = mysqli_query($db, $query_show);
    $result = mysqli_fetch_assoc($sql_show);
    unlink($result["gambar_produk"] . "../assets/img/product_image/");

    $query2 = "DELETE FROM data_keranjang WHERE id_produk = $id_produk";
    $query = "DELETE FROM data_produk WHERE id_produk = $id_produk";
    mysqli_query($db, $query2);
    mysqli_query($db, $query);

    header('location: ../pages/admin.php');

    /*if ($sql) {
        echo "<script>alert('Berhasil menghapus produk!')</script>";
        header('location: ../pages/admin.php');
    } else {
        echo mysqli_error($db);
    }*/
}


?>