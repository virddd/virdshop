<?php

include 'database.php';


if (isset($_GET['idproduk'])){
    $id_produk = $_GET['idproduk'];
    $id_user = "1";

    $query_cek = mysqli_query($db, "SELECT jumlah_pesanan FROM data_keranjang WHERE id_user = $id_user AND id_produk = $id_produk");


    if(mysqli_num_rows($query_cek) > 0){
        mysqli_query($db, "UPDATE data_keranjang SET jumlah_pesanan = jumlah_pesanan + 1 WHERE id_user = $id_user AND id_produk = $id_produk");
        header('location: ../index.php');
        exit;
    } else {
        mysqli_query($db, "INSERT INTO data_keranjang (id_user, id_produk, jumlah_pesanan) VALUES ($id_user, $id_produk, 1)");
        header("location: ../index.php");
        exit;
    }


}

if (isset($_GET["hapus_keranjang"])) {
    $id_produk = $_GET["hapus_keranjang"];
    $id_user = "1";

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
exit
?>


//echo "Rp " . number_format($harga, 0, ',', '.');



/*
if (isset($_GET['idproduk'])) {
    $id_produk = $_GET['idproduk'];

    $query_check = "SELECT u.id_user FROM data_keranjang k  WHERE id_user = $id_user AND id_produk = $id_produk";
    $sql_check = mysqli_query($db, $query_check);
    $result_check = mysqli_fetch_assoc($sql_check);

    if(mysqli_num_rows($sql_check) > 0) {
        $jumlah_beli = $result_check['jumlah_beli'] + 1;
        $query_update = "UPDATE cart SET jumlah_beli = $jumlah_beli WHERE id_user = $id_user AND id_produk = $id_produk";
        $sql_update = mysqli_query($db, $query_update);
    } else {
        $jumlah_beli = 1;
        $query_insert = "INSERT INTO cart (id_user, id_produk, jumlah_beli) VALUES ($id_user, $id_produk, $jumlah_beli)";
        $sql_insert = mysqli_query($db, $query_insert);
    }

    if ($sql_check || $sql_update || $sql_insert) {
        echo "<script>alert('Produk berhasil ditambahkan ke keranjang')</script>";
        header('location: ../index.php');
    } else {
        echo mysqli_error($db);
    }
}
*/