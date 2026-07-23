@extends('layouts.V2.frontend.app')
@section('title')
    Tentang Kami
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
    {{ route('frontend.tentang_kami') }}
@endsection
@section('url')
    {{ route('frontend.tentang_kami') }}
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <h1 class="text-center title wow animate__animated animate__fadeInUp" data-wow-delay="0.2s"
                data-wow-duration="1s">
                Tentang Kami
            </h1>
            <div class="breadcrumb-content wow animate__animated animate__fadeInUp" data-wow-delay="0.2s"
                data-wow-duration="1s">
                <div class="breadcrumb breadcrumb-dynamic justify-content-center"></div>
            </div>
        </div>
    </div>

    <div class="flat-section tf-vacation-hero">
        <div class="container">
            <div class="flat-img-with-text justify-content-between">
                <!-- CONTENT LEFT -->
                <div class="content-left w-style-01">
                    <!-- Title + subtitle -->
                    <div class="box-title wow animate__animated animate__fadeInUp" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <div class="title h1">
                            Apa itu Pesona Plesiran Indonesia?
                        </div>
                        <div class="subtitle">
                            Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.
                        </div>
                    </div>
                </div>
                <!-- CONTENT RIGHT -->
                <div class="content-right w-style-01">
                    <!-- Banner AboutUs -->
                    <div class="wd-banner">
                        <img src="{{ asset('frontend/assets/img/gallery/6.webp') }}">
                    </div>
                    <!-- Services -->
                    <div class="flat-service">
                        <div class="box-benefit wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                            <div class="icon-box">
                                <img src="{{ asset('fe') }}/images/icons/national.svg" alt="icon" class="icon">
                            </div>
                            <div class="content-box">
                                <div class="link name h3">Agen Perjalanan Terbaik</div>
                            </div>
                        </div>
                        <div class="box-benefit wow animate__animated animate__fadeInUp" data-wow-delay="0.45s">
                            <div class="icon-box">
                                <img src="{{ asset('fe') }}/images/icons/location.svg" alt="icon" class="icon">
                            </div>
                            <div class="content-box">
                                <div class="link name h3">Travel Guidelines</div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact -->
                    <div class="wg-contact wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
                        <div class="box-info">
                            <i class="icon-phone icon"></i>
                            <div class="content">
                                <div class="subtitle">Booking Number</div>
                                <div class="phone h4"><a href="tel:+6285867224494">0858-6722-4494</a></div>
                                <div class="phone h4"><a href="tel:+628551333072">0855-1333-072</a></div>
                            </div>
                        </div>
                        <a href="#" class="tf-btn primary hover-1">
                            Booking Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tf-vacation-hero mx-4 style-01 flat-section p-0 bg-color-first">
        <div class="container flat-service">
            <div class="swiper tf-swiper-device wow animate__animated animate__fadeIn" data-wow-duration="1s"
                data-wow-delay="0.2s" data-preview="4" data-tablet="2" data-mobile="1" data-space="40"
                data-space-md="40" data-space-lg="40">
                <div class="swiper-wrapper">
                    <!-- ITEM 1 -->
                    <div class="swiper-slide">
                        <div class="box-icon-benefits">
                            <div class="wrap-icon">
                                <img src="{{ asset('fe') }}/images/icons/shopping-cart-icon.svg" alt="icon" class="icon">
                            </div>
                            <div class="content">
                                <div class="name h3">
                                    <a href="#" class="link">Agen Perjalanan Terbaik</a>
                                </div>
                                <p class="desc">
                                    Pilih kami, dan Anda akan menikmati penawaran eksklusif dan layanan pelanggan khusus 24/7.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- ITEM 2 -->
                    <div class="swiper-slide">
                        <div class="box-icon-benefits">
                            <div class="wrap-icon">
                                <img src="{{ asset('fe') }}/images/icons/shipper-icon.svg" alt="icon" class="icon">
                            </div>
                            <div class="content">
                                <div class="name h3">
                                    <a href="#" class="link">Tim Profesional</a>
                                </div>
                                <p class="desc">
                                    Dengan tim profesional, kami berkomitmen untuk menghadirkan liburan yang sempurna bagi Anda.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- ITEM 3 -->
                    <div class="swiper-slide">
                        <div class="box-icon-benefits">
                            <div class="wrap-icon">
                                <img src="{{ asset('fe') }}/images/icons/service-1.svg" alt="icon" class="icon">
                            </div>
                            <div class="content">
                                <div class="name h3">
                                    <a href="#" class="link">Pengalaman Baru</a>
                                </div>
                                <p class="desc">
                                    Kami mewujudkan impian perjalanan Anda menjadi kenyataan dengan tak terlupakan 
