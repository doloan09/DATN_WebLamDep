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
    <div class="mx-auto container px-3 md:px-2 mt-20 md:mt-28 lg:mt-20">
        <div class="py-4">
            <div class="flex flex-wrap border-l-4 border-purple">
                <a href="{{ route('home') }}" class="px-3 hover:text-purple">Trang chủ</a>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
                <a href="{{ route('video.list') }}" class="px-3">Video</a>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
                <p class="text-purple px-3">{{ $videos_main->title }}</p>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-8 mt-3 md:mt-10">
            <div class="col-span-12 md:col-span-9">
                <div>
                    <iframe class="w-full aspect-video" src="//www.youtube.com/embed/{{ $videos_main->video_id }}?rel=0&autoplay=1" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="bg-white my-4">
                    <p class="font-medium text-xl md:text-2xl" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">
                        {{ $videos_main->title }}
                    </p>
                    <div class="flex justify-between mt-3">
                        @php
                            $thumbnail = json_decode($videos_main->thumbnail);
                        @endphp
                        <div class="flex">
                            <img src="{{ $thumbnail->medium->url }}" class="w-10 h-10 md:w-12 md:h-12 rounded-full">
                            <a href="{{ 'https://www.youtube.com/channel/' . $videos_main->channel_id }}" target="_blank" class="mx-3 md:mt-2 font-bold text-base md:text-xl">{{ $videos_main->channel_title }}</a>
                        </div>
                        <div class="flex justify-between font-light text-sm md:text-base mt-2">
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                {{ kFormatter($videos_main->view_count) }}
                            </span>
                            <span class="flex items-center mx-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                </svg>
                                {{ kFormatter($videos_main->like_count) }}
                            </span>
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                {{ kFormatter($videos_main->comment_count) }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-4 bg-gray-100 hover:bg-gray-200 rounded-xl p-4 cursor-pointer">
                        <p class="font-bold">{{ kFormatter($videos_main->view_count) }} lượt xem • {{ \Carbon\Carbon::parse($videos_main->public_at)->diffForHumans() }}</p>
                        <p onclick="showDescription()" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden;" id="p-description">{{ $videos_main->description }}</p>
                        <p class="font-bold text-right text-sm" style="display: none;" onclick="hideDescription()" id="text-hide">Ẩn bớt</p>
                    </div>
                    @php
                        $list_comment = \Alaouy\Youtube\Facades\Youtube::getCommentThreadsByVideoId($videos_main->video_id);
                    @endphp
                    <div class="p-4 mt-4 border-b">
                        <p class="font-medium text-lg md:text-xl">{{ count($list_comment) }} bình luận</p>
                    </div>
                    <div class="mt-6">
                        @foreach($list_comment as $item)
                            <div class="flex mb-4 hover:bg-gray-100 rounded-xl cursor-pointer p-3">
                                <img src="{{ $item->snippet->topLevelComment->snippet->authorProfileImageUrl }}" class="w-12 h-12 rounded-full">
                                <div class="ml-4">
                                    <p class="font-medium">{{ $item->snippet->topLevelComment->snippet->authorDisplayName }}</p>
                                    <p onclick="showCmt({{ "'". $item->id . "'"}})" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden;" id="cmt-{{ $item->id }}">{!! $item->snippet->topLevelComment->snippet->textDisplay !!}</p>
                                    <p class="font-bold text-right text-sm mt-2" style="display: none;" onclick="hideCmt({{"'" . $item->id . "'"}})" id="cmt-hide-{{ $item->id }}">Ẩn bớt</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="hidden md:block col-span-3">
                @include('client.layouts.navbar_video')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function showDescription(){
            document.getElementById('p-description').style.display = 'block';
            document.getElementById('text-hide').style.display = 'block';
        }
        function hideDescription(){
            document.getElementById('p-description').style.display = '-webkit-box';
            document.getElementById('text-hide').style.display = 'none';
        }

        function showCmt(id){
            document.getElementById('cmt-' + id).style.display = 'block';
            document.getElementById('cmt-hide-' + id).style.display = 'block';
        }

        function hideCmt(id){
            document.getElementById('cmt-' + id).style.display = '-webkit-box';
            document.getElementById('cmt-hide-' + id).style.display = 'none';
        }

    </script>
@endpush
