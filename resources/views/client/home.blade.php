@extends('client.layouts.master')

@section('title', 'Amara Store')

@section('content')
<style>
    .work-sans {
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

<div class="carousel relative container mx-auto mt-20" style="max-width:1600px;">
    <div class="carousel-inner relative overflow-hidden w-full">
        <!--Slide 1-->
        <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
        <div class="carousel-item absolute opacity-0" style="height:50vh;">
            <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('https://images.unsplash.com/photo-1422190441165-ec2956dc9ecc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80');">

                <div class="container mx-auto">
                    <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                        <p class="text-black text-2xl my-4">Stripy Zig Zag Jigsaw Pillow and Duvet Set</p>
                        <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">view product</a>
                    </div>
                </div>

            </div>
        </div>
        <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

        <!--Slide 2-->
        <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
        <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
            <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('https://images.unsplash.com/photo-1533090161767-e6ffed986c88?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjM0MTM2fQ&auto=format&fit=crop&w=1600&q=80');">

                <div class="container mx-auto">
                    <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                        <p class="text-black text-2xl my-4">Real Bamboo Wall Clock</p>
                        <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">view product</a>
                    </div>
                </div>

            </div>
        </div>
        <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

        <!--Slide 3-->
        <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
        <div class="carousel-item absolute opacity-0" style="height:50vh;">
            <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom" style="background-image: url('https://images.unsplash.com/photo-1519327232521-1ea2c736d34d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80');">

                <div class="container mx-auto">
                    <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                        <p class="text-black text-2xl my-4">Brown and blue hardbound book</p>
                        <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">view product</a>
                    </div>
                </div>

            </div>
        </div>
        <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

        <!-- Add additional indicators for each slide-->
        <ol class="carousel-indicators">
            <li class="inline-block mr-3">
                <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
            </li>
            <li class="inline-block mr-3">
                <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
            </li>
            <li class="inline-block mr-3">
                <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
            </li>
        </ol>

    </div>
</div>

<div class="bg-white py-8">
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
        <nav id="store" class="w-full top-0 px-6 py-1 mb-4">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-lg md:text-xl " href="#" id="title">
                    Bài viết nổi bật
                </a>

                <div class="flex items-center" id="store-nav-content">

                    <input id="title-post" name="title-post" class="hidden md:block border text-gray-400 my-4 outline-0 rounded-full w-96 mr-2 py-2 px-4 rounded-3" placeholder="Nhập vào từ khóa cần tìm kiếm">
                    <div class="inline-block no-underline hover:text-purple cursor-pointer" id="search-button" onclick="checkSearchMain()">
                        <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                        </svg>
                    </div>

                    <div class="pl-3 inline-block no-underline hover:text-purple cursor-pointer" onclick="showPostHot()">
                        <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                        </svg>
                    </div>

                    @if(count($wishlist) > 0)
                        <a class="pl-3 inline-block no-underline hover:text-purple z-0" href="{{ route('wishlist') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </a>
                    @endif

                </div>
            </div>
        </nav>

        {{--    bài viết nổi bật        --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-10" id="posts_hot">
            @foreach($posts_hot as $item)
                @php
                    $user_wishlist = $item->wishlist()->where('id_user', \Illuminate\Support\Facades\Auth::id())->first(); // kiem tra xem user da thich bai viet nay chua
                    $posts_wishlist = $item->wishlist()->get(); // tat ca luot thich cua tat ca user
                    $count_wishlist = count($posts_wishlist); // tong so luot thich bai viet cua tat ca user
                @endphp
                <div class="md:mb-5 hover:text-purple flex flex-col hover:grow hover:shadow-lg">
                    <div class="md:h-72">
                        <a href="{{ route('posts.show', $item->slug) }}">
                            <img class="max-h-96" src="{{ $item->link_image }}">
                        </a>
                    </div>
                    <div class="bg-white p-4 mx-2">
                        <a href="{{ route('posts.show', $item->slug) }}" class="uppercase text-sm" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden;">
                            {{ $item->title }}
                        </a>
                        <form class="flex justify-between font-light text-sm mt-2" method="POST" action="{{ route('wishlist.store', ['id_post' => $item->id, 'id_user' => \Illuminate\Support\Facades\Auth::id()]) }}">
                            @csrf
                            <p class="mt-3">{{ $item->created_at->toFormattedDateString() }}</p>
                            <button type="submit" class="bg-white pl-3 py-3 rounded-tl-2xl flex text-purple cursor-pointer">
                                @if($user_wishlist)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                @endif
                                <p class="ml-2">{{ $count_wishlist }}</p>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{--    bài viết yêu thích        --}}
        @if(count($wishlist) > 0)
            <div id="wish_list" style="display: none;">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-20">
                    @foreach($wishlist as $wl)
                        @php
                            $post = \App\Models\Post::query()->findOrFail($wl->id_post);
                            $posts_wishlist = $post->wishlist()->get();
                            $count_wishlist = count($posts_wishlist);
                        @endphp
                        <div class="md:mb-5 hover:text-purple flex flex-col hover:grow hover:shadow-lg">
                            <div class="md:h-72">
                                <a href="{{ route('posts.show', $wl->slug) }}">
                                    <img class="max-h-96" src="{{ $wl->link_image }}">
                                </a>
                            </div>
                            <div class="bg-white p-4 mx-2">
                                <a href="{{ route('posts.show', $wl->slug) }}" class="uppercase text-sm" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden;">
                                    {{ $wl->title }}
                                </a>
                                <form class="flex justify-between font-light text-sm mt-2" method="POST" action="{{ route('wishlist.store', ['id_post' => $wl->id, 'id_user' => \Illuminate\Support\Facades\Auth::id()]) }}">
                                    @csrf
                                    <p class="mt-3">{{ $wl->created_at->toFormattedDateString() }}</p>
                                    <div class="bg-white pl-3 py-3 rounded-tl-2xl flex text-purple cursor-pointer" onclick="alert('xxx');">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                        </svg>
                                        <p class="ml-2">{{ $count_wishlist }}</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{--        Pagination    --}}
                <div class="mt-10 my-10">
                    {{ $wishlist->links('pagination::tailwind') }}
                </div>
            </div>
        @endif

        {{--    kết quả tìm kiếm        --}}
        <div id="results" style="display: none;">
            @isset($posts)
                @if(count($posts) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-20">
                        @foreach($posts as $item)
                            @php
                                $post = \App\Models\Post::query()->where('id', $item->id_post)->first();
                                if ($post){
                                    $posts_wishlist = $post->wishlist()->get();
                                    $count_wishlist = count($posts_wishlist);
                                }
                            @endphp
                            <div class="md:mb-5 hover:text-purple flex flex-col hover:grow hover:shadow-lg">
                                <div class="md:h-72">
                                    <a href="{{ route('posts.show', $item->slug) }}">
                                        <img class="max-h-96" src="{{ $item->link_image }}">
                                    </a>
                                </div>
                                <div class="bg-white p-4 mx-2">
                                    <a href="{{ route('posts.show', $item->slug) }}" class="uppercase text-sm" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden;">
                                        {{ $item->title }}
                                    </a>
                                    <form class="flex justify-between font-light text-sm mt-2" method="POST" action="{{ route('wishlist.store', ['id_post' => $item->id, 'id_user' => \Illuminate\Support\Facades\Auth::id()]) }}">
                                        @csrf
                                        <p class="mt-3">{{ $item->created_at->toFormattedDateString() }}</p>
                                        <div class="bg-white pl-3 py-3 rounded-tl-2xl flex text-purple cursor-pointer" onclick="alert('xxx');">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                            </svg>
                                            <p class="ml-2">{{ $count_wishlist }}</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--        Pagination    --}}
                    <div class="mt-10 my-10">
                        {{ $posts->links('pagination::tailwind') }}
                    </div>
                @else
                    <div class="ml-6 mb-20">
                        Không tìm thấy kết quả phù hợp ...
                    </div>
                @endif
            @endisset
        </div>

        <div class="container mx-auto bg-white border-t border-dashed pt-8 border-gray-400">
            <div class="container flex px-3">
                <div class="w-full mx-auto flex flex-wrap">
                    <div class="flex w-full lg:w-1/2 ">
                        <div class="px-3 md:px-0">
                            <h3 class="font-bold text-gray-900">About</h3>
                            <p class="py-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                            </p>
                        </div>
                    </div>
                    <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                        <div class="px-3 md:px-0">
                            <h3 class="font-bold text-gray-900">Social</h3>
                            <ul class="list-reset items-center pt-3">
                                <li>
                                    <a class="inline-block no-underline hover:text-black hover:underline py-1" href="#">Add social links</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
    <script>
        var title = '{{ isset($_GET['title']) }}';

        checkWishList();
        checkSearch();

        function checkWishList(){
            if (location.pathname === '/trang-chu/danh-sach-yeu-thich'){
                showWishList();
            }
        }

        function checkSearch(){
            if (location.pathname === '/trang-chu/search' && title){
                $('#posts_hot').hide();
                $('#wish_list').hide();
                $('#results').show();
                $('#title').text('Kết quả tìm kiếm');
            }
        }

        function checkSearchMain(){
            title = $('#title-post').val();
            if (title) {
                window.location.assign('{{ route('search') }}' + '?title=' + title);
            }else {
                alert('Vui lòng nhập từ khóa cần tìm kiếm!');
                $('#title-post').focus();
            }
        }

        function showWishList(){
            $('#posts_hot').hide();
            $('#wish_list').show();
            $('#results').hide();
            $('#title').text('Bài viết yêu thích');
        }

        function showPostHot(){
            $('#posts_hot').show();
            $('#wish_list').hide();
            $('#results').hide();
            $('#title').text('Bài viết nổi bật');
            window.location.href = '{{ route('home') }}';
        }

    </script>
@endpush
