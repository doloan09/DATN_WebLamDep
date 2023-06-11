@extends('client.layouts.master')

@section('title', $post->title . ' - Amara Store')
@section('meta_url', env('APP_URL') . '/bai-viet/' . $post->slug)
@section('meta_title', $post->title)
@section('meta_image', $post->link_image)
@section('meta_description', $post->description)

<style>
    .tooltiptext {
        visibility: hidden;
        min-width: 100px;
        position: absolute;
        z-index: 1;
        left: 50%;
        margin-left: -60px;
    }

    .tooltip .tooltiptext::after {
        content: "";
        position: absolute;
        bottom: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent black transparent;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }
</style>

@section('content')
<div class="mx-auto container px-3 md:px-2 mt-20 md:mt-28 lg:mt-20">
    <div class="py-4">
        <div class="flex flex-wrap border-l-4 border-purple">
            <a href="{{ route('home') }}" class="px-3">Trang chủ</a>
            @if($category->child_id)
                <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </span>
                <p class="px-3">Tham khảo</p>
            @endif
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </span>
            <a href="{{ route('categories.show', $category->slug) }}" class="px-3 hover:text-purple">{{ $category->name }}</a>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </span>
            <p class="px-3 text-purple">{{ $post->title }}</p>
        </div>
    </div>

    @php
        $user_wishlist = $post->wishlist()->where('id_user', \Illuminate\Support\Facades\Auth::id())->first(); // kiem tra xem user da thich bai viet nay chua
        $posts_wishlist = $post->wishlist()->get();
        $count_wishlist = count($posts_wishlist);
    @endphp
    <div class="grid grid-cols-12 gap-8 mt-3 md:mt-10">
        <div class="col-span-12 md:col-span-9">
            <h1 class="uppercase text-center font-light text-lg md:text-2xl">{{ $post->title }}</h1>
            <p class="text-center font-light my-6"><span class="py-5 px-10 text-sm md:text-base border-purple border-t">{{ $post->created_at->toFormattedDateString() }}</span></p>
            <div class="flex justify-end my-3">
                <div class="tooltip relative text-sm flex font-light cursor-pointer hover:text-purple">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ views($post)->count() }}
                    <span class="tooltiptext bg-purple text-white text-center px-3 py-1 rounded-lg mt-6">Lượt xem: {{ views($post)->count() }}</span>
                </div>
                <form method="POST" action="{{ route('wishlist.store', ['id_post' => $post->id, 'id_user' => \Illuminate\Support\Facades\Auth::id()]) }}">
                    @csrf
                    <div class="tooltip relative">
                        <button class="flex mx-3 text-sm cursor-pointer hover:text-purple" type="submit">
                            @if($user_wishlist)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            @endif
                            {{ $count_wishlist }}
                        </button>
                        <span class="tooltiptext text-sm bg-purple text-white text-center p-1 rounded-lg mt-1 font-light">Lượt thích: {{ $count_wishlist }}</span>
                    </div>
                </form>
            </div>

            <div class="text-sm">
                {!! $post->content !!}
            </div>

            <!-- Load Facebook SDK for JavaScript --><!-- Your share button code -->
            <div id="fb-root" class="flex justify-end">
                <div class="fb-share-button" data-href="{{ route('posts.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}" data-layout="button_count" data-size="">
                    <a target="_blank" href="#" class="fb-xfbml-parse-ignore">Chia sẻ</a>
                </div>
                <div class="ml-2">
                    <div class="fb-save" data-uri="{{ route('posts.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}" data-size="small"></div>
                </div>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-3 mb-8">
                    <div><hr class="border-purple mt-3"></div>
                    <div class="text-center uppercase text-base md:text-lg">
                        Bài viết liên quan
                    </div>
                    <div><hr class="border-purple mt-3"></div>
                </div>
                <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-10">
                    @php
                        $posts = $category->posts()->paginate(10);
                        if (count($posts) > 4){
                            $posts = $posts->random(4);
                        }
                    @endphp
                    @isset($posts)
                        @foreach($posts as $item)
                            <div class="md:mb-5 border hover:text-purple flex flex-col hover:grow hover:shadow-lg rounded-lg">
                                <div class="">
                                    <a href="{{ route('posts.show', ['category' => $item->category->slug, 'slug' => $item->slug]) }}">
                                        <img class="object-cover w-full h-52 dark:bg-gray-500 rounded-t-lg" src="{{ $item->link_image }}">
                                    </a>
                                </div>
                                <div class="bg-white p-4 mx-2">
                                    <a href="{{ route('posts.show', ['category' => $item->category->slug, 'slug' => $item->slug]) }}" class="uppercase text-sm" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">
                                        {{ $item->title }}
                                    </a>
                                    <p class="font-light text-sm mt-5">{{ $item->created_at->toFormattedDateString() }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="grid grid-cols-3 mb-16">
                    <div><hr class="border-purple mt-6 md:mt-3"></div>
                    <div class="text-center font-light text-lg md:text-xl flex flex-wrap justify-center">
                        <p>Share</p>
                        <div class="flex flex-wrap justify-center mt-1 md:ml-4">
                            <a href="#" class="w-4 h-4 mx-3 md:mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-4 h-4 mx-3 md:mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-4 h-4 mx-3 md:mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div><hr class="border-purple mt-6 md:mt-3"></div>
                </div>
                <div>
                    @comments(['model' => $post])
                </div>
            </div>
        </div>
        <div class="hidden md:block col-span-3">
            @include('client.layouts.navbar_right')
        </div>
    </div>
</div>
@endsection
