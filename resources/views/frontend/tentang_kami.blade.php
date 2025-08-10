@extends('layouts.frontend.app')
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
    <section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ asset('frontend/') }}/assets/img/breadcrumb/breadcrumb.jpg);">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <h2>Tentang Kami</h2>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="{{ route('frontend.index') }}">Beranda</a>
                        </li>
                        <li><i class="fa-solid fa-chevrons-right"></i></li>
                        <li>Tentang Kami</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section section-padding fix">
        <div class="container">
            <div class="about-wrapper-2">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="about-image">
                            <img src="{{ asset('frontend/') }}/assets/img/about/03.jpg" alt="img">
                            <div class="shape-image float-bob-y">
                                <img src="{{ asset('frontend/') }}/assets/img/about/04.png" alt="img">
                            </div>
                            <div class="about-image-2">
                                <img src="{{ asset('frontend/') }}/assets/img/about/05.jpg" alt="img">
                                <div class="plane-shape">
                                    <img src="{{ asset('frontend/') }}/assets/img/about/plane-shape2.png" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title">
                                <span class="sub-title wow fadeInUp">
                                    Tentang Kami
                                </span>
                                <h2 class="wow fadeInUp wow" data-wow-delay=".3s">
                                    Apa itu Pesona Plesiran Indonesia?
                                </h2>
                            </div>
                            <p class="wow fadeInUp wow" data-wow-delay=".5s">
                                Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan
                                kemudahan dalam mendapat informasi dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.
                            </p>
                            <div class="about-items wow fadeInUp wow" data-wow-delay=".3s">
                                <div class="about-icon-items">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/') }}/assets/img/check.png" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Sistem Pemesanan Mudah
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="about-items wow fadeInUp wow" data-wow-delay=".3s">
                                <div class="about-icon-items">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/') }}/assets/img/check.png" alt="img">
                                    </div>
                                    <div class="content">
                                        <h5>
                                            Tour Guide Ramah
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
                            <a href="#" class="theme-btn wow fadeInUp wow" data-wow-delay=".9s">Kontak Kami<i
                                    class="fa-sharp fa-regular fa-arrow-right"></i></a>
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
