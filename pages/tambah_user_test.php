<?php

/*error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../service/database.php'; // pakai require_once agar error terlihat jika file tidak ada

// pastikan koneksi sesuai (kamu bilang include berhasil, tapi ini pengecekan aman)
if (!isset($db) || !($db instanceof mysqli)) {
    die('Database connection error: $db not available or not mysqli instance.');
}
*/
if (isset($_POST['daftar'])) {
    // ambil input dengan fallback/trim
    $username      = trim($_POST['nama'] ?? '');
    $usernames     = trim($_POST['nama_lengkap'] ?? '');
    $home_address  = trim($_POST['alamat'] ?? '');
    $date_of_birth_raw = trim($_POST['ttl'] ?? ''); // input user, bisa '08/09/2000' atau '2000-09-08'
    $password      = $_POST['sandi'] ?? '';
    $passwords     = $_POST['sandi2'] ?? '';

    // VALIDATION singkat (tambahkan sesuai kebutuhan)
    $errors = [];
    if ($username === '') $errors[] = 'Nama (username) harus diisi.';
    if ($usernames === '') $errors[] = 'Nama lengkap harus diisi.';
    if ($password === '') $errors[] = 'Password harus diisi.';
    if ($password !== $passwords) $errors[] = 'verifikasi password harus sama.';

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
