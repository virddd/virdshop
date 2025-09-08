<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../service/database.php'; // pakai require_once agar error terlihat jika file tidak ada

// pastikan koneksi sesuai (kamu bilang include berhasil, tapi ini pengecekan aman)
if (!isset($db) || !($db instanceof mysqli)) {
    die('Database connection error: $db not available or not mysqli instance.');
}

if (isset($_POST['daftar'])) {
    // ambil input dengan fallback/trim
    $username      = trim($_POST['nama'] ?? '');
    $usernames     = trim($_POST['nama_lengkap'] ?? '');
    $home_address  = trim($_POST['alamat'] ?? '');
    $date_of_birth_raw = trim($_POST['ttl'] ?? ''); // input user, bisa '08/09/2000' atau '2000-09-08'
    $password      = $_POST['sandi'] ?? '';

    // VALIDATION singkat (tambahkan sesuai kebutuhan)
    $errors = [];
    if ($username === '') $errors[] = 'Nama (username) harus diisi.';
    if ($usernames === '') $errors[] = 'Nama lengkap harus diisi.';
    if ($password === '') $errors[] = 'Password harus diisi.';

    if (!empty($errors)) {
        foreach ($errors as $e) echo '<p style="color:red;">' . htmlspecialchars($e) . '</p>';
        exit;
    }

    // === KONVERSI TANGGAL ===
    // 1) coba parse dd/mm/yyyy
    $dob_db   = null; // akan berisi 'YYYY-MM-DD' untuk DB atau null
    $dob_slash = null; // jika kamu mau tampilkan 'YYYY/MM/DD'
    if ($date_of_birth_raw !== '') {
        // coba format dd/mm/YYYY
        $d = DateTime::createFromFormat('d/m/Y', $date_of_birth_raw);
        if ($d !== false) {
            $dob_db   = $d->format('Y-m-d'); // format aman untuk MySQL DATE
            $dob_slash= $d->format('Y/m/d'); // kalau perlu tampilkan pakai slash
        } else {
            // coba format yyyy-mm-dd (HTML input type="date" default)
            $d2 = DateTime::createFromFormat('Y-m-d', $date_of_birth_raw);
            if ($d2 !== false) {
                $dob_db   = $d2->format('Y-m-d');
                $dob_slash= $d2->format('Y/m/d');
            } else {
                // format tidak valid — kita set null (atau bisa tandai error)
                $dob_db = null;
                // kamu bisa menambahkan error:
                // $errors[] = 'Format tanggal tidak valid. Gunakan dd/mm/YYYY atau yyyy-mm-dd.';
            }
        }
    } else {
        $dob_db = null;
    }

    // jika ingin batalkan saat format salah:
    if (!empty($errors)) {
        foreach ($errors as $e) echo '<p style="color:red;">' . htmlspecialchars($e) . '</p>';
        exit;
    }

    // === SIAPKAN DATA UNTUK INSERT ===
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Kita pakai NULLIF(?, '') supaya jika $dob_for_bind == '' maka DB menerima NULL
    $dob_for_bind = $dob_db ?? ''; // kalau null -> '' -> NULLIF -> NULL di DB

    $sql = "INSERT INTO data_user (username, usernames, home_address, date_of_birth, password)
            VALUES (?, ?, ?, NULLIF(?, ''), ?)";

    $stmt = $db->prepare($sql);
    if (!$stmt) {
        die('Prepare failed: ' . $db->error);
    }

    $stmt->bind_param('sssss', $username, $usernames, $home_address, $dob_for_bind, $password_hash);

    if ($stmt->execute()) {
        echo '<p style="color:green;">Data masuk.</p>';
        // contoh menampilkan tanggal yang disimpan:
        if ($dob_db !== null) {
            echo '<p>Tanggal lahir disimpan (DB format): ' . htmlspecialchars($dob_db) . '</p>';
            echo '<p>Tanggal lahir tampil (slash): ' . htmlspecialchars($dob_slash) . '</p>';
        } else {
            echo '<p>Tanggal lahir tidak diisi / tidak valid.</p>';
        }
    } else {
        echo '<p style="color:red;">Insert gagal: ' . htmlspecialchars($stmt->error) . '</p>';
    }

    $stmt->close();
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
    <div class="flex flex-col items-center h-screen justify-center">
        <div class="bg-[#f64301] p-6 w-xs sm:w-lg md:w-2xl lg:w-3xl xl:w-4xl rounded-3xl flex flex-col items-center justify-center">
            <div class="flex justify-center items-center">
                <img class="w-full rounded-2xl" src="../../assets/img/banner/banner.png" alt="" srcset=""/>
            </div>
            <div>
                <h1 class="text-white text-center my-5 text-xl font-bold">Ayo Gabung!</h1>
            </div>
            <form class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8 items-center justify-center m-2" action="daftar.php" method="post" id="daftar">
                <!-- <label for="nama" class="text-white">Nama</label> -->
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" type="text" name="nama" id="nama" placeholder="Nama akun">
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama lengkap">
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out placeholder-neutral-900" type="date" name="ttl" id="ttl" placeholder="Tahun kelahiran"/>
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" type="text" name="alamat" id="alamat" placeholder="Alamat">
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" type="password" name="sandi" id="sandi" placeholder="Sandi">
                <input class="bg-[#fff5e8] px-4 py-2 rounded-2xl w-3xs sm:w-sm md:w-2xs lg:w-xs xl:w-sm transition-all duration-300 ease-in-out" type="password" name="sandi2" id="sandi" placeholder="Verifikasi Sandi">
            </form>
            <button class="bg-[#fff5e8] py-2 mt-4 px-14 rounded-2xl cursor-pointer transition-all duration-300 ease-in-out hover:bg-[#d7cbbb] active:bg-[#d7cbbb] focus:bg-[#d7cbbb]" type="submit" name="daftar" form="daftar">Buat</button>
        </div>
        <a class="mt-5 text-sm underline hover:text-orange-500" href="masuk.php">Sudah punya akun? masuk disini!</a>
    </div>
            <?php include '../src/copyright.html'; ?>

</body>