<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-Store</title>
    <link rel="stylesheet" href="src/style.css">
    <!-- <link rel="shortcut icon" href="/../assets/img/ikon/icon.jpg" type="jpg/x-icon"> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#fff5e8]">
    <nav class="sticky top-0 shadow-lg/20 z-10">
        <div class="relative h-13 w-full bg-[#f64301]">
            <div class="flex items-center h-full mx-4">
                <h1 class="text-[#fff5e8] font-bold text-lg">PEMBAYARAN</h1>
            </div>
            <div class="absolute right-0 top-0 m-3">
                <a href="../cart.php">
                    <svg class="brightness-100 hover:brightness-80 transition-all duration-300 ease-in-out cursor-pointer" width="30px" height="30px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
                </a>
            </div>
        </div>
    </nav>

    <?php include '../src/copyright.html'; ?>
</body>
</html>