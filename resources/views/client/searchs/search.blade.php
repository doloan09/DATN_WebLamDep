@extends('client.layouts.master')

@section('title', 'Tìm kiếm - Amara Store')

@section('content')
    <div class="carousel relative container mx-auto -mt-60" style="max-width:1600px;">
        <div class="carousel-inner relative overflow-hidden w-full">
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('https://images.unsplash.com/photo-1533090161767-e6ffed986c88?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjM0MTM2fQ&auto=format&fit=crop&w=1600&q=80');">
                </div>
            </div>
        </div>
    </div>

    <livewire:search :posts="$posts"/>

@endsection

@push('scripts')
    <script>
        var title = '{{ isset($_GET['title']) }}';

        checkSearch();

        function checkSearch(){
            if (location.pathname === '/trang-chu/search' && title){
                $('#title').text('Kết quả tìm kiếm');
            }
        }

        function checkSearchMain(){
            title = $('#title-post').val();
            if (title) {
                window.location.assign('{{ route('search') }}' + '?title=' + title);
            }else {
                alert('Vui lòng nhập từ khóa cần tìm kiếm!');
                $('#title-post').focus();
            }
        }

        $('#title-post').keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode === 13) {
                checkSearchMain();
            }
        });


    </script>
@endpush
