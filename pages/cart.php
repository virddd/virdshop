<?php
    session_start();
    include '../service/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

                <div class="flex my-2 flex-wrap-reverse justify-between cursor-default bg-[#fff5e8] hover:ring-orange-600 ring-1 hover:ring-2 transition-all duration-300 ease-in-out group shadow-lg/20 overflow-hidden w-[90vw] h-[180px] rounded-xl">
                    <div class="h-[180px] w-[180px] bg-white rounded-xl overflow-hidden">
                        <img src="../assets/img/product_image/<?php echo $gambar_produk ?>" alt="">
                    </div>
                    <div class="flex-grow xl:items-center lg:items-center md:items-center sm:items-center xl:justify-evenly lg:justify-evenly md:justify-evenly sm:justify-evenly justify-center select-none flex flex-wrap sm:divide-x-1 lg:divide-x-1 md:divide-x-1 w-48">
                        <div class="xl:h-30 lg:h-30 md:h-30 sm:h-30 h-auto flex justify-center items-center mx-10 mt-2 sm:pr-[12%] md:pr-[13%] lg:pr-[14%] xl:pr-[12%] xl:mx-0 lg:mx-0 md:mx-10 sm:mx-10 border-b-[1.5px] px-[20%] sm:px-0 md:px-0 lg:px-0 xl:px-0 sm:border-b-0 md:border-b-0 lg:border-b-0 xl:border-b-0">
                            <div class="flex relative justify-center text-center w-20 items-center">
                                <p class="whitespace-nowrap  absolute font-bold text-md sm:text-lg md:text-lg lg:text-xl xl:text-xl"><?php echo $nama_produk ?></p>
                            </div>
                            <!-- <div class="text-lg flex-col flex justify-center text-center items-center">
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
                            </div> -->
                        </div>
                        <div class="flex flex-col xl:h-30 lg:h-30 md:h-30 sm:h-30 h-auto justify-center items-center sm:pr-[11%] md:pr-[12%] lg:pr-[13%] xl:pr-[13%]">
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg"><?php echo $harga_produk ?></p>
                            <input type="hidden" name="harga" id="harga_<?php echo $id_produk ?>" value="<?php echo $harga ?>">
                            <div class="xl:scale-100 lg:scale-95 md:scale-90 sm:scale-85 scale-80 bg-[#c3b9ab] rounded-md w-auto h-[36px] flex flex-row-reverse justify-between items-center">
                                <button onclick="tambah1(<?php echo $id_produk ?>)" class="mb-1 hover:text-neutral-500 transition-all duration-300 rounded-r-md w-8 h-full text-3xl text-center cursor-pointer font-bold">+</button>
                                <form id="formKuantitas_<?php echo $id_produk; ?>" onsubmit="return false;" class="bg-[#dacfc0] min-w-8">
                                    <input  onkeypress="return handleEnter(event, <?php echo $id_produk ?>)" id="kuantitas_<?php echo $id_produk ?>" name="kuantitas" type="text" value="<?php  echo $jumlah ?>" class="w-13 text-lg text-center"></input> 
                                    <input type="hidden" name="id_produk" id="id_produk_<?php echo $id_produk ?>" value="<?php echo $id_produk ?>">
                                    <!-- <button hidden type="submit" onclick="setKuantitas()"></button> -->
                                </form>
                                <button onclick="hapus1(<?php echo $id_produk ?>)" class="mb-1 hover:text-neutral-500 transition-all duration-300 rounded-l-md w-8 h-full text-3xl text-center cursor-pointer font-bold">-</button>
                            </div>
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg"><?php echo $jumlah_harga ?></p>
                        </div>
                        <button onclick="hapusKeranjang(<?php echo $id_produk ?>)" class="">
                            <svg class="transform scale-60 sm:scale-70 md:scale-80 lg:scale-90 xl:scale-90 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer" width="50px" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier"><path d="M20.5001 6H3.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path><path d="M18.8332 8.5L18.3732 15.3991C18.1962 18.054 18.1077 19.3815 17.2427 20.1907C16.3777 21 15.0473 21 12.3865 21H11.6132C8.95235 21 7.62195 21 6.75694 20.1907C5.89194 19.3815 5.80344 18.054 5.62644 15.3991L5.1665 8.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path><path d="M9.5 11L10 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path><path d="M14.5 11L14 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path><path d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="#d80000" stroke-width="1.5"></path></g>
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
    <p class="text-[#6e6e6e] text-center pb-10 my-[30vh]"><?php if(isset($_SESSION['id_user']) != null){if(isset($id_produk) == null){echo 'Keranjang anda kosong.';}} else { echo 'Harap login dahulu'; } ?></p>
    <?php include '../src/copyright.html'; ?>

    <footer class="w-full bottom-0 py-2 fixed shadow-lg/20 z-10 bg-[#6b0101]">
        <div class="flex items-center flex-row justify-between h-13 w-full px-7">
            <h1 class="text-[#fff5e8] font-bold text-lg">Pembayaran</h1>
            <div class="flex flex-row gap-4">
                <p class="transition-all duration-300 ease-in-out shadow-md/50 text-white px-4 py-1 font-semibold rounded-xl text-lg"><?php if(isset($_SESSION['id_user']) != null){ $id_user = $_SESSION['id_user']; $harga_jumlah = mysqli_query($db, "SELECT SUM(jumlah_harga) AS total_harga FROM data_keranjang WHERE id_user = $id_user"); $jumlah_baris = mysqli_fetch_assoc($harga_jumlah); $harga_total = $jumlah_baris['total_harga'] ?? 0; echo "Rp " . number_format(($harga_total), 0, ',', '.');}else{echo 'Rp. 0';}?></p>
                <a onclick="contoh()" class="bg-[#f64301] hover:bg-[#da3b01] focus:bg-[#da3b01] active:bg-[#da3b01] transition-all duration-300 ease-in-out shadow-md/50 text-white px-4 py-1 font-semibold rounded-xl text-lg" href="payment.php">Pembayaran</a>
            </div>
        </div>
    </footer>
