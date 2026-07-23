<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="-agNXAZvJ7uHctHQlEr7t7q9VoOHxdpZJIDOv9womR4" />
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/logo/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
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

    <!-- Font -->
    <link rel="stylesheet" href="{{ asset('fe/') }}/fonts/fonts.css">
    <link rel="stylesheet" href="{{ asset('fe/') }}/fonts/font-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('fe/') }}/css/boostrap.css">
    <link rel="stylesheet" href="{{ asset('fe/') }}/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('fe/') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('fe/') }}/css/nouislider.min.css">
    <link rel="stylesheet" href="{{ asset('fe/') }}/css/fancybox.css">
    <link rel="stylesheet" href="{{ asset('fe/') }}/css/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/logo/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/assets/img/logo/logo_plesiran_black.webp') }}">
    @yield('css')
</head>
<body>
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
            <img src="{{ asset('fe/') }}/images/logo/destination.png" alt="logo-loading">
        </div>
    </div>

    @include('layouts.V2.frontend.header2')

    @yield('content')

    @include('layouts.V2.frontend.footer')

    <!-- Back To Top -->
    <button class="backtotop" id="backtotop">
        <span class="border-progress"></span>
        <span class="icon icon-arrow-up"></span>
    </button>
    <!-- End Back To Top -->
    
    <!-- Javascript -->
    <script src="{{ asset('fe/') }}/js/jquery.min.js"></script>
    <script src="{{ asset('fe/') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('fe/') }}/js/swiper-bundle.min.js"></script>
    <script src="{{ asset('fe/') }}/js/swiper.js"></script>
    
    <script src="{{ asset('fe/') }}/js/wow.min.js"></script>
    <script src="{{ asset('fe/') }}/js/nouislider.min.js"></script>
    <script src="{{ asset('fe/') }}/js/wNumb.min.js"></script>
    <script src="{{ asset('fe/') }}/js/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {});
    </script>
    <script src="{{ asset('fe/') }}/js/main.js"></script>
    @yield('js')
</body>
</html>