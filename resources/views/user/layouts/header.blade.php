<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body>
@if(session('message'))
    <div class="text-white text-center bg-green-500 py-2">
        {{ session('message') }}
    </div>
@endif
<header class="md:border-b" style="position: -webkit-sticky; position: sticky; top: 0;">
    <div class="top-nav-cta fixed l-0 r-0 w-full md:relative text-center py-2 px-4 flex items-center" style="height: 40px; background-color: rgb(114 63 95);">
        <a data-formkit-toggle="3527a72463" href="#" class="top-nav-cta-link text-white mt-1 text-xs md:text-sm leading-none uppercase font-sans tracking-extra-widest mx-auto inline-block">
            <svg class="inline-block w-3 h-3 mr-1" viewBox="0 0 520 600" role="img" xmlns="http://www.w3.org/2000/svg">
                <path d="M462.3 31.6C407.5 -15.1 326 -6.7 275.7 45.2L256 65.5L236.3 45.2C186.1 -6.7 104.5 -15.1 49.7 31.6C-13.1 85.2 -16.4 181.4 39.8 239.5L233.3 439.3C245.8 452.2 266.1 452.2 278.6 439.3L472.1 239.5C528.4 181.4 525.1 85.2 462.3 31.6V31.6Z" fill="#EBB454"></path>
            </svg>
            <span class="inline-block mr-1" style="color: #DDC5D8;">Làm đẹp cho bản thân và mọi người</span>
            <svg class="inline-block w-3 h-3 mr-1" viewBox="0 0 520 600" role="img" xmlns="http://www.w3.org/2000/svg">
                <path d="M462.3 31.6C407.5 -15.1 326 -6.7 275.7 45.2L256 65.5L236.3 45.2C186.1 -6.7 104.5 -15.1 49.7 31.6C-13.1 85.2 -16.4 181.4 39.8 239.5L233.3 439.3C245.8 452.2 266.1 452.2 278.6 439.3L472.1 239.5C528.4 181.4 525.1 85.2 462.3 31.6V31.6Z" fill="#EBB454"></path>
            </svg>
        </a>
    </div>
    <nav role="navigation" id="global-navigation" class="sm:flex sm:justify-between sm:items-center pb-2 pt-2 px-4 container mx-auto bg-white">
        <div class="flex justify-between items-center mb-4 border-b md:border-0">
            <a href="{{ route('home') }}">
                <img src="https://res.cloudinary.com/dsh5japr1/image/upload/v1676822947/Shoppe/nmavqmqxb3zzhcqrdh7z.png" class="mt-8 md:mt-0 w-8/12 md:w-auto">
            </a>
            <button id="burgerBtn" class="md:hidden pt-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <ul class="sm:flex sm:mt-2 shadow-md md:shadow-none md:inline-flex hidden text-sm md:text-base" id="menu">
            <li><a class="mx-4 sm:-mb-7 pb-7 block font-sans font-medium md:font-bold uppercase tracking-wider text-black no-underline md:border-b-3 md:border-transparent md:border-purple-500" href="{{ route('home') }}">Trang chủ</a></li>
            <li><a class="mx-4 sm:-mb-7 pb-7 block font-sans font-medium md:font-bold uppercase tracking-wider text-black no-underline md:border-b-3 md:border-transparent" href="#">Giới thiệu</a></li>
            <li><a class="mx-4 sm:-mb-7 pb-7 block font-sans font-medium md:font-bold uppercase tracking-wider text-black no-underline md:border-b-3 md:border-transparent" href="#">Sức khỏe</a></li>
            <li><a class="mx-4 sm:-mb-7 pb-7 block font-sans font-medium md:font-bold uppercase tracking-wider text-black no-underline md:border-b-3 md:border-transparent" href="#">Làm đẹp</a></li>
            <li id="search-button">
                <button class="search-button" onclick="showSearch()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </li>
        </ul>
    </nav>
</header>
