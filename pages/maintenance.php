<?php
include "../service/database.php";
session_start();    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setelan</title>
    <link rel="stylesheet" href="src/style.css">
    <link rel="shortcut icon" href="../assets/img/icon/favicon.ico" type="ico/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.onload = function () {
        console.log('berhasil')
        swalWithTailwindButtons.fire({
        allowOutsideClick: false,
        allowEscapeKey: false,
        title: "Info!!",
        text: "Server sedang maintenance, kembali lagi nanti!",
        icon: "question",
        background: "#fff5e8",
        confirmButtonText: "Baiklah",
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?php if(($_SESSION['id_user'])== 1){ echo '../pages/laporan.php';} else {echo '../index.php';} ?>'
        }})
        };
    </script>
</head>
<body class="bg-[#fff5e8] ">

    <div ></div>

    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/ajax.js"></script>

</body>
</html>