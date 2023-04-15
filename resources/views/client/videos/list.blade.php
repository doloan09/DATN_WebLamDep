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
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-10" id="posts_hot">
                            @foreach($videos as $item)
                                @php
                                    $thumbnail = json_decode($item->thumbnail);
                                @endphp
                                <div class="md:mb-5 border hover:text-purple flex flex-col hover:grow hover:shadow-lg rounded-lg">
                                    <div class="">
                                        <a href="#">
                                            <img class="object-cover w-full h-52 dark:bg-gray-500 rounded-t-lg" src="{{ $thumbnail->medium->url }}">
                                        </a>
                                    </div>
                                    <div class="bg-white p-4 mx-2">
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
                                    </div>
                                </div>
                            @endforeach
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
