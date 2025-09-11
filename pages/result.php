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

<body class="bg-[#fff5e8] mt-[40vh] flex flex-col justify-center items-center">
    <div>
        <div class="">
            <h1 class="font-semibold text-center xl:text-2xl lg:text-xl md:text-lg sm:text-md">
                <?php include '../service/proses.php'; ?>
            </h1>
        </div>
        <div class="flex justify-center items-center">
            <a class="mt-4 text-center rounded-2xl w-auto cursor-pointer hover:bg-[#d83a01] focus:bg-[#d83a01] active:bg-[#d83a01] transition-all duration-300 py-2 px-6 text-white bg-[#f64301]" href="../pages/admin.php">Kembali</a>
        </div>
    </div>


    
</body>
</html>
