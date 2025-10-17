<?php
    include "../service/database.php";
    session_start();    
    $no = 1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor</title>
    <link rel="stylesheet" href="src/style.css">
    <link rel="shortcut icon" href="../assets/img/icon/favicon.ico" type="ico/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#fff5e8]">
    <div class="bg-orange-600 sticky w-11 rounded-br-2xl -translate-x-2 transform py-2 pl-2 top-0 mx-2">
        <a href="admin.php">
            <svg class="rounded-md focus:bg-orange-700 hover:bg-orange-700 brightness-100  transition-all duration-300 ease-in-out cursor-pointer" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
        </a>
    </div>
    <div class="w-full justify-center items-center flex">
        <table class="rounded-lg xl:mt-16 lg:mt-14 md:mt-12 sm:mt-9 mt-6 shadow-md/50 overflow-hidden bg-orange-50 border-collapse border border-black table-auto w-[90vw] my-5">
            <thead class="border-black">
                <tr class="bg-[#f64301] uppercase text-white text-sm sm:text-sm md:text-md lg:text-md xl:text-lg">
                    <th class="border p-2 border-gray-600 table-fixed w-11">No</th>
                    <th class="border p-2 border-gray-600 table-fixed w-11">Id</th>
                    <th class="border p-2 border-gray-600 " >Nama user</th>
                    <th class="border p-2 border-gray-600 table-fixed w-20">Status</th>
                    <th class="border p-2 border-gray-600 table-fixed w-13">Profile</th>
                    <th class="border p-2 border-gray-600 table-fixed w-13">Hapus</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                if (isset($_SESSION['id_user'])){if ($_SESSION['id_user'] === '1'){ 
                $user = mysqli_query($db, 'SELECT * FROM data_user');
                mysqli_data_seek($user ,1);
                while ($data_user = mysqli_fetch_assoc($user)){
                    $id_user = $data_user['id_user'];
                    $nama_user = $data_user['nama_user'];
                    $nama_lengkap_user = $data_user['nama_lengkap_user'];
                    $alamat_user = $data_user['alamat_user'];
                    $tahun_lahir_user = $data_user['tahun_lahir_user'];
                    $status_user = $data_user['is_online'];
                    
            ?>
                <tr class="odd:bg-[#ffefd2] even:bg-[#ffe8bc] text-sm sm:text-sm md:text-md lg:text-md xl:text-lg">
                    <td class="py-2 px-4 border-black border-1 text-center font-semibold"><?php echo $no++;?></td>
                    <td class="py-2 px-4 border-black border-1 text-center"><?php echo $id_user ?></td>
                    <td class="py-2 px-4 border-black border-1 "><?php echo $nama_user ?></td>
                    <td class="py-2 px-4 border-black border-1 text-center"><?php if($status_user == 1){echo 'Online';}else{echo 'Offline';}?></td>
                    <td class="py-2 px-4 border-black border-1 text-center"><a href="profile.php?id-profile=<?php echo $id_user;?>" class="cursor-pointer bg-orange-600 transition-all duration-300 ease-in-out hover:bg-orange-500 px-4 py-2 rounded-md text-white font-semibold">CEK</a></td>
                    <td class="py-2 px-4 border-black border-1 ">
                        <button onclick="hapusAkun(<?php echo $id_user ?>)" class="">
                            <svg class="transform scale-50 sm:scale-60 md:scale-70 lg:scale-80 xl:scale-80 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer" width="50px" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier"><path d="M20.5001 6H3.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path><path d="M18.8332 8.5L18.3732 15.3991C18.1962 18.054 18.1077 19.3815 17.2427 20.1907C16.3777 21 15.0473 21 12.3865 21H11.6132C8.95235 21 7.62195 21 6.75694 20.1907C5.89194 19.3815 5.80344 18.054 5.62644 15.3991L5.1665 8.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path><path d="M9.5 11L10 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path><path d="M14.5 11L14 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path><path d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="#d80000" stroke-width="1.5"></path></g>
                            </svg>
                        </button>
                    </td>
                </tr>

                <?php }}} ?>

            </tbody>
        </table>
    </div>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/ajax.js"></script>
    <script>
        function hapusAkun(idUser) {

    swalWithTailwindButtons.fire({
        title: "Apakah kamu yakin?",
        text: "Kamu mau hapus produk ini dari daftar produk?",
        icon: "warning",
        background: "#fff5e8",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            var xhr = new XMLHttpRequest(); xhr.open("POST", "../service/proses.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log('akun berhasil dihapus dari database');
                    } else {
                        console.log('akun gagal dihapus dari database');
                    }
                };
            };
            xhr.send("id_user=" + idUser + "&action=hapus_akun");

            swalWithTailwindButtons.fire({
                background: "#fff5e8",
                title: "Terhapus!",
                text: "Akun ini berhasil dihapus",
                icon: "success"
            }).then(() =>
                location.reload()
            )
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithTailwindButtons.fire({
                background: "#fff5e8",
                title: "Dibatalkan",
                text: "Akun ini batal dihapus",
                icon: "error"
            });
            return false;
        };
    });
};
    </script>
</body>
</html>