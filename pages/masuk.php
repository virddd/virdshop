<?php
    include "../service/database.php";

    if (isset($_POST["masuk"])) {
        $username = $_POST["nama"];
        $password = $_POST["sandi"];
        echo $username . $password;
    }
?>


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
    <div class="flex flex-col items-center h-[80vh] justify-center">
        <div class="bg-[#f64301] p-6 w-xs sm:w-sm md:w-md lg:w-md xl:w-md rounded-3xl flex flex-col items-center justify-center">
            <div class="flex justify-center items-center">
                <img class="w-full rounded-2xl" src="../assets/img/banner/banner.png" alt="" srcset=""/>
            </div>
            <div>
                <h1 class="text-white text-center my-5 text-2xl font-bold">Ayo login!</h1>
            </div>

            <form class="flex gap-y-8 flex-col items-center justify-center m-2" action="../service/proses_user.php" method="POST" id="registrasi">
                <label for="nama_login">
                    <p class="text-black font-semibold text-xs text-center px-2 w-21 py-[3px] rounded-t-lg bg-[#ece0d1]">Nama Akun</p>
                    <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out" type="text" name="nama_masuk" id="nama_login" placeholder="Masukkan nama akun">
                </label>
                <label for="sandi_login">
                    <p class="text-black font-semibold text-xs text-center px-2 w-19 py-[3px] rounded-t-lg bg-[#ece0d1]">Kata Sandi</p>
                    <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out" type="password" name="sandi_masuk" id="sandi_login" placeholder="masukkan kata sandi">
                </label>
                <input type="hidden" name="akun" value="masuk">
                <button type="submit" class=" bg-[#fff5e8] py-2 px-14 rounded-2xl cursor-pointer transition-all duration-300 ease-in-out hover:bg-[#e6dacb] active:bg-[#d7cbbb] focus:bg-[#d7cbbb] font-semibold active:shadow-[0_-2px_4px_rgba(0,0,0,0.3),_inset_0_-3px_4px_rgba(0,0,0,0.3)] focus:shadow-[0_-2px_4px_rgba(0,0,0,0.3),_inset_0_-3px_4px_rgba(0,0,0,0.3)] hover:shadow-[0_-2px_4px_rgba(0,0,0,0.3),_inset_0_-3px_4px_rgba(0,0,0,0.3)]">Masuk</button>
            </form>
        </div>
        <a class="mt-5 text-sm underline text-black hover:text-orange-500 transition-all duration-300 ease-in-out" href="daftar.php">Belum punya akun? daftar disini!</a>
    </div>
            <?php include '../src/copyright.html'; ?>
        

</body>