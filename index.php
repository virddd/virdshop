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
    <title>V-Store</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <link rel="shortcut icon" href="img/icon/favicon.ico" type="ico/x-icon"> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#fff5e8]">
    <?php
        include "src/test.html"; 
        //echo "Session Status: ";
        //var_dump($_SESSION['id_user']); 
    ?>

    <nav class="sticky top-0 shadow-lg/20 z-50">
        <div class="relative h-13 w-full bg-[#f64301]">
            <div class="flex items-center h-full mx-4">
                <?php if(isset($_SESSION['id_user']) != null ) { 
                    echo '<button onclick="logout()" ><h1 class="text-[#fff5e8] font-bold text-lg cursor-pointer hover:text-neutral-300 transition-all duration-300 underline underline-offset-3">KELUAR</h1></button>';
                } else { 
                    echo '<a href="pages/masuk.php"><h1 class="text-[#fff5e8] font-bold text-lg cursor-pointer hover:text-neutral-300 transition-all duration-300 underline underline-offset-3">MASUK</h1></a>';
                } ?>
                    <!-- <h1 class="text-[#fff5e8] font-bold text-lg">BASO & MIE AYAM MAKMUR</h1> -->
                <!-- <svg class="scale-65" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18 18.7023C18 15.6706 14.5 15 12 15C9.5 15 6 15.6706 6 18.7023M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM15 9C15 10.6569 13.6569 12 12 12C10.3431 12 9 10.6569 9 9C9 7.34315 10.3431 6 12 6C13.6569 6 15 7.34315 15 9Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>            </div> -->
            <div class="absolute group right-0 top-0 m-3 cursor-pointer">
                <p class="absolute group-hover:text-[#ffeb15] transform translate-y-[2.4px] translate-x-[8.7px] font-semibold text-xs scale-75 text-white  transition-all duration-300 ease-in-out"><?php if(isset($_SESSION['id_user']) != null){if(isset($_SESSION['data_keranjang']) != null && ($_SESSION['data_keranjang']) != 0){echo $_SESSION['data_keranjang'];}} ?></p>
                <a href="pages/cart.php">
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
            <a href="pages/event.php?event=flash">    
                <div class="transition-all duration-300 ease-in-out hover:ring-2 hover:ring-orange-500  bg-[#f64301] w-20 h-20 rounded-full overflow-hidden m-2"><img src="assets/img/ui/sale.svg" alt=""></div>
            </a>  
            <a href="pages/event.php?event=voucher">
                <div class="transition-all duration-300 ease-in-out hover:ring-2 hover:ring-orange-500  bg-[#f64301] w-20 h-20 rounded-full overflow-hidden m-2"><img src="assets/img/ui/vocer.svg" alt=""></div>
            </a>  
            <a href="pages/event.php?event=best">
                <div class="transition-all duration-300 ease-in-out hover:ring-2 hover:ring-orange-500  bg-[#f64301] w-20 h-20 rounded-full overflow-hidden m-2"><img src="assets/img/ui/best.svg" alt=""></div>
            </a>  
            <a href="pages/event.php?event=cs">
                <div class="transition-all duration-300 ease-in-out hover:ring-2 hover:ring-orange-500  bg-[#f64301] w-20 h-20 rounded-full overflow-hidden m-2"><img src="assets/img/ui/service.svg" alt=""></div>
            </a>  
        </div>
    </div>

        <div class="flex flex-wrap gap-2 justify-evenly m-2 ">
        <?php
            while($result = mysqli_fetch_array($sql)){
        ?>
            <div class="relative cursor-pointer bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20 min-w-[180px] max-w-[190px] h-[250px] rounded-xl">
                <div class="h-[180px] w-full bg-white rounded-xl overflow-hidden">
                    <img src="assets/img/product_image/<?php echo($result['gambar_produk']) ?>" alt="">
                </div>
                <div class="select-none">
                    <p class="mx-2 mt-3"><?php echo($result['nama_produk']) ?></p>
                    <p class="absolute bottom-0 m-2">Rp <?php echo ($result['harga_produk']) ?></p>
                    <input type="hidden" name="harga" id="harga_<?php echo ($result['id_produk']) ?>" value="<?php echo ($result['harga_produk']) ?>">
                    <button <?php if(isset($_SESSION['id_user']) != null ){echo 'onclick="tambahKeKeranjang(' . $result['id_produk'] . ')"'; } else {echo 'onclick="harusLogin()"';} ?>  class=" cursor-pointer absolute bottom-0 right-0 my-4 mr-3">
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
</body>
</html>