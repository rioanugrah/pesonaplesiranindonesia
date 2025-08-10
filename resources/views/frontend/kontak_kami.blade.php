@extends('layouts.frontend.app')
@section('title')
    Kontak Kami
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
    {{ route('frontend.kontak_kami') }}
@endsection
@section('url')
    {{ route('frontend.kontak_kami') }}
@endsection
@section('content')
    <section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url({{ asset('frontend/') }}/assets/img/breadcrumb/breadcrumb.jpg);">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <h2>Kontak Kami</h2>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="{{ route('frontend.index') }}">Beranda</a>
                        </li>
                        <li><i class="fa-solid fa-chevrons-right"></i></li>
                        <li>Kontak Kami</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us-section fix section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="contact-us-main">
                        <div class="contact-box-items">
                            <div class="icon">
                                <img src="{{ asset('frontend/') }}/assets/img/icon/18.svg" alt="img">
                            </div>
                            <div class="content">
                                <h3>
                                    Alamat
                                </h3>
                                <p>
                                    Jl. Raya Tlogowaru No. 3, Tlogowaru,
                                    Kedungkandang, Malang, Jawa Timur
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="contact-us-main style-2">
                        <div class="contact-box-items">
                            <div class="icon">
                                <img src="{{ asset('frontend/') }}/assets/img/icon/19.svg" alt="img">
                            </div>
                            <div class="content">
                                <h3>
                                    <a>Email</a>
                                </h3>
                                <p>
                                    contact@plesiranindonesia.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="contact-us-main">
                        <div class="contact-box-items">
                            <div class="icon">
                                <img src="{{ asset('frontend/') }}/assets/img/icon/20.svg" alt="img">
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="tel:6285867224494">Whatsapp:0858-6722-4494</a>
                                </h3>
                                <p>
                                    Whatsapp Office
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us-section-2 section-bg-2 fix">
        <div class="container">
            <div class="contact-us-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="contact-us-contact">
                            <div class="section-title">
                                <span class="sub-title text-white wow fadeInUp">
                                    Kontak Kami
                                </span>
                                <h2 class=" text-white wow fadeInUp wow" data-wow-delay=".2s">
                                    Kirim Pesan Kapan Saja
                                </h2>
                            </div>
                            <div class="comment-form-wrap">
                                <form action="#" id="contact-form" method="POST">
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="form-clt">
                                                <input type="text" name="name" id="name" placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-clt">
                                                <input type="text" name="email" id="email4"
                                                    placeholder="Your Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-clt">
                                                <select class="country-select" style="display: none;">
                                                    <option value="Residential">Real Estate</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-clt">
                                                <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="theme-btn">
                                                Kirim
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="map-area">
                            <div class="google-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4727.421727159392!2d112.64524127578635!3d-8.033560480212286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd627a313d69e87%3A0x56c1d22f697d33c8!2sJl.%20Raya%20Tlogowaru%20No.3%2C%20Tlogowaru%2C%20Kec.%20Kedungkandang%2C%20Kota%20Malang%2C%20Jawa%20Timur%2065132!5e1!3m2!1sid!2sid!4v1754827844046!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
