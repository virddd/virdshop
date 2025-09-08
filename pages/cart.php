<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-Store</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <link rel="shortcut icon" href="/../assets/img/ikon/icon.jpg" type="jpg/x-icon"> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-[120vh] relative bg-[#fff5e8]">
    <nav class="sticky top-0 shadow-lg/20 z-10">
        <div class="relative h-13 w-full bg-[#f64301]">
            <div class="flex items-center h-full mx-4">
                <h1 class="text-[#fff5e8] font-bold text-lg">KERANJANG</h1>
            </div>
            <div class="absolute right-0 top-0 m-3">
                <a href="../index.php">
                    <svg class="brightness-100 hover:brightness-80 transition-all duration-300 ease-in-out cursor-pointer" width="30px" height="30px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/><path fill="#ffffff" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/></svg>
                </a>
            </div>
        </div>
    </nav>
    
<div class="text-2xl text-center text-white items-center absolute">
    <p class="absolute p-5 top-0 visible sm:invisible md:invisible lg:invisible xl:invisible bg-indigo-700">xs</p>
    <p class="absolute p-5 top-0 invisible sm:visible md:invisible lg:invisible xl:invisible sm:bg-sky-500">sm</p>
    <p class="absolute p-5 top-0 invisible sm:invisible md:visible lg:invisible xl:invisible md:bg-emerald-600">md</p>
    <p class="absolute p-5 top-0 invisible sm:invisible md:invisible lg:visible xl:invisible lg:bg-amber-400">lg</p>
    <p class="absolute p-5 top-0 invisible sm:invisible md:invisible lg:invisible xl:visible xl:bg-red-600">xl</p>
</div>

    <div>
        <div class="flex flex-wrap gap-2 justify-evenly m-2 ">
            <div class="flex-cols-1">
                <div class="flex my-2 flex-wrap-reverse justify-between cursor-default bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20 overflow-hidden w-[90vw] h-[180px] rounded-xl">
                    <div class="h-[180px] w-[180px] bg-white rounded-xl overflow-hidden">
                        <img src="../../assets/img/product_image/baso-ori.png" alt="">
                    </div>
                    <div class="flex-grow items-center justify-evenly select-none flex flex-wrap sm:divide-x-1 lg:divide-x-1 md:divide-x-1 w-48">
                        <div class="flex flex-col justify-center items-center my-2 sm:pr-[4%] md:pr-[7%] lg:pr-[10%] xl:pr-[12%] ">
                            <div class="flex justify-center text-center items-center">
                                <p class="whitespace-nowrap font-bold text-md sm:text-lg md:text-lg lg:text-xl xl:text-xl">Bakso Original</p>
                            </div>
                            <div class="text-lg flex-col flex justify-center text-center items-center">
                                <label class="w-38 text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg" for="pedas">Level pedas :</label>
                                <select name="pedas" id="pedas" class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg mt-1 ring-1 hover:ring-2 px-2 ring-[#000] bg-[#eee5da] transition-all duration-300 ease-in-out rounded-lg hover:ring-orange-600 cursor-pointer">
                                    <option value="lv0">level 0</option>
                                    <option value="lv1">Level 1</option>
                                    <option value="lv2">Level 2</option>
                                    <option value="lv3">Level 3</option>
                                    <option value="lv4">Level 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="pr-[7%] sm:pr-[8%] md:pr-[10%] lg:pr-[11%] xl:pr-[13%]">
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg my-2">Rp 10.000</p>
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg my-2">Rp 10.000</p>
                        </div>
                        <svg class="scale-70 sm:scale-80 md:scale-90 lg:scale-100 xl:scale-100 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer p-1" width="50px" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.5001 6H3.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M18.8332 8.5L18.3732 15.3991C18.1962 18.054 18.1077 19.3815 17.2427 20.1907C16.3777 21 15.0473 21 12.3865 21H11.6132C8.95235 21 7.62195 21 6.75694 20.1907C5.89194 19.3815 5.80344 18.054 5.62644 15.3991L5.1665 8.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M9.5 11L10 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M14.5 11L14 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="#d80000" stroke-width="1.5"></path> </g>
                        </svg>
                    </div>
                </div>
                <div class="flex my-2 flex-wrap-reverse justify-between cursor-default bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20 overflow-hidden w-[90vw] h-[180px] rounded-xl">
                    <div class="h-[180px] w-[180px] bg-white rounded-xl overflow-hidden">
                        <img src="../../assets/img/product_image/baso-ori.png" alt="">
                    </div>
                    <div class="flex-grow items-center justify-evenly select-none flex flex-wrap sm:divide-x-1 lg:divide-x-1 md:divide-x-1 w-48">
                        <div class="flex flex-col justify-center items-center my-2 sm:pr-[4%] md:pr-[7%] lg:pr-[10%] xl:pr-[12%] ">
                            <div class="flex justify-center text-center items-center">
                                <p class="whitespace-nowrap font-bold text-md sm:text-lg md:text-lg lg:text-xl xl:text-xl">Bakso Original</p>
                            </div>
                            <div class="text-lg flex-col flex justify-center text-center items-center">
                                <label class="w-38 text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg" for="pedas">Level pedas :</label>
                                <select name="pedas" id="pedas" class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg mt-1 ring-1 hover:ring-2 px-2 ring-[#000] bg-[#eee5da] transition-all duration-300 ease-in-out rounded-lg hover:ring-orange-600 cursor-pointer">
                                    <option value="lv0">level 0</option>
                                    <option value="lv1">Level 1</option>
                                    <option value="lv2">Level 2</option>
                                    <option value="lv3">Level 3</option>
                                    <option value="lv4">Level 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="pr-[7%] sm:pr-[8%] md:pr-[10%] lg:pr-[11%] xl:pr-[13%]">
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg my-2">Rp 10.000</p>
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg my-2">Rp 10.000</p>
                        </div>
                        <svg class="scale-70 sm:scale-80 md:scale-90 lg:scale-100 xl:scale-100 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer p-1" width="50px" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.5001 6H3.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M18.8332 8.5L18.3732 15.3991C18.1962 18.054 18.1077 19.3815 17.2427 20.1907C16.3777 21 15.0473 21 12.3865 21H11.6132C8.95235 21 7.62195 21 6.75694 20.1907C5.89194 19.3815 5.80344 18.054 5.62644 15.3991L5.1665 8.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M9.5 11L10 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M14.5 11L14 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="#d80000" stroke-width="1.5"></path> </g>
                        </svg>
                    </div>
                </div>
                <div class="flex my-2 flex-wrap-reverse justify-between cursor-default bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20 overflow-hidden w-[90vw] h-[180px] rounded-xl">
                    <div class="h-[180px] w-[180px] bg-white rounded-xl overflow-hidden">
                        <img src="../../assets/img/product_image/baso-ori.png" alt="">
                    </div>
                    <div class="flex-grow items-center justify-evenly select-none flex flex-wrap sm:divide-x-1 lg:divide-x-1 md:divide-x-1 w-48">
                        <div class="flex flex-col justify-center items-center my-2 sm:pr-[4%] md:pr-[7%] lg:pr-[10%] xl:pr-[12%] ">
                            <div class="flex justify-center text-center items-center">
                                <p class="whitespace-nowrap font-bold text-md sm:text-lg md:text-lg lg:text-xl xl:text-xl">Bakso Original</p>
                            </div>
                            <div class="text-lg flex-col flex justify-center text-center items-center">
                                <label class="w-38 text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg" for="pedas">Level pedas :</label>
                                <select name="pedas" id="pedas" class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg mt-1 ring-1 hover:ring-2 px-2 ring-[#000] bg-[#eee5da] transition-all duration-300 ease-in-out rounded-lg hover:ring-orange-600 cursor-pointer">
                                    <option value="lv0">level 0</option>
                                    <option value="lv1">Level 1</option>
                                    <option value="lv2">Level 2</option>
                                    <option value="lv3">Level 3</option>
                                    <option value="lv4">Level 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="pr-[7%] sm:pr-[8%] md:pr-[10%] lg:pr-[11%] xl:pr-[13%]">
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg my-2">Rp 10.000</p>
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg my-2">Rp 10.000</p>
                        </div>
                        <svg class="scale-70 sm:scale-80 md:scale-90 lg:scale-100 xl:scale-100 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer p-1" width="50px" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.5001 6H3.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M18.8332 8.5L18.3732 15.3991C18.1962 18.054 18.1077 19.3815 17.2427 20.1907C16.3777 21 15.0473 21 12.3865 21H11.6132C8.95235 21 7.62195 21 6.75694 20.1907C5.89194 19.3815 5.80344 18.054 5.62644 15.3991L5.1665 8.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M9.5 11L10 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M14.5 11L14 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="#d80000" stroke-width="1.5"></path> </g>
                        </svg>
                    </div>
                </div>
                <div class="flex my-2 flex-wrap-reverse justify-between cursor-default bg-[#fff5e8] hover:ring-orange-600 hover:ring-[1.5px] transition-all duration-300 ease-in-out group shadow-lg/20 overflow-hidden w-[90vw] h-[180px] rounded-xl">
                    <div class="h-[180px] w-[180px] bg-white rounded-xl overflow-hidden">
                        <img src="../../assets/img/product_image/baso-ori.png" alt="">
                    </div>
                    <div class="flex-grow items-center justify-evenly select-none flex flex-wrap sm:divide-x-1 lg:divide-x-1 md:divide-x-1 w-48">
                        <div class="flex flex-col justify-center items-center my-2 sm:pr-[4%] md:pr-[7%] lg:pr-[10%] xl:pr-[12%] ">
                            <div class="flex justify-center text-center items-center">
                                <p class="whitespace-nowrap font-bold text-md sm:text-lg md:text-lg lg:text-xl xl:text-xl">Bakso Original</p>
                            </div>
                            <div class="text-lg flex-col flex justify-center text-center items-center">
                                <label class="w-38 text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg" for="pedas">Level pedas :</label>
                                <select name="pedas" id="pedas" class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg mt-1 ring-1 hover:ring-2 px-2 ring-[#000] bg-[#eee5da] transition-all duration-300 ease-in-out rounded-lg hover:ring-orange-600 cursor-pointer">
                                    <option value="lv0">level 0</option>
                                    <option value="lv1">Level 1</option>
                                    <option value="lv2">Level 2</option>
                                    <option value="lv3">Level 3</option>
                                    <option value="lv4">Level 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="pr-[7%] sm:pr-[8%] md:pr-[10%] lg:pr-[11%] xl:pr-[13%]">
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg my-2">Rp 10.000</p>
                            <p class="text-xs sm:text-sm md:text-md lg:text-lg xl:text-lg my-2">Rp 10.000</p>
                        </div>
                        <svg class="scale-70 sm:scale-80 md:scale-90 lg:scale-100 xl:scale-100 transition-all duration-300 ease-in-out saturate-0 brightness-0 focus:brightness-90 hover:saturate-100 hover:brightness-100 cursor-pointer p-1" width="50px" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.5001 6H3.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M18.8332 8.5L18.3732 15.3991C18.1962 18.054 18.1077 19.3815 17.2427 20.1907C16.3777 21 15.0473 21 12.3865 21H11.6132C8.95235 21 7.62195 21 6.75694 20.1907C5.89194 19.3815 5.80344 18.054 5.62644 15.3991L5.1665 8.5" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M9.5 11L10 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M14.5 11L14 16" stroke="#d80000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="#d80000" stroke-width="1.5"></path> </g>
                        </svg>
                    </div>
                </div>
                
               
                
                
            </div>
        </div>
    </div>

    <?php include '../src/copyright.html'; ?>

    <footer class="w-full bottom-0 sticky shadow-lg/20 z-10">
        <div class="relative h-13 w-full bg-[#6b0101]">
            <div class="flex items-center h-full mx-4">
                <h1 class="text-[#fff5e8] font-bold text-lg">Pembayaran</h1>
            </div>
            <div class="absolute right-0 top-0 ">
                <a class=" m-1 mr-9" href="payment.php">
                    <!-- <svg class="scale- transform hover:saturate-0 hover:brightness-110 transition-all duration-300 ease-in-out cursor-pointer" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 477.22"><path fill="#444B51" fill-rule="nonzero" d="M480.139 428.134l-48.31 48.31-49.421-48.048-48.46 46.515-50.713-46.826-47.724 49.135-49.099-49.104-50.178 47.765-47.721-48.199-32.245 37.137V108.133c-.27.016-.542.023-.817.023h-41.04C6.453 108.156 0 101.703 0 93.746l.054-1.235-.012-3.821C-.06 67.378-.189 40.315 12.87 21.267c4.316-6.297 9.963-11.568 17.31-15.334 8.938-4.578 18.898-5.8 28.604-5.8h288.565c21.136 0 26.277-.025 30.663-.049 62.252-.337 94.045-.511 113.413 17.36 10.685 9.856 15.959 23.608 18.394 43.818 2.122 17.58 2.181 40.301 2.181 70.71v332.827l-31.861-36.665z"/><path fill="#EFE9E5" d="M480.849 407.047l16.741 19.264V131.972c0-59.933-.216-89.472-15.904-103.947-17.718-16.347-55.171-13.481-134.337-13.481H70.678v411.767l17.148-19.746 48.704 49.19 50.154-47.743 48.705 48.707 47.307-48.707 51.07 47.154 48.707-46.749 49.188 47.82 49.188-49.19z"/><path fill="#444B51" fill-rule="nonzero" d="M169.714 330.377v-17.289c-4.181-.581-8.009-1.352-11.469-2.304l-.081-.023c-21.624-5.989-32.341-23.087-33.915-44.734a1.72 1.72 0 011.414-1.81l18.76-3.626a1.716 1.716 0 012.005 1.362l.015.103c2.021 14.019 7.543 28.84 23.271 31.76v-55.671a90.811 90.811 0 01-10.632-3.673l-.078-.033c-15.043-6.243-26.289-13.532-30.299-30.318-.84-3.502-1.261-7.185-1.261-11.049 0-26.625 17.233-41.274 42.27-44.194v-7.434c0-.947.77-1.717 1.717-1.717h11.101c.947 0 1.717.77 1.717 1.717v7.428c22.643 2.646 37.316 16.133 40.54 39.093a1.713 1.713 0 01-1.463 1.929l-19.183 2.98a1.711 1.711 0 01-1.951-1.426c-1.299-8.666-4.342-16.498-12.286-20.82-1.699-.926-3.587-1.673-5.657-2.246v50.588c4.197 1.086 7.677 2.049 10.437 2.879 17.342 5.203 29.846 15.539 33.194 34.216.514 2.845.774 5.802.774 8.844 0 19.116-9.758 36.312-27.613 44.078-5.079 2.21-10.679 3.54-16.792 3.997v17.393c0 .947-.77 1.717-1.717 1.717h-11.101c-.947 0-1.717-.77-1.717-1.717zm260.644-271.34c6.702 0 12.133 5.431 12.133 12.133 0 6.702-5.431 12.133-12.133 12.133-6.699 0-12.133-5.431-12.133-12.133 0-6.702 5.434-12.133 12.133-12.133zm-73.111 0c6.699 0 12.133 5.431 12.133 12.133 0 6.702-5.434 12.133-12.133 12.133-6.702 0-12.134-5.431-12.134-12.133 0-6.702 5.432-12.133 12.134-12.133zm-73.114 0c6.702 0 12.133 5.431 12.133 12.133 0 6.702-5.431 12.133-12.133 12.133-6.7 0-12.133-5.431-12.133-12.133 0-6.702 5.433-12.133 12.133-12.133zm-73.109 0c6.7 0 12.133 5.431 12.133 12.133 0 6.702-5.433 12.133-12.133 12.133-6.702 0-12.133-5.431-12.133-12.133 0-6.702 5.431-12.133 12.133-12.133zm-73.117 0c6.703 0 12.134 5.431 12.134 12.133 0 6.702-5.431 12.133-12.134 12.133-6.699 0-12.133-5.431-12.133-12.133 0-6.702 5.434-12.133 12.133-12.133zm304.772 140.389a7.722 7.722 0 010 15.443H271.815a7.721 7.721 0 010-15.443h170.864zm-49.416 115.06a7.722 7.722 0 010 15.442H271.815a7.721 7.721 0 010-15.442h121.448zm49.416-172.593a7.721 7.721 0 010 15.442H271.815a7.721 7.721 0 010-15.442h170.864zm-.457 115.062a7.721 7.721 0 010 15.442H271.815a7.721 7.721 0 010-15.442h170.407zm-272.508-88.91c-2.677.558-5.109 1.393-7.283 2.506-5.107 2.609-9.288 7.189-11.306 12.571-.973 2.591-1.46 5.411-1.46 8.456 0 9.262 3.74 15.995 11.645 20.259 2.389 1.287 5.19 2.409 8.404 3.359v-47.151zm14.535 125.751c2.695-.506 5.187-1.359 7.47-2.561 16.802-8.839 20.926-36.41 2.612-45.558-2.778-1.385-6.14-2.638-10.082-3.758v51.877z"/><path fill="#EFE9E5" d="M55.451 14.573v79.173h-41.04c0-19.919-1.183-47.573 10.336-64.374 6.054-8.829 15.616-14.662 30.704-14.799z"/><path fill="#D7D2CE" d="M55.451 14.822V93.73h-5.826V15.213l5.826-.391zm442.032 88.02c-.404-36.011-2.352-57.454-11.666-70.178v380.042l11.666 13.447V102.842z"/></svg> -->
                    Checkout
                </a>
            </div>
        </div>
    </footer>
    <script src="main.js"></script>
</body>
</html>