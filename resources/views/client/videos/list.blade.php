@extends('client.layouts.master')

@section('title', 'Video - Amara Store')

@section('content')
    @php
        function kFormatter($num) {
            if (abs($num) < 999) $num = abs($num);
            else if (abs($num) > 999 && abs($num) < 1000000) $num = round((abs($num)/1000), 1) . 'K';
            else if (abs($num) > 1000000 && abs($num) < 1000000000) $num = round((abs($num)/1000000), 1) . 'Tr';
            else $num = round((abs($num)/1000000000), 1) . 'M';
            return $num;
        }
    @endphp
    <div class="mx-auto container px-3 md:px-2 mt-20">
        <div class="py-4">
            <div class="flex flex-wrap border-l-4 border-purple">
                <a href="{{ route('home') }}" class="px-3 hover:text-purple">Trang chủ</a>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
                <p class="px-3 text-purple">Video</p>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-8 mt-3 md:mt-10">
            <div class="col-span-12 md:col-span-9">
                <div>
                    <iframe class="w-full aspect-video" src="//www.youtube.com/embed/{{ $videos_main[0]->video_id }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>

                <div class="mt-10">
                    <p><span class="uppercase font-bold pb-2 color-purple border-b-2 border-purple">Danh sách phát</span></p>
                    <div class="mt-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-10" id="posts_hot">
                            @foreach($videos_list as $item)
                                @php
                                    $thumbnail = json_decode($item->thumbnail);
                                @endphp
                                <div class="md:mb-5 border hover:text-purple flex flex-col hover:grow hover:shadow-lg rounded-lg">
                                    <div class="relative">
                                        <a href="{{ route('video.show', ['slug' => $item->slug]) }}">
                                            <img class="object-cover w-full h-52 dark:bg-gray-500 rounded-t-lg" src="{{ $thumbnail->medium->url }}">
                                        </a>
                                        <div class="flex justify-center -bottom-10 py-1" style="background-color: rgba(89, 82, 46, 0.8);">
                                            <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 30px; height: 30px;">
                                                <g class="style-scope yt-icon">
                                                    <path d="M10.5,14.41V9.6l4.17,2.4L10.5,14.41z M8.48,8.45L7.77,7.75C6.68,8.83,6,10.34,6,12s0.68,3.17,1.77,4.25l0.71-0.71 C7.57,14.64,7,13.39,7,12S7.57,9.36,8.48,8.45z M16.23,7.75l-0.71,0.71C16.43,9.36,17,10.61,17,12s-0.57,2.64-1.48,3.55l0.71,0.71 C17.32,15.17,18,13.66,18,12S17.32,8.83,16.23,7.75z M5.65,5.63L4.95,4.92C3.13,6.73,2,9.24,2,12s1.13,5.27,2.95,7.08l0.71-0.71 C4.02,16.74,3,14.49,3,12S4.02,7.26,5.65,5.63z M19.05,4.92l-0.71,0.71C19.98,7.26,21,9.51,21,12s-1.02,4.74-2.65,6.37l0.71,0.71 C20.87,17.27,22,14.76,22,12S20.87,6.73,19.05,4.92z" fill="#fff">
                                                    </path>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <a href="{{ route('video.show', ['slug' => $item->slug]) }}" class="bg-white p-4 mx-2">
                                        <p class="uppercase text-sm" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">
                                            {{ $item->title }}
                                        </p>
                                        <div class="flex justify-between font-light text-sm mt-2">
                                            <div class="flex justify-between font-light text-sm mt-2">
                                                <span class="flex items-center text-sm">
                                                    {{ kFormatter($item->view_count) }} lượt xem • {{ \Carbon\Carbon::parse($item->public_at)->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <p><span class="uppercase font-bold pb-2 color-purple border-b-2 border-purple">Video</span></p>
                    <div class="mt-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-10" id="posts_hot">
                            @foreach($videos as $item)
                                @php
                                    $thumbnail = json_decode($item->thumbnail);
                                @endphp
                                <div class="md:mb-5 border hover:text-purple flex flex-col hover:grow hover:shadow-lg rounded-lg">
                                    <div class="relative">
                                        <a href="{{ route('video.show', ['slug' => $item->slug]) }}">
                                            <img class="object-cover w-full h-52 dark:bg-gray-500 rounded-t-lg" src="{{ $thumbnail->medium->url }}">
                                        </a>
                                        <p class="absolute right-0 bottom-1 bg-gray-800 text-sm text-white px-1 rounded-md">{{ $item->duration }}</p>
                                    </div>
                                    <a href="{{ route('video.show', ['slug' => $item->slug]) }}" class="bg-white p-4 mx-2">
                                        <p class="uppercase text-sm" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">
                                            {{ $item->title }}
                                        </p>
                                        <div class="flex justify-between font-light text-sm mt-2">
                                            <span class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                {{ kFormatter($item->view_count) }}
                                            </span>
                                            <span class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                                </svg>
                                                {{ kFormatter($item->like_count) }}
                                            </span>
                                            <span class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                                </svg>
                                                {{ kFormatter($item->comment_count) }}
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        {{--  Pagination  --}}
                        <div class="">
                            {{ $videos->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

            </div>
            <div class="hidden md:block col-span-3">
                @include('client.layouts.navbar_video')
            </div>
        </div>

    </div>
@endsection
