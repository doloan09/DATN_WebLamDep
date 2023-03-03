<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body>
<div class="mb-24 md:mb-36">
    {{--    trai tym goc duoi ben phai--}}
    <div class="z-20 border-2 p-1 shadow-lg shadow-purple rounded-full bg-white items-center cursor-pointer" onclick="showSearch()" style="bottom: 40px; position: fixed; right: 20px;">
        <svg class="inline-block w-10 h-10 pt-1 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
        </svg>
    </div>
    {{----}}
    <header class="md:border-b z-0 w-full" style="position: fixed; top: 0;">
        @if(session('message'))
            <div class="text-white text-xs text-center border-b bg-fuchsia-700 py-2">
                {{ session('message') }}
            </div>
        @endif

        <div class="top-nav-cta fixed l-0 r-0 w-full md:relative text-center py-2 px-4 flex items-center bg-purple" style="height: 40px;">
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
                    <img src="https://res.cloudinary.com/dsh5japr1/image/upload/v1677146905/Shoppe/e2oe5ehhebemauqyycet.png" class="mt-10 md:mt-0 w-7/12 md:w-auto">
                </a>
                <button id="burgerBtn" class="md:hidden pt-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <ul class="sm:flex sm:mt-2 shadow-md md:shadow-none md:inline-flex hidden text-sm md:text-base" id="menu">
                <li><a class="lg:mx-4 sm:-mb-7 pb-7 block font-sans font-medium md:font-bold uppercase tracking-wider text-black no-underline md:border-b-3 md:border-transparent md:border-purple-500" href="{{ route('home') }}">Trang chủ</a></li>
                <li><a class="lg:mx-4 sm:-mb-7 pb-7 block font-sans font-medium md:font-bold uppercase tracking-wider text-black no-underline md:border-b-3 md:border-transparent" href="{{ route('about') }}">Giới thiệu</a></li>
                @foreach($categories as $i)
                    <li>
                        <a class="lg:mx-4 sm:-mb-7 pb-7 block font-sans font-medium md:font-bold uppercase tracking-wider text-black no-underline md:border-b-3 md:border-transparent" href="{{ route('categories.show', $i->slug) }}">{{ $i->name }}</a>
                    </li>
                @endforeach
                <li id="search-button" class="ml-4">
                    <button class="search-button" onclick="showSearch()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </li>

                <div id="dropdown-wrapper-user" class="hidden md:block inline-block text-sm md:text-lg ml-8 z-50">
                    <div class="relative">
                        <div onclick="toggle_menu_user()" class="cursor-pointer">
                            <img src="{{ $user->avatar ?? "https://1.bp.blogspot.com/-HhU9edRL9Q8/YU1CjMlHZvI/AAAAAAAANt4/RKMHAtXYD_MqJOr3UbkiGN7ZkCz8Oy95gCLcBGAsYHQ/w800-h800-p-k-no-nu/Mailovesbeauty_LifeStyle%2BBlog.JPG" }}" class="w-8 h-8 rounded-full">
                        </div>
                    </div>
                    <div id="menuUser" class="hidden flex flex-col bg-white drop-shadow-md absolute -ml-28">
                        @if($user)
                            <div class="px-4 py-3 hover:bg-gray-300 border-b border-gray-200 hover:bg-white cursor-pointer" id="btn-info-user">
                                <p class="font-medium">{{ $user->name }}</p>
                                <p class="text-sm font-light text-gray-500 text-center">{{ $user->email }}</p>
                            </div>
                            <a class="px-4 py-3 hover:bg-gray-100 hover:text-purple border-b border-gray-200 flex" href="{{ route('logout') }}">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base">Đăng xuất</p>
                            </a>
                        @else
                            <a class="px-4 py-3 hover:bg-gray-100 hover:text-purple border-b border-gray-200 flex" href="{{ route('register.show') }}">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base">Đăng ký</p>
                            </a>
                            <a class="px-4 py-3 hover:bg-gray-100 hover:text-purple border-b border-gray-200 flex" href="{{ route('login.show') }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-base">Đăng nhập</p>
                            </a>
                        @endif
                    </div>
                </div>

            </ul>
        </nav>
    </header>
</div>

