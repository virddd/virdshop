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
<body class="bg-[#fff5e8]">
    <?php include "../src/test.html"; ?>

    <nav class="sticky top-0 shadow-lg/20 z-10">
        <div class="relative h-13 w-full bg-[#f64301]">
            <div class="flex items-center h-full mx-4">
                <a href="pages/masuk.php"><h1 class="text-[#fff5e8] font-bold text-lg cursor-pointer hover:text-neutral-300 transition-all duration-300 underline underline-offset-3">MASUK</h1></a>
                <!-- <h1 class="text-[#fff5e8] font-bold text-lg">BASO & MIE AYAM MAKMUR</h1> -->
                <!-- <svg class="scale-65" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18 18.7023C18 15.6706 14.5 15 12 15C9.5 15 6 15.6706 6 18.7023M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM15 9C15 10.6569 13.6569 12 12 12C10.3431 12 9 10.6569 9 9C9 7.34315 10.3431 6 12 6C13.6569 6 15 7.34315 15 9Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>            </div> -->
            <div class="absolute right-0 top-0 m-3">
                <a href="pages/cart.php">
                    <svg class="saturate-0 brightness-110 hover:saturate-100 hover:brightness-95 transition-all duration-300 ease-in-out cursor-pointer" width="30px" height="30px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#f7f700">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                        <g id="SVGRepo_iconCarrier"> <path d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H13M19 15.5H17" stroke="#0" stroke-width="1.2" stroke-linecap="round"/> <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="#0" stroke-width="1.2"/> <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="#0" stroke-width="1.2"/> <path d="M5 6H8M5.5 13H16.0218C16.9812 13 17.4609 13 17.8366 12.7523C18.2123 12.5045 18.4013 12.0636 18.7792 11.1818L19.2078 10.1818C20.0173 8.29294 20.4221 7.34853 19.9775 6.67426C19.5328 6 18.5054 6 16.4504 6H12" stroke="#0" stroke-width="1.2" stroke-linecap="round"/> </g>
                    </svg>
                </a>
            </div>
        </div>
    </nav>
