@extends('layouts.frontend.app')
@section('title')
    Pesona Plesiran Indonesia
@endsection
@section('description')
    Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi
    dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.
@endsection
@section('keywords')
    tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia,
    pesona indonesia
@endsection
@section('canonical')
    {{ url('/') }}
@endsection
@section('url')
    {{ url('/') }}
@endsection

@php
    $destinations = [
        // [
        //     'id' => 1,
        //     'title' => 'Open Trip Bromo High Season',
        //     'location' => 'Indonesia',
        //     'duration' => '1 Days',
        //     'quantity' => '50',
        //     'price' => '50000',
        // ],
        // [
        //     'id' => 2,
        //     'title' => 'Private Trip Bromo',
        //     'location' => 'Indonesia',
        //     'duration' => '1 Days',
        //     'quantity' => '50',
        //     'price' => '50000',
        // ],
        // [
        //     'id' => 3,
        //     'title' => 'Open Trip Bromo',
        //     'location' => 'Indonesia',
        //     'duration' => '1 Days',
        //     'quantity' => '50',
        //     'price' => '50000',
        // ],
    ];
@endphp

@section('content')
    <section class="hero-section">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-1">
                        <div class="hero-bg bg-cover"
                            style="background-image: url({{ asset('frontend/') }}/assets/img/slider/02.jpg);"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="hero-content">
                                        <div class="sub-title">
                                            Dapatkan kesenangan tak terlupakan bersama kami
                                        </div>
                                        <h1>
                                            Mari kita buat perjalanan terbaik Anda bersama kami
                                        </h1>
                                        {{-- <div class="booking-list-area">
                                            <div class="booking-list">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/') }}/assets/img/hero/icon-1.png"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Lokasi</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option>Indonesia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/') }}/assets/img/hero/icon-2.png"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Durasi</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option>1 Day</option>
                                                            <option>2 Day</option>
                                                            <option>3 Day</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/') }}/assets/img/hero/icon-3.png"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Tanggal Berangkat</h6>
                                                    <div class="form-clt">
                                                        <input type="date" id="date1" name="date1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-list">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/') }}/assets/img/hero/icon-3.png"
                                                        alt="img">
                                                </div>
                                                <div class="content">
                                                    <h6>Traveler</h6>
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            @for ($i = 1; $i <= 7; $i++)
                                                            <option>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="theme-btn" type="submit">Search</button>
                                        </div> --}}
                                        <div class="counter-area">
                                            <div class="counter-items">
                                                <div class="counter-text">
                                                    <h2><span class="count">5</span>+</h2>
                                                    <p>Tahun Berpengalaman</p>
                                                </div>
                                                <div class="counter-text">
                                                    <h2><span class="count">3</span>+ k</h2>
                                                    <p>Selesai Perjalanan</p>
                                                </div>
                                                <div class="counter-text">
                                                    <h2><span class="count">3</span>+ k</h2>
                                                    <p>Perjalanan Menyenangkan</p>
                                                </div>
                                                <div class="counter-text">
                                                    <h2><span class="count">99</span>%</h2>
                                                    <p>Tingkat Retensi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".4s">
                    <div class="feature-card-items">
                        <div class="icon bg-color">
                            <img src="{{ asset('frontend/') }}/assets/img/icon/02.svg" alt="img">
                        </div>
                        <div class="content">
                            <h3>
                                Best Guide
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".6s">
                    <div class="feature-card-items">
                        <div class="icon">
                            <img src="{{ asset('frontend/') }}/assets/img/icon/03.svg" alt="img">
                        </div>
                        <div class="content">
                            <h3>
                                24/7 Support
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".8s">
                    <div class="feature-card-items">
                        <div class="icon">
                            <img src="{{ asset('frontend/') }}/assets/img/icon/04.svg" alt="img">
                        </div>
                        <div class="content">
                            <h3>
                                Travel Management
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="destination-category-section section-padding pt-0">
        <div class="plane-shape float-bob-y">
            <img src="{{ asset('frontend/') }}/assets/img/destination/shape.png" alt="img">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title wow fadeInUp">Tempat yang Indah Untukmu</span>
                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">
                    Telusuri Berdasarkan Kategori Tujuan
                </h2>
            </div>
        </div>
        <div class="container-fluid">

            <div class="swiper category-slider">
                <div class="swiper-wrapper">
                    @foreach ($kategoriTujuans as $kategoriTujuan)
                    <div class="swiper-slide">
                        <div class="destination-category-item">
                            <div class="category-image">
                                <img src="{{ $kategoriTujuan['image'] }}">
                                <div class="category-content">
                                    <h5>
                                        <a href="destination-details.html">{{ $kategoriTujuan['title'] }}</a>
                                    </h5>
                                    <p>{{ $kategoriTujuan['tour'] }} Tour</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-dot4 mt-5">
                <div class="dot"></div>
            </div>
        </div>
    </section>

    <section class="about-section section-padding fix bg-cover mb-4"
        style="background-image: url({{ asset('frontend/') }}/assets/img/about/about-bg.jpg);">
        <div class="container">
            <div class="about-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="about-image">
                            <img src="{{ asset('frontend/') }}/assets/img/about/01.png"
                                class="wow img-custom-anim-left">
                            <div class="border-image">
                                <img src="{{ asset('frontend/') }}/assets/img/about/border.png" alt="">
                            </div>
                            <div class="vdeo-item">
                                <a href="https://www.tiktok.com/@pesonaplesiranindonesia/video/7477341065142553911?lang=en" class="video-btn video-popup">
                                    <i class="fa-duotone fa-play"></i>
                                </a>
                                <h5>WACTH VIDEO </h5>
                            </div>
                            <div class="about-image-2">
                                <img src="{{ asset('frontend/') }}/assets/img/about/02.png"
                                    class="wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.3s">
                                <div class="plane-shape float-bob-y">
                                    <img src="{{ asset('frontend/') }}/assets/img/about/plane-shape.png" alt="">
                                </div>
                                <div class="about-tour">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/') }}/assets/img/icon/10.svg" alt="img">
                                    </div>
                                    <div class="content">
                                        <span>5+ Tahun Pengalaman</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title">
                                <span class="sub-title wow fadeInUp">Ayo Kita Pergi Bersama</span>
                                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">
                                    Peluang besar untuk <br>
                                    petualangan & perjalanan
                                </h2>
                                <p class="wow fadeInUp wow" data-wow-delay=".3s">Mulailah petualangan impian Anda di sini! Alat perencanaan perjalanan yang intuitif ini dirancang untuk menyederhanakan setiap langkah perjalanan Anda.</p>
                            </div>
                            <div class="about-area mt-4 mt-md-0">
                                <div class="line-image">
                                    <img src="{{ asset('frontend/') }}/assets/img/about/Line-image.png" alt="img">
                                </div>
                                <div class="about-items wow fadeInUp wow" data-wow-delay=".3s">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/') }}/assets/img/icon/05.svg" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Perjalanan Eksklusif
                                        </h5>
                                    </div>
                                </div>
                                <div class="about-items wow fadeInUp wow" data-wow-delay=".5s">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/') }}/assets/img/icon/06.svg" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Keselamatan selalu yang utama
                                        </h5>
                                    </div>
                                </div>
                                <div class="about-items wow fadeInUp wow" data-wow-delay=".7s">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/') }}/assets/img/icon/07.svg" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Panduan Profesional
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section section-padding fix bg-cover">
        <div class="bag-shape float-bob-x">
            <img src="{{ asset('frontend/') }}/assets/img/testimonial/bag-shape.png" alt="img">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title wow fadeInUp">
                    Testimoni
                </span>
                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">
                    Umpan Balik Klien Kami
                </h2>
            </div>
            <div class="testimonial-wrapper">
                <div class="swiper testimonial-slider">
                    <div class="swiper-wrapper">
                        @foreach ($testimonis as $testimoni)
                        <div class="swiper-slide">
                            <div class="testimonial-card-items">
                                <div class="star">
                                    @for ($i = 1; $i <= $testimoni['rating']; $i++)
                                    <i class="fas fa-star"></i>
                                    @endfor
                                    {{-- <i class="fa-regular fa-star"></i> --}}
                                </div>
                                <p>
                                    {{ $testimoni['description'] }}
                                </p>
                                <div class="client-info-items">
                                    <div class="client-info">
                                        <div class="client-image">
                                            <img src="{{ asset('frontend/assets/img/testimonial/boy.png') }}" width="50">
                                        </div>
                                        <div class="text">
                                            <h4>{{ $testimoni['name'] }}</h4>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                            viewBox="0 0 45 45" fill="none">
                                            <path
                                                d="M21.5998 15.1662C21.4359 21.2706 20.2326 27.1028 17.1618 32.4687C15.0391 36.1766 11.8636 38.7708 8.31789 40.9881C8.09312 41.1284 7.80413 41.3886 7.55907 41.1588C7.2836 40.9002 7.52189 40.5673 7.66216 40.3087C8.9449 37.9646 10.3121 35.6645 11.4292 33.2309C12.6528 30.564 13.6212 27.811 14.2567 24.9396C14.4257 24.1774 14.255 24.0929 13.535 24.2484C7.64188 25.526 2.16112 21.8976 1.00852 15.9858C-0.0849304 10.38 3.84608 4.78603 9.51275 3.88694C15.9196 2.86954 21.5491 7.65063 21.5998 14.1522C21.6015 14.4902 21.5998 14.8282 21.5998 15.1662Z"
                                                fill="#FFA31A" />
                                            <path
                                                d="M44.25 15.2202C44.0793 21.5916 42.7949 27.6571 39.3912 33.1581C37.3175 36.5077 34.3228 38.8501 31.0746 40.9288C30.816 41.0945 30.4729 41.4375 30.1856 41.1198C29.9253 40.8325 30.2346 40.4877 30.3884 40.1987C31.6559 37.8462 33.0401 35.5562 34.1403 33.1142C35.3351 30.4642 36.2917 27.7382 36.9153 24.8939C37.0775 24.1536 36.8967 24.0827 36.2224 24.2415C30.2836 25.6358 24.4277 21.6338 23.5556 15.4348C22.7985 10.0537 26.7751 4.68115 32.1359 3.89022C38.7118 2.92353 44.2162 7.65053 44.25 14.2923C44.25 14.6016 44.25 14.9109 44.25 15.2202Z"
                                                fill="#FFA31A" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="array-button">
                        <button class="array-prevs">Previews</button>
                        <button class="array-nexts">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="travel-feature-section section-padding fix"
        style="background-image: url('{{ asset('frontend/') }}/assets/img/travel-bg.jpg');">
        <div class="shape-1 float-bob-y">
            <img src="{{ asset('frontend/') }}/assets/img/plane-shape1.png" alt="img">
        </div>
        <div class="shape-2 float-bob-x">
            <img src="{{ asset('frontend/') }}/assets/img/plane-shape2.png" alt="img">
        </div>
        <div class="container">
            <div class="feature-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="feature-content">
                            <div class="section-title">
                                <span class="sub-title wow fadeInUp">
                                    Apakah Anda siap untuk bepergian?
                                </span>
                                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">
                                    Platform Pemesanan Tur Online Terkemuka di Dunia
                                </h2>
                            </div>
                            <div class="feature-area">
                                <div class="line-shape">
                                    <img src="{{ asset('frontend/') }}/assets/img/line-shape.png" alt="img">
                                </div>
                                <div class="feature-items wow fadeInUp wow" data-wow-delay=".5s">
                                    <div class="feature-icon-item">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/') }}/assets/img/icon/08.svg" alt="img">
                                        </div>
                                        <div class="content">
                                            <h5>
                                                Tur Petualangan Terhebat <br>
                                                Yang Pernah Ada
                                            </h5>
                                        </div>
                                    </div>
                                    <ul class="circle-icon">
                                        <li>
                                            <i class="fa-solid fa-badge-check"></i>
                                        </li>
                                        <li>
                                            <span>
                                                Ada banyak variasi <br>
                                                bagian yang tersedia,
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="feature-items wow fadeInUp wow" data-wow-delay=".7s">
                                    <div class="feature-icon-item">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/') }}/assets/img/icon/09.svg" alt="img">
                                        </div>
                                        <div class="content">
                                            <h5>
                                                Tur Sesungguhnya Dimulai <br>
                                                dari Sini
                                            </h5>
                                        </div>
                                    </div>
                                    <ul class="circle-icon">
                                        <li>
                                            <i class="fa-solid fa-badge-check"></i>
                                        </li>
                                        <li>
                                            <span>
                                                Ada banyak variasi <br>
                                                bagian yang tersedia,
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="#" class="theme-btn wow fadeInUp wow" data-wow-delay=".9s">Kontak Kami<i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-image wow img-custom-anim-left">
                            <img src="{{ asset('frontend/') }}/assets/img/man-image.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
