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
    <section class="tour-section section-padding fix">
        <div class="container custom-container">
            <div class="tour-destination-wrapper">
                <div class="row g-4">
                    <div class="col-xl-8">
                        <div class="row g-4">
                            @forelse ($trips as $trip)
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".3s">
                                    <div class="destination-card-items mt-0">
                                        <div class="destination-image">
                                            <img src="{{ Storage::disk('s3')->url('plesiranindonesia/trip/' . $trip->trip_code . '/' . $trip->trip_images) }}"
                                                alt="{{ $trip->trip_name }}">
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
                                                    <p>0</p>
                                                </li>
                                            </ul>
                                            <h5>
                                                <a href="{{ route('frontend.trip_detail',['id' => $trip->id, 'trip_code' => $trip->trip_code]) }}">
                                                    {{ $trip->trip_name }}
                                                </a>
                                            </h5>
                                            <ul class="info">
                                                <li>
                                                    <i class="fa-regular fa-clock"></i>
                                                    {{ $trip->created_at->diffForHumans() }}
                                                </li>
                                                <li>
                                                    <i class="fa-thin fa-users"></i>
                                                    50+
                                                </li>
                                            </ul>
                                            <div class="price">
                                                <h6>IDR {{ number_format($trip->trip_price,2,',','.') }}<span>/Per pax</span></h6>
                                                <a href="tour-details.html" class="theme-btn style-2">Book Now<i
                                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="main-sidebar mt-0">
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h3>Kategori Destinasi</h3>
                                </div>
                                <div class="categories-list">
                                    <label class="checkbox-single d-flex justify-content-between align-items-center">
                                        <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                            <span class="checkbox-area d-center">
                                                <input type="checkbox">
                                                <span class="checkmark d-center"></span>
                                            </span>
                                            <span class="text-color">
                                                Bromo
                                            </span>
                                        </span>
                                        <span class="text-color">0</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
