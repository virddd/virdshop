<?php

    include 'service/database.php';
    session_start();


    $query = "SELECT * FROM data_produk";
    $query2 = "SELECT * FROM data_ui";
    $sql = mysqli_query($db, $query);

        if (isset($_SESSION['id_user']) != null){
            $cek_id = $_SESSION['id_user'];
            $cek_keranjang = mysqli_query($db, "SELECT COUNT(*) AS total FROM data_keranjang WHERE id_user = $cek_id");
            $data_count = mysqli_fetch_array($cek_keranjang);
            $_SESSION["data_keranjang"] = $data_count["total"];
            }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakmie Makmur</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <link rel="shortcut icon" href="img/icon/favicon.ico" type="ico/x-icon"> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-[#fff5e8]">
    <input type="hidden" value="<?php if(isset($_SESSION['nama_user'])){ echo $_SESSION['nama_user'];}?>" id="namaUser"></input>
    <?php
        include "src/test.html"; 
        //echo "Session Status: ";
        //var_dump($_SESSION['id_user']); 
    ?>

    <nav class="sticky top-0 shadow-lg/20 z-50">
        <div class="relative h-13 w-full bg-[#f64301]">
            <div class="flex items-center h-full mx-4">
                <?php if(isset($_SESSION['id_user']) != null ) {
                    $id_user = $_SESSION['id_user']; 
                    echo '<div class="mx-auto p-4 -left-4 absolute -top-4">
                            <details class="bg-[#f64301] hover:open text-white group shadow-lg/50 rounded-br-xl p-1 shadow-sm transition-all duration-300 ease-in-out">
                                <summary class="open:w-md transition-all duration-300 ease-in-out flex items-center gap-2 cursor-pointer select-none rounded-lg p-2 outline-none focus-visible:ring-2 focus-visible:ring-yellow-500 hover:backdrop-brightness-150" aria-label="Buka menu">
                                    <svg class="w-7 h-7 transition-transform duration-250 ease-in-out group-open:rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M3 6h18M3 12h18M3 18h18" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    <p class="-ml-1 group-open:block hidden">Menu</p>
                                </summary>
                                <nav class="transition-all duration-300 ease-in-out my-1 px-0.5">
                                    <ul class="transition-all duration-300 ease-in-out open:backdrop-brightness-75 space-y-1">
                                        <li><div class="cursor-pointer ml-[1px] flex transition-all duration-300 ease-in-out gap-2 rounded-lg px-2 py-2 hover:backdrop-brightness-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-yellow-500"><svg width="22px" height="22px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="9" r="3" stroke="#ffffff" stroke-width="1.6320000000000001"></circle> <path d="M17.9691 20C17.81 17.1085 16.9247 15 11.9999 15C7.07521 15 6.18991 17.1085 6.03076 20" stroke="#ffffff" stroke-width="1.6320000000000001" stroke-linecap="round"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#ffffff" stroke-width="1.6320000000000001" stroke-linecap="round"></path> </g></svg><a href="pages/profile.php?id=' . $_SESSION['id_user'] . '" class="capitalize">' . $_SESSION['nama_user'] . '</a></div></li>
                                        <li><div id="card-stln" class="cursor-pointer flex transition-all duration-300 ease-in-out gap-2 rounded-lg px-2 py-2 hover:backdrop-brightness-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-yellow-500"><svg fill="#ffffff" width="22px" height="22px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.288"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>gear</title> <path d="M29 12.256h-1.88c-0.198-0.585-0.405-1.072-0.643-1.541l0.031 0.067 1.338-1.324c0.35-0.3 0.57-0.742 0.57-1.236 0-0.406-0.149-0.778-0.396-1.063l0.002 0.002-3.178-3.178c-0.283-0.246-0.654-0.395-1.061-0.395-0.494 0-0.937 0.221-1.234 0.57l-0.002 0.002-1.332 1.33c-0.402-0.206-0.888-0.413-1.39-0.586l-0.082-0.025 0.009-1.88c0.003-0.040 0.005-0.086 0.005-0.133 0-0.854-0.66-1.554-1.498-1.617l-0.005-0h-4.496c-0.844 0.063-1.505 0.763-1.505 1.617 0 0.047 0.002 0.093 0.006 0.139l-0-0.006v1.879c-0.585 0.198-1.071 0.404-1.54 0.641l0.067-0.031-1.324-1.336c-0.299-0.352-0.742-0.573-1.236-0.573-0.407 0-0.778 0.15-1.063 0.397l0.002-0.002-3.179 3.179c-0.246 0.283-0.396 0.655-0.396 1.061 0 0.494 0.221 0.937 0.57 1.234l0.002 0.002 1.329 1.329c-0.207 0.403-0.414 0.891-0.587 1.395l-0.024 0.082-1.88-0.009c-0.040-0.003-0.086-0.005-0.133-0.005-0.854 0-1.554 0.661-1.617 1.499l-0 0.005v4.495c0.062 0.844 0.763 1.505 1.617 1.505 0.047 0 0.093-0.002 0.139-0.006l-0.006 0h1.88c0.198 0.585 0.404 1.072 0.642 1.541l-0.030-0.066-1.335 1.32c-0.351 0.3-0.572 0.744-0.572 1.239 0 0.407 0.149 0.779 0.396 1.064l-0.002-0.002 3.179 3.178c0.249 0.246 0.591 0.399 0.97 0.399 0.007 0 0.014-0 0.021-0h-0.001c0.515-0.013 0.977-0.231 1.308-0.576l0.001-0.001 1.33-1.33c0.403 0.207 0.891 0.414 1.395 0.587l0.082 0.025-0.009 1.878c-0.003 0.040-0.005 0.086-0.005 0.132 0 0.854 0.661 1.555 1.499 1.617l0.005 0h4.496c0.843-0.064 1.503-0.763 1.503-1.617 0-0.047-0.002-0.093-0.006-0.139l0 0.006v-1.881c0.585-0.198 1.073-0.405 1.543-0.643l-0.067 0.031 1.321 1.333c0.332 0.344 0.793 0.562 1.304 0.574l0.002 0h0.002c0.006 0 0.013 0 0.019 0 0.378 0 0.72-0.151 0.971-0.395l3.177-3.177c0.244-0.249 0.395-0.591 0.395-0.968 0-0.009-0-0.017-0-0.026l0 0.001c-0.012-0.513-0.229-0.973-0.572-1.304l-0.001-0.001-1.331-1.332c0.206-0.401 0.412-0.887 0.586-1.389l0.025-0.083 1.879 0.009c0.040 0.003 0.086 0.005 0.132 0.005 0.855 0 1.555-0.661 1.617-1.5l0-0.005v-4.495c-0.063-0.844-0.763-1.504-1.618-1.504-0.047 0-0.093 0.002-0.138 0.006l0.006-0zM29.004 18.25l-2.416-0.012c-0.020 0-0.037 0.010-0.056 0.011-0.198 0.024-0.372 0.115-0.501 0.249l-0 0c-0.055 0.072-0.103 0.153-0.141 0.24l-0.003 0.008c-0.005 0.014-0.016 0.024-0.020 0.039-0.24 0.844-0.553 1.579-0.944 2.264l0.026-0.049c-0.054 0.1-0.086 0.218-0.086 0.344 0 0.001 0 0.003 0 0.004v-0c-0 0.016 0.003 0.028 0.004 0.045 0.006 0.187 0.080 0.355 0.199 0.481l-0-0 0.009 0.023 1.707 1.709c0.109 0.109 0.137 0.215 0.176 0.176l-3.102 3.133c-0.099-0.013-0.186-0.061-0.248-0.13l-0-0-1.697-1.713c-0.008-0.009-0.022-0.005-0.030-0.013-0.121-0.112-0.28-0.183-0.456-0.193l-0.002-0c-0.020-0.003-0.044-0.005-0.068-0.006l-0.001-0c-0.125 0-0.243 0.032-0.345 0.088l0.004-0.002c-0.636 0.362-1.373 0.676-2.146 0.903l-0.074 0.019c-0.015 0.004-0.025 0.015-0.039 0.020-0.096 0.042-0.179 0.092-0.255 0.149l0.003-0.002c-0.035 0.034-0.066 0.071-0.093 0.11l-0.002 0.002c-0.027 0.033-0.053 0.070-0.075 0.11l-0.002 0.004c-0.033 0.081-0.059 0.175-0.073 0.274l-0.001 0.007c-0.001 0.016-0.010 0.031-0.010 0.047v2.412c0 0.15-0.055 0.248 0 0.25l-4.41 0.023c-0.052-0.067-0.084-0.153-0.084-0.246 0-0.008 0-0.016 0.001-0.024l-0 0.001 0.012-2.412c0-0.017-0.008-0.032-0.010-0.048-0.005-0.053-0.015-0.102-0.030-0.149l0.001 0.005c-0.012-0.053-0.028-0.1-0.048-0.145l0.002 0.005c-0.052-0.086-0.109-0.16-0.173-0.227l0 0c-0.029-0.024-0.062-0.046-0.096-0.066l-0.004-0.002c-0.044-0.030-0.093-0.056-0.146-0.076l-0.005-0.002c-0.014-0.005-0.024-0.016-0.039-0.020-0.847-0.241-1.585-0.554-2.272-0.944l0.051 0.026c-0.099-0.054-0.216-0.086-0.341-0.086h-0c-0.022-0.001-0.040 0.004-0.062 0.005-0.18 0.008-0.342 0.080-0.465 0.193l0.001-0c-0.008 0.008-0.021 0.004-0.029 0.012l-1.705 1.705c-0.107 0.107-0.216 0.139-0.178 0.178l-3.134-3.101c0.012-0.1 0.060-0.187 0.13-0.25l0-0 1.714-1.695 0.011-0.026c0.115-0.123 0.189-0.286 0.197-0.466l0-0.002c0.001-0.021 0.005-0.037 0.005-0.058 0-0.001 0-0.002 0-0.003 0-0.126-0.032-0.245-0.088-0.348l0.002 0.004c-0.365-0.636-0.679-1.371-0.903-2.145l-0.018-0.072c-0.004-0.015-0.016-0.026-0.021-0.041-0.042-0.094-0.090-0.176-0.146-0.25l0.002 0.003c-0.065-0.061-0.136-0.117-0.212-0.165l-0.006-0.003c-0.051-0.025-0.109-0.045-0.171-0.057l-0.005-0.001c-0.029-0.009-0.065-0.016-0.102-0.021l-0.004-0c-0.020-0.002-0.037-0.012-0.058-0.012h-2.412c-0.152 0.002-0.248-0.055-0.25-0.002l-0.022-4.409c0.067-0.052 0.151-0.084 0.244-0.084 0.009 0 0.017 0 0.026 0.001l-0.001-0 2.416 0.012c0.152-0.004 0.292-0.054 0.407-0.136l-0.002 0.002c0.024-0.014 0.044-0.028 0.064-0.043l-0.002 0.001c0.109-0.088 0.191-0.206 0.235-0.341l0.001-0.005c0.003-0.010 0.014-0.014 0.017-0.025 0.242-0.847 0.555-1.583 0.946-2.27l-0.026 0.050c0.054-0.1 0.086-0.218 0.086-0.344 0-0.001 0-0.001 0-0.002v0c0.001-0.019-0.003-0.033-0.004-0.052-0.007-0.184-0.080-0.35-0.197-0.475l0 0-0.010-0.024-1.705-1.705c-0.108-0.11-0.142-0.221-0.176-0.178l3.102-3.134c0.101 0.008 0.189 0.058 0.248 0.131l0.001 0.001 1.697 1.713c0.018 0.018 0.046 0.011 0.065 0.027 0.125 0.121 0.295 0.196 0.483 0.196 0.13 0 0.251-0.036 0.355-0.098l-0.003 0.002c0.636-0.364 1.372-0.677 2.145-0.902l0.072-0.018c0.014-0.004 0.024-0.015 0.038-0.019 0.057-0.021 0.105-0.047 0.151-0.077l-0.003 0.002c0.163-0.090 0.281-0.244 0.321-0.427l0.001-0.004c0.014-0.043 0.025-0.093 0.030-0.145l0-0.003c0.001-0.016 0.009-0.030 0.009-0.046v-2.412c0-0.151 0.056-0.249 0.001-0.25l4.41-0.023c0.052 0.067 0.083 0.152 0.083 0.245 0 0.009-0 0.017-0.001 0.026l0-0.001-0.012 2.412c-0 0.016 0.008 0.030 0.009 0.047 0.005 0.055 0.015 0.106 0.031 0.155l-0.001-0.005c0.071 0.234 0.243 0.419 0.464 0.506l0.005 0.002c0.014 0.005 0.025 0.016 0.039 0.020 0.845 0.242 1.58 0.555 2.265 0.945l-0.050-0.026c0.105 0.060 0.231 0.096 0.366 0.096 0 0 0.001 0 0.001 0h-0c0.183-0.008 0.347-0.082 0.471-0.198l-0 0c0.017-0.015 0.043-0.008 0.059-0.024l1.709-1.705c0.105-0.106 0.213-0.137 0.176-0.176l3.133 3.102c-0.012 0.1-0.059 0.186-0.129 0.249l-0 0-1.715 1.697-0.011 0.026c-0.116 0.123-0.19 0.287-0.198 0.468l-0 0.002c-0.001 0.020-0.005 0.036-0.005 0.056 0 0.001 0 0.002 0 0.003 0 0.126 0.032 0.245 0.088 0.348l-0.002-0.004c0.365 0.636 0.679 1.371 0.902 2.144l0.018 0.071c0.003 0.012 0.016 0.017 0.019 0.028 0.046 0.137 0.127 0.253 0.232 0.339l0.001 0.001c0.019 0.015 0.041 0.030 0.063 0.043l0.003 0.002c0.112 0.080 0.252 0.13 0.402 0.134l0.001 0h2.412c0.152-0.001 0.248 0.057 0.25 0.001l0.021 4.409c-0.065 0.053-0.149 0.085-0.24 0.085-0.010 0-0.019-0-0.029-0.001l0.001 0zM16 11.25c-2.623 0-4.75 2.127-4.75 4.75s2.127 4.75 4.75 4.75c2.623 0 4.75-2.127 4.75-4.75v0c-0.003-2.622-2.128-4.747-4.75-4.75h-0zM16 19.25c-1.795 0-3.25-1.455-3.25-3.25s1.455-3.25 3.25-3.25c1.795 0 3.25 1.455 3.25 3.25v0c-0.002 1.794-1.456 3.248-3.25 3.25h-0z"></path> </g></svg><a id="stln" href="pages/setelan.php" >Setelan</a></div></li>
                                        <li><div id="card-out" class="-ml-0.5 gap-2 transition-all duration-300 ease-in-out rounded-lg px-2 py-2 hover:backdrop-brightness-150 focus:outline-none focus-visible:ring-2 focus-visible:ring-yellow-500 cursor-pointer flex"><svg class="-scale-100 size-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14 7.63636L14 4.5C14 4.22386 13.7761 4 13.5 4L4.5 4C4.22386 4 4 4.22386 4 4.5L4 19.5C4 19.7761 4.22386 20 4.5 20L13.5 20C13.7761 20 14 19.7761 14 19.5L14 16.3636" stroke="#ffffff" stroke-width="1.296" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10 12L21 12M21 12L18.0004 8.5M21 12L18 15.5" stroke="#ffffff" stroke-width="1.296" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg><button id="out" onclick="logoutUser()"><h1 class="cursor-pointer">Keluar</h1></button></div></li>
                                    </ul>
                                </nav>
                            </details>
                        </div>
          ';
        } else { 
            echo '<a href="pages/masuk.php"><h1 class="text-[#fff5e8] font-bold text-lg cursor-pointer hover:text-neutral-300 transition-all duration-300 underline underline-offset-3">MASUK</h1></a>';
        } ?>
                    <!-- <h1 class="text-[#fff5e8] font-bold text-lg">BASO & MIE AYAM MAKMUR</h1> -->
                </div>
                    <!-- <svg class="scale-65" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18 18.7023C18 15.6706 14.5 15 12 15C9.5 15 6 15.6706 6 18.7023M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM15 9C15 10.6569 13.6569 12 12 12C10.3431 12 9 10.6569 9 9C9 7.34315 10.3431 6 12 6C13.6569 6 15 7.34315 15 9Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>            </div> -->
            <div class="absolute group right-0 top-0 m-3 cursor-pointer">
                <p class="absolute group-hover:text-[#ffeb15] transform translate-y-[2.4px] translate-x-[8.7px] font-semibold text-xs scale-75 text-white  transition-all duration-300 ease-in-out"><?php if(isset($_SESSION['id_user']) != null){if(isset($_SESSION['data_keranjang']) != null && ($_SESSION['data_keranjang']) != 0){echo $_SESSION['data_keranjang'];}} ?></p>
                <a <?php if(isset($_SESSION['id_user'])){ echo 'href="pages/cart.php"';} else { echo 'onclick="harusLogin()"';}?>>
                    <div class="bg-yellow-400 h-2 w-2 rounded-full absolute -top-0.5 -left-0.5 z-50 animate-ping <?php if(isset($_SESSION['data_keranjang']) == null){ echo 'hidden';} ?>"></div>
                    <svg class="scale-115 saturate-0 brightness-110 group-hover:saturate-100 group-hover:brightness-95 transition-all duration-300 ease-in-out" width="30px" height="30px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#f7f700">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                        <g id="SVGRepo_iconCarrier"> <path d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H13M19 15.5H17" stroke="#0" stroke-width="1.2" stroke-linecap="round"/> <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="#0" stroke-width="1.2"/> <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="#0" stroke-width="1.2"/> <path d="M5 6H8M5.5 13H16.0218C16.9812 13 17.4609 13 17.8366 12.7523C18.2123 12.5045 18.4013 12.0636 18.7792 11.1818L19.2078 10.1818C20.0173 8.29294 20.4221 7.34853 19.9775 6.67426C19.5328 6 18.5054 6 16.4504 6H12" stroke="#0" stroke-width="1.2" stroke-linecap="round"/> </g>
                    </svg>
                </a>
            </div>
        </div>
    </nav>
<!-- ------------------------------------------------------------nav-------------------------------------------------------- -->
<!-- ------------------------------------------------------------main-------------------------------------------------------- -->


    <div>
        <div class="flex justify-center m-4">
            <img src="assets/img/ui/banner.png" class="rounded-xl w-[98vw] h-auto"></img>
        </div>
        <div class="flex flex-wrap justify-evenly mb-4">


    <?php if (isset($_SESSION['id_user'])){ 
        $ui = mysqli_query($db,'SELECT * FROM data_ui');
        mysqli_data_seek($ui,2);
        while($data_ui = mysqli_fetch_array($ui)){?>

            <a href="pages/event.php?event=<?php echo $data_ui['nama_event'] ?>">    
                <div class="xl:scale-140 xl:my-4 lg:scale-130 lg:my-3 md:scale-120 md:my-2 sm:scale-110 sm:my-1 transition-all duration-300 ease-in-out hover:ring-2 hover:ring-orange-500  bg-[#f64301] w-17 h-17 rounded-full overflow-hidden m-2">
                    <img <?php echo 'src="assets/img/ui/' . $data_ui['gambar_ui'] . '"' ?> alt="assets/img/ui/icon.jpg" />
                </div>
            </a>

    <?php }} ?>

            
        </div>
    </div>

        <div class="flex flex-wrap gap-2 justify-evenly m-2">
        <?php
            while($result = mysqli_fetch_array($sql)){
        ?>
            <div class="xl:scale-120 xl:mx-5 xl:my-9 lg:scale-110 lg:mx-2 lg:my-7 relative cursor-pointer bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20 w-[160px] h-[230px] rounded-xl">
                <div class="h-[160px] w-full bg-white rounded-xl overflow-hidden">
                    <img src="assets/img/product_image/<?php echo($result['gambar_produk']) ?>" alt="">
                </div>
                <div class="select-none">
                    <p class="mx-2 mt-2 font-semibold"><?php echo($result['nama_produk']) ?></p>
                    <p class="absolute bottom-0 m-2"><?php echo "Rp " . number_format(($result['harga_produk']), 0, ',', '.');?></p>
                    <input type="hidden" name="harga" id="harga_<?php echo ($result['id_produk']) ?>" value="<?php echo ($result['harga_produk']) ?>">
                    <button <?php if(isset($_SESSION['id_user']) != null ){echo 'onclick="tambahKeKeranjang(' . $result['id_produk'] . ')"'; } else {echo 'onclick="harusLogin()"';} ?>  class=" cursor-pointer absolute bottom-0 right-0 my-2 mr-3">
                        <svg class="transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100" width="30px" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="#06b90f" stroke-width="1.5"/>
                            <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="#06b90f" stroke-width="1.5"/>
                            <path d="M13 13V11M13 11V9M13 11H15M13 11H11" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M2 3L2.26121 3.09184C3.5628 3.54945 4.2136 3.77826 4.58584 4.32298C4.95808 4.86771 4.95808 5.59126 4.95808 7.03836V9.76C4.95808 12.7016 5.02132 13.6723 5.88772 14.5862C6.75412 15.5 8.14857 15.5 10.9375 15.5H12M16.2404 15.5C17.8014 15.5 18.5819 15.5 19.1336 15.0504C19.6853 14.6008 19.8429 13.8364 20.158 12.3075L20.6578 9.88275C21.0049 8.14369 21.1784 7.27417 20.7345 6.69708C20.2906 6.12 18.7738 6.12 17.0888 6.12H11.0235M4.95808 6.12H7" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        <?php
            }
        ?>

        </div>
        <?php include 'src/copyright.html'; ?>

        <script src="assets/js/main.js"></script>
        <script src="assets/js/ajax.js"></script>
        <script>
            function tambahKeKeranjang(idProduk) {
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
    xhr.open("POST", "service/proses_user.php", true);
    // JANGAN set Content-Type header untuk FormData, biarkan browser yang set otomatis

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            console.log('Response:', xhr.responseText);

            if (xhr.status === 200) {
                if (xhr.responseText.trim() === 'success') {
                    alert('Produk berhasil ditambahkan ke keranjang');
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
        
</body>
</html>