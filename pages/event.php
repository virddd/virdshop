<?php 

if($_GET["event"] == "flash" || $_GET['event'] == "voucher") {

echo '


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>flash Sale & Voucher</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <!-- <link rel="shortcut icon" href="img/icon/favicon.ico" type="ico/x-icon"> -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-[#fff5e8] mt-[40vh] flex flex-col justify-center items-center">
        <div class="fixed top-0 left-0 shadow-md/50 bg-orange-600 w-12 rounded-br-2xl -translate-x-2 transform p-2 mx-2">
            <a href="../index.php">
                <svg class="hover:brightness-80 brightness-100 hover:brightness-80 transition-all duration-300 ease-in-out cursor-pointer" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
            </a>
        </div>

        <div>
            <div class="">
                <h1 class="font-semibold text-center xl:text-2xl lg:text-xl md:text-lg sm:text-md">
                    Nikmati flash sale dan klaim vouchernya
                </h1>
            </div>
        </div>

    </body>
    </html>
    ';
} else if($_GET["event"] == "best") {

echo '


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Best Seller</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <!-- <link rel="shortcut icon" href="img/icon/favicon.ico" type="ico/x-icon"> -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    
    <body class="bg-[#fff5e8] mt-[40vh] flex flex-col justify-center items-center">
        <div class="fixed top-0 left-0 shadow-md/50 bg-orange-600 w-12 rounded-br-2xl -translate-x-2 transform p-2 mx-2">
            <a href="../index.php">
                <svg class="hover:brightness-80 brightness-100 hover:brightness-80 transition-all duration-300 ease-in-out cursor-pointer" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
            </a>
        </div>

        <div>
            <div class="">
                <h1 class="font-semibold text-center xl:text-2xl lg:text-xl md:text-lg sm:text-md">
                    Ayo cobain produk best seller kami!!
                </h1>
            </div>
        </div>

    </body>
    </html>
    ';
} else if($_GET["event"] == "cs") {

echo '


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Customer Care</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <!-- <link rel="shortcut icon" href="img/icon/favicon.ico" type="ico/x-icon"> -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    
    <body class="bg-[#fff5e8] mt-[40vh] flex flex-col justify-center items-center">
        <div class="fixed top-0 left-0 shadow-md/50 bg-orange-600 w-12 rounded-br-2xl -translate-x-2 transform p-2 mx-2">
            <a href="../index.php">
                <svg class="hover:brightness-80 brightness-100 hover:brightness-80 transition-all duration-300 ease-in-out cursor-pointer" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
            </a>
        </div>

        <div>
            <div class="">
                <h1 class="font-semibold text-center xl:text-2xl lg:text-xl md:text-lg sm:text-md">
                    Konsultasikan kritik dan saran kamu
                </h1>
            </div>
        </div>

    </body>
    </html>
    ';
}
?>