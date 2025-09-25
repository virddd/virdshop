<?php
    include '../service/database.php';
    session_start();
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = mysqli_query($db, "SELECT * FROM data_user WHERE id_user = '$id'");
        $data_user = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/icon/favicon.ico" type="ico/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#fff5e8]">
        <div class="sticky bg-orange-600 w-12 rounded-br-2xl -translate-x-2 transform p-2 top-0 mx-2">
        <a href="<?php if(($_SESSION['id_user']) == 1){ echo'../pages/monitor.php';} else {echo '../index.php';} ?>">
            <svg class="hover:brightness-80 brightness-100 hover:brightness-80 transition-all duration-300 ease-in-out cursor-pointer" width="28px" height="28px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
        </a>
    </div>
    <div class="w-screen flex justify-center items-center">
        <div class="w-auto h-120 justify-center items-center mt-[10vh] bg-orange-600 flex flex-col rounded-xl">

            <svg class="" width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="9" r="3" stroke="#ffffff" stroke-width="1.6320000000000001"></circle> <path d="M17.9691 20C17.81 17.1085 16.9247 15 11.9999 15C7.07521 15 6.18991 17.1085 6.03076 20" stroke="#ffffff" stroke-width="1.6320000000000001" stroke-linecap="round"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#ffffff" stroke-width="1.6320000000000001" stroke-linecap="round"></path> </g></svg>
            <table class="my-13 capitalize mx-7 text-orange-950 rounded-lg overflow-hidden">
                <tbody class="rounded-xl">
                    <tr class="odd:bg-[#ffefd2] even:bg-[#ffe8bc] rounded-xl">
                        <td class="px-4 py-1">User ID:</td>
                        <td class="px-4 py-1"><?php echo $data_user['id_user'] ?></td>
                    </tr>
                    <tr class="odd:bg-[#ffefd2] even:bg-[#ffe8bc]">
                        <td class="px-4 py-1">User Name:</td>
                        <td class="px-4 py-1"><?php echo $data_user['nama_user'] ?></td>
                        
                    </tr>
                    <tr class="odd:bg-[#ffefd2] even:bg-[#ffe8bc]">
                        <td class="px-4 py-1">Name:</td>
                        <td class="px-4 py-1"><?php echo $data_user['nama_lengkap_user'] ?></td>
                        
                    </tr>
                    <tr class="odd:bg-[#ffefd2] even:bg-[#ffe8bc]">
                        <td class="px-4 py-1">User Address:</td>
                        <td class="px-4 py-1"><?php echo $data_user['alamat_user'] ?></td>
                        
                    </tr>
                    <tr class="odd:bg-[#ffefd2] even:bg-[#ffe8bc]">
                        <td class="px-4 py-1">User Birth date:</td>
                        <td class="px-4 py-1"><?php echo $data_user['tahun_lahir_user'];}?></td>

                    </tr>
                </tbody>
            </table>
            <button <?php if(($_SESSION['id_user']) == 1){echo 'hidden';}?> onclick="logoutUser(<?php echo $data_user['id_user'] ?>)" class="bg-orange-500 shadow-md/50 hover:shadow-md/20 hover:bg-orange-400 font-semibold transition-all duration-300 text-white px-4 py-1 rounded-lg">Keluar</button>
        </div>
    </div>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/ajax.js"></script>
</body>