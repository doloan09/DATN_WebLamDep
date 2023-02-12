<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body>
@if(session('message'))
    <div class="text-white text-center bg-green-500 py-4">
        {{ session('message') }}
    </div>
@endif
<div class="md:mx-16 mt-10">
    <div class="mx-4 md:mx-0 grid grid-cols-3 gap-4 md:border-dashed md:border-b-2 md:border-solid md:pb-2">
        <div class="flex">
            <div class="space-y-1 md:space-y-2 mr-6">
                <div class="w-6 h-0.5 md:w-8 md:h-1 bg-gray-300"></div>
                <div class="w-6 h-0.5 md:w-8 md:h-1 bg-gray-300"></div>
                <div class="w-6 h-0.5 md:w-8 md:h-1 bg-gray-300"></div>
            </div>
            <div class="hidden md:block">
                <p class="font-black text-xl" style="text-shadow: 1px 2px 5px black;">SECTIONS</p>
            </div>
        </div>
        <div class="text-gray-500 hidden md:block">
            <p class="text-center">Friday, February 24, 2017</p>
        </div>
        <div class="flex justify-end">
            <div class="">
                <div class="relative w-full">
                    <div class="flex absolute inset-y-0 items-center text-gray-300 md:text-black pl-24 mt-2 md:pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-7 h-7 md:w-8 md:h-8 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="simple-search" class="text-lg rounded-lg block w-full pl-12 p-2.5 placeholder-black hidden md:block" placeholder="SEARCH" required>
                </div>
            </div>
            @if($user)
                <div class="hidden md:block mx-4 mt-3" id="message">
                    <div class="relative cursor-pointer" onclick="message()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                        </svg>
                        <span class="-top-3 absolute bg-red-600 font-bold p-1 rounded-full text-center text-white ml-2.5 text-xs transform scale-75 w-6">0</span>
                    </div>
                    {{--          hien thi danh sach tin nhan          --}}
                    <div id="list-message" class="absolute hidden flex-col bg-white drop-shadow-xl -ml-20 md:p-8 p-4 right-10 mt-5 transform transition z-40">
                        <div class="flex items-center justify-between mb-8">
                            <p class=" text-2xl font-semibold leading-6 text-gray-800">Chat</p>
                            <div class="flex">
                                <div class="cursor-pointer hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4 cursor-pointer hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                                    </svg>
                                </div>
                                <div class="mx-4 cursor-pointer hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>
                                <div onclick="create_group()" class="cursor-pointer hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="relative w-full rounded-full mb-4">
                            <div class="flex absolute inset-y-0 items-center text-gray-300 md:text-black pl-24 mt-1 md:pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" oninput="searchMessage()" id="search-message" class="bg-gray-100 block hidden md:block p-2 pl-12 placeholder-black rounded-full text-lg text-sm w-full" placeholder="Tìm kiếm" required>
                        </div>
                        <div class="overflow-y-scroll scrollbar-none space-y-3 lg:w-96 text-center" style="height: calc(100vh - 150px) !important;" id="list-message-user">
                            {{--           hien thi danh sach tin nhan                 --}}
                        </div>
                    </div>
                        {{--       hien thi form nhan tin             --}}
                    <div id="show-message" class="absolute hidden flex-col bg-white drop-shadow-xl -ml-20 p-4 bottom-0 right-10 mt-5 transform transition z-30">
                        <div class="border-b-2 flex justify-between mb-8 pb-2">
                            <div class="flex">
                                <img src="/img/img_1.png" class="w-8 h-8 rounded-full">
                                <p class=" text-lg ml-4 font-semibold leading-6 text-gray-800 text-left">Message</p>
                            </div>
                            <button onclick="showMessage()" class="bg-white cursor-pointer outline-none p-1 rounded-full">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 6L6 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M6 6L18 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="overflow-y-scroll scrollbar-none space-y-3 lg:w-96 text-center" style="height: calc(50vh - 100px) !important;">

                        </div>
                        <div class="flex mt-4">
                            <div class="mr-4 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                </svg>
                            </div>
                            <input type="text" class="border-2 border-gray-300 w-full h-10 rounded-lg px-2" placeholder="Nhắn tin">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-7 ml-4 mt-1 text-gray-400 w-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($user)
                <div class="hidden md:block mt-3" id="notification">
                    <div class="relative cursor-pointer" onclick="notify()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                        </svg>
                        <span id="list_liker" class="hidden -top-3 absolute bg-red-600 font-bold p-1 rounded-full text-center text-white ml-2.5 text-xs transform scale-75 w-6"></span>
                    </div>
                    <div id="list-notify" class="absolute hidden flex-col bg-white drop-shadow-xl -ml-20 md:p-8 p-4 right-10 mt-5 transform transition z-50">
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
                                <a href="{{ route('notification', [$notification, $notification['data']['slug']]) }}" class="flex hover:bg-gray-200 px-2 py-4 rounded-lg">
                                    <img src="{{ $user->avatar ?? "/img/img_1.png" }}" class="w-10 h-10 rounded-full">
                                    <div class="ml-3">
                                        <div class="flex">
                                            <div><span class="font-bold text-lg">{{ $notification['data']['user_name'] }}</span> đã thích bình luận của bạn</div>
                                            @if(!$notification['read_at'])
                                                <div class="bg-blue-600 h-2 justify-center ml-6 mt-3 rounded w-2"></div>
                                            @endif
                                        </div>
                                        <div class="text-left">{{ $notification['created_at']->diffForHumans() }}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div id="dropdown-wrapper-user" class="hidden md:block inline-block text-sm md:text-lg mt-2 ml-4 z-50">
                <div class="relative">
                    <div onclick="toggle()" class="cursor-pointer">
                        <img src="{{ $user->avatar ?? "/img/img_1.png" }}" class="w-8 h-8 rounded-full">
                    </div>
                </div>
                <div id="menuUser" class="hidden flex flex-col bg-white drop-shadow-md absolute -ml-20">
                    @if($user)
                        <div class="px-5 py-3 hover:bg-gray-300 border-b border-gray-200 hover:bg-white" href="">
                            <div class="flex">
                                <div>
                                    <img src="{{ $user->avatar ?? "/img/img_1.png" }}" class="w-6 h-6 rounded-full">
                                </div>
                                <p class="ml-3 font-bold">{{ $user->name }}</p>
                            </div>
                            <p class="text-sm text-gray-400 text-center">{{ $user->email }}</p>
                        </div>
                        <a class="px-5 py-3 hover:bg-gray-300 border-b border-gray-200 flex" href="">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="ml-3">Personal</p>
                        </a>
                        <a class="px-5 py-3 hover:bg-gray-300 border-b border-gray-200 flex" href="{{ route('logout') }}">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </div>
                            <p class="ml-3">Logout</p>
                        </a>
                    @else
                        <a class="px-5 py-3 hover:bg-gray-300 border-b border-gray-200 flex" href="{{ route('register.request') }}">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <p class="ml-3">Sign Up</p>
                        </a>
                        <a class="px-5 py-3 hover:bg-gray-300 border-b border-gray-200 flex" href="{{ route('login.request') }}">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                            </div>
                            <p class="ml-3">Login</p>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hidden fixed z-10 inset-0 overflow-y-auto animate-fade-in-down" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="create_group">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity ease-out duration-300" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full w-full">
            <div class="bg-white relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-6 right-3 text-gray-500 top-3 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="create_group()">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <div class="border-b p-4 items-center">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        <span class="text-lg leading-6 font-medium text-gray-900 font-bold ml-2" id="modal-title">
                            Tạo nhóm
                        </span>
                    </div>
                    <form action="" class="my-8">
                        <div class="text-center text-lg">Đặt tên nhóm</div>
                        <input type="text" class="border-b-2 mt-8 w-full px-4" placeholder="Tên nhóm (Bắt buộc)">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var menuUser = document.getElementById("menuUser");
        var menuNotify = document.getElementById("list-notify");
        var menuMessage = document.getElementById("list-message");
        var itemMessage = document.getElementById("show-message");
        var group = document.getElementById("create_group");

        function toggle() {
            if (menuUser.classList.contains('hidden')) {
                menuUser.classList.remove('hidden');
            } else {
                menuUser.classList.add('hidden');
            }
        }

        function notify(){
            document.getElementById('list_liker').style.display = 'none';
            if (menuNotify.classList.contains('hidden')) {
                menuNotify.classList.remove('hidden');
            } else {
                menuNotify.classList.add('hidden');
            }
        }

        function message(){
            if (menuMessage.classList.contains('hidden')) {
                menuMessage.classList.remove('hidden');
            } else {
                menuMessage.classList.add('hidden');
                document.getElementById('list-message-user').innerHTML = "";
                document.getElementById('search-message').value = "";
            }
        }

        function showMessage(id){
            if (itemMessage.classList.contains('hidden')) {
                message();
                itemMessage.classList.remove('hidden');
            } else {
                itemMessage.classList.add('hidden');
            }
        }

        function create_group(){
            if (group.classList.contains('hidden')) {
                message();
                group.classList.remove('hidden');
            } else {
                group.classList.add('hidden');
            }
        }

        // close the menu when the user clicks outside of it
        window.onclick = function (event) {
            var dropdownWrapperUser = document.getElementById('dropdown-wrapper-user');
            var Notify = document.getElementById('notification');
            var Message = document.getElementById('message');

            if (!dropdownWrapperUser.contains(event.target) && !menuUser.classList.contains('hidden')) {
                menuUser.classList.add('hidden');
            }

            if (!Notify.contains(event.target) && !menuNotify.classList.contains('hidden')) {
                menuNotify.classList.add('hidden');
            }

            if (!Message.contains(event.target) && !menuMessage.classList.contains('hidden')) {
                menuMessage.classList.add('hidden');
            }
        }
    </script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        function searchMessage(){
            let x = document.getElementById('search-message').value;
            if(x) {
                $.ajax({
                    type: "GET",
                    url: '/users/' + x,
                    success: function (data) {
                        listLiker = data['data'];
                        sizeData = listLiker.length;
                        str = '';

                        for (let i = 0; i < sizeData; i++) {
                            let avatar = listLiker[i]['avatar'];
                            if (!avatar){
                                avatar = "https://thechatvietnam.com/storage/users/default.png";
                            }
                            str += '<div onclick="showMessage()" class="modal-body mt-4 grid grid-cols-1 gap-3 cursor-pointer"><div class="flex items-center">' +
                                '<a class="avatar mr-2">' +
                                '<img class="rounded-full" src="' + avatar + '" alt="img" width="35px">' +
                                '</a>' +
                                '<b><span class="name mb-0 text-sm">' + listLiker[i]['name'] + '</span></b>' +
                                '</div>' +
                                '</div>';
                        }

                        document.getElementById('list-message-user').innerHTML = str;
                    },
                    error: function (xhr, status, error) {
                        // alert(error);
                    }
                });
            }else{
                document.getElementById('list-message-user').innerHTML = "";
            }
        }

    </script>

    <script type="module">
        Echo.private(`App.Models.User.{{Auth::id()}}`)
            .notification((notification) => {
                document.getElementById('list_liker').innerHTML = `<div>` + notification.sum + `</div>`;
                document.getElementById('list_liker').style.display = 'block';

                let str = document.getElementById('list-new-notify');

                str.innerHTML = `<a href="/notification/` + notification.id + "/" + notification.slug + `" class="flex hover:bg-gray-200 px-2 py-4 rounded-lg">
                                <img src="/img/img_1.png" class="w-10 h-10 rounded-full">
                                <div class="ml-3">
                                    <div class="flex">
                                        <div><span class="font-bold text-lg">` + notification.username
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
