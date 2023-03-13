<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The latest news in the world and in the country">
    <meta name="keywords" content="News of the week">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <title>@yield('title')</title>
    <link rel="canonical" href="http://weblamdep-lan.com/home">
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.2/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.min.js"></script>

</head>
<body>
@include('client.layouts.header')

@yield('content')

@stack('scripts')

@include('client.layouts.footer')