</body>
        <script src="../assets/js/ajax.js"></script>
        <script src="../assets/js/main.js"></script>
        <script>
            function tambah1(idProduk) {
    var harga = document.getElementById('harga_' + idProduk).value;

    console.log('ID Produk:', idProduk);
    console.log('Harga:', harga);

    // Validasi harga
    if (!harga || isNaN(harga) || parseFloat(harga) <= 0) {
        alert('Harga tidak valid');
        return false;
    }

    // Gunakan FormData (sama seperti setKuantitas)
    var formData = new FormData();
    formData.append('id_produk', idProduk);
    formData.append('harga', harga);
    formData.append('action', 'add_cart');

    // Debug FormData
    console.log('FormData contents:');
    for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../service/proses_user.php", true);
    // JANGAN set Content-Type header untuk FormData, biarkan browser yang set otomatis

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            console.log('Response:', xhr.responseText);

            if (xhr.status === 200) {
                if (xhr.responseText.trim() === 'success') {
                    //alert('Kuantitas berhasil ditambahkan');
                    location.reload();
                } else {
                    //alert('Gagal: ' + xhr.responseText);
                } location.reload();
            } else {
                alert('HTTP Error: ' + xhr.status);
            }//location.reload();
        }//location.reload();
    };

    xhr.send(formData);
    return false;
};


function hapus1(idProduk) {
    var harga = document.getElementById('harga_' + idProduk).value;

    console.log('ID Produk:', idProduk);
    console.log('Harga:', harga);

    // Validasi harga
    if (!harga || isNaN(harga) || parseFloat(harga) <= 0) {
        alert('Harga tidak valid');
        return false;
    }

    // Gunakan FormData (sama seperti setKuantitas)
    var formData = new FormData();
    formData.append('id_produk', idProduk);
    formData.append('harga', harga);
    formData.append('action', 'hapus');

    // Debug FormData
    console.log('FormData contents:');
    for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../service/proses_user.php", true);
    // JANGAN set Content-Type header untuk FormData, biarkan browser yang set otomatis

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            console.log('Response:', xhr.responseText);

            if (xhr.status === 200) {
                if (xhr.responseText.trim() === 'success') {
                    //alert('Kuantitas berhasil dikurangi');
                    location.reload();
                } else {
                    //alert('Gagal: ' + xhr.responseText);
                } location.reload();
            } else {
                alert('HTTP Error: ' + xhr.status);
            }//location.reload();
        }//location.reload();
    };

    xhr.send(formData);
    return false;
};
        </script>
</html>