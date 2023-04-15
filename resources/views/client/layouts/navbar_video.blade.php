<div class="">
    <p><span class="uppercase font-bold pb-2 color-purple border-b-2 border-purple">Video khác</span></p>
    <div class="mt-6">
        <div class="flex flex-col divide-y divide-gray-700">
            @foreach($videos_nav as $item)
                @php
                    $thumbnail = json_decode($item->thumbnail);
                @endphp
                <div class="flex px-1 py-4">
                    <img alt="" class="flex-shrink-0 object-cover h-20 mr-4 dark:bg-gray-500 rounded-md w-32 aspect-video" src="{{ $thumbnail->medium->url }}">
                    <div class="flex flex-col flex-grow">
                        <p class="font-serif" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">{{ $item->title }}</p>
                        <div class="flex justify-between font-light text-sm mt-2">
                            <span class="flex items-center text-sm">
                                {{ kFormatter($item->view_count) }} lượt xem
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
