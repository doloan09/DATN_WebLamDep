
<div class="md:mx-16 mt-10 relative">
    <div class="-mt-16 text-4xl font-[Bitter] font-bold md:text-8xl font-bold text-center md:mt-10 md:border-b-2 md:border-solid md:pb-10">
        <a href="{{ route('home') }}">The News</a>
    </div>

    <div class="hidden md:block md:grid md:grid-cols-12 my-4 border-b-2 border-solid pb-4" id="category">
        <div class="col-span-1"></div>
        <div class="col-span-10">
            <div class="font-[Roboto] font-medium text-xl text-center">
                @php
                    $listCategory1 = $listCategory->take(13);
                @endphp
                <ul class="flex flex-wrap -mb-px">
                    @foreach($listCategory1 as $item)
                        <li class="">
                            <a href="{{ route('categories.show', $item->slug) }}" class="font-roboto inline-block p-2 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">{{ $item->name }}</a>
                        </li>
                    @endforeach
                        <div onclick="showCategory()" class="font-roboto inline-block p-2 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 cursor-pointer">Tất cả</div>
                </ul>
            </div>
        </div>
        <div class="col-span-1">
            <div class="flex float-right">
                <img src="/img/img.png">
                <p class="text-blue-500 pl-4 font-bold">E-PAPER</p>
            </div>
        </div>
    </div>
    <div id="list-category" class="absolute hidden flex-col bg-white drop-shadow-xl md:p-8 p-4 transform transition z-50 w-full">
        <div class="flex items-center justify-between mb-6">
            <span class=" text-2xl font-medium leading-6 text-gray-800 border-b-2 border-black ">Tất cả chuyên mục</span>
            <div onclick="showCategory()" class="bg-white cursor-pointer outline-none p-1 rounded-full">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M6 6L18 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
        </div>
        <div class="font-[Roboto] font-medium text-xl text-center container w-full">
            <ul class="flex flex-wrap -mb-px">
                @foreach($listCategory as $item)
                    <li class="basis-1/5">
                        <a href="{{ route('categories.show', $item->slug) }}" class="font-roboto inline-block p-2 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        var menuCategory = document.getElementById("list-category");

        function showCategory() {
            if (menuCategory.classList.contains('hidden')) {
                menuCategory.classList.remove('hidden');
            } else {
                menuCategory.classList.add('hidden');
            }
        }
    </script>
@endpush
