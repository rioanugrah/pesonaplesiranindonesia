<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="-agNXAZvJ7uHctHQlEr7t7q9VoOHxdpZJIDOv9womR4" />
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/logo/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="title" content="@yield('title')">
    <meta name="description" content="@yield('description')">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:standard">
    <meta name="theme-color" content="#ff7b00">
    <meta name="keywords" content="@yield('keywords')">

    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('url')">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:locale:alternate" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:image" content="{{ asset('frontend/assets/img/logo/logo_plesiran_black.webp') }}">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="@yield('url')">
    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:description" content="@yield('description')">
    <meta property="twitter:image" content="{{ asset('frontend/assets/img/logo/logo_plesiran_black.webp') }}">

    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/animate.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/datepickerboot.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/color.css">
    <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/main.css">

    <title>@yield('title')</title>
    @yield('css')
</head>

<body>
    <button id="back-top" class="back-to-top">
        <i class="fa-regular fa-arrow-up"></i>
    </button>

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    @include('layouts.frontend.header')

    @yield('content')

    @include('layouts.frontend.footer')

    <script src="{{ asset('frontend/') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/viewport.jquery.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/jquery.waypoints.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/jquery.meanmenu.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/js/main.js"></script>
    @yield('js')
</body>

</html>
