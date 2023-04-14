<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <style>
        #menu{
            font-family: 'Work Sans', sans-serif;
        }

        #menu-toggle:checked + #menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }

        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked ~ .control-1,
        #carousel-2:checked ~ .control-2,
        #carousel-3:checked ~ .control-3 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }
    </style>

</head>
<body class="bg-white text-gray-600 leading-normal text-base tracking-normal">

<!--Nav-->
<nav id="header" class="w-full z-30 top-0 py-1 bg-white border-b" style="position: fixed; top: 0;">
    @if(session('message'))
        <div class="text-white text-xs text-center border-b bg-fuchsia-700 py-2">
            {{ session('message') }}
        </div>
    @endif
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-2" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                    <li><a class="inline-block no-underline hover:text-purple hover:underline py-2 px-4" href="{{ route('home') }}">Trang chủ</a></li>
                    @foreach($categories as $i)
                        <li><a class="inline-block no-underline hover:text-purple hover:underline py-2 px-4" href="{{ route('categories.show', $i->slug) }}">{{ $i->name }}</a></li>
                    @endforeach
                    <li><a class="inline-block no-underline hover:text-purple hover:underline py-2 px-4" href="{{ route('video.list') }}">Video</a></li>
                </ul>
            </nav>
        </div>

        <div class="order-1 md:order-1">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl" href="{{ route('home') }}">
                AMARA STORE
            </a>
        </div>

        <div class="order-2 md:order-3 flex items-center" id="nav-content">
            <div class="mr-3 cursor-pointer">
                <a href="{{ route('search') }}">
                    <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                    </svg>
                </a>
            </div>
            @if($user)
                <div class="relative cursor-pointer" onclick="notify()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5"></path>
                    </svg>
                    <span id="list_liker_icon" class="hidden -top-3 absolute bg-red-600 font-bold p-1 rounded-full text-center text-white ml-2.5 text-xs transform scale-75 w-6" style="display: none;"></span>
                </div>
                <div id="list-notify" class="absolute hidden flex-col bg-white drop-shadow-xl md:p-5 p-3 right-0 top-0 transform transition h-screen z-50">
                    <div class="flex items-center justify-between mb-8">
                        <p class=" text-2xl font-semibold leading-6 text-gray-800">Thông báo</p>
                        <button onclick="notify()" class="bg-white cursor-pointer outline-none p-1 rounded-full">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 6L6 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6 6L18 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="overflow-y-scroll scrollbar-none space-y-3 lg:w-96 text-center" style="height: calc(100vh - 150px) !important;" id="list-new-notify">
                        @foreach($user->notifications as $notification)
                            <a href="{{ route('notification', [$notification, $notification['data']['slug']]) }}" class="flex hover:bg-gray-200 px-1 py-2 rounded-lg">
                                <img src="{{ $user->avatar ?? "https://1.bp.blogspot.com/-HhU9edRL9Q8/YU1CjMlHZvI/AAAAAAAANt4/RKMHAtXYD_MqJOr3UbkiGN7ZkCz8Oy95gCLcBGAsYHQ/w800-h800-p-k-no-nu/Mailovesbeauty_LifeStyle%2BBlog.JPG" }}" class="w-8 h-8 rounded-full">
                                <div class="ml-2">
                                    <div class="flex">
                                        <div><span class="font-bold text-sm">{{ $notification['data']['user_name'] }}</span> đã thích bình luận của bạn</div>
                                        @if(!$notification['read_at'])
                                            <div class="bg-blue-600 h-2 justify-center ml-2 mt-2 md:ml-4 md:mt-3 rounded w-2"></div>
                                        @endif
                                    </div>
                                    <div class="text-left text-sm">{{ $notification['created_at']->diffForHumans() }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <div id="dropdown-wrapper-user" class="flex text-sm md:text-lg ml-4">
                <div class="relative">
                    <div onclick="toggle_menu_user()" class="cursor-pointer">
                        <a class="inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <circle fill="none" cx="12" cy="7" r="3" />
                                <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div id="menuUser" class="hidden flex flex-col bg-white drop-shadow-md absolute -ml-28 mt-10">
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
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
        </div>

    </div>
</nav>

{{-- thong tin ca nhan --}}
@if($user)
    <div class="hidden fixed z-50 inset-0 overflow-y-auto animate-fade-in-down" aria-labelledby="modal-info-user" role="dialog" aria-modal="true" id="modal-info-user">
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

                        <div class="mt-10 flex justify-center flex-wrap" id="div-btn">
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
    var menuNotify = document.getElementById("list-notify");

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

    function notify(){
        document.getElementById('list_liker_icon').style.display = 'none';
        if (menuNotify.classList.contains('hidden')) {
            menuNotify.classList.remove('hidden');
        } else {
            menuNotify.classList.add('hidden');
        }
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

</script>

<script type="module">
    Echo.private(`App.Models.User.{{Auth::id()}}`)
        .notification((notification) => {
            document.getElementById('list_liker_icon').innerHTML = `<div>` + notification.sum + `</div>`;
            document.getElementById('list_liker_icon').style.display = 'block';

            let str = document.getElementById('list-new-notify');

            str.innerHTML = `<a href="/notification/` + notification.id + "/" + notification.slug + `" class="flex hover:bg-gray-200 px-2 py-4 rounded-lg">
                                <img src="https://1.bp.blogspot.com/-HhU9edRL9Q8/YU1CjMlHZvI/AAAAAAAANt4/RKMHAtXYD_MqJOr3UbkiGN7ZkCz8Oy95gCLcBGAsYHQ/w800-h800-p-k-no-nu/Mailovesbeauty_LifeStyle%2BBlog.JPG" class="w-6 h-6 rounded-full">
                                <div class="ml-3">
                                    <div class="flex">
                                    <div><span class="font-bold text-sm">` + notification.username
                                + `</span> đã thích bình luận của bạn</div>
                                    <div class="bg-blue-600 h-2 justify-center ml-6 mt-3 rounded w-2"></div>
                                    </div>
                                    <div class="text-left">` + notification.time + `</div>
                                </div>
                            </a>`
                + str.innerHTML;

            // console.log(notification);
        });
</script>

@endpush
