
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/icon/favicon.ico" type="ico/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-[#fff5e8] h-[80vh]">

    <div class="sticky bg-orange-600 w-12 rounded-br-2xl -translate-x-2 transform p-2 top-0 mx-2">
        <a href="../index.php">
            <svg class="hover:brightness-80 brightness-100 hover:brightness-80 transition-all duration-300 ease-in-out cursor-pointer" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
                
        </a>
    </div>
    <div class="flex flex-col items-center h-screen justify-center">
        <div class="bg-[#f64301] p-6 w-xs sm:w-lg md:w-2xl lg:w-3xl xl:w-4xl rounded-3xl flex flex-col items-center justify-center">
            <div class="flex justify-center items-center">
                <img class="w-full rounded-2xl" src="../assets/img/banner/banner.png" alt="" srcset=""/>
            </div>
            <div>
                <h1 class="text-white text-center my-5 text-2xl font-bold">Ayo Gabung!</h1>
            </div>
            <form class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8 items-center justify-center m-2" action="../service/proses_user.php" method="POST" id="daftar">
                <!-- <label for="nama" class="text-white">Nama</label> -->
                <label for="nama_user">
                    <p class="text-black font-semibold text-xs text-center px-2 w-21 py-[3px] rounded-t-lg bg-[#ece0d1]">Nama Akun</p>
                    <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" required type="text" name="nama" id="nama_user" placeholder="Nama akun">
                </label>
                <label for="nama_lengkap_user">
                    <p class="text-black font-semibold text-xs text-center px-2 w-25 py-[3px] rounded-t-lg bg-[#ece0d1]">Nama Lengkap</p>
                    <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" required type="text" name="nama_lengkap" id="nama_lengkap_user" placeholder="Nama lengkap">
                </label>
                <label for="ttl_user">
                    <p class="text-black font-semibold text-xs text-center px-2 w-20 py-[3px] rounded-t-lg bg-[#ece0d1]">Tahun Lahir</p>
                    <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out placeholder-neutral-900" required type="date" name="ttl" id="ttl_user" placeholder="Tahun kelahiran"/>
                </label>
                <label for="alamat_user">
                    <p class="text-black font-semibold text-xs text-center px-2 w-14 py-[3px] rounded-t-lg bg-[#ece0d1]">Alamat</p>
                    <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" required type="text" name="alamat" id="alamat_user" placeholder="Alamat">
                </label>
                <label for="sandi">
                    <p class="text-black font-semibold text-xs text-center px-2 w-19 py-[3px] rounded-t-lg bg-[#ece0d1]">Kata Sandi</p>
                    <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" required type="password" name="sandi" id="sandi" placeholder="Sandi">
                </label>
                <label for="sandi2">
                    <p class="text-black font-semibold text-xs text-center px-2 w-25 py-[3px] rounded-t-lg bg-[#ece0d1]">Verifikasi Sandi</p>
                    <input class="shadow-[0_-2px_3px_rgba(0,0,0,0.3)] bg-[#fff5e8] px-4 py-2 rounded-bl-2xl rounded-r-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" required type="password" name="sandi2" id="sandi2" placeholder="Verifikasi Sandi">
                </label>
                <input type="hidden" name="registrasi" value="tambah" class="add-user text-orange-500"></input>
                <button type="submit" class="md:col-start-2 lg:col-start-2 xl:col-start-2 justify-self-end w-40 bg-[#fff5e8] py-2 px-14 mt-5 rounded-2xl cursor-pointer transition-all duration-300 ease-in-out mx-1 hover:bg-[#e6dacb] active:bg-[#d7cbbb] focus:bg-[#d7cbbb] font-semibold active:shadow-[0_-2px_4px_rgba(0,0,0,0.3),_inset_0_-3px_4px_rgba(0,0,0,0.3)] focus:shadow-[0_-2px_4px_rgba(0,0,0,0.3),_inset_0_-3px_4px_rgba(0,0,0,0.3)] hover:shadow-[0_-2px_4px_rgba(0,0,0,0.3),_inset_0_-3px_4px_rgba(0,0,0,0.3)]">Buat</button>
            </form>
        </div>
        <a class="mt-5 text-sm underline text-black hover:text-orange-500 transition-all duration-300 ease-in-out" href="masuk.php">Sudah punya akun? masuk disini!</a>
    </div>
            <?php include '../src/copyright.html'; ?>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/ajax.js"></script>
</body>