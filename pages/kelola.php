<!DOCTYPE html>

<?php

    include '../service/database.php';

    $id_produk = "";
    $nama_produk = "";
    $kategori_produk = "";
    $harga_produk = "";

    if(isset($_GET['ubah'])){
        $id_produk = $_GET['ubah'];
        $query = "SELECT * FROM data_produk WHERE id_produk = '$id_produk';";
        $sql = mysqli_query($db, $query);


        $result = mysqli_fetch_assoc( $sql );
        //var_dump($result);

        $nama_produk = $result["nama_produk"];
        $kategori_produk = $result["kategori_produk"];
        $harga_produk = $result["harga_produk"];


        //die();
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/icon/favicon.ico" type="ico/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-[#fff5e8]">
        <?php include '../src/test.html' ?>


    
    <?php if(!isset($_GET['ganti'])){
    echo'<div class="grid grid-cols-2 bg-orange-600 w-21 rounded-br-2xl -translate-x-2 transform py-2 pl-2 top-0 mx-2">
            <a href="admin.php">
                <svg class="rounded-md focus:bg-orange-700 hover:bg-orange-700 brightness-100  transition-all duration-300 ease-in-out cursor-pointer" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
            </a>
            <a href="kelola.php?ganti=0">
                <svg class="rounded-t-md rounded-bl-xl rounded-br-md focus:bg-orange-700 hover:bg-orange-700 brightness-100  transition-all duration-300 ease-in-out cursor-pointer -scale-x-100" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
            </a>
        </div>
        <div class="flex xl:mt-20 xl:flex-row xl:gap-x-30 items-center justify-center">
            <div class="bg-[#f64301] p-6 w-xs sm:w-sm md:w-md lg:w-md xl:w-md rounded-3xl flex flex-col items-center justify-center">
                <div class="flex justify-center items-center">
                    <img class="w-full rounded-2xl" src="../assets/img/ui/banner.png" alt="" srcset=""/>
                </div>
                <div>
                    <h1 class="text-white text-center my-5 text-xl font-bold">'.
                        (isset($_GET['ubah']) ? "Edit produk" : "Tambah produk")
                    .'</h1>
                </div>
                <form class="flex gap-y-8 flex-col items-center justify-center m-2" action="../service/proses.php" method="POST" id="edit_produk" enctype="multipart/form-data">
                    <input type="hidden" name="id_produk" value="'.$id_produk.'"/>
                    <label for="nama_produk">
                        <p class="text-black font-semibold text-xs text-center px-2 w-12 py-[3px] rounded-t-lg bg-[#ece0d1]">Nama</p>
                        <input required class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#ecdece] px-4 py-2 rounded-bl-2xl rounded-r-2xl hover:bg-[#fffaf4] focus:bg-[#fffaf4] w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out" type="text" name="nama_produk" id="nama_produk" value="'.$nama_produk.'" placeholder="Nama produk">
                    </label>
                    <label for="kategori">
                    <p class="text-black font-semibold text-xs text-center px-2 w-15 py-[3px] rounded-t-lg bg-[#ece0d1]">Kategori</p>
                    <select class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#ecdece] px-4 py-2 rounded-bl-2xl rounded-r-2xl hover:bg-[#fffaf4] focus:bg-[#fffaf4] w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out" name="kategori_produk" id="kategori" required>
                        <option class="group-cursor-pointer" value="mie" '.($kategori_produk == "mie" ? "selected" : "").'>Mie</option>
                        <option class="group-cursor-pointer" value="baso" '.($kategori_produk == "baso" ? "selected" : "").'>Baso</option>
                        <option class="group-cursor-pointer" value="minuman" '.($kategori_produk == "minuman" ? "selected" : "").'>Minuman</option>
                    </select>
                    </label>
                    <label for="harga_produk">
                        <p class="text-black font-semibold text-xs text-center px-2 w-12 py-[3px] rounded-t-lg bg-[#ece0d1]">Harga</p>
                        <input required class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#ecdece] px-4 py-2 rounded-bl-2xl rounded-r-2xl hover:bg-[#fffaf4] focus:bg-[#fffaf4] w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out" type="number" name="harga_produk" id="harga_produk" value="'.$harga_produk.'" placeholder="Harga">
                    </label>
                    <label for="gambar_produk">
                        <p class="text-black font-semibold text-xs text-center px-2 w-14 py-[3px] rounded-t-lg bg-[#ece0d1]">Gambar</p>
                        <input '.(!isset($_GET['ubah']) ? "required" : "").' class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#ecdece] px-4 py-2 rounded-bl-2xl rounded-r-2xl hover:bg-[#fffaf4] focus:bg-[#fffaf4] w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out cursor-pointer" type="file" accept="image/*" name="gambar_produk" id="gambar_produk" placeholder="gambar">
                    </label>
                    '.(isset($_GET["ubah"]) 
                        ? '<button class="save-button bg-[#fff5e8] py-2 px-14 rounded-2xl cursor-pointer hover:bg-[#d6c3ab] focus:bg-[#d6c3ab] active:bg-[#d6c3ab] transition-all duration-300" type="submit" name="aksi" value="edit" id="buttonSimpan">Simpan</button>'
                        : '<button class="add-button bg-[#fff5e8] py-2 px-14 rounded-2xl cursor-pointer hover:bg-[#d6c3ab] focus:bg-[#d6c3ab] active:bg-[#d6c3ab] transition-all duration-300" type="submit" name="aksi" value="add" id="buttonTambah">Tambah</button>'
                    ).'
                </form>
            </div>
        </div>';
    }else if(isset($_GET['ganti'])){
                    $id_ui = $_GET['ganti'];
                        $sql_ui = mysqli_query($db, "SELECT * FROM data_ui WHERE id_ui = $id_ui");
                        $hasil_ui = mysqli_fetch_array($sql_ui);
                        $gambar_ui = $hasil_ui['gambar_ui'];
                        $nama_event = $hasil_ui['nama_event'];
                        echo 
        
        '<div class="grid grid-cols-2 bg-orange-600 w-21 rounded-br-2xl -translate-x-2 transform py-2 pl-2 top-0 mx-2">
            <a href="admin.php">
                <svg class="rounded-md focus:bg-orange-700 hover:bg-orange-700 brightness-100  transition-all duration-300 ease-in-out cursor-pointer" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
            </a>
            <a href="kelola.php">
                <svg class="rounded-t-md rounded-bl-xl rounded-br-md focus:bg-orange-700 hover:bg-orange-700 brightness-100  transition-all duration-300 ease-in-out cursor-pointer -scale-x-100" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
            </a>
        </div>
        <div class="flex mt-20 xl:flex-row xl:gap-x-30 items-center justify-center">
            <div class="-mt-10 bg-[#f64301] p-6 w-xs sm:w-sm md:w-md lg:w-md xl:w-md rounded-3xl flex flex-col items-center justify-center">
                <div>
                    <h1 class="text-white text-center my-5 text-xl font-bold">Edit Event</h1>
                </div>
                <div class="flex justify-center my-8 items-center">
                    <img class="'.($id_ui == "0" ? " hue-rotate-160 saturate-200 " : "").'ring-4 ring-white h-full rounded-2xl" src="../assets/img/ui/'.($id_ui !== "0" ? $gambar_ui : "icon.jpg").'" alt="" srcset=""/>
                </div>
                <form class="flex gap-y-8 flex-col items-center justify-center m-2" action="../service/proses.php" method="POST" id="edit_ui" enctype="multipart/form-data">
                    <!-- <label for="nama" class="text-white">Nama</label> -->
                    '. ($id_ui ? '<input type="hidden" name="id_ui" value="' . $id_ui . '"><input type="hidden" name="gambar_ui" value="' . $gambar_ui . '">' : '') .'
                    <label for="nama_event">
                        <p class="text-black font-semibold text-xs text-center px-2 w-21 py-[3px] rounded-t-lg bg-[#ece0d1]">Nama Event</p>
                        <input required class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#ecdece] px-4 py-2 rounded-bl-2xl rounded-r-2xl hover:bg-[#fffaf4] focus:bg-[#fffaf4] w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out" type="text" name="nama_event" id="nama_event" value="'.($nama_event !== null ? $nama_event : "").'" placeholder="Nama event">
                    </label>
                    <label for="gambar_ui">
                        <p class="text-black font-semibold text-xs text-center px-2 w-19 py-[3px] rounded-t-lg bg-[#ece0d1]">Gambar UI</p>
                        <input '. ($id_ui == null ? "required" : ""). 'class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#ecdece] px-4 py-2 rounded-bl-2xl rounded-r-2xl hover:bg-[#fffaf4] focus:bg-[#fffaf4] w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out" type="file" accept="image/*" name="gambar_ui" id="gambar_ui" placeholder="gambar">
                    </label>
                    '. ($id_ui !== '0' ? 
                    "<button class='bg-[#fff5e8] py-2 px-14 rounded-2xl cursor-pointer hover:bg-[#d6c3ab] focus:bg-[#d6c3ab] active:bg-[#d6c3ab] transition-all duration-300' type='submit' name='aksi' value='edit_ui' id='buttonSimpanUi'>Simpan</button>
                     <button class='ring-[#fff5e8] ring-3 bg-[#540000] py-2 px-14 rounded-2xl cursor-pointer hover:bg-[#b93636] focus:bg-[#b93636] active:bg-[#b93636] transition-all duration-300 text-white' type='submit' name='aksi' value='hapus_ui' id='buttonHapusUi'>Hapus</button>" : 
                    "<button class='bg-[#fff5e8] py-2 px-14 rounded-2xl cursor-pointer hover:bg-[#d6c3ab] focus:bg-[#d6c3ab] active:bg-[#d6c3ab] transition-all duration-300' type='submit' name='aksi' value='add_ui' id='buttonTambahUi'>Tambah</button>") . '
                    </form>
                </div>
            </div>';}
            ?>
            <?php include '../src/copyright.html'; ?>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/ajax.js"></script>
</body>