dan pengalaman yang aman.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- ITEM 4 -->
                    <div class="swiper-slide">
                        <div class="box-icon-benefits">
                            <div class="wrap-icon">
                                <img src="{{ asset('fe') }}/images/icons/trip.svg" alt="icon" class="icon">
                            </div>
                            <div class="content">
                                <div class="name h3">
                                    <a href="#" class="link">Harga dan Kualitas</a>
                                </div>
                                <p class="desc">
                                    Jelajahi dunia dengan perjalanan unik, harga kompetitif, dan layanan bintang 5.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PAGINATION -->
                <div class="slider-control">
                    <div class="sw-pagination sw-pagination-device text-center"></div>
                </div>
            </div>
        </div>
        <div class="flat-img-with-text">
            <div class="box-image wow animate__animated animate__fadeIn" data-wow-delay="0.2s" data-wow-duration="1s">
                <div class="image-left hover-img-wrap overflow-hidden">
                    <img src="{{ asset('frontend/assets/img/gallery/7.webp') }}">
                </div>
                <div class="image-right hover-img-wrap overflow-hidden">
                    <img src="{{ asset('frontend/assets/img/gallery/8.jpg') }}">
                </div>
            </div>
            <div class="content-right">
                <div class="box-title wow animate__animated animate__fadeInUp" data-wow-duration="1s"
                    data-wow-delay="0.2s">
                    <div class="title h1">Mengapa Memilih Kami?</div>
                </div>
            </div>
        </div>
    </div>

    <div class="flat-section flat-teamMember">
        <div class="container">
            <div class="box-title text-center wow animate__animated animate__fadeInUp" data-wow-duration="1s"
                data-wow-delay="0.2s">
                <div class="title h1">Tim Kami</div>
            </div>
            @php
                $teams = [
                    [
                        'title' => 'Fabrizio Danindra K.',
                        'jabatan' => 'Chief Marketing Officer',
                        'phone' => '-',
                        'email' => '-',
                        'instagram' => '-',
                        'image' =>  asset('frontend/assets/img/team/profil_dani.jpg'),
                    ],
                    [
                        'title' => 'Bima Gani S.',
                        'jabatan' => 'Chief Operating Officer',
                        'phone' => '-',
                        'email' => '-',
                        'instagram' => '-',
                        'image' => asset('frontend/assets/img/team/profil_bima.jpg'),
                    ],
                    [
                        'title' => 'Rio Anugrah A.S',
                        'jabatan' => 'Chief Technology Officer',
                        'phone' => '-',
                        'email' => '-',
                        'instagram' => '-',
                        'image' => asset('frontend/assets/img/team/profil_rio.jpg'),
                    ],
                ];
            @endphp
            <div class="swiper tf-teamMember" data-preview="3" data-tablet="2" data-mobile="1" data-space="40">
                <div class="swiper-wrapper">
                    @foreach ($teams as $team)
                    <div class="swiper-slide">
                        <div class="box-member hover-img">
                            <div class="box-img img-style">
                                <a href="#">
                                    <img src="{{ $team['image'] }}" alt="{{ $team['title'] }}">
                                </a>
                                <ul class="member-social">
                                    <li class="item-social">
                                        <a href="{{ $team['instagram'] }}" class="link-social">
                                            <i class="icon icon-instgram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="info">
                                    <div class="name-member h4">
                                        <a href="#" class="link">{{ $team['title'] }}</a>
                                    </div>
                                    <span class="position">{{ $team['jabatan'] }}</span>
                                </div>
                                <div class="box-icon">
                                    <a href="tel:{{ $team['phone'] }}"><i class="icon icon-phone-3"></i></a>
                                    <a href="mailto:{{ $team['email'] }}"><i class="icon icon-email"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="slider-control">
                    <div class="sw-pagination sw-pagination-teamMember text-center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection