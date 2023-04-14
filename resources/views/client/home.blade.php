@extends('client.layouts.master')

@section('title', 'Amara Store')

@section('content')
<div class="bg-white py-8 mt-6">
    <div class="justify-center items-center">
        <div class="2xl:mx-auto 2xl:container lg:px-20 lg:py-16 md:py-12 md:px-6 py-9 px-4 w-96 sm:w-auto">
            <div role="main" class="flex flex-col items-center justify-center">
                <h1 class="text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50">This Week Blogs</h1>
                <p class="text-base leading-normal text-center text-gray-600 dark:text-white mt-4 lg:w-1/2 md:w-10/12 w-11/12">If you're looking for random paragraphs, you've come to the right place. When a random word or a random sentence isn't quite enough</p>
            </div>
            <div class="lg:flex items-stretch md:mt-12 mt-8">
                <div class="lg:w-1/2">
                    <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6">
                        <div class="sm:w-1/2 relative">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April 2021</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                                    <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                                    <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="https://i.ibb.co/DYxtCJq/img-1.png" class="w-full" alt="chair" />
                        </div>
                        <div class="sm:w-1/2 sm:mt-0 mt-4 relative">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April 2021</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                                    <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                                    <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="https://i.ibb.co/3C5HvxC/img-2.png" class="w-full" alt="wall design" />
                        </div>
                    </div>
                    <div class="relative">
                        <div>
                            <p class="md:p-10 p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April 2021</p>
                            <div class="absolute bottom-0 left-0 md:p-10 p-6">
                                <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                                <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                                <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="https://i.ibb.co/Ms4qyXp/img-3.png" alt="sitting place" class="w-full mt-8 md:mt-6 hidden sm:block" />
                        <img class="w-full mt-4 sm:hidden" src="https://i.ibb.co/6XYbN7f/Rectangle-29.png" alt="sitting place" />
                    </div>
                </div>
                <div class="lg:w-1/2 xl:ml-8 lg:ml-4 lg:mt-0 md:mt-6 mt-4 lg:flex flex-col justify-between">
                    <div class="relative">
                        <div>
                            <p class="md:p-10 p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April 2021</p>
                            <div class="absolute bottom-0 left-0 md:p-10 p-6">
                                <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                                <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                                <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="https://i.ibb.co/6Wfjf2w/img-4.png" alt="sitting place" class="w-full sm:block hidden" />
                        <img class="w-full sm:hidden" src="https://i.ibb.co/dpXStJk/Rectangle-29.png" alt="sitting place" />
                    </div>
                    <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6 md:mt-6 mt-4">
                        <div class="relative w-full">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April 2021</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                                    <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                                    <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="https://i.ibb.co/3yvZBpm/img-5.png" class="w-full" alt="chair" />
                        </div>
                        <div class="relative w-full sm:mt-0 mt-4">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April 2021</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                                    <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                                    <a href="javascript:void(0)" class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="https://i.ibb.co/gDdnJb5/img-6.png" class="w-full" alt="wall design" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
        <section class="dark:bg-gray-800 dark:text-gray-100">
            <div class="container max-w-8xl p-6 mx-auto space-y-6 sm:space-y-12">
                <a rel="noopener noreferrer" href="#" class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12 dark:bg-gray-900">
                    <img src="https://source.unsplash.com/random/480x360" alt="" class="object-cover w-full h-64 rounded sm:h-96 lg:col-span-7 dark:bg-gray-500">
                    <div class="p-6 space-y-2 lg:col-span-5">
                        <h3 class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline">Noster tincidunt reprimique ad pro</h3>
                        <span class="text-xs dark:text-gray-400">February 19, 2021</span>
                        <p>Ei delenit sensibus liberavisse pri. Quod suscipit no nam. Est in graece fuisset, eos affert putent doctus id.</p>
                    </div>
                </a>
            </div>
        </section>
    </div>

    <section class=" dark:bg-gray-800 dark:text-gray-100">
        <div class="container p-6 mx-auto space-y-8">
            <div class="space-y-2 text-center">
                <h2 class="text-3xl font-bold">Partem reprimique an pro</h2>
                <p class="font-serif text-sm dark:text-gray-400">Qualisque erroribus usu at, duo te agam soluta mucius.</p>
            </div>
            <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                <article class="flex flex-col dark:bg-gray-900">
                    <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum">
                        <img alt="" class="object-cover w-full h-52 dark:bg-gray-500" src="https://source.unsplash.com/200x200/?fashion?1">
                    </a>
                    <div class="flex flex-col flex-1 p-6">
                        <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum"></a>
                        <a rel="noopener noreferrer" href="#" class="text-xs tracking-wider uppercase hover:underline dark:text-violet-400">Convenire</a>
                        <h3 class="flex-1 py-2 text-lg font-semibold leading-snug">Te nulla oportere reprimique his dolorum</h3>
                        <div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-400">
                            <span>June 1, 2020</span>
                            <span>2.1K views</span>
                        </div>
                    </div>
                </article>
                <article class="flex flex-col dark:bg-gray-900">
                    <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum">
                        <img alt="" class="object-cover w-full h-52 dark:bg-gray-500" src="https://source.unsplash.com/200x200/?fashion?2">
                    </a>
                    <div class="flex flex-col flex-1 p-6">
                        <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum"></a>
                        <a rel="noopener noreferrer" href="#" class="text-xs tracking-wider uppercase hover:underline dark:text-violet-400">Convenire</a>
                        <h3 class="flex-1 py-2 text-lg font-semibold leading-snug">Te nulla oportere reprimique his dolorum</h3>
                        <div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-400">
                            <span>June 2, 2020</span>
                            <span>2.2K views</span>
                        </div>
                    </div>
                </article>
                <article class="flex flex-col dark:bg-gray-900">
                    <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum">
                        <img alt="" class="object-cover w-full h-52 dark:bg-gray-500" src="https://source.unsplash.com/200x200/?fashion?3">
                    </a>
                    <div class="flex flex-col flex-1 p-6">
                        <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum"></a>
                        <a rel="noopener noreferrer" href="#" class="text-xs tracking-wider uppercase hover:underline dark:text-violet-400">Convenire</a>
                        <h3 class="flex-1 py-2 text-lg font-semibold leading-snug">Te nulla oportere reprimique his dolorum</h3>
                        <div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-400">
                            <span>June 3, 2020</span>
                            <span>2.3K views</span>
                        </div>
                    </div>
                </article>
                <article class="flex flex-col dark:bg-gray-900">
                    <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum">
                        <img alt="" class="object-cover w-full h-52 dark:bg-gray-500" src="https://source.unsplash.com/200x200/?fashion?4">
                    </a>
                    <div class="flex flex-col flex-1 p-6">
                        <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum"></a>
                        <a rel="noopener noreferrer" href="#" class="text-xs tracking-wider uppercase hover:underline dark:text-violet-400">Convenire</a>
                        <h3 class="flex-1 py-2 text-lg font-semibold leading-snug">Te nulla oportere reprimique his dolorum</h3>
                        <div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-400">
                            <span>June 4, 2020</span>
                            <span>2.4K views</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="p-4 lg:p-8 dark:bg-gray-800 dark:text-gray-100 mt-20">
        <div class="container mx-auto space-y-12">
            <div class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
                <img src="https://source.unsplash.com/640x480/?1" alt="" class="h-80 dark:bg-gray-500 aspect-video">
                <div class="flex flex-col justify-center flex-1 p-6 dark:bg-gray-900">
                    <span class="text-xs uppercase dark:text-gray-400">Join, it's free</span>
                    <h3 class="text-3xl font-bold">We're not reinventing the wheel</h3>
                    <p class="my-6 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor aliquam possimus quas, error esse quos.</p>
                    <button type="button" class="self-start">Action</button>
                </div>
            </div>
            <div class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row-reverse">
                <img src="https://source.unsplash.com/640x480/?2" alt="" class="h-80 dark:bg-gray-500 aspect-video">
                <div class="flex flex-col justify-center flex-1 p-6 dark:bg-gray-900">
                    <span class="text-xs uppercase dark:text-gray-400">Join, it's free</span>
                    <h3 class="text-3xl font-bold">We're not reinventing the wheel</h3>
                    <p class="my-6 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor aliquam possimus quas, error esse quos.</p>
                    <button type="button" class="self-start">Action</button>
                </div>
            </div>
            <div class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
                <img src="https://source.unsplash.com/640x480/?3" alt="" class="h-80 dark:bg-gray-500 aspect-video">
                <div class="flex flex-col justify-center flex-1 p-6 dark:bg-gray-900">
                    <span class="text-xs uppercase dark:text-gray-400">Join, it's free</span>
                    <h3 class="text-3xl font-bold">We're not reinventing the wheel</h3>
                    <p class="my-6 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor aliquam possimus quas, error esse quos.</p>
                    <button type="button" class="self-start">Action</button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-6 dark:bg-gray-800">
        <div class="container flex flex-col justify-center p-4 mx-auto">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 sm:grid-cols-2">
                <img class="object-cover w-full dark:bg-gray-500 aspect-square" src="https://source.unsplash.com/random/300x300/?1">
                <img class="object-cover w-full dark:bg-gray-500 aspect-square" src="https://source.unsplash.com/random/300x300/?2">
                <img class="object-cover w-full dark:bg-gray-500 aspect-square" src="https://source.unsplash.com/random/300x300/?3">
                <img class="object-cover w-full dark:bg-gray-500 aspect-square" src="https://source.unsplash.com/random/300x300/?4">
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
    <script>

    </script>
@endpush
