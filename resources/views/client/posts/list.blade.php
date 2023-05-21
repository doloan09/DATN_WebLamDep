@extends('client.layouts.master')

@section('title', $category->name . ' - Amara Store')

@section('content')
    <div class="mx-auto container px-3 md:px-2 mt-20 md:mt-28 lg:mt-20">
        <div class="py-4">
            <div class="flex flex-wrap border-l-4 border-purple">
                <a href="{{ route('home') }}" class="px-3 hover:text-purple">Trang chủ</a>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
                <p class="px-3 text-purple">{{ $category->name }}</p>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-8 mt-3 md:mt-10">
            <div class="col-span-12 md:col-span-9">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-20">
                    @isset($posts)
                        @if(count($posts) > 0)
                            @foreach($posts as $item)
                                @php
                                    $user_wishlist = $item->wishlist()->where('id_user', \Illuminate\Support\Facades\Auth::id())->first(); // kiem tra xem user da thich bai viet nay chua
                                    $posts_wishlist = $item->wishlist()->get(); // tat ca luot thich cua tat ca user
                                    $count_wishlist = count($posts_wishlist); // tong so luot thich bai viet cua tat ca user
                                @endphp
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
                        @else
                            <p class="text-sm">Chưa có bài viết nào ... </p>
                        @endif
                    @endisset
                </div>
                {{--        Pagination    --}}
                <div class="mt-10 my-10">
                    {{ $posts->links('pagination::tailwind') }}
                </div>
            </div>
            <div class="hidden md:block col-span-3">
                @include('client.layouts.navbar_right')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        check();
        function check(){
            if ('{{ session('wishlist_err') }}'){
                alert('{{ session('wishlist_err') }}');
            }
        }
    </script>
@endpush