{{-- search - my favorite--}}
<div id="search" class="container mx-auto z-50" style="display: none;">
    <div class="w-full">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity ease-out duration-300" aria-hidden="true" onclick="$('#search').hide();"></div>
        <div class="inline-block sm:max-w-max absolute" style="top: 20%; width: 100%; ">
            <div class="flex justify-center py-4 text-white" onclick="$('#search').hide();">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                </svg>
            </div>
            <div class="w-full bg-white">
                <div class="w-10/12 mx-auto container pb-10">
                    <div class="flex justify-center items-center">
                        <input class="border text-gray-400 my-4 outline-0 rounded-full w-full mr-4 py-2 px-4 rounded-3" placeholder="Nhập vào từ khóa cần tìm kiếm">
                        <a class="search-button" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </a>
                    </div>
                    @if(count($wishlist) > 0)
                        @if(count($wishlist) < 6)
                            <div class="mt-6 w-full">
                                <a href="#">
                                    <span class="font-sans uppercase text-lg text-purple">Danh sách yêu thích</span>
                                </a>
                                <div class="mt-4 my-4 w-full grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
                                    @foreach($wishlist as $wl)
                                        <div class="rounded-lg mx-2 md:mx-3 col-span-1">
                                            <a href="#">
                                                <img src="{{ $wl->link_image }}" class="rounded-xl w-full h-48 md:h-56 hover:brightness-90">
                                                <div class="bg-white font-light text-base mt-3 relative">
                                                    <a href="#" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">
                                                        {{ $wl->title }}
                                                    </a>
                                                    <div class="absolute bg-white pl-3 py-3 rounded-tl-2xl flex text-purple cursor-pointer" onclick="alert('route');" style="top: -40px; right: 0px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                                        </svg>
                                                        <p class="ml-2">112</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="mt-6">
                                <a href="#">
                                    <span class="font-sans uppercase text-lg text-purple">Danh sách yêu thích</span>
                                </a>
                                <div class="mt-4 my-4 w-full " id="owl-theme-favorites">
                                    @foreach($wishlist as $wl)
                                            <div class="float-left rounded-lg mx-2 md:mx-3 w-1/6">
                                                <a href="#">
                                                    <img src="{{ $wl->link_image }}" class="rounded-xl w-full h-48 md:h-56 hover:brightness-90">
                                                    <div class="bg-white font-light text-base mt-3 relative">
                                                        <a href="#" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">
                                                            {{ $wl->title }}
                                                        </a>
                                                        <div class="absolute bg-white pl-3 py-3 rounded-tl-2xl flex text-purple cursor-pointer" onclick="alert('route');" style="top: -40px; right: 0px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                                            </svg>
                                                            <p class="ml-2">112</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif

                    <div class="mt-6">
                        <a href="#">
                            <span class="font-sans uppercase text-lg text-purple">Sức khỏe</span>
                        </a>
                        <div class="mt-4 my-4 w-full" id="owl-theme-suc-khoe">
                            @for ($i = 0; $i<10; $i++)
                                <div class=" w-1/6 rounded-lg mx-2 md:mx-3">
                                    <a href="#">
                                        <img src="https://c06f.app.slickstream.com/p/pageimg/L8EAVD26/102416?site=L8EAVD26&epoch=1676926521369" class="rounded-xl w-full h-48 md:h-56 hover:brightness-90">  {{--h-40 md:h-48--}}
                                        <div class="bg-white font-light text-base mt-3 relative">
                                            <a href="#" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">How to make cold brew. How to make cold brew. How to make cold brew</a>
                                            <div class="absolute bg-white pl-3 py-3 rounded-tl-2xl flex text-purple cursor-pointer" style="top: -40px; right: 0px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                                </svg>
                                                <p class="ml-2">112</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="#">
                            <span class="font-sans uppercase text-lg text-purple">Làm đẹp</span>
                        </a>
                        <div class="mt-4 my-4" id="owl-theme-lam-dep">
                            @for ($i = 0; $i<10; $i++)
                                <div class="rounded-lg mx-2 md:mx-3">
                                    <a href="#">
                                        <img src="https://c06f.app.slickstream.com/p/pageimg/L8EAVD26/740?site=L8EAVD26&epoch=1676926521369" class="rounded-xl w-full h-48 md:h-56 hover:brightness-90">  {{--h-40 md:h-48--}}
                                        <div class="bg-white font-light text-base mt-3 relative">
                                            <a href="#" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">How to make cold brew. How to make cold brew. How to make cold brew</a>
                                            <div class="absolute bg-white pl-3 py-3 rounded-tl-2xl flex text-purple cursor-pointer" style="top: -40px; right: 0px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                                </svg>
                                                <p class="ml-2">112</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- thong tin ca nhan --}}
