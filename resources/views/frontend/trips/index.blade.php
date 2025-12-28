@extends('layouts.frontend.app')
@section('title')
    Trip
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
    {{ route('frontend.trip') }}
@endsection
@section('url')
    {{ route('frontend.trip') }}
@endsection

@section('content')
    <section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url(frontend/assets/img/breadcrumb/breadcrumb.jpg);">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <h2>Trip Wisata</h2>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="{{ route('frontend.index') }}">Beranda</a>
                        </li>
                        <li><i class="fa-solid fa-chevrons-right"></i></li>
                        <li>Trip Wisata</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="popular-destination-section section-padding">
        <div class="container">
            <div class="row g-4">
                @forelse ($trips as $trip)
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".2s">
                    <div class="destination-card-items mt-0">
                        <div class="destination-image">
                            <img src="{{ Storage::disk('s3')->url('plesiranindonesia/trip/' . $trip->trip_code . '/' . $trip->trip_images) }}" alt="img">
                            <div class="heart-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <div class="destination-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-location-dot"></i>
                                    Indonesia
                                </li>
                                <li class="rating">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    {{-- <p>4.7</p> --}}
                                </li>
                            </ul>
                            <h5>
                                <a href="{{ route('frontend.trip_detail', ['id' => $trip->id, 'trip_code' => $trip->trip_code]) }}">
                                    {{ $trip->trip_name }}
                                </a>
                            </h5>
                            <ul class="info">
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    {{ $trip->created_at->diffForHumans() }}
                                </li>
                                {{-- <li>
                                    <i class="fa-thin fa-users"></i>
                                    50+
                                </li> --}}
                            </ul>
                            <div class="price">
                                <h6>IDR {{ number_format($trip->trip_price, 2, ',', '.') }}<span>/Per
                                                        {{ $trip->trip_category == 'O' ? 'Pax' : '5 Pax' }} </span></h6>
                                <a href="{{ route('frontend.trip_detail', ['id' => $trip->id, 'trip_code' => $trip->trip_code]) }}" class="theme-btn style-2">Book Now<i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            {{-- <div class="page-nav-wrap text-center">
                <ul>
                    <li><a class="page-numbers" href="#"><i class="fal fa-long-arrow-left"></i></a></li>
                    <li><a class="page-numbers" href="#">01</a></li>
                    <li><a class="page-numbers" href="#">02</a></li>
                    <li><a class="page-numbers" href="#">03</a></li>
                    <li><a class="page-numbers" href="#"><i class="fal fa-long-arrow-right"></i></a></li>
                </ul>
            </div> --}}
        </div>
    </section>
@endsection
