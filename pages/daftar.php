<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-Store</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="/../assets/img/ikon/icon.jpg" type="jpg/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-[#fff5e8] h-[80vh]">
    <?php include '../src/test.html' ?>
    <div class="sticky bg-orange-600 w-12 rounded-br-2xl -translate-x-2 transform p-2 top-0 mx-2">
        <a href="../index.php">
            <svg class="hover:brightness-80 brightness-100 hover:brightness-80 transition-all duration-300 ease-in-out cursor-pointer" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
                
        </a>
    </div>
    <div class="flex flex-col items-center h-screen justify-center">
        <div class="bg-[#f64301] p-6 w-xs sm:w-lg md:w-2xl lg:w-3xl xl:w-4xl rounded-3xl flex flex-col items-center justify-center">
            <div class="flex justify-center items-center">
                <img class="w-full rounded-2xl" src="../../assets/img/banner/banner.png" alt="" srcset=""/>
            </div>
            <div>
                <h1 class="text-white text-center my-5 text-xl font-bold">Ayo Gabung!</h1>
            </div>
            <form class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8 items-center justify-center m-2" action="/submit" method="post" id="login">
                <!-- <label for="nama" class="text-white">Nama</label> -->
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" type="text" name="text" id="nama" placeholder="Nama akun">
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" type="text" name="text" id="nama_lengkap" placeholder="Nama lengkap">
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out placeholder-neutral-900" type="date" name="ttl" id="ttl" placeholder="Tahun kelahiran"/>
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" type="text" name="text" id="alamat" placeholder="Alamat">
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" type="password" name="sandi" id="sandi" placeholder="Sandi">
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" type="password" name="sandi" id="sandi" placeholder="Verifikasi Sandi">
            </form>
            <button class="bg-[#fff5e8] py-2 mt-6 px-14 rounded-2xl" type="submit" form="login">Buat</button>
        </div>
        <a class="mt-5 text-sm underline hover:text-orange-500" href="masuk.php">Sudah punya akun? masuk disini!</a>
    </div>
            <?php include '../src/copyright.html'; ?>

</body>