@extends('layouts.V2.frontend.app')
@section('title')
    {{ $trip_detail->trip_name }}
@endsection
@section('content')
    @php
        $trip_languages = [];
        $calendarData = [];

        foreach (json_decode($trip_detail->trip_language) as $key => $trip_language) {
            $trip_languages[] = $trip_language->title;
        };

        foreach ($trip_detail->trip_schedules as $key => $trip_schedule) {
            $calendarData[$trip_schedule->trip_date] = [
                'times' => json_decode($trip_schedule->trip_time),
                'prices' => json_decode($trip_schedule->trip_prices)->prices
            ];
            // array_push(
            //     $calendarData,
            //     $trip_schedule->trip_date
            // );


        }

        // dd($calendarData);
        // dd(json_encode($calendarData,JSON_PRETTY_PRINT));

        $dataTrip = [
            'title' => $trip_detail->trip_name,
            'place' => $trip_detail->trip_meeting_poin,
            'maxGuest' => $trip_detail->trip_maxGuest,
            'minAge' => $trip_detail->trip_minAge,
            'contact' => 'marketing@plesiranindonesia.com',
            'languages' => $trip_languages,
            // 'calendarData' => [
            //     '2026-07-25' => [
            //         'times' => ['22:00', '22:30'],
            //         'prices' => [
            //             'adult' => 350000,
            //             'children' => 50000,
            //         ],
            //     ],
            //     '2026-07-28' => [
            //         'times' => ['22:00', '22:30'],
            //         'prices' => [
            //             'adult' => 300000,
            //             'children' => 50000,
            //         ],
            //     ],
            // ],
            'calendarData' => $calendarData,
        ];

        $faqs = [
            [
                'title' => 'Mengapa saya harus menggunakan layanan Anda?',
                'description' => 'Setelah akun Anda dibuat dan Anda telah memahami platformnya, Anda siap untuk mulai menggunakan layanan kami. Baik itu mengakses fitur tertentu, melakukan transaksi, atau memanfaatkan alat kami, Anda akan menemukan semua yang Anda butuhkan di ujung jari Anda.'
            ],
        ]
    @endphp
    <div class="flat-property mt-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="box-property-detail tf-single wow animate__animated animate__fadeInUp" data-wow-duration="1s"
                        data-wow-delay="0.2s">
                        <h1 class="font-semibold">{{ $trip_detail->trip_name }}</h1>
                        <div class="meta mt-6">
                            <div class="inner-left">
                                <div class="rate">
                                    <div class="rating">
                                        <ul class="list-star"></ul>
                                    </div>
                                    <div class="rating-text"></div>
                                    <div class="review">
                                        (<span class="rating-count"></span> Rating)
                                    </div>
                                </div>
                            </div>
                            <div class="inner-right">
                                <a href="#" class="action-btn">
                                    <img src="{{ asset('fe') }}/images/icons/icon-share.svg" alt="icon">
                                    Share
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-property-detail tf-image-slider wow animate__animated animate__fadeInUp"
                        data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="swiper tf-sw-hero destination-post">
                            <div class="swiper-wrapper">
                                @foreach (json_decode($trip_detail->trip_gallery) as $item)
                                <div class="swiper-slide">
                                    <div class="item hover-img">
                                        <a href="#" class="img-style">
                                            <img src="{{ Storage::disk('s3')->url('plesiranindonesia/trip/trip_gallery/' . $trip_detail->trip_code . '/' . $item->trip_gallery) }}" alt="image"
                                                class="photo-box">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="group-meta">
                                <a href="#" class="tf-btn">
                                    <span>Show all 5 photo</span>
                                    <img src="{{ asset('fe') }}/images/icons/picture.svg" alt="Photo">
                                </a>
                                <a href="#" class="tf-btn">
                                    <span>Watch Video</span>
                                    <img src="{{ asset('fe') }}/images/icons/camera.svg" alt="Photo">
                                </a>
                            </div>
                            <!-- Navigation -->
                            <div class="flex-direction-nav style-hero-3">
                                <a href="#" class="style-nav-2 nav-prev-hero-title">
                                    <img src="{{ asset('fe') }}/images/icons/arrow-left-1.svg" alt="prev">
                                </a>
                                <a href="#" class="style-nav-2 nav-next-hero-title">
                                    <img src="{{ asset('fe') }}/images/icons/arrow-right-2.svg" alt="next">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-property-detail property-specification-item wow animate__animated animate__fadeInUp"
                        data-wow-duration="1s" data-wow-delay="0.2s">
                        <ul class="info-box">
                            <li class="item">
                                <a href="#" class="box-icon w-56">
                                    <img src="{{ asset('fe') }}/images/icons/money.svg" alt="icon" class="icon">
                                </a>
                                <div class="content">
                                    <span class="label subtitle">Harga</span>
                                    <div class="value h5  adult-price-value">$299</div>
                                </div>
                            </li>
                            <li class="item">
                                <a href="#" class="box-icon w-56">
                                    <img src="{{ asset('fe') }}/images/icons/clock-2.svg" alt="icon" class="icon">
                                </a>
                                <div class="content">
                                    <span class="label subtitle">Duration</span>
                                    <div class="value h5 ">{{ $trip_detail->trip_duration }}</div>
                                </div>
                            </li>
                            <li class="item">
                                <a href="#" class="box-icon w-56">
                                    <img src="{{ asset('fe') }}/images/icons/users-2.svg" alt="icon"
                                        class="icon">
                                </a>
                                <div class="content">
                                    <span class="label subtitle">People</span>
                                    <div class="value h5 ">{{ $trip_detail->trip_maxGuest }}</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="box-property-detail property-description wow animate__animated animate__fadeInUp"
                        data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="property-topic h3  mb-6">Deskripsi</div>
                        {!! $trip_detail->trip_description !!}
                    </div>
                    <div class="box-property-detail property-feature wow animate__animated animate__fadeInUp"
                        data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="property-topic h3  mb-6">Facilities</div>
                        <div class="wrap-feature tf-grid-layout gap-30 tf-col-3 md-col-2 sm-col-1">
                            <div class="box-feature">
                                <ul class="feature-list">
                                    @foreach (json_decode($trip_detail->trip_facilities) as $trip_facilities)
                                        <li class="feature-item">
                                            <img src="{{ asset('fe') }}/images/icons/check-box.svg" alt="icon"
                                                class="icon">
                                            <span class="subtitle">{{ $trip_facilities->facilities }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-property-detail property-feature wow animate__animated animate__fadeInUp"
                        data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="property-topic h3  mb-6">Include</div>
                        <div class="wrap-feature tf-grid-layout gap-30 tf-col-3 md-col-2 sm-col-1">
                            <div class="box-feature">
                                <ul class="feature-list">
                                    @foreach (json_decode($trip_detail->trip_include) as $trip_include)
                                        <li class="feature-item">
                                            <img src="{{ asset('fe') }}/images/icons/check-box.svg" alt="icon"
                                                class="icon">
                                            <span class="subtitle">{{ $trip_include->title }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-property-detail property-feature wow animate__animated animate__fadeInUp"
                        data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="property-topic h3  mb-6">Exclude</div>
                        <div class="wrap-feature tf-grid-layout gap-30 tf-col-3 md-col-2 sm-col-1">
                            <div class="box-feature">
                                <ul class="feature-list">
                                    @foreach (json_decode($trip_detail->trip_exclude) as $trip_exclude)
                                    <li class="feature-item">
                                        <i class="icon icon-X"></i>
                                        <span class="subtitle">{{ $trip_exclude->title }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-property-detail property-schedule wow animate__animated animate__fadeInUp"
                        data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="property-topic h3  mb-6">Rencana Tour</div>
                        <div class="wg-tour-plan">
                            <ul class="tour-plan-list" id="tour-plan">
                                <!-- Day 1 -->
                                @foreach (json_decode($trip_detail->trip_tour_plan) as $key => $item)
                                    <li class="tour-plan-item">
                                        <a href="#day-{{ $key }}" class="plan-topic collapsed"
                                            data-bs-toggle="collapse" data-bs-target="#day-{{ $key }}"
                                            aria-expanded="false">
                                            <i class="icon icon-check"></i>
                                            <div class="title-plan h5">
                                                {{ $item->tour_plan }}
                                            </div>
                                            <i class="icon icon-CaretDown"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="box-property-detail property-calendar wow animate__animated animate__fadeInUp"
                        data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="property-topic h3  mb-6">Calendar & Price</div>
                        <div class="wg-calendar">
                            <div class="box-head-calendar">
                                <button class="nav-prev-month nav-btn" onclick="tripPrevMonth()">
                                    <i class="icon icon-CaretLeft"></i>
                                </button>
                                <div id="monthYear" class="h4">No Value</div>
                                <button class="nav-next-month nav-btn" onclick="tripNextMonth()">
                                    <i class="icon icon-CaretRight"></i>
                                </button>
                            </div>
                            <div class="weekdays">
                                <div class="weekday">Minggu</div>
                                <div class="weekday">Senin</div>
                                <div class="weekday">Selasa</div>
                                <div class="weekday">Rabu</div>
                                <div class="weekday">Kamis</div>
                                <div class="weekday">Jumat</div>
                                <div class="weekday">Sabtu</div>
                            </div>
                            <div class="days-grid" id="daysGridNew"></div>
                        </div>
                    </div>
                    <div class="box-property-detail property-faqs wow animate__animated animate__fadeInUp"
                        data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="property-topic h3  mb-6">FAQs</div>
                        <div class="wg-faq">
                            <ul class="box-faq" id="wg-faq">
                                @foreach (json_decode($trip_detail->trip_faq) as $key => $trip_faq)
                                <li class="faq-item style-01">
                                    <a href="#faq-{{ $key }}" class="faq-top collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#faq-{{ $key }}" aria-expanded="false" aria-controls="faq-{{ $key }}">
                                        <div class="question-title h4">
                                            {{ $trip_faq->title }}
                                        </div>
                                        <i class="icon icon-CaretDown"></i>
                                    </a>
                                    <div class="collapse" id="faq-{{ $key }}" data-bs-parent="#wg-faq">
                                        <p class="faq-answer subtitle">
                                            {{ $trip_faq->description }}
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="sticky-sidebar sidebar-tour wow animate__animated animate__fadeInDown"
                        data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="tf-booking-sidebar">
                            <div class="tf-form-book booking-form">
                                <form id="trip-booking-form" action="/checkout.html" method="get" novalidate>
                                    <div class="form-topic h3">Book Your Tour</div>
                                    <div class="booking-form">
                                        <div class="form-group">
                                            <div class="label h5">First Name</div>
                                            <div class="group-select">
                                                <div class="select-items">
                                                    <div class="current">
                                                        <input type="text" class="form-control" name="first_name"
                                                            placeholder="First Name" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="label h5">Last Name</div>
                                            <div class="group-select">
                                                <div class="select-items">
                                                    <div class="current">
                                                        <input type="text" class="form-control" name="last_name"
                                                            placeholder="Last Name" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="label h5">Email</div>
                                            <div class="group-select">
                                                <div class="select-items">
                                                    <div class="current">
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="Email" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="label h5">Phone Number</div>
                                            <div class="group-select">
                                                <div class="select-items">
                                                    <div class="current">
                                                        <input type="number" class="form-control" name="phone"
                                                            placeholder="Phone Number" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Choose Date -->
                                        <div class="form-group date-post">
                                            <div class="label h5">Choose date</div>
                                            <div class="group-select">
                                                <div class="select-items datepicker">
                                                    <div class="current">
                                                        <input type="text" id="tour_date" class="date-input" name="tour_date"
                                                            placeholder="yyyy-mm-dd" autocomplete="off" readonly required>
                                                        <img src="{{ asset('fe') }}/images/icons/calendar.svg" alt="icon"
                                                            class="icon-image">
                                                    </div>
                                                    <div class="list">
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
                                                            <div class="datepicker-weekday weekend">Minggu</div>
                                                            <div class="datepicker-weekday">Senin</div>
                                                            <div class="datepicker-weekday">Selasa</div>
                                                            <div class="datepicker-weekday">Rabu</div>
                                                            <div class="datepicker-weekday">Kamis</div>
                                                            <div class="datepicker-weekday">Jumat</div>
                                                            <div class="datepicker-weekday weekend">Sabtu</div>
                                                        </div>
                                                        <div class="datepicker-days"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Choose Time -->
                                        <div class="form-group date-post">
                                            <div class="label h5 ">Choose time</div>
                                            <div class="group-select">
                                                <div class="select-items">
                                                    <div class="current">
                                                        <input type="text" id="tour_time" class="select-date" name="tour_time"
                                                            placeholder="Select" autocomplete="off" readonly required>
                                                        <i class="icon-image icon-CaretDown"></i>
                                                    </div>
                                                    <ul class="list style-01"></ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="label h5">Payment Method</div>
                                            <div class="group-select">
                                                <div class="select-items">
                                                    <div class="current">
                                                        <select name="method" class="form-control" id="paymentMethod">
                                                            <option value="">-- Select Method --</option>
                                                            @foreach ($listPayments as $item)
                                                                <option value="{{ $item->code.'|'.$item->total_fee->flat }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group total-people widget-people-tour">
                                            <div class="label h5  current">People</div>
                                            <div class="people-content">
                                                <!-- Adult Counter -->
                                                <div class="guest-item style-01">
                                                    <span class="guest-label"> Adult (12 Years+) </span>
                                                    <div class="counter">
                                                        <button type="button" class="minus">−</button>
                                                        <input type="number" name="adults" value="0" min="0">
                                                        <button type="button" class="plus">+</button>
                                                    </div>
                                                </div>
                                                <!-- Children Counter -->
                                                <div class="guest-item style-01">
                                                    <span class="guest-label">
                                                        Children (0-12 Years)
                                                    </span>
                                                    <div class="counter">
                                                        <button type="button" class="minus">−</button>
                                                        <input type="number" name="children" value="0" min="0">
                                                        <button type="button" class="plus">+</button>
                                                    </div>
                                                </div>
                                                <p class="subtitle gap-4 d-flex item-center">
                                                    Adult:
                                                    <span class="value-adult text_primary">0</span>
                                                    Children:
                                                    <span class="value-child text_primary">0</span>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Extra Services -->
                                        {{-- <div class="form-group extra-services">
                                            <div class="label h5  current">Add extra services</div>
                                            <ul class="check-service-list">
                                                <li>
                                                    <label class="check-box">
                                                        <input type="checkbox" id="add_sv_booking" name="add_sv_booking"
                                                            class="tf-checkbox">
                                                        <span class="checkmark subtitle">Add Service per booking</span>
                                                        <span class="value subtitle">$20</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="check-box">
                                                        <input type="checkbox" id="add_sv_person" name="add_sv_person"
                                                            class="tf-checkbox">
                                                        <span class="checkmark subtitle">Add Service per person</span>
                                                        <span class="value subtitle">$20</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <!-- Total -->
                                    <div class="tf-booking-totals form-group">
                                        <div class="tf-total-label h5">Total:</div>
                                        <div class="tf-total-value h5">$260.00</div>
                                        <input type="hidden" name="total_amount" value="0">
                                    </div>
                                    <!-- Submit Button -->
                                    <button class="form-group tf-btn primary hover-1 w-full" type="submit">
                                        <span>Booking Now</span>
                                    </button>
                                </form>
                            </div>
                            <div class="tf-form-book info-form">
                                <div class="form-topic h3">Tour Information</div>
                                <ul class="info-list">
                                    <li class="info-item">
                                        <span class="subtitle label">Max Guest:</span>
                                        <div class="value h5  max-guest-value">N/A</div>
                                    </li>
                                    <li class="info-item">
                                        <span class="subtitle label">Min Age:</span>
                                        <div class="value h5  min-age-value">N/A</div>
                                    </li>
                                    <li class="info-item">
                                        <span class="subtitle label">Location:</span>
                                        <div class="value h5  location-value">N/A</div>
                                    </li>
                                    <li class="info-item">
                                        <span class="subtitle label">Contact:</span>
                                        <div class="value h5  contact-value">N/A</div>
                                    </li>
                                    <li class="info-item">
                                        <span class="subtitle label">Language:</span>
                                        <div class="value h5  languages-value">N/A</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const tripBookingData = @json($dataTrip);
        window.tour_data_detail_new = tripBookingData;

        const formatRupiah = (value) => {
            const number = Number(value) || 0;

            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(number);
        };

        document.addEventListener('DOMContentLoaded', function() {
            /*
             * Dijalankan setelah listener DOMContentLoaded dari main.js selesai.
             * Form kemudian di-clone agar listener kalender lama yang bentrok
             * terlepas dari elemen booking pada halaman ini.
             */
            window.setTimeout(initTripDetailPage, 0);
        });

        function initTripDetailPage() {
            'use strict';

            const data = tripBookingData || {};
            const calendarData = data.calendarData || {};
            const originalForm = document.getElementById('trip-booking-form');

            if (!originalForm) {
                console.error('Form #trip-booking-form tidak ditemukan.');
                return;
            }

            /*
             * Menghapus event listener lama dari main.js tanpa mengubah tampilan.
             */
            const bookingForm = originalForm.cloneNode(true);
            originalForm.replaceWith(bookingForm);

            const today = new Date();
            today.setHours(0, 0, 0, 0);

            const monthNames = [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            ];

            const shortDayNames = [
                'Minggu',
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
            ];

            const availableDates = Object.keys(calendarData)
                .filter(isValidIsoDate)
                .sort();

            const firstFutureDate =
                availableDates.find((dateString) => {
                    const date = isoToLocalDate(dateString);
                    return date && date >= today;
                }) || availableDates[0] || formatDate(today);

            let selectedDateString = '';
            let mainCalendarDate = isoToLocalDate(firstFutureDate) || new Date(today);
            let sidebarCalendarDate = new Date(mainCalendarDate);

            /*
             * Elemen-elemen form booking.
             */
            const datePicker = bookingForm.querySelector('.select-items.datepicker');
            const dateTrigger = datePicker?.querySelector('.current');
            const dateList = datePicker?.querySelector('.list');
            const dateInput = bookingForm.querySelector('input[name="tour_date"]');
            const datepickerTitle = datePicker?.querySelector('.datepicker-title');
            const datepickerDays = datePicker?.querySelector('.datepicker-days');
            const datePrevButton = datePicker?.querySelector('.prev-month');
            const dateNextButton = datePicker?.querySelector('.next-month');

            const timeInput = bookingForm.querySelector('input[name="tour_time"]');
            const timePicker = timeInput?.closest('.select-items');
            const timeTrigger = timePicker?.querySelector('.current');
            const timeList = timePicker?.querySelector('.list');

            const adultInput = bookingForm.querySelector('input[name="adults"]');
            const childrenInput = bookingForm.querySelector('input[name="children"]');
            const totalValueElement = bookingForm.querySelector('.tf-total-value');
            const totalHiddenInput = bookingForm.querySelector('input[name="total_amount"]');
            const adultPriceElement = bookingForm.querySelector('.value-adult');
            const childrenPriceElement = bookingForm.querySelector('.value-child');

            const prices = {
                adult: 0,
                children: 0,
            };

            window.PRICES = prices;
            window.TOUR_INFO = {
                title: data.title || '',
                place: data.place || '',
                maxGuest: Number(data.maxGuest) || 0,
                minAge: Number(data.minAge) || 0,
                contact: data.contact || '',
                languages: Array.isArray(data.languages) ? data.languages : [],
            };

            bindText('.tour-title-value', data.title || '-');
            bindText('.max-guest-value', data.maxGuest ?? '-');
            bindText('.min-age-value', data.minAge ?? '-');
            bindText('.location-value', data.place || '-');
            bindText('.contact-value', data.contact || '-');
            bindText(
                '.languages-value',
                Array.isArray(data.languages) && data.languages.length
                    ? data.languages.join(', ')
                    : '-'
            );

            /*
             * Kalender besar "Calendar & Price".
             */
            window.tripPrevMonth = function() {
                mainCalendarDate = new Date(
                    mainCalendarDate.getFullYear(),
                    mainCalendarDate.getMonth() - 1,
                    1
                );
                renderMainCalendar();
            };

            window.tripNextMonth = function() {
                mainCalendarDate = new Date(
                    mainCalendarDate.getFullYear(),
                    mainCalendarDate.getMonth() + 1,
                    1
                );
                renderMainCalendar();
            };

            /*
             * Fungsi ini sengaja menimpa fungsi global dari main.js,
             * sehingga kalender besar dan sidebar selalu memakai data Laravel.
             */
            window.updatePriceFromCalendar = function(dateString, selectedPrices) {
                if (!dateString || !calendarData[dateString]) {
                    return;
                }

                selectedDateString = dateString;

                if (dateInput) {
                    dateInput.value = dateString;
                    dispatchValueEvents(dateInput);
                }

                /*
                 * Waktu wajib dipilih ulang ketika tanggal berubah.
                 */
                if (timeInput) {
                    timeInput.value = '';
                    dispatchValueEvents(timeInput);
                }

                prices.adult = Number(selectedPrices?.adult) || 0;
                prices.children = Number(selectedPrices?.children) || 0;

                updateDisplayedPrices();
                updateTotal();
                renderTimeOptions();
                renderSidebarDatepicker();
                renderMainCalendar();
            };

            function renderMainCalendar() {
                const year = mainCalendarDate.getFullYear();
                const month = mainCalendarDate.getMonth();
                const firstDayIndex = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const previousMonthDays = new Date(year, month, 0).getDate();
                const title = document.getElementById('monthYear');
                const grid = document.getElementById('daysGridNew');

                if (title) {
                    title.textContent = `${monthNames[month]} ${year}`;
                }

                if (!grid) {
                    return;
                }

                grid.innerHTML = '';

                for (let index = firstDayIndex - 1; index >= 0; index--) {
                    const dayNumber = previousMonthDays - index;
                    const date = new Date(year, month - 1, dayNumber);
                    grid.appendChild(createMainCalendarCell(date, true));
                }

                for (let dayNumber = 1; dayNumber <= daysInMonth; dayNumber++) {
                    const date = new Date(year, month, dayNumber);
                    grid.appendChild(createMainCalendarCell(date, false));
                }

                const usedCells = firstDayIndex + daysInMonth;
                const trailingCells = (7 - (usedCells % 7)) % 7;

                for (let dayNumber = 1; dayNumber <= trailingCells; dayNumber++) {
                    const date = new Date(year, month + 1, dayNumber);
                    grid.appendChild(createMainCalendarCell(date, true));
                }
            }

            function createMainCalendarCell(date, isOtherMonth) {
                const dateString = formatDate(date);
                const schedule = calendarData[dateString];
                const normalizedDate = new Date(date);
                normalizedDate.setHours(0, 0, 0, 0);

                const isPast = normalizedDate < today;
                const isAvailable = Boolean(schedule) && !isPast && !isOtherMonth;
                const cell = document.createElement('div');

                cell.className = 'day-cell';

                if (isOtherMonth) {
                    cell.classList.add('empty');
                }

                if (!isAvailable) {
                    cell.classList.add('disabled');
                }

                if (dateString === formatDate(today) && !isOtherMonth) {
                    cell.classList.add('today');
                }

                if (dateString === selectedDateString && !isOtherMonth) {
                    cell.classList.add('active');
                }

                if (isAvailable) {
                    const adultPrice = Number(schedule?.prices?.adult) || 0;

                    cell.innerHTML = `
                        <div class="day-number">${date.getDate()}</div>
                        <div class="day-price">${formatRupiah(adultPrice)}</div>
                    `;

                    cell.setAttribute('role', 'button');
                    cell.setAttribute('tabindex', '0');

                    const selectHandler = function() {
                        selectTourDate(dateString);
                    };

                    cell.addEventListener('click', selectHandler);
                    cell.addEventListener('keydown', function(event) {
                        if (event.key === 'Enter' || event.key === ' ') {
                            event.preventDefault();
                            selectHandler();
                        }
                    });
                } else {
                    cell.innerHTML = `
                        <div class="day-number">${date.getDate()}</div>
                        <div class="day-name">${shortDayNames[date.getDay()]}</div>
                    `;
                }

                return cell;
            }

            /*
             * Datepicker di sidebar.
             */
            function renderSidebarDatepicker() {
                if (!datepickerDays || !datepickerTitle) {
                    return;
                }

                const year = sidebarCalendarDate.getFullYear();
                const month = sidebarCalendarDate.getMonth();
                const firstDayIndex = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const previousMonthDays = new Date(year, month, 0).getDate();

                datepickerTitle.textContent = `${monthNames[month]} ${year}`;
                datepickerDays.innerHTML = '';

                /*
                 * Selalu menghasilkan 42 kotak agar layout datepicker stabil.
                 */
                for (let cellIndex = 0; cellIndex < 42; cellIndex++) {
                    let date;
                    let isOtherMonth = false;

                    if (cellIndex < firstDayIndex) {
                        const day = previousMonthDays - firstDayIndex + cellIndex + 1;
                        date = new Date(year, month - 1, day);
                        isOtherMonth = true;
                    } else if (cellIndex >= firstDayIndex + daysInMonth) {
                        const day = cellIndex - firstDayIndex - daysInMonth + 1;
                        date = new Date(year, month + 1, day);
                        isOtherMonth = true;
                    } else {
                        const day = cellIndex - firstDayIndex + 1;
                        date = new Date(year, month, day);
                    }

                    datepickerDays.appendChild(
                        createSidebarDateButton(date, isOtherMonth)
                    );
                }
            }

            function createSidebarDateButton(date, isOtherMonth) {
                const dateString = formatDate(date);
                const normalizedDate = new Date(date);
                normalizedDate.setHours(0, 0, 0, 0);

                const hasSchedule = Boolean(calendarData[dateString]);
                const isPast = normalizedDate < today;
                const canSelect = hasSchedule && !isPast;
                const button = document.createElement('button');

                button.type = 'button';
                button.className = 'datepicker-day';
                button.textContent = date.getDate();
                button.dataset.date = dateString;

                if (isOtherMonth) {
                    button.classList.add('other-month');
                }

                if (date.getDay() === 0 || date.getDay() === 6) {
                    button.classList.add('weekend');
                }

                if (dateString === formatDate(today)) {
                    button.classList.add('today');
                }

                if (dateString === selectedDateString) {
                    button.classList.add('selected');
                }

                if (!canSelect) {
                    button.classList.add('disabled');
                    button.disabled = true;
                    button.setAttribute('aria-disabled', 'true');
                } else {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        event.stopPropagation();

                        selectTourDate(dateString);
                        closeDatePicker();
                    });
                }

                return button;
            }

            function selectTourDate(dateString) {
                const schedule = calendarData[dateString];

                if (!schedule) {
                    return;
                }

                const selectedDate = isoToLocalDate(dateString);

                if (!selectedDate || selectedDate < today) {
                    return;
                }

                selectedDateString = dateString;
                sidebarCalendarDate = new Date(
                    selectedDate.getFullYear(),
                    selectedDate.getMonth(),
                    1
                );

                window.updatePriceFromCalendar(dateString, schedule.prices || {});
            }

            /*
             * Pilihan waktu berdasarkan tanggal yang sudah dipilih.
             */
            function renderTimeOptions() {
                if (!timeList || !timeInput) {
                    return;
                }

                timeList.innerHTML = '';

                const dateString = dateInput?.value || selectedDateString;

                if (!dateString) {
                    appendDisabledTimeMessage('Pilih tanggal terlebih dahulu.');
                    return;
                }

                const times = calendarData[dateString]?.times;

                if (!Array.isArray(times) || times.length === 0) {
                    appendDisabledTimeMessage('Tidak ada waktu yang tersedia.');
                    return;
                }

                times.forEach(function(time) {
                    const item = document.createElement('li');

                    item.className = 'time-option';
                    item.textContent = String(time);
                    item.dataset.time = String(time);
                    item.setAttribute('role', 'option');
                    item.setAttribute('tabindex', '0');

                    const chooseTime = function(event) {
                        event?.preventDefault();
                        event?.stopPropagation();

                        timeInput.value = String(time);
                        dispatchValueEvents(timeInput);

                        timeList
                            .querySelectorAll('.time-option')
                            .forEach((option) => option.classList.remove('selected'));

                        item.classList.add('selected');
                        closeTimePicker();
                    };

                    item.addEventListener('click', chooseTime);
                    item.addEventListener('keydown', function(event) {
                        if (event.key === 'Enter' || event.key === ' ') {
                            chooseTime(event);
                        }
                    });

                    timeList.appendChild(item);
                });
            }

            function appendDisabledTimeMessage(message) {
                const item = document.createElement('li');

                item.className = 'disabled text_primary text-center';
                item.textContent = message;
                timeList.appendChild(item);
            }

            /*
             * Dropdown controls.
             */
            function openDatePicker() {
                closeTimePicker();
                dateList?.classList.add('active');
                dateTrigger?.classList.add('active');
                renderSidebarDatepicker();
            }

            function closeDatePicker() {
                dateList?.classList.remove('active');
                dateTrigger?.classList.remove('active');
            }

            function openTimePicker() {
                closeDatePicker();
                renderTimeOptions();
                timeList?.classList.add('active');
                timeTrigger?.classList.add('active');
            }

            function closeTimePicker() {
                timeList?.classList.remove('active');
                timeTrigger?.classList.remove('active');
            }

            dateTrigger?.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopPropagation();

                if (dateList?.classList.contains('active')) {
                    closeDatePicker();
                } else {
                    openDatePicker();
                }
            });

            dateList?.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            timeTrigger?.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopPropagation();

                if (timeList?.classList.contains('active')) {
                    closeTimePicker();
                } else {
                    openTimePicker();
                }
            });

            timeList?.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            datePrevButton?.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopPropagation();

                sidebarCalendarDate = new Date(
                    sidebarCalendarDate.getFullYear(),
                    sidebarCalendarDate.getMonth() - 1,
                    1
                );

                renderSidebarDatepicker();
            });

            dateNextButton?.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopPropagation();

                sidebarCalendarDate = new Date(
                    sidebarCalendarDate.getFullYear(),
                    sidebarCalendarDate.getMonth() + 1,
                    1
                );

                renderSidebarDatepicker();
            });

            document.addEventListener('click', function() {
                closeDatePicker();
                closeTimePicker();
            });

            /*
             * Counter pengunjung dan perhitungan total.
             */
            bindGuestCounter(adultInput);
            bindGuestCounter(childrenInput);

            function bindGuestCounter(input) {
                if (!input) {
                    return;
                }

                const guestItem = input.closest('.guest-item');
                const minusButton = guestItem?.querySelector('.minus');
                const plusButton = guestItem?.querySelector('.plus');

                minusButton?.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();

                    const currentValue = Math.max(0, Number.parseInt(input.value, 10) || 0);
                    input.value = Math.max(0, currentValue - 1);
                    updateTotal();
                });

                plusButton?.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();

                    const currentValue = Math.max(0, Number.parseInt(input.value, 10) || 0);
                    const nextValue = currentValue + 1;

                    if (!canUseGuestValue(input, nextValue)) {
                        alert(`Jumlah maksimal tamu adalah ${window.TOUR_INFO.maxGuest}.`);
                        return;
                    }

                    input.value = nextValue;
                    updateTotal();
                });

                input.addEventListener('input', function() {
                    let value = Math.max(0, Number.parseInt(input.value, 10) || 0);

                    if (!canUseGuestValue(input, value)) {
                        const otherInput = input === adultInput ? childrenInput : adultInput;
                        const otherValue = Math.max(
                            0,
                            Number.parseInt(otherInput?.value, 10) || 0
                        );

                        value = Math.max(0, window.TOUR_INFO.maxGuest - otherValue);
                        input.value = value;

                        alert(`Jumlah maksimal tamu adalah ${window.TOUR_INFO.maxGuest}.`);
                    }

                    updateTotal();
                });
            }

            function canUseGuestValue(changedInput, proposedValue) {
                const adultValue =
                    changedInput === adultInput
                        ? proposedValue
                        : Math.max(0, Number.parseInt(adultInput?.value, 10) || 0);

                const childrenValue =
                    changedInput === childrenInput
                        ? proposedValue
                        : Math.max(0, Number.parseInt(childrenInput?.value, 10) || 0);

                if (!window.TOUR_INFO.maxGuest) {
                    return true;
                }

                return adultValue + childrenValue <= window.TOUR_INFO.maxGuest;
            }

            function updateDisplayedPrices() {
                if (adultPriceElement) {
                    adultPriceElement.textContent = formatRupiah(prices.adult);
                }

                if (childrenPriceElement) {
                    childrenPriceElement.textContent = formatRupiah(prices.children);
                }

                document
                    .querySelectorAll('.adult-price-value')
                    .forEach((element) => {
                        element.textContent = formatRupiah(prices.adult);
                    });
            }

            function calculateTotal() {
                const adults = Math.max(
                    0,
                    Number.parseInt(adultInput?.value, 10) || 0
                );

                const children = Math.max(
                    0,
                    Number.parseInt(childrenInput?.value, 10) || 0
                );

                if ($('#paymentMethod').val().split('|')[0] == 'QRISC' || $('#paymentMethod').val().split('|')[0] == 'QRISC2') {
                    // var adminFee = (((adults * prices.adult + children * prices.children)/100)*0.7)+parseFloat($('#paymentMethod').val().split('|')[1]);
                    var adminFee = (((adults * prices.adult + children * prices.children)/100)*0.7)+parseFloat($('#paymentMethod').val().split('|')[1]);
                    // console.log(adminFee);
                }
                else{
                    var adminFee = parseFloat($('#paymentMethod').val().split('|')[1]);
                    // console.log(adminFee);
                }

                if ('{{ $trip_detail->trip_category }}' == 'O') {
                    // if (adults <= 5) {
                    //     const totalPrice = adults * prices.adult + children * prices.children;
                    //     return totalPrice;
                    // }else{
                    //     alert('Total Keseluruhan Tamu Maksimal 5');
                    // }
                    // return adults * prices.adult + children * prices.children;

                    const totalPrice = adults * prices.adult + children * prices.children + adminFee;
                    return totalPrice;

                    // if (adults % 5) {
                    //     const totalPrice = ((adults * prices.adult)*2) + children * prices.children;
                    //     return totalPrice;
                    // }
                }else{
                    // if (adults <= 5) {
                    //     const totalPrice = prices.adult + children * prices.children;
                    //     return totalPrice;
                    // }else{
                    //     alert('Total Keseluruhan Tamu Maksimal 5');
                    // }

                    // if (adults % 5) {
                        // const totalPrice = prices.adult + children * prices.children;
                        // return totalPrice;
                    // }

                    const totalPrice = prices.adult + children * prices.children + adminFee;
                    return totalPrice;
                    
                }
                // return totalPrice;


            }

            function updateTotal() {
                const total = calculateTotal();

                if (totalValueElement) {
                    totalValueElement.textContent = formatRupiah(total);
                }

                if (totalHiddenInput) {
                    totalHiddenInput.value = String(total);
                }
            }

            /*
             * Data yang disimpan sebelum berpindah ke checkout.
             */
            window.getBookingInfo = function() {
                const adults = Math.max(
                    0,
                    Number.parseInt(adultInput?.value, 10) || 0
                );

                const children = Math.max(
                    0,
                    Number.parseInt(childrenInput?.value, 10) || 0
                );

                return {
                    tourTitle: window.TOUR_INFO.title,
                    tourPlace: window.TOUR_INFO.place,
                    tourContact: window.TOUR_INFO.contact,
                    tourLanguages: window.TOUR_INFO.languages.join(', '),

                    tourDate: dateInput?.value || '',
                    tourTime: timeInput?.value || '',

                    adults: adults,
                    children: children,
                    totalGuests: adults + children,

                    adultPrice: prices.adult,
                    childrenPrice: prices.children,
                    adultTotal: adults * prices.adult,
                    childrenTotal: children * prices.children,
                    totalAmount: calculateTotal(),

                    bookingDate: new Date().toISOString(),
                };
            };

            bookingForm.addEventListener('submit', function(event) {
                const dateValue = dateInput?.value.trim() || '';
                const timeValue = timeInput?.value.trim() || '';
                const adults = Math.max(
                    0,
                    Number.parseInt(adultInput?.value, 10) || 0
                );

                const children = Math.max(
                    0,
                    Number.parseInt(childrenInput?.value, 10) || 0
                );

                if (!dateValue || !calendarData[dateValue]) {
                    event.preventDefault();
                    alert('Silakan pilih tanggal tour yang tersedia.');
                    openDatePicker();
                    return;
                }

                const allowedTimes = calendarData[dateValue]?.times || [];

                if (!timeValue || !allowedTimes.includes(timeValue)) {
                    event.preventDefault();
                    alert('Silakan pilih waktu tour yang tersedia.');
                    openTimePicker();
                    return;
                }

                if (
                    window.TOUR_INFO.maxGuest &&
                    adults + children > window.TOUR_INFO.maxGuest
                ) {
                    event.preventDefault();
                    alert(`Jumlah maksimal tamu adalah ${window.TOUR_INFO.maxGuest}.`);
                    return;
                }

                /*
                 * Readonly input tetap ikut FormData dan query string.
                 * setAttribute tidak diperlukan; nilai property .value sudah cukup.
                 */
                const bookingInfo = window.getBookingInfo();

                localStorage.setItem(
                    'bookingData',
                    JSON.stringify(bookingInfo)
                );
            });

            /*
             * FAQ dan Tour Plan.
             */
            initAccordion('.faq-item');
            initAccordion('.property-schedule .tour-plan-item');

            /*
             * Render awal.
             */
            updateDisplayedPrices();
            updateTotal();
            renderMainCalendar();
            renderSidebarDatepicker();
            renderTimeOptions();

            function initAccordion(selector) {
                const items = document.querySelectorAll(selector);

                items.forEach(function(item) {
                    const collapse = item.querySelector('.collapse');

                    if (!collapse) {
                        return;
                    }

                    if (collapse.classList.contains('show')) {
                        item.classList.add('active');
                    }

                    collapse.addEventListener('show.bs.collapse', function() {
                        items.forEach(function(otherItem) {
                            if (otherItem === item) {
                                return;
                            }

                            const otherCollapse = otherItem.querySelector('.collapse');

                            if (
                                otherCollapse &&
                                typeof bootstrap !== 'undefined'
                            ) {
                                const instance =
                                    bootstrap.Collapse.getOrCreateInstance(
                                        otherCollapse,
                                        { toggle: false }
                                    );

                                instance.hide();
                            }

                            otherItem.classList.remove('active');
                        });

                        item.classList.add('active');
                    });

                    collapse.addEventListener('hide.bs.collapse', function() {
                        item.classList.remove('active');
                    });
                });
            }

            function bindText(selector, value) {
                document.querySelectorAll(selector).forEach(function(element) {
                    element.textContent = value;
                });
            }

            function dispatchValueEvents(element) {
                element.dispatchEvent(new Event('input', { bubbles: true }));
                element.dispatchEvent(new Event('change', { bubbles: true }));
            }

            function formatDate(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');

                return `${year}-${month}-${day}`;
            }

            function isoToLocalDate(dateString) {
                if (!isValidIsoDate(dateString)) {
                    return null;
                }

                const [year, month, day] = dateString
                    .split('-')
                    .map(Number);

                const date = new Date(year, month - 1, day);
                date.setHours(0, 0, 0, 0);

                return date;
            }

            function isValidIsoDate(value) {
                if (!/^\d{4}-\d{2}-\d{2}$/.test(String(value))) {
                    return false;
                }

                const [year, month, day] = String(value)
                    .split('-')
                    .map(Number);

                const date = new Date(year, month - 1, day);

                return (
                    date.getFullYear() === year &&
                    date.getMonth() === month - 1 &&
                    date.getDate() === day
                );
            }
        }
    </script>
@endsection