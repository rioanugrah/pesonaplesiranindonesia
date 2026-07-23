@extends('layouts.V2.frontend.app')
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
@section('content')
    <div class="hero">
        <div class="slider-default">
            <!-- Swiper -->
            <div class="swiper mySwiper" data-preview="1" data-autoplay="true" data-loop="true" data-speed="1200">
                <div class="swiper-wrapper">
                    <!-- Slide-1 -->
                    <div class="swiper-slide home-3">
                        <div class="box-banner box-banner-7" style="background-image: url({{ asset('frontend/') }}/assets/img/slider/TourIndonesia.webp);">
                            <div class="container">
                                <div class="box-title">
                                    <div class="h3 text-dark">There is always a way for away</div>
                                    <h1 class="text-dark">
                                        Pesona Plesiran Indonesia
                                    </h1>
                                    <div class="wrap-search-link">
                                        <div class="categories-list">
                                            <a href="#"><img src="{{ asset('fe') }}/images/icons/cycle.svg" alt="icon">
                                                Adventure
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-1 -->
                    <div class="swiper-slide home-3">
                        <div class="box-banner box-banner-7" style="background-image: url({{ asset('frontend/') }}/assets/img/slider/02.jpg);">
                            <div class="container">
                                <div class="box-title">
                                    <div class="h3 text-white">There is always a way for away</div>
                                    <h1>
                                        Pesona Plesiran Indonesia
                                    </h1>
                                    <div class="wrap-search-link">
                                        <div class="categories-list">
                                            <a href="#"><img src="{{ asset('fe') }}/images/icons/cycle.svg" alt="icon">
                                                Adventure
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-2 -->
                    <div class="swiper-slide home-3">
                        <div class="box-banner box-banner-8" style="background-image: url({{ asset('frontend/') }}/assets/img/slider/03.jpg);">
                            <div class="container">
                                <div class="box-title">
                                    <div class="h3 text-white">Pesona Plesiran Indonesia</div>
                                    <h1>
                                        Modern & <br>Inspiratif
                                    </h1>
                                    <div class="wrap-search-link">
                                        <div class="categories-list">
                                            <a href="#"><img src="{{ asset('fe') }}/images/icons/cycle.svg" alt="icon">
                                                Adventure
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide-3 -->
                    <div class="swiper-slide home-3">
                        <div class="box-banner box-banner-9" style="background-image: url({{ asset('frontend/') }}/assets/img/slider/05.jpg);">
                            <div class="container">
                                <div class="box-title">
                                    <div class="h3 text-white">Pesona Plesiran Indonesia</div>
                                    <h1>
                                        Nikmati <br>Liburan Anda
                                    </h1>
                                    <div class="wrap-search-link">
                                        <div class="categories-list">
                                            <a href="#"><img src="{{ asset('fe') }}/images/icons/cycle.svg" alt="icon">
                                                Adventure
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation -->
                <div class="flex-direction-nav style-hero-2">
                    <a href="#" class="flex-prev style-nav-2">
                        <img src="{{ asset('fe') }}/images/icons/arrow-left-1.svg" alt="prev">
                    </a>
                    <a href="#" class="flex-next style-nav-2">
                        <img src="{{ asset('fe') }}/images/icons/arrow-right-2.svg" alt="next">
                    </a>
                </div>
                <!-- Meta list -->
                <div class="box-meta pos-1">
                    <div class="flow-us rotate">
                        <p class="text-uppercase">Follow Us</p>
                    </div>
                    <div class="divider h-70"></div>
                    <ul class="list-social flex-center column">
                        <li>
                            <a href="https://www.instagram.com/pesonaplesiranid.official" aria-label="Instgram"><span
                                    class="box-icon icon-instgram w-48 social"></span></a>
                        </li>
                    </ul>
                </div>
                <!-- Pagination -->
                <div class="slide-indicator">
                    <div class="divider h-145"></div>
                    <span class="slide-number"></span>
                </div>
            </div>
            <!-- Form -->
            <div class="tab-content pos-1">
                <div class="face active show" role="tabpanel">
                    <div class="container">
                        <div class="form-s1">
                            <form action="/search" >
                                <div class="form-search transparent style-2">
                                    <div class="inner-group inner-1">
                                        <div class="form-group fg-1">
                                            <label>Location</label>
                                            <div class="group-select">
                                                <div class="select-items">
                                                    <span class="current">Where are you going</span>
                                                    <ul class="list w-1">
                                                        <li class="option" data-value="bromo">
                                                            <a href="#">
                                                                <img src="{{ asset('fe') }}/images/icons/place.svg" alt="icon"
                                                                    class="icon">
                                                                <div class="content">
                                                                    <div class="place">Bromo</div>
                                                                    <div class="country">Indonesia</div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group fg-1">
                                            <label>Date</label>
                                            <div class="group-select">
                                                <div class="select-items">
                                                    <div class="current">
                                                        <input type="text" class="date-input" placeholder="dd/mm/yyyy"
                                                            readonly>
                                                        <img src="{{ asset('fe') }}/images/icons/calendar.svg" alt="icon">
                                                    </div>
                                                    <div class="list w-1">
                                                        <div class="datepicker-header">
                                                            <button type="button" class="prev-month">
                                                                <i class="icon icon-CaretLeft"></i>
                                                            </button>
                                                            <div class="datepicker-title">November 24</div>
                                                            <button type="button" class="next-month">
                                                                <i class="icon icon-CaretRight"></i>
                                                            </button>
                                                        </div>
                                                        <div class="datepicker-weekdays">
                                                            <div class="datepicker-weekday weekend">Su</div>
                                                            <div class="datepicker-weekday">Mo</div>
                                                            <div class="datepicker-weekday">Tu</div>
                                                            <div class="datepicker-weekday">We</div>
                                                            <div class="datepicker-weekday">Th</div>
                                                            <div class="datepicker-weekday">Fr</div>
                                                            <div class="datepicker-weekday weekend">Sa</div>
                                                        </div>
                                                        <div class="datepicker-days"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group fg-1">
                                            <label>Tour Type</label>
                                            <div class="group-select">
                                                <div class="select-items">
                                                    <span class="current">Select Type
                                                        <i class="icon icon-CaretDown"></i>
                                                    </span>
                                                    <ul class="list w-1">
                                                        <li data-value="adventure" class="option">
                                                            <a href="#">
                                                                <div class="content">
                                                                    <div class="type">Adventure</div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li data-value="beach" class="option">
                                                            <a href="#">
                                                                <div class="content">
                                                                    <div class="type">Beach</div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li data-value="camping" class="option">
                                                            <a href="#">
                                                                <div class="content">
                                                                    <div class="type">Camping</div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group fg-1">
                                            <label>People</label>
                                            <div class="group-select">
                                                <div class="select-items">
                                                    <span class="current guest-text">
                                                        <img src="{{ asset('fe') }}/images/icons/users.svg" alt="icon">
                                                        <i class="icon icon-CaretDown"></i>
                                                    </span>
                                                    <div class="list w-1">
                                                        <div class="guest-item">
                                                            <span>Adult</span>
                                                            <div class="counter">
                                                                <button type="button" class="minus">−</button>
                                                                <input type="number" value="0">
                                                                <button type="button" class="plus">+</button>
                                                            </div>
                                                        </div>
                                                        <div class="guest-item">
                                                            <span>Children</span>
                                                            <div class="counter">
                                                                <button type="button" class="minus">−</button>
                                                                <input type="number" value="0">
                                                                <button type="button" class="plus">+</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-btn-filter">
                                        <div class="box-filter">
                                            <a href="#" class="tf-btn hover-1 btn-1">
                                                <img src="{{ asset('fe') }}/images/icons/advanced.svg" alt="icon">
                                            </a>
                                        </div>
                                        <button type="submit" class="tf-btn primary hover-1 btn-1">
                                            <i class="icon icon-search"></i>
                                            <span>Search</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="advanced-form left-1">
                                    <div class="group-price">
                                        <div class="box-title-price">
                                            <span class="title-price">Price</span>
                                            <div class="caption-price">
                                                <span class="slider-range-value1"> $0 </span>
                                                <span>-</span>
                                                <span class="slider-range-value2"> $10,000 </span>
                                            </div>
                                        </div>
                                        <div  class="slider-range"></div>
                                        <div class="slider-labels">
                                            <div>
                                                <input type="hidden" name="min-value" value="">
                                                <input type="hidden" name="max-value" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group-checkbox">
                                        <div class="title-checkbox">Amentities</div>
                                        <div class="group-amentities">
                                            <div class="box-amentities">
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="convenience">
                                                    <label for="convenience" class="text-amenities">Convenience</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="cost-effective">
                                                    <label for="cost-effective"
                                                        class="text-amenities">Cost-effective</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="social-interaction">
                                                    <label for="social-interaction" class="text-amenities">Social
                                                        Interaction</label>
                                                </div>
                                            </div>
                                            <div class="box-amentities">
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="safety-security">
                                                    <label for="safety-security" class="text-amenities">Safety and
                                                        Security</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="variety-experiences">
                                                    <label for="variety-experiences" class="text-amenities">Variety of
                                                        Experiences</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="less-stress">
                                                    <label for="less-stress" class="text-amenities">Less Stress</label>
                                                </div>
                                            </div>
                                            <div class="box-amentities">
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="hassle-free-travel">
                                                    <label for="hassle-free-travel" class="text-amenities">Hassle-Free
                                                        Travel</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="cultural-immersion">
                                                    <label for="cultural-immersion" class="text-amenities">Cultural
                                                        Immersion</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="time-efficiency">
                                                    <label for="time-efficiency" class="text-amenities">Time
                                                        Efficiency</label>
                                                </div>
                                            </div>
                                            <div class="box-amentities">
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="unique-experiences">
                                                    <label for="unique-experiences" class="text-amenities">Unique
                                                        Experiences</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="peace-of-mind">
                                                    <label for="peace-of-mind" class="text-amenities">Peace of
                                                        Mind</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="educational-value">
                                                    <label for="educational-value" class="text-amenities">Educational
                                                        Value</label>
                                                </div>
                                            </div>
                                            <div class="box-amentities">
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="group-discounts">
                                                    <label for="group-discounts" class="text-amenities">Group
                                                        Discounts</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="romantic-atmosphere">
                                                    <label for="romantic-atmosphere" class="text-amenities">Romantic
                                                        Atmosphere</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="flexibility">
                                                    <label for="flexibility" class="text-amenities">Flexibility</label>
                                                </div>
                                            </div>
                                            <div class="box-amentities">
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="stress-relief">
                                                    <label for="stress-relief" class="text-amenities">Stress
                                                        Relief</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="scenic-views">
                                                    <label for="scenic-views" class="text-amenities">Scenic
                                                        Views</label>
                                                </div>
                                                <div class="amenities-item">
                                                    <input type="checkbox" class="tf-checkbox" id="expert-guidance">
                                                    <label for="expert-guidance" class="text-amenities">Expert
                                                        Guidance</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flat-section flat-recommended">
        <div class="container">
            <div class="box-title text-center wow animate__animated animate__fadeInUp" data-wow-duration="1s"
                data-wow-delay="0.2s">
                <h1 class="title">Harga Paket Liburan</h1>
            </div>
            <div class="flat-tab-recommend">
                <div class="swiper tf-swiper-tour wow animate__animated animate__fadeIn" data-wow-duration="1s"
                    data-wow-delay="0.4s" data-preview="3" data-tablet="2" data-mobile-sm="2" data-mobile="1"
                    data-space-lg="40" data-space-md="20" data-space="20">
                    <div class="swiper-wrapper">
                        @php
                            $pricePackages = [
                                [
                                    'title' => 'Open Trip Bromo',
                                    'category' => 'Adventure',
                                    'price' => 300000,
                                    'location' => 'Jawa Timur',
                                    'adult' => 4,
                                    'child' => 1,
                                    'day' => 1,
                                    'rating' => 5,
                                    'image_cover' => 'https://w0.peakpx.com/wallpaper/409/200/HD-wallpaper-bromo-crater-indonesia-mountain.jpg',
                                    'images' => [],
                                    'is_video' => false,
                                    'link_video' => '-'
                                ],
                                [
                                    'title' => 'Private Trip Bromo',
                                    'category' => 'Adventure',
                                    'price' => 1500000,
                                    'location' => 'Jawa Timur',
                                    'adult' => 4,
                                    'child' => 1,
                                    'day' => 1,
                                    'rating' => 5,
                                    'image_cover' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS1CZf9R4OHCGoy4r_C41IYw05pb2Ps7ynnGS7ONNVPYOivtuntfsrJeCHz&s=10',
                                    'images' => [],
                                    'is_video' => false,
                                    'link_video' => '-'
                                ],
                                [
                                    'title' => 'Kawah Ijen',
                                    'category' => 'Adventure',
                                    'price' => 300000,
                                    'location' => 'Jawa Timur',
                                    'adult' => 4,
                                    'child' => 1,
                                    'day' => 1,
                                    'rating' => 5,
                                    'image_cover' => 'https://c4.wallpaperflare.com/wallpaper/481/986/515/crater-photography-volcano-lake-sunrise-hd-wallpaper-preview.jpg',
                                    'images' => [],
                                    'is_video' => false,
                                    'link_video' => '-'
                                ],
                            ]
                        @endphp
                        {{-- @foreach ($pricePackages as $pricePackage)
                        <div class="swiper-slide">
                            <div class="item hover-img list-style-02">
                                <div class="archive-top">
                                    <div class="images-group img-style">
                                        <a href="./toursingle1.html" class="image-link">
                                            <img src="{{ $pricePackage['image_cover'] }}">
                                        </a>
                                        <div class="group-meta">
                                            <div class="tag-meta">
                                                <div class="flag-tag">{{ $pricePackage['category'] }}</div>
                                                <a href="javascript:void(0)" class="count image"
                                                    data-fancybox="gallery9"
                                                    data-src="https://plus.unsplash.com/premium_photo-1725408106567-a77bd9beff7c?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bG9zJTIwYW5nZWxlc3xlbnwwfHwwfHx8MA%3D%3D">
                                                    <img src="{{ asset('fe') }}/images/icons/picture.svg" alt="icon" class="icon">
                                                    <span class="total-image">{{ count($pricePackage['images']) }}</span>
                                                </a>
                                                <a data-fancybox="gallery9"
                                                    data-src="https://images.unsplash.com/photo-1580655653885-65763b2597d0?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8bG9zJTIwYW5nZWxlc3xlbnwwfHwwfHx8MA%3D%3D"
                                                    style="display: none"></a>
                                                <a data-fancybox="gallery9"
                                                    data-src="https://images.unsplash.com/flagged/photo-1575555201693-7cd442b8023f?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bG9zJTIwYW5nZWxlc3xlbnwwfHwwfHx8MA%3D%3D"
                                                    style="display: none"></a>
                                                <a data-fancybox="gallery9"
                                                    data-src="https://images.pexels.com/photos/15516367/pexels-photo-15516367.jpeg?cs=srgb&dl=pexels-solyartphotos-15516367.jpg&fm=jpg"
                                                    style="display: none"></a>
                                                <a data-fancybox="gallery9"
                                                    data-src="https://images6.alphacoders.com/551/551548.jpg"
                                                    style="display: none"></a>
                                                <a href="javascript:void(0)" class="count view-video" data-fancybox
                                                    data-type="iframe"
                                                    data-src="https://www.youtube.com/embed/x7X9w_GIm1s?autoplay=1&t=20s">
                                                    <img src="{{ asset('fe') }}/images/icons/camera.svg" alt="icon" class="icon">
                                                </a>
                                            </div>
                                            <div class="btn-wished">
                                                <img src="{{ asset('fe') }}/images/icons/icon-wishlist.svg" alt="icon" class="icon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="archive-bottom">
                                    <div class="content-top">
                                        <div class="address">
                                            <img src="{{ asset('fe') }}/images/icons/place.svg" alt="icon" class="icon">
                                            <span class="location">{{ $pricePackage['location'] }}</span>
                                        </div>
                                        <div class="rating">
                                            <ul class="list-star">
                                                <li class="icon icon-star"></li>
                                            </ul>
                                            <div class="rate">
                                                <div class="total-rate">{{ $pricePackage['rating'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tour-title h3">
                                        <a href="toursingle1.html" class="link multi-ellipsis">{{ $pricePackage['title'] }}</a>
                                    </div>
                                    <div class="content-bottom">
                                        <div class="content-info-middle">
                                            <div class="info person">
                                                <img src="{{ asset('fe') }}/images/icons/users.svg" alt="icon" class="icon">
                                                <span class="total-people">{{ $pricePackage['adult']+$pricePackage['child'] }} People</span>
                                            </div>
                                            <div class="info date">
                                                <img src="{{ asset('fe') }}/images/icons/calendar.svg" alt="icon" class="icon">
                                                <span class="total-day">{{ $pricePackage['day'] }} days</span>
                                            </div>
                                        </div>
                                        <div class="price h5">{{ 'Rp. '.number_format($pricePackage['price'],2,',','.') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach --}}
                        @foreach ($trips as $trip)
                        <div class="swiper-slide">
                            <div class="item hover-img list-style-02">
                                <div class="archive-top">
                                    <div class="images-group img-style">
                                        <a href="{{ route('frontend.trip_detail',['id' => $trip->id, 'trip_code' => $trip->trip_code]) }}" class="image-link">
                                            <img src="{{ Storage::disk('s3')->url('plesiranindonesia/trip/' . $trip->trip_code . '/' . $trip->trip_images) }}">
                                        </a>
                                        <div class="group-meta">
                                            <div class="tag-meta">
                                                <div class="flag-tag">#</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="archive-bottom">
                                    <div class="content-top">
                                        <div class="address">
                                            <img src="{{ asset('fe') }}/images/icons/place.svg" alt="icon" class="icon">
                                            <span class="location">{{ $trip->trip_country }}</span>
                                        </div>
                                        <div class="rating">
                                            <ul class="list-star">
                                                <li class="icon icon-star"></li>
                                            </ul>
                                            <div class="rate">
                                                <div class="total-rate">0</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tour-title h3">
                                        <a href="{{ route('frontend.trip_detail',['id' => $trip->id, 'trip_code' => $trip->trip_code]) }}" class="link multi-ellipsis">{{ $trip->trip_name }}</a>
                                    </div>
                                    <div class="content-bottom">
                                        <div class="content-info-middle">
                                            <div class="info person">
                                                <img src="{{ asset('fe') }}/images/icons/users.svg" class="icon">
                                                <span class="total-people">{{ $trip->trip_maxGuest }} People</span>
                                            </div>
                                            <div class="info date">
                                                <img src="{{ asset('fe') }}/images/icons/calendar.svg" class="icon">
                                                <span class="total-day">{{ $trip->trip_duration }}</span>
                                            </div>
                                        </div>
                                        <div class="price h5">{{ 'Rp. '.number_format($trip->trip_price,2,',','.') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="slider-control">
                        <div class="sw-pagination sw-pagination-tour text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flat-section tf-vacation-hero pt-0">
        <div class="container">
            <div class="flat-img-with-text gap-10 row-reverse">
                <div class="tf-image-box">
                    <div class="grid-img-group">
                        <div class="tf-image-wrap item-1 animate-ltr"></div>
                        <div class="tf-image-wrap item-2 animate-rtl">
                            <div class="img-style hover-img-wrap">
                                <img src="{{ asset('frontend/assets/img/gallery/9.jpg') }}">
                            </div>
                        </div>
                        <div class="tf-image-wrap item-3 animate-ltr">
                            <div class="img-style hover-img-wrap">
                                <img src="{{ asset('frontend/assets/img/gallery/10.jpg') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-right v3 justify-content-center">
                    <div class="box-title wow animate__animated animate__fadeInUp" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <h1 class="title">
                            Peluang besar untuk petualangan & perjalanan
                        </h1>
                        <div class="subtitle">
                            Mulailah petualangan impian Anda di sini! Alat perencanaan perjalanan yang intuitif ini dirancang untuk menyederhanakan setiap langkah perjalanan Anda.
                        </div>
                    </div>
                    <div class="flat-service">
                        <div class="box-benefit">
                            <div class="icon-box">
                                <img src="{{ asset('fe') }}/images/icons/national.svg" alt="icon" class="icon">
                            </div>
                            <div class="content-box">
                                <div class="link name h3">Agen Perjalanan Terbaik</div>
                            </div>
                        </div>
                        <div class="box-benefit">
                            <div class="icon-box">
                                <img src="{{ asset('fe') }}/images/icons/location.svg" alt="icon" class="icon">
                            </div>
                            <div class="content-box">
                                <div class="link name h3">Travel Guidelines</div>
                            </div>
                        </div>
                    </div>
                    <div class="wg-contact">
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

    @php
        $testimonials = [
            [
                'title' => 'Adlian Zuhdi',
                'image' => asset('frontend/assets/img/icon/profile.png'),
                'deskripsi' => 'TL e nya ramah" dan pembawaan dalam pelayanannya juga baik',
                'rating' => 5
            ],
            [
                'title' => 'Daffa Afzal',
                'image' => asset('frontend/assets/img/icon/profile.png'),
                'deskripsi' => 'driver & rekan tim semuanya ramah, recomended',
                'rating' => 5
            ],
            [
                'title' => 'Yusuf Yoga A.',
                'image' => asset('frontend/assets/img/icon/profile.png'),
                'deskripsi' => 'Pelayanan ramah, harga terjangkau, guide nya sopan. Top pokoknya',
                'rating' => 5
            ],
            [
                'title' => 'Putra Iman B.H',
                'image' => asset('frontend/assets/img/icon/profile.png'),
                'deskripsi' => 'Pengalaman gw dan temen2 tuh bener-bener keren banget. Kita berangkat subuh, dapet sunrise yang cakep parah. Terus lanjut jalan di lautan pasirnya, vibes-nya dapet banget. Capek sih, tapi semua langsung kebayar sama view-nya yang gila indah.',
                'rating' => 5
            ],
        ];
    @endphp

    <div class="flat-section flat-testimonial">
        <div class="container">
            <div class="box-title text-center wow animate__animated animate__fadeInUp" data-wow-duration="1s"
                data-wow-delay="0.2s">
                <h1 class="title">Testimonial</h1>
                <div class="subtitle desc">
                    Thousands of luxury home enthusiasts just like you visit our
                    website.
                </div>
            </div>
            <div dir="ltr" class="swiper tf-sw-testimonial wow animate__animated animate__fadeIn" data-wow-duration="1s"
                data-wow-delay="0.4s" data-preview="3" data-tablet="2" data-mobile-sm="1" data-mobile="1"
                data-space-lg="40" data-space-md="40" data-space="40">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="box-testimonial-item box-style-01">
                            <div class="avatar avt-90 round mb-4">
                                <img src="{{ $testimonial['image'] }}">
                            </div>
                            <div class="description">
                                {{ $testimonial['deskripsi'] }}
                            </div>
                            <div class="rating">
                                <ul class="list-star">
                                    @for ($i = 1; $i <= $testimonial['rating']; $i++)
                                    <li class="icon icon-star"></li>
                                    @endfor
                                </ul>
                            </div>
                            <div class="info">
                                <div class="name h4">{{ $testimonial['title'] }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="slider-control">
                    <a href="#" class="flex-prev nav-prev-location">
                        <img src="{{ asset('fe') }}/images/icons/arrow-left-1.svg" alt="prev">
                    </a>
                    <div class="sw-pagination sw-pagination-tes text-center"></div>
                    <a href="#" class="flex-next nav-next-location">
                        <img src="{{ asset('fe') }}/images/icons/arrow-right-2.svg" alt="next">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection