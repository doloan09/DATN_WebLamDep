@extends('client.layouts.master')

@section('title', 'Video - Amara Store')

@section('content')
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

    </div>
@endsection
