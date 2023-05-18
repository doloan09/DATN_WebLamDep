@extends('client.layouts.master')

@section('title', 'Trang chủ - Amara Store')

@section('content')
<div class="bg-white py-8 mt-6">
    <div class="justify-center items-center">
        <div class="2xl:mx-auto 2xl:container lg:px-20 lg:py-16 md:py-12 md:px-6 py-9 px-4 w-96 sm:w-auto">
            <div role="main" class="flex flex-col items-center justify-center">
                <h1 class="text-3xl md:text-4xl font-semibold leading-9 text-center">Tại sao?</h1>
                <p class="text-sm leading-normal text-center text-gray-600 dark:text-white mt-4 lg:w-1/2 md:w-10/12 w-11/12">Phụ nữ không nhất thiết phải là người đẹp nhất, cũng không cần phải đẹp hơn người này người kia. Vẻ đẹp toát ra từ sự nỗ lục, hoàn thiện bản thân mỗi ngày. Hãy luôn hành động để trở thành phiên bản đẹp hơn của chính mình.</p>
            </div>
            <div class="lg:flex items-stretch md:mt-12 mt-8">
                <div class="lg:w-1/2">
                    <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6">
                        @isset($posts[0])
                            @foreach($posts[0] as $item)
                                <div class="sm:w-1/2 relative mb-2 md:mb-0">
                                    <div>
                                        <p class="p-6 text-white absolute top-0 right-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                            </svg>
                                        </p>
                                        <div class="absolute bottom-0 left-0 p-6">
                                            <h2 class="text-base font-semibold 5 text-white uppercase" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1; overflow: hidden;">{{ $item->title }}</h2>
                                            <p class="text-sm leading-4 text-white mt-2">{{ $item->created_at->toFormattedDateString() }}</p>
                                            <a href="{{ route('posts.show', $item->slug) }}" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                                <p class="pr-2 text-sm">Xem thêm</p>
                                                <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <img class="object-cover w-full h-80 dark:bg-gray-500 rounded-lg" src="{{ $item->link_image }}">
                                </div>
                            @endforeach
                        @endisset
                    </div>
                    @isset($posts[1][2])
                        <div class="relative hidden md:block">
                            <div>
                                <p class="md:p-10 p-6 text-white absolute top-0 right-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </p>
                                <div class="absolute bottom-0 left-0 md:p-10 p-6">
                                    <h2 class="text-base font-semibold 5 text-white uppercase" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1; overflow: hidden;">{{ $posts[1][2]->title }}</h2>
                                    <p class="text-sm leading-4 text-white mt-2">{{ $posts[1][2]->created_at->toFormattedDateString() }}</p>
                                    <a href="{{ route('posts.show', $posts[1][2]->slug) }}" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm">Xem thêm</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="{{ $posts[1][2]->link_image }}" alt="sitting place" class="object-cover w-full mt-8 md:mt-6 hidden sm:block rounded-lg h-36r" />
                        </div>
                    @endisset
                </div>
                <div class="lg:w-1/2 xl:ml-8 lg:ml-4 lg:mt-0 md:mt-6 mt-4 lg:flex flex-col justify-between">
                    @isset($posts[1][3])
                        <div class="relative hidden md:block">
                            <div>
                                <p class="md:p-10 p-6 text-white absolute top-0 right-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </p>
                                <div class="absolute bottom-0 left-0 md:p-10 p-6">
                                    <h2 class="text-base font-semibold 5 text-white uppercase" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1; overflow: hidden;">{{ $posts[1][3]->title }}</h2>
                                    <p class="text-sm leading-4 text-white mt-2">{{ $posts[1][3]->created_at->toFormattedDateString() }}</p>
                                    <a href="{{ route('posts.show', $posts[1][3]->slug) }}" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm">Xem thêm</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="{{ $posts[1][3]->link_image }}" alt="sitting place" class="object-cover w-full sm:block hidden rounded-lg h-36r" />
                        </div>
                    @endisset
                    <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6 md:mt-6 mt-4">
                        @isset($posts[2])
                            @foreach($posts[2] as $item)
                                <div class="sm:w-1/2 relative mb-2 md:mb-0">
                                    <div>
                                        <p class="p-6 text-white absolute top-0 right-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                            </svg>
                                        </p>
                                        <div class="absolute bottom-0 left-0 p-6">
                                            <h2 class="text-base font-semibold 5 text-white uppercase" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1; overflow: hidden;">{{ $item->title }}</h2>
                                            <p class="text-sm leading-4 text-white mt-2">{{ $item->created_at->toFormattedDateString() }}</p>
                                            <a href="{{ route('posts.show', $item->slug) }}" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                                <p class="pr-2 text-sm">Xem thêm</p>
                                                <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <img class="object-cover w-full h-80 dark:bg-gray-500 rounded-lg" src="{{ $item->link_image }}">
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="dark:bg-gray-800 dark:text-gray-100">
        <div class="container p-2 md:p-6 mx-auto space-y-8">
            <div class="space-y-2 text-center">
                <h2 class="text-2xl md:text-3xl">Những điều được mọi người quan tâm</h2>
                <p class="font-serif text-sm dark:text-gray-400">Mọi người đang quan tâm đến vấn đề gì? Sức khỏe, sắc đẹp, tiền tài hay sự vui vẻ, bình yên? Mọi thứ đều quan trọng nếu chúng ta biết cách hoàn thiện và cân bằng chúng!</p>
            </div>
            <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                @isset($posts_hot)
                    @foreach($posts_hot as $item)
                        @php
                            $user_wishlist = $item->wishlist()->where('id_user', \Illuminate\Support\Facades\Auth::id())->first(); // kiem tra xem user da thich bai viet nay chua
                            $posts_wishlist = $item->wishlist()->get(); // tat ca luot thich cua tat ca user
                            $count_wishlist = count($posts_wishlist); // tong so luot thich bai viet cua tat ca user
                        @endphp
                        <div class="md:mb-5 border hover:text-purple flex flex-col hover:grow hover:shadow-lg rounded-lg">
                            <div class="">
                                <a href="{{ route('posts.show', $item->slug) }}">
                                    <img class="object-cover w-full h-52 dark:bg-gray-500 rounded-t-lg" src="{{ $item->link_image }}">
                                </a>
                            </div>
                            <div class="bg-white p-4 mx-2">
                                <a href="{{ route('posts.show', $item->slug) }}" class="uppercase text-sm" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">
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
                @endisset
            </div>
        </div>
    </section>

    <section class="p-2 md:p-4 lg:p-8 dark:bg-gray-800 dark:text-gray-100 mt-20">
        <div class="container md:p-6 mx-auto space-y-12">
            @isset($posts_3[0])
                <div class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
                    <img src="{{ $posts_3[0]->link_image }}" alt="" class="h-80 dark:bg-gray-500 aspect-video rounded-lg object-cover">
                    <div class="flex flex-col justify-center flex-1 p-6 dark:bg-gray-900">
                        <h3 class="text-lg md:text-2xl uppercase">{{ $posts_3[0]->title }}</h3>
                        <p class="text-sm md:text-base my-3 dark:text-gray-400" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden;">{{ $posts_3[0]->description }}</p>
                        <a href="{{ route('posts.show', $posts_3[0]->slug) }}" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer hover:text-purple hover:underline">
                            <p class="pr-2 text-sm">Xem thêm</p>
                            <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endisset
            @isset($posts_3[1])
                <div class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row-reverse">
                    <img src="{{ $posts_3[1]->link_image }}" alt="" class="h-80 dark:bg-gray-500 aspect-video rounded-lg object-cover">
                    <div class="flex flex-col justify-center flex-1 p-6 dark:bg-gray-900">
                        <h3 class="text-lg md:text-2xl uppercase">{{ $posts_3[1]->title }}</h3>
                        <p class="text-sm md:text-base my-3 dark:text-gray-400" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden;">{{ $posts_3[1]->description }}</p>
                        <a href="{{ route('posts.show', $posts_3[1]->slug) }}" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer hover:text-purple hover:underline">
                            <p class="pr-2 text-sm">Xem thêm</p>
                            <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endisset
            @isset($posts_3[2])
                <div class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
                    <img src="{{ $posts_3[2]->link_image }}" alt="" class="h-80 dark:bg-gray-500 aspect-video rounded-lg object-cover">
                    <div class="flex flex-col justify-center flex-1 p-6 dark:bg-gray-900">
                        <h3 class="text-lg md:text-2xl uppercase">{{ $posts_3[2]->title }}</h3>
                        <p class="text-sm md:text-base my-3 dark:text-gray-400" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden;">{{ $posts_3[2]->description }}</p>
                        <a href="{{ route('posts.show', $posts_3[2]->slug) }}" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer hover:text-purple hover:underline">
                            <p class="pr-2 text-sm">Xem thêm</p>
                            <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endisset
        </div>
    </section>

    <section class="py-6 dark:bg-gray-800 hidden md:block">
        <div class="container flex flex-col justify-center p-4 mx-auto">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 sm:grid-cols-2">
                @isset($list_img)
                    @foreach($list_img as $item)
                        <img class="object-cover w-full dark:bg-gray-500 aspect-square rounded-lg" src="{{ $item->link }}">
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
    <script>

    </script>
@endpush
