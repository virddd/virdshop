

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-Store</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <link rel="shortcut icon" href="/../assets/img/ikon/icon.jpg" type="jpg/x-icon"> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-[120vh] relative bg-[#fff5e8]">
    <nav class="sticky top-0 shadow-lg/20 z-10">
        <div class="relative h-13 w-full bg-[#f64301]">
            <div class="flex items-center h-full mx-4">
                <h1 class="text-[#fff5e8] font-bold text-lg">KERANJANG</h1>
            </div>
            <div class="absolute right-0 top-0 m-3">
                <a href="../index.php">
                    <svg class="brightness-100 hover:brightness-80 transition-all duration-300 ease-in-out cursor-pointer"
                        width="30px" height="30px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z" />
                        <path fill="#ffffff"
                            d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>

<?php include '../src/test.html'?>

    <div>
        <div class="flex flex-wrap gap-2 justify-evenly m-2 ">
            <div class="flex-cols-1 mt-10">


            <?php
            session_start();
            include '../service/database.php';
            if (isset($_SESSION['id_user']) != null){
            $id_produk = null;
            $id_user = null;
            $id_user = $_SESSION['id_user'];
            $keranjang = mysqli_query($db, "SELECT * FROM data_keranjang WHERE id_user = $id_user");
            
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

                <div
                    class="flex my-2 flex-wrap-reverse justify-between cursor-default bg-[#fff5e8] hover:ring-orange-600 ring-1 hover:ring-2 transition-all duration-300 ease-in-out group shadow-lg/20 overflow-hidden w-[90vw] h-[180px] rounded-xl">
                    <div class="h-[180px] w-[180px] bg-white rounded-xl overflow-hidden">
                        <img src="../assets/img/product_image/<?php echo $gambar_produk ?>" alt="">
                    </div>
                    <div
                        class="flex-grow items-center justify-evenly select-none flex flex-wrap sm:divide-x-1 lg:divide-x-1 md:divide-x-1 w-48">
                        <div
                            class="flex flex-col justify-center items-center my-2 sm:pr-[4%] md:pr-[7%] lg:pr-[10%] xl:pr-[12%] ">
                            <div class="flex justify-center text-center items-center">
                                <p class="whitespace-nowrap font-bold text-md sm:text-lg md:text-lg lg:text-xl xl:text-xl"><?php echo $nama_produk ?></p>
                            </div>
                            <div class="text-lg flex-col flex justify-center text-center items-center">
                                <label class="w-38 text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg"
                                    for="pedas">Level pedas :</label>
                                <select name="pedas" id="pedas"
                                    class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg mt-1 ring-1 hover:ring-2 px-2 ring-[#000] bg-[#eee5da] transition-all duration-300 ease-in-out rounded-lg hover:ring-orange-600 cursor-pointer">
                                    <option value="lv0">level 0</option>
                                    <option value="lv1">Level 1</option>
                                    <option value="lv2">Level 2</option>
                                    <option value="lv3">Level 3</option>
                                    <option value="lv4">Level 4</option>
                                </select>
                            </div>
                        </div>
                        <div
                            class="flex flex-col justify-center items-center pr-[7%] sm:pr-[8%] md:pr-[10%] lg:pr-[11%] xl:pr-[13%]">
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg"><?php echo $harga_produk ?></p>
                            <p
                                class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg bg-[#dacfc0] rounded-md px-1 w-full text-center"><?php echo $jumlah ?></p>
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg"><?php echo $jumlah_harga ?></p>
                        </div>
                        <button onclick="hapusKeranjang(<?php echo $id_produk ?>)" onclick="return confirm('Yakin ingin menghapus produk ini dari keranjang?')">
                            <svg class="scale-70 sm:scale-80 md:scale-90 lg:scale-100 xl:scale-100 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer p-1"
                            width="50px" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M20.5001 6H3.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round">
                                    </path>
                                    <path
                                    d="M18.8332 8.5L18.3732 15.3991C18.1962 18.054 18.1077 19.3815 17.2427 20.1907C16.3777 21 15.0473 21 12.3865 21H11.6132C8.95235 21 7.62195 21 6.75694 20.1907C5.89194 19.3815 5.80344 18.054 5.62644 15.3991L5.1665 8.5"
                                    stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M9.5 11L10 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round">
                                </path>
                                <path d="M14.5 11L14 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round">
                                    </path>
                                    <path
                                    d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                    stroke="#d80000" stroke-width="1.5"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>


                <?php
                }}
                ?>

            </div>
        </div>
    </div>
    <p class="text-[#6e6e6e] text-center pb-10 my-[30vh]"><?php if(isset($id_produk) == null){echo 'Keranjang anda kosong.';} ?></p>
    <?php include '../src/copyright.html'; ?>

    <footer class="w-full bottom-0 py-2 fixed shadow-lg/20 z-10 bg-[#6b0101]">
        <div class="flex items-center flex-row justify-between h-13 w-full px-7">
            <h1 class="text-[#fff5e8] font-bold text-lg">Pembayaran</h1>
            <a class="bg-[#f64301] hover:bg-[#da3b01] focus:bg-[#da3b01] active:bg-[#da3b01] transition-all duration-300 ease-in-out shadow-md/50 text-white px-4 py-1 font-semibold rounded-xl text-lg" href="payment.php">Checkout</a>
        </div>
    </footer>
        <script>
            function hapusKeranjang(idProduk) {
                if (confirm('Yakin mau hapus produk ini dari keranjang?')) {
                var xhr = new XMLHttpRequest();

                xhr.open("POST", "../service/proses_user.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert('Produk berhasil dihapus dari keranjang');
                        location.reload();
                    }
                };

                xhr.send("id_produk=" + idProduk + "&action=remove_cart");
            }}
        </script>
        </body>
</html>