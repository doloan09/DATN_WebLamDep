<div class="text-center md:p-4 lg:p-8 border border-purple rounded-md">
    <p class="pb-5"><span class="uppercase py-2 text-sm lg:text-base border-b-2 border-purple">Wellcome</span></p>
    <p class="font-light md:text-sm">
        Xin chào, tôi là Lan Mít. Tôi sinh năm 1996. Blog của tôi đã được ra đời năm 2023, khi tôi quyết định dừng công việc văn phòng và theo đuổi ước mơ và sở thích của mình. Đây là nơi tôi sẽ chia sẻ với bạn trải nghiệm & cảm nhận của tôi về tất cả những thứ tôi yêu thích, học hỏi và khám phá!
    </p>
</div>
<div class="text-center md:p-4 lg:p-8 mt-10 border border-purple rounded-md">
    <p class="pb-5"><span class="uppercase py-2 text-sm lg:text-base border-b-2 border-purple">Keep in touch</span></p>
    <div class="flex flex-wrap justify-center mt-4">
        <a href="https://www.facebook.com/lanchamlam" class="w-5 h-5 mx-3 md:mb-3" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/>
            </svg>
        </a>
        <a href="https://www.tiktok.com/@amara.storee" class="w-4 h-4 mx-3 md:mb-3" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/>
            </svg>
        </a>
        <a href="https://www.youtube.com/@lanchamlam" class="w-7 h-7 mx-3 md:mb-3" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/>
            </svg>
        </a>
        <a href="https://shopee.vn/amara.storee" class="w-6 h-6 mx-3 md:mb-3" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z"/>
            </svg>
        </a>
    </div>
</div>
<div class="text-center p-4 mt-10 border border-purple rounded-md">
    {{--  fb SDK Javascript   --}}
    <div id="fb-root">
        <div class="fb-page" style="max-width: 100%;" data-href="https://www.facebook.com/lanchamlam" data-tabs="timeline, events" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/lanchamlam" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/lanchamlam">Lan Chăm Làm</a></blockquote>
        </div>
    </div>
</div>
<div class="text-center p-4 mt-10 border border-purple rounded-md">
    <p class="pb-5"><span class="uppercase py-2 text-sm lg:text-base border-b-2 border-purple">Newest Video</span></p>
    @isset($video[0])
        <div class="flex flex-wrap justify-center mt-4">
            <iframe style="max-width: 100%;" width="315" height="190" src="https://www.youtube.com/embed/{{ $video[0]->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    @endisset
</div>
<div class="mt-10">
    <p><span class="uppercase font-bold pb-2 color-purple border-b-2 border-purple">Bài viết nổi bật</span></p>
    <div class="mt-10">
        <div class="flex flex-col divide-y divide-gray-700">
            @foreach($posts_hot as $item)
                <div class="flex px-1 py-4">
                    <img alt="" class="flex-shrink-0 object-cover w-20 h-20 mr-4 dark:bg-gray-500 rounded-md" src="{{ $item->link_image }}">
                    <div class="flex flex-col flex-grow">
                        <a rel="noopener noreferrer" href="{{ route('posts.show', $item->slug) }}" class="font-serif hover:underline">{{ $item->title }}</a>
                        <p class="mt-auto text-xs dark:text-gray-400">{{ $item->created_at->toFormattedDateString() }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0&appId=3257865314487186&autoLogAppEvents=1" nonce="gYXxr7k1"></script>

@endpush
