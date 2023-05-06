<div class="bg-white py-8 px-2">
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
        <nav id="store" class="w-full top-0 px-6 py-1 mb-4">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-lg md:text-xl " href="#" id="title">
                    {{ $str }}
                </a>

                <div class="flex items-center" id="store-nav-content">
                    <input id="title-post" name="title-post" class="hidden md:block border text-gray-400 my-4 outline-0 rounded-full w-96 mr-2 py-2 px-4 rounded-3" placeholder="Nhập vào từ khóa cần tìm kiếm">
                    <div class="inline-block no-underline hover:text-purple cursor-pointer" id="search-button" onclick="checkSearchMain()">
                        <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                        </svg>
                    </div>

                    <div class="pl-3 inline-block no-underline hover:text-purple cursor-pointer" wire:click="postHost">
                        <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                        </svg>
                    </div>

                    <button class="pl-3 inline-block no-underline hover:text-purple z-0" wire:click="wishlist">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </button>

                </div>
            </div>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-10 w-full overflow-y-auto scrollbar-hide max-h-43r">
            @isset($posts)
                @if(count($posts))
                    @foreach($posts as $item)
                        @if($wishlist === false)
                            @php
                                $user_wishlist = $item->wishlist()->where('id_user', \Illuminate\Support\Facades\Auth::id())->first(); // kiem tra xem user da thich bai viet nay chua
                                $posts_wishlist = $item->wishlist()->get(); // tat ca luot thich cua tat ca user
                                $count_wishlist = count($posts_wishlist); // tong so luot thich bai viet cua tat ca user
                                $check = false;
                            @endphp
                        @else
                            @php
                                $post = \App\Models\Post::query()->findOrFail($item->id_post);
                                $posts_wishlist = $post->wishlist()->get();
                                $count_wishlist = count($posts_wishlist);
                            @endphp
                        @endif
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
                                        @isset($check)
                                            @if($user_wishlist)
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                                </svg>
                                            @endif
                                        @endisset
                                        @isset($post)
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                            </svg>
                                        @endisset
                                        <p class="ml-2">{{ $count_wishlist }}</p>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="ml-6 mb-96">
                        Không tìm thấy kết quả phù hợp ...
                    </div>
                @endif
            @endisset
        </div>

    </div>
</div>


