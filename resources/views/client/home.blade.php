@extends('client.layouts.master')

@section('title', 'Amara Store')

@section('content')
    <div class="mx-auto container">
        <div class="inline-flex my-4 w-full -z-10" id="owl-theme-new">
            @for ($i = 0; $i<10; $i++)
                <img src="https://img.ws.mms.shopee.vn/a5e5844928940945a3144400c8117c2b" class="w-full max-w-full hover:brightness-90 z-0" style="max-height: 600px;">
            @endfor
        </div>

        {{--    content--}}
        <div class="my-6 px-3">
            <div class="mb-6 md:mb-10 pb-10 md:pb-16 border-b border-purple border-dashed">
                <div class="font-sans uppercase text-lg md:text-2xl text-center mb-10 md:mb-20 font-medium text-purple">
                    <span class="border-b-2 border-purple">Bài viết nổi bật</span>
                </div>
                <div class="flex grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                    @foreach($posts_hot as $item)
                        <a href="{{ route('posts.show', $item->slug) }}" class="grid grid-cols-3 hover:text-purple">
                            <div class="col-span-1">
                                <img src="{{ $item->link_image }}" class="max-h-64 w-4/5">
                            </div>
                            <div class="col-span-2">
                                <span class="font-light text-base md:text-xl uppercase border-b border-purple">{{ $item->title }}</span>
                                <p class="text-sm flex mt-2 md:mt-5 font-light">
                                    {{ $item->created_at->toFormattedDateString() }}
                                </p>
                                <p class="text-sm md:text-base mt-3 font-light" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden;">{{ $item->description }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            @foreach($categories as $item)
                @php
                    $posts_item = $item->posts()->limit(4)->get();
                    $count = count($posts_item);
                @endphp
                @if($count > 0)
                    <div class="mb-6 md:mb-10 pb-10 md:pb-16 border-b border-purple border-dashed">
                        <div class="font-sans uppercase text-lg md:text-2xl text-center font-medium mb-10 md:mb-20 text-purple">
                            <a href="{{ route('categories.show', $item->slug) }}"><span class="border-b-2 border-purple">{{ $item->name }}</span></a>
                        </div>
                        <div class="flex grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 mt-10">
                            @foreach($posts_item as $i)
                                <a href="{{ route('posts.show', $i->slug) }}" class="grid grid-cols-3 hover:text-purple">
                                    <div class="col-span-1">
                                        <img src="{{ $i->link_image }}" class="max-h-64 w-4/5">
                                    </div>
                                    <div class="col-span-2">
                                        <span class="font-light text-base md:text-xl uppercase border-b border-purple">{{ $i->title }}</span>
                                        <p class="text-sm flex mt-2 md:mt-5 font-light">
                                            {{ $i->created_at->toFormattedDateString() }}
                                        </p>
                                        <p class="text-sm md:text-base mt-3 font-light" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden;">{{ $i->description }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
