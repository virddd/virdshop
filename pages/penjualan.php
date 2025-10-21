<?php

    include '../service/database.php';

    $query = "SELECT * FROM data_produk";
    $sql = mysqli_query($db, $query);
    
    session_start();

    if(!isset($_SESSION['id_user']) || ($_SESSION['role_user']) != "admin" ) {
        header('location: ../index.php');
        
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Penjualan</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="shortcut icon" href="../assets/img/icon/favicon.ico" type="ico/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </head>

    <body class="bg-[#fff5e8]">

        <?php include "../src/test.html";?>

<!------------------------------------------------ container ------------------------------------------------>
        <div class="main flex-row flex">

<!------------------------------------------------- sidebar ------------------------------------------------->
            <?php include '../src/sideBar.php';?>
<!------------------------------------------------- sidebar ------------------------------------------------->

<!------------------------------------------------- content ------------------------------------------------->
            <main class="bg-[#fff5e8] w-full flex flex-col items-center z-50">
                <div class="w-full flex justify-start items-start">
                    <h1 class="my-4 mx-13 text-2xl font-bold text-orange-600">Penjualan</h1>
                </div>
                <span class="w-[95%] h-[3px] bg-orange-600"></span>
                <div class=" w-[95%] h-auto bg-[#fff3dcd3] mt-5 shadow-lg/50 flex flex-col justify-center shadow-[#807258d3] rounded-lg">
                    <div class="flex w-[97%] h-8 m-4 rounded-xl justify-evenly gap-0">
                        <div class="border-orange-600 gap-1 flex group justify-center border-y-1 border-l-1 w-full h-full text-center items-center py-1 rounded-l-md  text-sm font-semibold hover:text-white hover:bg-orange-600 text-orange-600 transition-all duration-300 ease-in-out">
                            <svg class="group-hover:brightness-1000 group-hover:saturate-0 w-5 h-5 transition-all duration-300 ease-in-out" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13 3H8.2C7.0799 3 6.51984 3 6.09202 3.21799C5.71569 3.40973 5.40973 3.71569 5.21799 4.09202C5 4.51984 5 5.0799 5 6.2V17.8C5 18.9201 5 19.4802 5.21799 19.908C5.40973 20.2843 5.71569 20.5903 6.09202 20.782C6.51984 21 7.0799 21 8.2 21H10M13 3L19 9M13 3V7.4C13 7.96005 13 8.24008 13.109 8.45399C13.2049 8.64215 13.3578 8.79513 13.546 8.89101C13.7599 9 14.0399 9 14.6 9H19M19 9V10M9 17H11.5M9 13H14M9 9H10M14 21L16.025 20.595C16.2015 20.5597 16.2898 20.542 16.3721 20.5097C16.4452 20.4811 16.5147 20.4439 16.579 20.399C16.6516 20.3484 16.7152 20.2848 16.8426 20.1574L21 16C21.5523 15.4477 21.5523 14.5523 21 14C20.4477 13.4477 19.5523 13.4477 19 14L14.8426 18.1574C14.7152 18.2848 14.6516 18.3484 14.601 18.421C14.5561 18.4853 14.5189 18.5548 14.4903 18.6279C14.458 18.7102 14.4403 18.7985 14.405 18.975L14 21Z" stroke="#f64301" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <h1 class="">Transaksi</h1>
                        </div>
                        <div class="border-orange-600 gap-1 flex group justify-center border-1 w-full h-full text-center items-center py-1 rounded-r-md  text-sm font-semibold hover:text-white hover:bg-orange-600 text-orange-600 transition-all duration-300 ease-in-out">
                            <svg class="group-hover:brightness-1000 group-hover:saturate-0 w-5 h-5 transition-all duration-300 ease-in-out" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13 3H8.2C7.0799 3 6.51984 3 6.09202 3.21799C5.71569 3.40973 5.40973 3.71569 5.21799 4.09202C5 4.51984 5 5.0799 5 6.2V17.8C5 18.9201 5 19.4802 5.21799 19.908C5.40973 20.2843 5.71569 20.5903 6.09202 20.782C6.51984 21 7.0799 21 8.2 21H10M13 3L19 9M13 3V7.4C13 7.96005 13 8.24008 13.109 8.45399C13.2049 8.64215 13.3578 8.79513 13.546 8.89101C13.7599 9 14.0399 9 14.6 9H19M19 9V10M9 17H11.5M9 13H14M9 9H10M14 21L16.025 20.595C16.2015 20.5597 16.2898 20.542 16.3721 20.5097C16.4452 20.4811 16.5147 20.4439 16.579 20.399C16.6516 20.3484 16.7152 20.2848 16.8426 20.1574L21 16C21.5523 15.4477 21.5523 14.5523 21 14C20.4477 13.4477 19.5523 13.4477 19 14L14.8426 18.1574C14.7152 18.2848 14.6516 18.3484 14.601 18.421C14.5561 18.4853 14.5189 18.5548 14.4903 18.6279C14.458 18.7102 14.4403 18.7985 14.405 18.975L14 21Z" stroke="#f64301" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <h1 class="">Pembayaran</h1>
                        </div>
                    </div>
                    <div class="flex w-[97%] mx-4 mb-4 rounded-xl justify-evenly gap-5">
                        <div class="bg-[#fff5e8] rounded-md w-full h-30 shadow-lg/50 flex flex-col items-start py-3 px-6 justify-evenly shadow-[#807258d3]">
                            <h1 class="font-semibold text-orange-600">Penjualan Belum Terbayar</h1>
                            <table>
                                <tbody>
                                    <tr class="text-sm">
                                        <td class="pr-6">Nominal</td>
                                        <td>: Rp. 0</td>
                                    </tr>
                                    <tr class="text-sm">
                                        <td class="pr-6">Transaksi</td>
                                        <td>: Rp. 0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bg-[#fff5e8] rounded-md w-full h-30 shadow-lg/50 flex flex-col items-start py-3 px-6 justify-evenly shadow-[#807258d3]">
                            <h1 class="font-semibold text-green-500">Penjualan Jatuh Tempo</h1>
                            <table>
                                <tbody>
                                    <tr class="text-sm">
                                        <td class="pr-6">Nominal</td>
                                        <td>: Rp. 0</td>
                                    </tr>
                                    <tr class="text-sm">
                                        <td class="pr-6">Transaksi</td>
                                        <td>: Rp. 0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bg-[#fff5e8] rounded-md w-full h-30 shadow-lg/50 flex flex-col items-start py-3 px-6 justify-evenly shadow-[#807258d3]">
                            <h1 class="font-semibold text-yellow-500">Penjualan Pending</h1>
                            <table>
                                <tbody>
                                    <tr class="text-sm">
                                        <td class="pr-6">Nominal</td>
                                        <td>: Rp. 0</td>
                                    </tr>
                                    <tr class="text-sm">
                                        <td class="pr-6">Transaksi</td>
                                        <td>: Rp. 0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
<!------------------------------------------------- content ------------------------------------------------->

        </div>
<!------------------------------------------------ container ------------------------------------------------>
<script src="../assets/js/main.js"></script>
</body>
</html>