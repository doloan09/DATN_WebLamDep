@isset($playlist)
    @if(count($playlist))
        <div class="mb-10">
            <p><span class="uppercase font-bold pb-2 color-purple border-b-2 border-purple">Danh sách kết hợp</span></p>
            <div class="mt-6 border max-h-29r overflow-y-auto p-2 rounded-lg scrollbar-hide">
                <div class="flex flex-col divide-y divide-gray-700">
                    @foreach($playlist as $item)
                        @php
                            $thumbnail = json_decode($item->thumbnail);
                        @endphp
                        <a href="{{ route('video.show', ['slug' => $item->slug]) }}" class="flex px-1 py-4 relative hover:text-purple @if($item->id === $videos_main->id) @endif">
                            <img alt="" class="flex-shrink-0 object-cover h-20 mr-4 dark:bg-gray-500 rounded-md w-32 aspect-video" src="{{ $thumbnail->medium->url }}">
                            <p class="absolute bg-gray-800 text-xs text-white px-1 rounded-md">{{ $item->duration }}</p>
                            <div class="flex flex-col flex-grow">
                                <p class="font-serif" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">{{ $item->title }}</p>
                                <div class="flex justify-between font-light text-xs mt-2">
                                    <span class="flex items-center text-xs">
                                        {{ kFormatter($item->view_count) }} lượt xem • {{ \Carbon\Carbon::parse($item->public_at)->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endisset

<div class="">
    <p><span class="uppercase font-bold pb-2 color-purple border-b-2 border-purple">Video khác</span></p>
    <div class="mt-6">
        <div class="flex flex-col divide-y divide-gray-700">
            @foreach($videos_nav as $item)
                @php
                    $thumbnail = json_decode($item->thumbnail);
                @endphp
                <a href="{{ route('video.show', ['slug' => $item->slug]) }}" class="flex px-1 py-4 relative hover:text-purple">
                    <img alt="" class="flex-shrink-0 object-cover h-20 mr-4 dark:bg-gray-500 rounded-md w-32 aspect-video" src="{{ $thumbnail->medium->url }}">
                    <p class="absolute bg-gray-800 text-xs text-white px-1 rounded-md">{{ $item->duration }}</p>
                    <div class="flex flex-col flex-grow">
                        <p class="font-serif" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">{{ $item->title }}</p>
                        <div class="flex justify-between font-light mt-2">
                            <span class="flex items-center text-xs">
                                {{ kFormatter($item->view_count) }} lượt xem • {{ \Carbon\Carbon::parse($item->public_at)->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