@if($user)
    <div class="hidden fixed z-10 inset-0 overflow-y-auto animate-fade-in-down" aria-labelledby="modal-info-user" role="dialog" aria-modal="true" id="modal-info-user">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity ease-out duration-300" aria-hidden="true" onclick="hidden_info()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full w-full">
                <div class="bg-white relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-6 right-3 text-gray-500 top-3 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="hidden_info()">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <div class="border-b flex p-4 items-center">
                        <img src="{{ $user->avatar ?? "https://1.bp.blogspot.com/-HhU9edRL9Q8/YU1CjMlHZvI/AAAAAAAANt4/RKMHAtXYD_MqJOr3UbkiGN7ZkCz8Oy95gCLcBGAsYHQ/w800-h800-p-k-no-nu/Mailovesbeauty_LifeStyle%2BBlog.JPG" }}" class="w-8 h-8 rounded-full">
                        <span class="text-lg leading-6 font-medium text-gray-900 font-bold ml-2" id="modal-title">
                                Thông tin cá nhân
                        </span>
                    </div>
                    <div class="my-3 text-center sm:text-left p-4">
                        <div class="flex flex-wrap mb-2">
                            <p class="font-bold mr-4">Họ tên: </p>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="flex flex-wrap">
                            <p class="font-bold mr-4">Email: </p>
                            <p>{{ $user->email }}</p>
                        </div>

                        {{--          cập nhật thông tin              --}}
                        <div class="hidden" id="info_user">
                            <div
                                class="flex items-center my-8 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5"
                            >
                                <p class="text-center font-semibold mx-4 mb-0">Cập nhật thông tin</p>
                            </div>
                            <form method="POST" action="{{ route('update.info', ['id' => $user->id]) }}">
                                @csrf

                                @if($errors->has('name'))
                                    <div class="text-center text-sm text-red-600 mb-2">{{ $errors->first('name') }}</div>
                                @endif

                                <div class="flex flex-wrap mb-2">
                                    <p class="font-bold mr-4">Họ tên: </p>
                                    <input
                                        name="name"
                                        type="text"
                                        class="px-3 py-1.5 text-base border border-gray-300 rounded m-0 focus:outline-none mb-2 focus"
                                        placeholder="Họ và tên"
                                        value="{{ $user->name }}"
                                        required
                                    />
                                </div>
                                <div class="flex flex-wrap">
                                    <p class="font-bold mr-4">Email: </p>
                                    <p>{{ $user->email }}</p>
                                </div>

                                <div class="text-end mt-5">
                                    <a href="#"
                                        class="border border-purple text-purple hover:bg-purple p-3 hover:text-white mb-2 mr-2"
                                        onclick="toggle_info_user()"
                                    >
                                        Hủy
                                    </a>
                                    <button
                                        class="border border-purple text-purple hover:bg-purple p-2 hover:text-white mb-2"
                                        type="submit"
                                    >
                                        Cập nhật
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{--          thay đổi mật khẩu              --}}
                        <div class="hidden" id="forgot_password">
                            <div
                                class="flex items-center my-8 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5"
                            >
                                <p class="text-center font-semibold mx-4 mb-0">Đổi mật khẩu</p>
                            </div>
                            <form method="POST" action="{{ route('update.password', ['id' => $user->id]) }}">
                                @csrf

                                @if($errors->has('password'))
                                    <div class="text-center text-sm text-red-600 mb-2">{{ $errors->first('password') }}</div>
                                @endif

                                <input
                                    name="password"
                                    type="password"
                                    class="form-control block w-full px-3 py-1.5 text-base border border-gray-300 rounded m-0 focus:outline-none mb-2"
                                    placeholder="Mật khẩu mới"
                                    required
                                />
                                <input
                                    name="password_confirmation"
                                    type="password"
                                    class="form-control block w-full px-3 py-1.5 text-base border border-gray-300 rounded m-0 focus:outline-none mb-2"
                                    placeholder="Nhập lại mật khẩu mới"
                                    required
                                />
                                <div class="text-end mt-5">
                                    <button
                                        class="border border-purple text-purple hover:bg-purple p-2 hover:text-white mb-2 mr-2"
                                        onclick="toggle_forgot_password()"
                                    >
                                        Hủy
                                    </button>
                                    <button
                                        class="border border-purple text-purple hover:bg-purple p-2 hover:text-white mb-2"
                                        type="submit"
                                    >
                                        Cập nhật
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="mt-10 flex flex-wrap" id="div-btn">
                            @if($user->email_verified_at == null)
                                <form action="{{ route('verification.send') }}" method="POST" class="mb-2">
                                    @csrf
                                    <button type="submit" class="cursor-pointer border border-purple text-purple hover:bg-purple h-10 p-2 hover:text-white mr-4">Xác thực tài khoản</button>
                                </form>
                            @endif
                            <a href="#" class="border border-purple text-purple hover:bg-purple h-10 p-2 hover:text-white mr-4 mb-2" onclick="toggle_forgot_password()">Đổi mật khẩu</a>
                            <a href="#" class="border border-purple text-purple hover:bg-purple h-10 p-2 hover:text-white mb-2" onclick="toggle_info_user()">Chỉnh sửa thông tin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@push('scripts')
