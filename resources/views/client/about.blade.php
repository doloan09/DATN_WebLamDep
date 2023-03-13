@extends('client.layouts.master')

@section('title', 'Giới thiệu - Amara Store')

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
                <p class="px-3 text-purple">Giới thiệu</p>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-8 mt-3 md:mt-10">
            <div class="col-span-12 md:col-span-9">
                <div class="mb-20">
                    <img src="https://res.cloudinary.com/dsh5japr1/image/upload/v1677574622/Logo/lanmit_pin65c.jpg" class="">
                    <div class="mt-6">
                        <p>Mình là Lan Mít, sinh năm 1996, cung Thiên Bình tại Hà Nội.
                        Mình lập blog Amara Store từ tháng 2 năm 2023. <b>Amara Store</b> là nơi mình chia sẻ tất cả những trải nghiệm của mình về làm đẹp, phong cách sống, những gì mình yêu thích, học hỏi và tạo nên mình của ngày hôm nay.
                        </p>

                        <p class="mt-4">
                            Tốt nghiệp ngành Kỹ Thuật Xây Dựng của trường Đại học Giao Thông Vận Tải nhưng sau khi ra trường mình lại cảm thấy đam mê dành cho việc viết lách, chia sẻ nhiều hơn nên đã lựa chọn theo đuôi con đường này. Mình cảm thấy rất hạnh phúc khi được làm công việc mình yêu thích, được chia sẻ với các bạn thật nhiều điều. Hy vọng các bạn có thể tìm thấy những điều thú vị tại đây và mình sẽ rất vui nếu bạn thường xuyên trò chuyện với mình bằng cách comment trong mỗi bài viết, video đấy nhé!
                        </p>
                        <p class="mt-4">
                            Cám ơn các bạn rất nhiều vì đã đọc những dòng chia sẻ này !
                        </p>
                        <p class="mt-5">Love,</p>
                        <p class="mt-5">Lan Mít</p>
                    </div>
                </div>
            </div>
            <div class="hidden md:block col-span-3">
                @include('client.layouts.navbar_right')
            </div>
        </div>
    </div>
@endsection
