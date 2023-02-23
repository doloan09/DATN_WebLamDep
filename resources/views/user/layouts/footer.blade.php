<div class="text-white text-center text-sm" style="background-color: rgb(114 63 95);">
    <div class="py-6">
        © 2023
        <a href="{{ route('home') }}" title="AMARASTORE ">Amara Store </a> • Theme by <a class="credit" href="#" target="_blank">LanMit.</a>
    </div>
</div>

<div id="search" class="container mx-auto z-50" style="display: none;">
    <div class="w-full">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity ease-out duration-300" aria-hidden="true" onclick="$('#search').hide();"></div>
        <div class="inline-block sm:max-w-max absolute" style="top: 20%; width: 100%; ">
            <div class="flex justify-center py-4 text-white" onclick="$('#search').hide();">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                </svg>
            </div>
            <div class="w-full bg-white">
                <div class="w-10/12 mx-auto container">
                    <div class="flex justify-center items-center">
                        <input class="border text-gray-400 my-4 outline-0 rounded-full w-full mr-4 py-2 px-4 rounded-3" placeholder="Nhập vào từ khóa cần tìm kiếm">
                        <a class="search-button" href="https://pinchofyum.com/?s=">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </a>
                    </div>
                    <div class="mt-6">
                        <a href="#">
                            <span class="font-sans uppercase text-lg" style="color: rgb(114 63 95);">Danh sách yêu thích</span>
                        </a>
                        <div class="inline-flex mt-4 my-4 w-full" id="owl-theme-favorites">
                            @for ($i = 0; $i<10; $i++)
                                <div class="flex-shrink-0 rounded-lg mx-2 md:mx-3">
                                    <a href="#">
                                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgwHAu1fPbK5eBWwVvIXxFwic9G8-6JGQ6N-iSmxN39iJksbe-6d9g75u6u1w3lkd6dr59mhzg9b0ceb6TebSG-U4SHEhKMjBEJAgtgH_5g2rWLj6HJfPdeR2IUx9Q1BRY-W0YavpIS-pDhL2BzSACwsOjiZdQKkSBdbdFx0Is8bz28R93ews9mTDs2/w800-h800-p-k-no-nu/Minh%20da%20vuot%20qua%20kho%20khan%20tam%20ly%20nhu%20the%20nao.JPG" class="rounded-xl w-full h-48 md:h-56 hover:brightness-90">  {{--h-40 md:h-48--}}
                                        <div class="bg-white font-light text-base mt-3 relative">
                                            <a href="#" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">How to make cold brew. How to make cold brew. How to make cold brew</a>
                                            <div class="absolute bg-white pl-3 py-3 rounded-tl-2xl flex" style="top: -40px; right: 0px; color: rgb(114 63 95);">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                                </svg>
                                                <p class="ml-2">112</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="#">
                            <span class="font-sans uppercase text-lg" style="color: rgb(114 63 95);">Sức khỏe</span>
                        </a>
                        <div class="inline-flex mt-4 my-4 w-full" id="owl-theme-suc-khoe">
                            @for ($i = 0; $i<10; $i++)
                                <div class="flex-shrink-0 rounded-lg mx-2 md:mx-3">
                                    <a href="#">
                                        <img src="https://c06f.app.slickstream.com/p/pageimg/L8EAVD26/102416?site=L8EAVD26&epoch=1676926521369" class="rounded-xl w-full h-48 md:h-56 hover:brightness-90">  {{--h-40 md:h-48--}}
                                        <div class="bg-white font-light text-base mt-3 relative">
                                            <a href="#" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">How to make cold brew. How to make cold brew. How to make cold brew</a>
                                            <div class="absolute bg-white pl-3 py-3 rounded-tl-2xl flex" style="top: -40px; right: 0px; color: rgb(114 63 95);">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                                </svg>
                                                <p class="ml-2">112</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="#">
                            <span class="font-sans uppercase text-lg" style="color: rgb(114 63 95);">Làm đẹp</span>
                        </a>
                        <div class="inline-flex mt-4 my-4 w-full" id="owl-theme-lam-dep">
                            @for ($i = 0; $i<10; $i++)
                                <div class="flex-shrink-0 rounded-lg mx-2 md:mx-3">
                                    <a href="#">
                                        <img src="https://c06f.app.slickstream.com/p/pageimg/L8EAVD26/740?site=L8EAVD26&epoch=1676926521369" class="rounded-xl w-full h-48 md:h-56 hover:brightness-90">  {{--h-40 md:h-48--}}
                                        <div class="bg-white font-light text-base mt-3 relative">
                                            <a href="#" style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">How to make cold brew. How to make cold brew. How to make cold brew</a>
                                            <div class="absolute bg-white pl-3 py-3 rounded-tl-2xl flex" style="top: -40px; right: 0px; color: rgb(114 63 95);">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" fill="#723F5FFF"/>
                                                </svg>
                                                <p class="ml-2">112</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#burgerBtn" ).click(function() {
        $( "#menu" ).toggle( "slow" );
    });

    const slick = {
        prevArrow: false,
        nextArrow: false,
        respondTo: 'slider',
        autoplaySpeed: 1000,
        // autoplay: true,
        loop: true,
        slidesToShow: 7,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 6
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 640,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 320,
            settings: {
                slidesToShow: 1
            }
        }]
    };

    // $("#burgerBtn" ).click(function() {
    //     $( "#menu" ).toggle( "slow" );
    // });

    function showSearch(){
        // $('#search').show();
        $( "#search" ).toggle( "slow");

        $(document).ready(function () {
            $('#owl-theme-favorites').slick(slick);

            $('#owl-theme-suc-khoe').slick(slick);

            $('#owl-theme-lam-dep').slick(slick);
        });
    }
</script>

<script>
    $(document).ready(function () {
        $('#owl-theme-new').slick(slick_new);

    });

    const slick_new = {
        prevArrow: false,
        nextArrow: false,
        respondTo: 'slider',
        autoplaySpeed: 1000,
        // autoplay: true,
        loop: true,
        slidesToShow: 1,
        responsive: []
    };
</script>

</body>
</html>



