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
    <title>V-Store</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/icon/favicon.ico" type="ico/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-[#fff5e8]">
        <?php include '../src/test.html' ?>

    <div class="sticky bg-orange-600 w-12 rounded-br-2xl -translate-x-2 transform p-2 top-0 mx-2">
        <a href="admin.php">
            <svg class="hover:brightness-80 brightness-100 hover:brightness-80 transition-all duration-300 ease-in-out cursor-pointer" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
                
        </a>
    </div>
    <div class="flex flex-col xl:mt-20 xl:flex-row xl:gap-x-30 items-center justify-center">
        <div class="bg-[#f64301] p-6 w-xs sm:w-sm md:w-md lg:w-md xl:w-md rounded-3xl flex flex-col items-center justify-center">
            <div class="flex justify-center items-center">
                <img class="w-full rounded-2xl" src="../assets/img/ui/banner.png" alt="" srcset=""/>
            </div>
            <div>
                <?php if(isset($_GET['ubah'])){ ?>
                    <h1 class="text-white text-center my-5 text-xl font-bold">Edit produk</h1>
                <?php } else { ?>
                    <h1 class="text-white text-center my-5 text-xl font-bold">Tambah produk</h1>
                <?php } ?>
            </div>
            <form class="flex gap-y-8 flex-col items-center justify-center m-2" action="../service/proses.php" method="POST" id="edit_produk" enctype="multipart/form-data">
                <input type="hidden" name="id_produk" value="<?php echo $id_produk ?>"/>
                <input required class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out" type="text" name="nama_produk" id="nama_produk" value="<?php echo $nama_produk; ?>" placeholder="Nama produk">
                <select class="appearance-none group cursor-pointer bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out" name="kategori_produk" id="kategori"required>
                    <!-- <option value="" disabled selected hidden>Pilih kategori...</option>     -->
                    <option class="group-cursor-pointer" value="mie" <?php if($kategori_produk == 'mie'){echo "selected";} ?>>Mie</option>
                    <option class="group-cursor-pointer" value="baso" <?php if($kategori_produk == 'baso'){echo "selected";} ?>>Baso</option>
                    <option class="group-cursor-pointer" value="minuman" <?php if($kategori_produk == 'minuman'){echo "selected";} ?>>Minuman</option>
                </select>
                <input required class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out" type="number" name="harga_produk" id="harga_produk" value="<?php echo $harga_produk; ?>" placeholder="Harga">
                <input <?php if(!isset($_GET['ubah'])){echo 'required';}?> value="tes" class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out cursor-pointer" type="file" accept="image/*" name="gambar_produk" id="gambar_produk" placeholder="gambar">
                <?php if(isset($_GET['ubah'])){ ?>
                    <button class="save-button bg-[#fff5e8] py-2 px-14 rounded-2xl cursor-pointer hover:bg-[#d6c3ab] focus:bg-[#d6c3ab] active:bg-[#d6c3ab] transition-all duration-300" type="submit" name="aksi" value="edit" id="buttonSimpan">Simpan</button>
                <?php } else { ?>
                    <button class="add-button bg-[#fff5e8] py-2 px-14 rounded-2xl cursor-pointer hover:bg-[#d6c3ab] focus:bg-[#d6c3ab] active:bg-[#d6c3ab] transition-all duration-300" type="submit" name="aksi" value="add" id="buttonTambah">Tambah</button>
                <?php } ?>
            </form>
        </div>


        <div class="mt-10 bg-[#f64301] p-6 w-xs sm:w-sm md:w-md lg:w-md xl:w-md rounded-3xl flex flex-col items-center justify-center">
            <div class="flex justify-center items-center">
                <img class="w-full rounded-2xl" src="../assets/img/ui/banner.png" alt="" srcset=""/>
            </div>
            <div>
                <h1 class="text-white text-center my-5 text-xl font-bold">Edit gambar</h1>
            </div>
            <form class="flex gap-y-8 flex-col items-center justify-center m-2" action="../service/proses.php" method="post" id="signup">
                <!-- <label for="nama" class="text-white">Nama</label> -->
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl cursor-pointer w-3xs sm:w-xs md:w-sm lg:w-sm xl:w-sm transition-all duration-300 ease-in-out" type="file" name="file" id="gambar_produk" placeholder="gambar">
                <button class="bg-[#fff5e8] py-2 px-14 rounded-2xl cursor-pointer hover:bg-[#d6c3ab] focus:bg-[#d6c3ab] active:bg-[#d6c3ab] transition-all duration-300" type="submit">Simpan</button>
            </form>
        </div>
    </div>
            <?php include '../src/copyright.html'; ?>
            <script src="../assets/js/main.js"></script>

</body>