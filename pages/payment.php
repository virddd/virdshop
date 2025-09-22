<?php
include "../service/database.php";
session_start();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="src/style.css">
    <link rel="shortcut icon" href="../assets/img/icon/favicon.ico" type="ico/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#fff5e8]">
    <nav class="sticky top-0 shadow-lg/20 z-10">
        <div class="relative h-13 w-full bg-[#f64301]">
            <div class="flex items-center h-full mx-4">
                <h1 class="text-[#fff5e8] font-bold text-lg">PEMBAYARAN</h1>
            </div>
            <div class="absolute right-0 top-0 m-3">
                <a href="cart.php">
                    <svg class="brightness-100 hover:brightness-80 transition-all duration-300 ease-in-out cursor-pointer" width="30px" height="30px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
                </a>
            </div>
        </div>
    </nav>

    <?php include '../src/test.html';?>

    <main class="mb-20">
        <div class="w-full flex flex-col items-center justify-center">
            <div class="w-[90vw] bg-[#f64301] px-4 mt-10 py-8 rounded-lg shadow-md/30 text-sm sm:text-sm md:text-md lg:text-md xl:text-md">
                <h1 class="text-center text-white w-full bg-[#f64301] font-bold text-lg sm:text-lg md:text-lg lg:text-lg xl:text-xl pb-6">Lengkapi data diri anda</h1>
                <form class="flex w-full flex-wrap justify-evenly gap-6" action="">
                    <label for="nama_lengkap_user">
                        <p class="text-black font-semibold text-xs text-center px-2 w-27 py-[3px] rounded-t-lg bg-[#ece0d1]">Nama Penerima</p>
                        <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out capitalize" required type="text" name="nama_lengkap" id="nama_lengkap_user" placeholder="Nama lengkap" value="<?php if(isset($_SESSION['id_user'])){echo $_SESSION['nama_lengkap_user'];}?>">
                    </label>
                    <label for="email_user">
                        <p class="text-black font-semibold text-xs text-center px-2 w-12 py-[3px] rounded-t-lg bg-[#ece0d1]">Email</p>
                        <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" required type="email" name="email" id="email_user" placeholder="Opsional">
                    </label>
                    <label for="telepon">
                        <p class="text-black font-semibold text-xs text-center px-2 w-20 py-[3px] rounded-t-lg bg-[#ece0d1]">No Telepon</p>
                        <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" required type="number" name="telepon" id="telepon" placeholder="08123456789">
                    </label>
                    <label for="alamat_user">
                        <p class="text-black font-semibold text-xs text-center px-2 w-28 py-[3px] rounded-t-lg bg-[#ece0d1]">Alamat Penerima</p>
                        <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" required type="text" name="alamat" id="alamat_user" placeholder="Alamat" value="<?php if(isset($_SESSION['id_user'])){echo $_SESSION['alamat_user'];}?>">
                    </label>
                </form>
            </div>
            <div hidden class="w-[90vw] h-auto shadow-md/30  rounded-lg overflow-hidden bg-orange-200 mt-10">
                <div class=" flex flex-col items-center">
                    <h1 class="text-center w-full bg-orange-200 font-semibold py-2">Alamat</h1>
                    <form action="../service/proses.user.php" method="POST" class="w-[95%] mb-8">
                        <input value="<?php if(isset($_SESSION['id_user'])){echo $_SESSION['alamat_user'];}?>" class=" p-2 h-20 w-full bg-orange-100 rounded-md ring-1 " name="alamat" id="alamat" placeholder="jalan">
                    </form>
                </div>
            </div>
            <table class="rounded-lg xl:mt-16 lg:mt-14 md:mt-12 sm:mt-9 mt-6 shadow-md/50 overflow-hidden bg-orange-50 border-collapse border border-black table-auto w-[90vw] my-5">
                <thead class="border-black">
                    <tr class="bg-[#f64301] text-white text-sm sm:text-sm md:text-md lg:text-md xl:text-lg">
                        <th class="border p-2 border-gray-600 ">No</th>
                        <th class="border p-2 border-gray-600 " >Menu yang dipilih </th>
                        <th class="border p-2 border-gray-600 ">Harga</th>
                        <th class="border p-2 border-gray-600 ">Qty</th>
                        <th class="border p-2 border-gray-600 ">Jumlah harga</th>
                    </tr>
                </thead>
                <tbody>

                <?php
            if (isset($_SESSION['id_user']) != null){
            $id_produk = null;
            $id_user = null;
            $id_user = $_SESSION['id_user'];
            $keranjang = mysqli_query($db, "SELECT * FROM data_keranjang WHERE id_user = $id_user");
            $no = 1;
            
            while ($result = mysqli_fetch_array($keranjang)) {
                $id_user = $result["id_user"];
                $id_produk = $result["id_produk"];
                $jumlah = (int) $result["jumlah_pesanan"];
            
                $produk = mysqli_query($db, "SELECT * FROM data_produk WHERE id_produk = $id_produk");
                $result2 = mysqli_fetch_array($produk);
                $nama_produk = $result2["nama_produk"];
                $harga = (int) $result2["harga_produk"];
                $harga_produk = "Rp " . number_format($harga, 0, ',', '.');
                $gambar_produk = $result2["gambar_produk"];
                $jumlah_harga = "Rp " . number_format(($harga * $jumlah), 0, ',', '.');

                
            
            ?>
                    
                    <tr class="odd:bg-[#ffefd2] even:bg-[#ffe1a9] text-center text-sm sm:text-sm md:text-md lg:text-md xl:text-lg">
                        <td class="border p-2 border-gray-600 "><?php echo $no++;?></td>
                        <td class="border p-2 border-gray-600 text-left flex flex-col sm:flex-row md:flex-row lg:flex-row xl:flex-row gap-2 justify-around items-center">
                            <img src="../assets/img/product_image/<?php echo $gambar_produk; ?>" alt="" class=" rounded-lg size-20">
                            <div class="w-auto flex flex-col sm:items-start sm:items-starts md:items-start lg:items-start xl:items-start lg:flex-col lg:justify-evenly md:mx-4 sm:mx-4 gap-2 text-center items-center">
                                <p class="my-1 font-semibold"><?php echo $nama_produk; ?></p>
                                <form class=""><input class="w-32 sm:w-50 md:w-65 lg:w-120 xl:w-190 border-black border-1 rounded-lg px-2 py-1 bg-[#fff5e1]" placeholder="opsi tambahan" type="text"/></form>
                            </div>
                        </td>
                        <td class="border p-2 border-gray-600 "><?php echo $harga_produk ;?></td>
                        <td class="border p-2 border-gray-600 "><?php echo $jumlah ;?></td>
                        <td class="border p-2 border-gray-600 "><?php echo $jumlah_harga ;?></td>
                    </tr>
                    
                <?php
                }}
                ?>
                    
                </tbody>
                <tfoot>
                    <tr class="bg-[#f64301] text-white text-sm sm:text-sm md:text-md lg:text-md xl:text-xl">
                        <th class="border p-2 border-gray-600 " colspan="3">Total</th>
                        <th class="border p-2 border-gray-600 "><?php if(isset($_SESSION['id_user']) != null){ $id_user = $_SESSION['id_user']; $pesanan_jumlah = mysqli_query($db, "SELECT SUM(jumlah_pesanan) AS total_pesanan FROM data_keranjang WHERE id_user = $id_user"); $jumlah_baris = mysqli_fetch_assoc($pesanan_jumlah); $pesanan_total = $jumlah_baris['total_pesanan'] ?? 0; echo $pesanan_total;}else{echo 0;}?></th>
                        <th class="border p-2 border-gray-600 "><?php if(isset($_SESSION['id_user']) != null){ $id_user = $_SESSION['id_user']; $harga_jumlah = mysqli_query($db, "SELECT SUM(jumlah_harga) AS total_harga FROM data_keranjang WHERE id_user = $id_user"); $jumlah_baris = mysqli_fetch_assoc($harga_jumlah); $harga_total = $jumlah_baris['total_harga'] ?? 0; echo "Rp " . number_format(($harga_total), 0, ',', '.');}else{echo 'Rp. 0';}?></th>
                    </tr>
                </tfoot>
            </div>

        </main>

            <div>
                <div class="w-[90vw] bg-[#f64301] px-4 mt-10 py-8 rounded-lg shadow-md/30 text-sm sm:text-sm md:text-md lg:text-md xl:text-md">
                    <label for="metode_pembayaran" class="">
                        <p class="mx-4 text-black font-semibold text-xs text-center px-2 w-33 py-[3px] rounded-t-lg bg-[#ece0d1]">Metode Pembayaran</p>
                        <!-- <input class="" required type="text" name="nama_lengkap" id="nama_lengkap_user" placeholder="Nama lengkap" value="<?php if(isset($_SESSION['id_user'])){echo $_SESSION['nama_lengkap_user'];}?>"> -->
                        <select name="metode_pembayaran" id="metode_pembayaran" class="mx-4 cursor-pointer shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out capitalize">
                            <option value="">Qris</option>
                            <option value="">Dana</option>
                            <option value="">Gopay</option>
                            <option value="">ShopeePay</option>
                            <option value="">Alfamart</option>
                            <option value="">Indomaret</option>
                            <option value="">Bayar ditempat</option>
                        </select>
                    </label>
                </div>
            </div>

        <!-- <?php include '../src/copyright.html'; ?> -->

    <footer class="w-full bottom-0 py-2 fixed shadow-lg/20 z-10 bg-[#6b0101]">
        <div class="flex items-center flex-row justify-between h-13 w-full px-7">
            <h1 class="text-[#fff5e8] font-bold text-lg">Pembayaran</h1>
            <div class="flex flex-row gap-4">
                <p class="transition-all duration-300 ease-in-out shadow-md/50 text-white px-4 py-1 font-semibold rounded-xl text-lg"><?php if(isset($_SESSION['id_user']) != null){ $id_user = $_SESSION['id_user']; $harga_jumlah = mysqli_query($db, "SELECT SUM(jumlah_harga) AS total_harga FROM data_keranjang WHERE id_user = $id_user"); $jumlah_baris = mysqli_fetch_assoc($harga_jumlah); $harga_total = $jumlah_baris['total_harga'] ?? 0; echo "Rp " . number_format(($harga_total), 0, ',', '.');}else{echo 'Rp. 0';}?></p>
                <button onclick="maintenance()" class="cursor-pointer bg-[#f64301] hover:bg-[#da3b01] focus:bg-[#da3b01] active:bg-[#da3b01] transition-all duration-300 ease-in-out shadow-md/50 text-white px-4 py-1 font-semibold rounded-xl text-lg">Bayar</button>
            </div>
        </div>
    </footer>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/ajax.js"></script>
    <script>
        function maintenance() {
        console.log('berhasil')
        swalWithTailwindButtons.fire({
        title: "Info!!",
        text: "Server sedang maintenance, kembali lagi nanti!",
        icon: "question",
        background: "#fff5e8",
        confirmButtonText: "Baiklah",
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'cart.php'
        }})
};
    </script>
    </body>
    </html>