<!-- ------------------------------------------------------------nav-------------------------------------------------------- -->
<!-- ------------------------------------------------------------main-------------------------------------------------------- -->


    <div>
        <div class="flex group relative justify-center m-4">
            <img src="../assets/img/banner/banner.png" class="group-hover:brightness-50 transition-all duration-300 rounded-xl w-[98vw] h-auto"></img>
            <svg class="opacity-0 group-hover:opacity-100  top-1/2 left-1/2 z-40 scale-100 transition-all duration-300 ease-in-out saturate-0 brightness-900 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    

        </div>
        <div class="flex flex-wrap justify-evenly mb-4">
            <div class="z-30 group transition-all duration-300 ease-in-out hover:ring-2 hover:ring-orange-500 bg-[#f64301] w-20 h-20 rounded-full overflow-hidden m-2 relative">
                <img class="group-hover:brightness-50" src="../assets/img/banner/sale.svg" alt="">
                <svg class="opacity-0 group-hover:opacity-100 m-2 z-40 scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-900 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    
            </div>
            <div class="z-30 group transition-all duration-300 ease-in-out hover:ring-2 hover:ring-orange-500 bg-[#f64301] w-20 h-20 rounded-full overflow-hidden m-2 relative">
                <img class="group-hover:brightness-50" src="../assets/img/banner/vocer.svg" alt="">
                <svg class="opacity-0 group-hover:opacity-100 m-2 z-40 scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-900 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    
            </div>
            <div class="z-30 group transition-all duration-300 ease-in-out hover:ring-2 hover:ring-orange-500 bg-[#f64301] w-20 h-20 rounded-full overflow-hidden m-2 relative">
                <img class="group-hover:brightness-50" src="../assets/img/banner/best.svg" alt="">
                <svg class="opacity-0 group-hover:opacity-100 m-2 z-40 scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-900 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    
            </div>
            <div class="z-30 group transition-all duration-300 ease-in-out hover:ring-2 hover:ring-orange-500 bg-[#f64301] w-20 h-20 rounded-full overflow-hidden m-2 relative">
                <img class="group-hover:brightness-50" src="../assets/img/banner/service.svg" alt="">
                <svg class="opacity-0 group-hover:opacity-100 m-2 z-40 scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-900 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    
            </div>
        </div>
    </div>

        <div class="flex flex-wrap gap-2 justify-evenly m-2 ">
            <div>
                <div class="relative cursor-pointer bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20  min-w-[180px] max-w-[190px] h-[250px] rounded-xl">
                    <div class="h-[180px] w-full bg-white rounded-xl overflow-hidden">
                        <img src="../assets/img/product_image/baso-ori.png" alt="">
                    </div>
                    <div class="select-none">
                        <p class="mx-2 mt-3">Bakso Original</p>
                        <p class="absolute bottom-0 m-2">Rp 10.000</p>
                        <svg class="scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    
                    </div>
                </div>
                <!-- <div class="sticky bottom-0 h-auto">
                    <div class="h-full w-full bg-white rounded-xl overflow-hidden">
                        <img src="../assets/img/product_image/baso-ori.png" alt="">
                    </div>
                    <div>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum voluptate delectus consequuntur voluptates id tempora, doloremque eligendi tempore consectetur quis fugit, ullam, obcaecati cupiditate voluptas aperiam fugiat a architecto. Dignissimos, voluptatem culpa, alias consequuntur repellat modi assumenda expedita quidem quos ex necessitatibus? Molestiae sunt officiis corporis neque tempore pariatur quasi, blanditiis ut qui omnis ea eius fugiat minus aperiam iure iste sint beatae ducimus voluptatem aliquid id quo ex commodi! Tempore porro dignissimos quos pariatur praesentium quis rerum minus est laboriosam aliquid nam consequatur ad labore totam adipisci repudiandae expedita nesciunt eos nulla omnis magni, distinctio deleniti! Sequi, autem ex.
                    </div>
                </div> -->
            </div>
            <div class="relative cursor-pointer bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20  min-w-[180px] max-w-[190px] h-[250px] rounded-xl">
                <div class="h-[180px] w-full bg-white rounded-xl overflow-hidden">
                    <img src="../assets/img/product_image/baso-urat.png" alt="">
                </div>
                <div class="select-none">
                    <p class="mx-2 mt-3">Bakso Urat</p>
                    <p class="absolute bottom-0 m-2">Rp 12.000</p>
                    <svg class="scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    
                </div>
            </div>
            <div class="relative cursor-pointer bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20  min-w-[180px] max-w-[190px] h-[250px] rounded-xl">
                <div class="h-[180px] w-full bg-white rounded-xl overflow-hidden">
                    <img src="../assets/img/product_image/baso-mercon.png" alt="">
                </div>
                <div class="select-none">
                    <p class="mx-2 mt-3">Bakso Mercon</p>
                    <p class="absolute bottom-0 m-2">Rp 17.000</p>
                    <svg class="scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    
                </div>
            </div>
            <div class="relative cursor-pointer bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20  min-w-[180px] max-w-[190px] h-[250px] rounded-xl">
                <div class="h-[180px] w-full bg-white rounded-xl overflow-hidden">
                    <img src="../assets/img/product_image/baso-beranak.png" alt="">
                </div>
                <div class="select-none">
                    <p class="mx-2 mt-3">Bakso Beranak</p>
                    <p class="absolute bottom-0 m-2">Rp 15.000</p>
                    <svg class="scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    
                </div>
            </div>
            <div class="relative cursor-pointer bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20  min-w-[180px] max-w-[190px] h-[250px] rounded-xl">
                <div class="h-[180px] w-full bg-white rounded-xl overflow-hidden">
                    <img src="../assets/img/product_image/baso-iga.png" alt="">
                </div>
                <div class="select-none">
                    <p class="mx-2 mt-3">Bakso Iga Sapi</p>
                    <p class="absolute bottom-0 m-2">Rp 18.000</p>
                    <svg class="scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    
                </div>
            </div>
            <div class="relative cursor-pointer bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20  min-w-[180px] max-w-[190px] h-[250px] rounded-xl">
                <div class="h-[180px] w-full bg-white rounded-xl overflow-hidden">
                    <img src="../assets/img/product_image/mie-ayam.png" alt="">
                </div>
                <div class="select-none">
                    <p class="mx-2 mt-3">Mie Ayam</p>
                    <p class="absolute bottom-0 m-2">Rp 10.000</p>
                    <svg class="scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    
                </div>
            </div>
            <div class="relative cursor-pointer bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20  min-w-[180px] max-w-[190px] h-[250px] rounded-xl">
                <div class="h-[180px] w-full bg-white rounded-xl overflow-hidden">
                    <img src="../assets/img/product_image/mie-ayam-ceker.png" alt="">
                </div>
                <div class="select-none">
                    <p class="mx-2 mt-3">Mie Ayam Ceker</p>
                    <p class="absolute bottom-0 m-2">Rp 14.000</p>
                    <svg class="scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    

                </div>
            </div>
            <div class="relative cursor-pointer bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20  min-w-[180px] max-w-[190px] h-[250px] rounded-xl">
                <div class="h-[180px] w-full bg-white rounded-xl overflow-hidden">
                    <img src="../assets/img/product_image/mie-ayam-baso.png" alt="">
                </div>
                <div class="select-none">
                    <p class="mx-2 mt-3">Mie Ayam Baso</p>
                    <p class="absolute bottom-0 m-2">Rp 15.000</p>
                    <svg class="scale-40 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer absolute bottom-0 right-0" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#06b90f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                    

                </div>
            </div>
            
            
        </div>
        <?php include '../src/copyright.html'; ?>
</body>
</html>