<script>
{{--    menu user --}}
    var menuUser = document.getElementById("menuUser");
    var modal_info = document.getElementById("forgot_password");
    var div_btn = document.getElementById('div-btn');
    var div_info = document.getElementById('info_user');

    var password = '{{ $errors->first('password') }}';
    var status = '{{ session('status') }}';
    var name = '{{ $errors->first('name') }}';

    show_info();

    function show_info(){
        if (password) {
            $("#modal-info-user").show();
            toggle_forgot_password();
        }
        if (status){
            alert(status);
            $("#modal-info-user").show();
        }
        if (name){
            $("#modal-info-user").show();
            toggle_info_user();
        }
    }

    function toggle(item) {
        if (item.classList.contains('hidden')) {
            item.classList.remove('hidden');
        } else {
            item.classList.add('hidden');
        }
    }

    function toggle_menu_user(){
        toggle(menuUser);
    }

    function toggle_forgot_password(){
        toggle(modal_info);
        toggle(div_btn);
    }

    function toggle_info_user(){
        toggle(div_info);
        toggle(div_btn);
    }

    // close the menu when the user clicks outside of it
    window.onclick = function (event) {
        var dropdownWrapperUser = document.getElementById('dropdown-wrapper-user');

        if (!dropdownWrapperUser.contains(event.target) && !menuUser.classList.contains('hidden')) {
            menuUser.classList.add('hidden');
        }

    }

    // hiển thị thông tin cá nhân
    $("#btn-info-user").click(function (){
        $("#modal-info-user").show();
    });

    function hidden_info(){
        $("#modal-info-user").hide();
    }

    // muc yeu thich - search

    $("#burgerBtn" ).click(function() {
        $( "#menu" ).toggle( "slow" );
    });

    const slick = {
        prevArrow: false,
        nextArrow: false,
        respondTo: 'slider',
        autoplaySpeed: 1000,
        // autoplay: true,
        loop: true,
        slidesToShow: 6,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 6,
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 5
            }
        }, {
            breakpoint: 640,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 320,
            settings: {
                slidesToShow: 1
            }
        }]
    };

    function showSearch(){
        $( "#search" ).toggle( "slow");

        $(document).ready(function () {
            $('#owl-theme-favorites').slick(slick);

            $('#owl-theme-suc-khoe').slick(slick);

            $('#owl-theme-lam-dep').slick(slick);
        });
    }

// slide show in home
    $(document).ready(function () {
        $('#owl-theme-new').slick(slick_new);

    });

    const slick_new = {
        prevArrow: false,
        nextArrow: false,
        respondTo: 'slider',
        autoplaySpeed: 1000,
        // autoplay: true,
        loop: true,
        slidesToShow: 1,
        responsive: []
    };

</script>
@endpush
