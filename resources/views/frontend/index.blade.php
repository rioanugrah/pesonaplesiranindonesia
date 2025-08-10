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
    $kategoriTujuans = [
        [
            'id' => 1,
            'image' => asset('frontend/assets/img/gallery/1.jpg'),
            'title' => 'Jawa Barat',
            'tour' => 1,
        ],
        [
            'id' => 2,
            'image' => asset('frontend/assets/img/gallery/2.jpg'),
            'title' => 'Jawa Tengah',
            'tour' => 2,
        ],
        [
            'id' => 3,
            'image' => asset('frontend/assets/img/gallery/3.jpg'),
            'title' => 'Jawa Timur',
            'tour' => 3,
        ],
    ];

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

    $testimonis = [
        [
            'id' => 1,
            'name' => 'Yusuf Yoga A.',
            'description' => 'Pelayanan ramah, harga terjangkau, guide nya sopan. Top pokoknya',
            'image' => '-',
            'rating' => 5
        ],
        [
            'id' => 2,
            'name' => 'Adlian Zuhdi',
            'description' => 'driver & rekan tim semuanya ramah, recomended',
            'image' => '-',
            'rating' => 5
        ],
        [
            'id' => 2,
            'name' => 'Daffa Afzal',
            'description' => 'TL e nya ramah" dan pembawaan dalam pelayanannya juga baik',
            'image' => '<svg id="fi_1999625" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m475.955 375c16.028-32.582 25.045-69.236 25.045-108 0-135.31-109.69-245-245-245s-245 109.69-245 245c0 38.764 9.017 75.418 25.045 108z" fill="#64c0f4"></path><path d="m181.139 250.064h20.781v15.244h-20.781z" fill="#0f3e4c"></path><path d="m310.098 250.064h20.781v15.244h-20.781z" fill="#0f3e4c"></path><path d="m184.457 263.766c-10.946 16.523-6.699 36.726-1.134 50.866 19.444 49.4 71.833 67.94 72.36 68.122l.326.112.326-.112c.527-.182 52.917-18.722 72.361-68.122 5.564-14.136 9.81-34.334-1.128-50.855l-.164-.072c-7.168-3.136-14.908-4.755-22.732-4.755-32.408 0-64.864 0-97.342 0-7.824 0-15.564 1.619-22.732 4.755z" fill="#ebf0f2"></path><path d="m184.597 263.705-.14.061c-10.947 16.523-6.699 36.726-1.135 50.866 19.444 49.4 71.833 67.94 72.361 68.122l.326.112.326-.112c.025-.009.176-.062.436-.159-.254-.262-.498-.524-.762-.787-35.707-35.707-11.6-68.535-11.6-68.535l-24.581-54.324c-4.167 0-8.331 0-12.499 0-7.825.001-15.564 1.62-22.732 4.756z" fill="#c2d4e6"></path><path d="m452.111 324.153c-5.337-9.534-13.807-16.921-23.98-20.907l-28.23-11.063c3.043 12.015-3.18 26.801-18.517 43.96-22.294 24.941-55.176 37.523-78.834 43.686-25.694 6.693-46.369 7.473-46.506 7.48-.206-.008-20.841-.782-46.53-7.469-23.673-6.162-56.574-18.745-78.878-43.698-15.34-17.162-21.563-31.951-18.516-43.968l-28.249 11.071c-10.173 3.987-18.643 11.373-23.98 20.907-7.869 14.055-16.3 31.734-24.343 49.848 24.49 50.364 65.732 91.072 116.475 114.893v-25.009c0-6.003 4.911-10.914 10.914-10.914h186.8c6.003 0 10.914 4.911 10.914 10.914v24.692c50.434-23.865 91.418-64.437 115.8-114.577-8.042-18.113-16.473-35.792-24.34-49.846z" fill="#2c2c42"></path><path d="m130.645 342.231c1.271-.63 2.352-1.575 3.142-2.73-1.069-1.097-2.126-2.21-3.152-3.358-15.34-17.162-21.563-31.951-18.516-43.968l-28.249 11.071c-10.173 3.987-18.643 11.373-23.98 20.907-7.868 14.054-16.299 31.733-24.342 49.847 12.547 25.803 29.501 49.062 49.867 68.824 4.13-18.044 10.482-45.573 14.87-63.543 5.532-22.654 23.194-33.498 30.36-37.05z" fill="#212135"></path><path d="m256 512c37.834 0 73.663-8.577 105.652-23.892v-26.224c0-6.003-4.911-10.914-10.914-10.914h-188.801c-6.003 0-10.914 4.911-10.914 10.914v26.54c31.818 15.114 67.408 23.576 104.977 23.576z" fill="#fbcc68"></path><path d="m238.716 475.47c0-11.588 7.836-21.427 18.469-24.5h-95.247c-6.003 0-10.914 4.911-10.914 10.914v26.54c26.895 12.775 56.491 20.773 87.693 22.95v-35.904z" fill="#efaa42"></path><path d="m340.483 268.897-11.625-4.556-1.455-.637c-7.168-3.136-14.908-4.755-22.732-4.755-32.408 0-64.864 0-97.342 0-7.824 0-15.564 1.619-22.732 4.755l-1.455.637-11.625 4.556c9.458 37.861 43.693 65.908 84.483 65.908s75.025-28.047 84.483-65.908z" fill="#c2d4e6"></path><path d="m190.679 262.363c.648-.158 1.296-.319 1.949-.47.413-.414.823-.849 1.228-1.303-3.161.773-6.262 1.803-9.259 3.114l-1.455.637-11.625 4.556c7.946 31.809 33.384 56.683 65.502 63.825 1.817-11.854 7.39-19.449 7.39-19.449l-.991-2.19c-25.53-4.802-45.996-23.928-52.739-48.72z" fill="#99b8da"></path><path d="m321.998 261.663c-5.589-1.793-11.434-2.713-17.327-2.713-32.408 0-64.864 0-97.342 0-5.893 0-11.738.92-17.327 2.713 6.868 30.119 33.798 52.602 65.998 52.602s59.13-22.483 65.998-52.602z" fill="#e0d3cd"></path><path d="m304.039 233.818c-8.422 11.921-19.716 23.061-34.779 30.347-4.098 1.982-8.597 3.076-13.149 3.085-.034 0-.068 0-.102 0-.025 0-.049 0-.074 0-4.572-.007-9.088-1.115-13.202-3.108-15.057-7.294-26.344-18.441-34.761-30.366-3.027 11.208-8.643 23.416-15.345 30.117-.653.151-1.3.311-1.949.47 7.821 28.752 34.092 49.902 65.321 49.902s57.5-21.15 65.32-49.902c-.648-.158-1.296-.319-1.949-.47-6.691-6.692-12.302-18.879-15.331-30.075z" fill="#ffaa7b"></path><path d="m258.163 267.164c-.682.05-1.366.084-2.052.085-.034 0-.067 0-.102 0-.024 0-.049 0-.074 0-4.572-.007-9.088-1.115-13.202-3.108-15.057-7.294-26.344-18.441-34.761-30.366-3.026 11.208-8.643 23.416-15.345 30.117-.653.151-1.301.311-1.949.47 6.831 25.113 27.738 44.424 53.73 48.91 8.441-14.789 12.168-32.049 13.755-46.108z" fill="#f7996b"></path><path d="m345.146 137.59c-3.685-3.377-11.024-1.665-14.198.403.695 4.329.735 8.759.134 13.132l-4.742 27.275c0 2.199-.26 4.356-.388 6.475 9.132 2.754 14.856-5.444 15.62-11.07.329-2.422.867-4.809 1.613-7.138 2.43-7.586 11.193-20.616 1.961-29.077z" fill="#ffaa7b"></path><path d="m166.873 137.59c3.685-3.377 11.025-1.665 14.198.403-.695 4.329-.735 8.759-.134 13.132l4.742 27.275c0 2.199.505 4.356.632 6.475-9.132 2.754-15.1-5.444-15.865-11.07-.329-2.422-.867-4.809-1.613-7.138-2.429-7.586-11.192-20.616-1.96-29.077z" fill="#f7996b"></path><path d="m328.694 129.566c-.843-2.199-1.905-4.426-3.244-6.527-2.268-3.558-3.265-7.766-2.961-11.962.874-12.068.405-35.671-15.437-42.8-13.46-6.057-29.971-2.55-40.5.952-6.838 2.274-14.247 2.274-21.084 0-10.529-3.501-27.04-7.008-40.5-.952-15.888 7.149-16.314 30.867-15.43 42.903.306 4.164-.719 8.329-2.969 11.86-1.24 1.946-2.243 4-3.054 6.04-2.804 7.054-3.579 14.753-2.547 22.274l3.714 27.047s9.248 64.098 58.052 87.742c4.114 1.993 8.63 3.101 13.202 3.108h.074.102c4.552-.009 9.051-1.103 13.149-3.085 47.528-22.989 57.569-84.326 58.076-87.615 0-.05.002-.099.002-.149l3.745-27.275c.997-7.273.24-14.7-2.39-21.561z" fill="#fb9"></path><path d="m237.93 178.401-2.367-27.047c-.658-7.521-.164-15.219 1.623-22.274.517-2.04 1.156-4.094 1.946-6.04 1.434-3.531 2.087-7.696 1.892-11.86-.522-11.151-.321-32.317 7.761-41.057-1.116-.247-2.227-.531-3.319-.894-10.529-3.501-27.039-7.008-40.499-.952-15.888 7.149-16.314 30.867-15.43 42.903.306 4.164-.719 8.329-2.969 11.86-1.24 1.946-2.243 4-3.054 6.04-2.805 7.054-3.579 14.753-2.547 22.274l3.714 27.047s9.248 64.098 58.052 87.742c4.114 1.993 8.63 3.101 13.202 3.108h.074.101c4.552-.009 9.051-1.103 13.149-3.085 1.186-.574 2.341-1.177 3.481-1.797-29.19-24.912-34.81-85.968-34.81-85.968z" fill="#ffaa7b"></path><g fill="#404051"><path d="m357.101 84.053c4.637-.706 9.742-4.356 12.55-6.635 1.01-.82.801-2.392-.367-2.964-21.943-10.737-35.126-45.543-52.964-56.591-15.267-9.456-28.432-4.01-32.576-1.812-.771.409-1.733.185-2.241-.524-5.894-8.215-15.677-13.09-21.424-15.394-1.534-.615-2.997 1.004-2.231 2.469 2.538 4.856 3.607 8.811 4.054 11.42.242 1.416-1.236 2.51-2.524 1.873-19.243-9.511-53.461-2.74-74.35 22.801-17.38 21.251-30.772 24.437-35.6 24.842-1.093.092-1.84 1.148-1.559 2.208 1.871 7.066 9.088 11.643 12.143 13.302.849.461 1.203 1.538.718 2.373-1.45 2.497-4.549 4.011-6.368 4.72-.811.316-1.262 1.175-1.071 2.024 1.755 7.813 10.035 43.237 18.801 56.97 6.111 9.574 9.452 22.507 11.113 30.981.236 1.204 1.989 1.096 2.075-.128.652-9.245 1.598-24.316 1.967-38.437.453-17.324 15.587-27.505 22.483-31.254 1.331-.724 2.895.465 2.568 1.944l-.942 4.267c-.27 1.224.785 2.339 2.02 2.133 51.692-8.649 70.674-26.509 77.605-37.641.484-.778 1.428-1.124 2.301-.844.798.256 1.34.988 1.381 1.825 1.616 33.261 27.332 37.314 31.042 52.069 3.044 12.106 2.269 35.075 1.683 45.913-.08 1.482 1.952 2.012 2.586.67 8.063-17.056 6.905-40.638 19.718-56.224 10.411-12.664 15.255-20.972 17.098-24.502.509-.974-.01-2.139-1.055-2.478-4.68-1.514-7.845-4.324-9.715-6.484-.906-1.047-.291-2.683 1.081-2.892z"></path><path d="m374.375 268.267c-2.888-.98-5.375-2.902-7.027-5.465-5.727-8.883-22.785-27.978-57.249-12.738 0 0 37.167 14.658 17.667 64.201s-71.756 67.543-71.756 67.543v6.5s82.62-2.833 126.12-51.5c41.595-46.536 5.877-63.914-7.755-68.541z"></path><path d="m137.643 268.267c2.888-.98 5.375-2.902 7.027-5.465 5.728-8.883 22.785-27.978 57.25-12.738 0 0-37.167 14.658-17.667 64.201s71.756 67.543 71.756 67.543v6.5s-82.62-2.833-126.12-51.5c-41.596-46.536-5.878-63.914 7.754-68.541z"></path></g><path d="m133.167 340.301c.642-.724 1.158-1.558 1.502-2.478 6.108-16.363 20.38-7.976 27.95-21.493 8-14.284 19.11-9.299 19.11-9.299-13.311-43.748 20.192-56.967 20.192-56.967-34.465-15.24-51.522 3.855-57.25 12.738-1.652 2.563-4.139 4.485-7.027 5.465-13.632 4.626-49.35 22.005-7.754 68.541 1.067 1.195 2.164 2.353 3.277 3.493z" fill="#2c2c42"></path><path d="m376.652 416.639v63.637c5.118-2.902 10.12-5.985 15-9.236v-54.401c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5z" fill="#212135"></path><path d="m136.023 416.639c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v54.851c4.88 3.228 9.884 6.282 15 9.162z" fill="#212135"></path><circle cx="330.271" cy="356.176" fill="#2c2c42" r="13.759"></circle><circle cx="181.728" cy="356.176" fill="#2c2c42" r="13.759"></circle><path d="m330.271 351.783c-4.142 0-7.5 3.357-7.5 7.5v109.692c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-109.692c0-4.142-3.358-7.5-7.5-7.5z" fill="#545460"></path><path d="m330.271 446.435c-5.688 0-10.3 4.611-10.3 10.3v16.234c0 5.689 4.611 10.3 10.3 10.3 5.688 0 10.3-4.611 10.3-10.3v-16.234c0-5.689-4.612-10.3-10.3-10.3z" fill="#ebf0f2"></path><path d="m181.728 351.783c-4.142 0-7.5 3.357-7.5 7.5v109.692c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-109.692c0-4.142-3.358-7.5-7.5-7.5z" fill="#545460"></path><path d="m181.728 446.435c-5.688 0-10.3 4.611-10.3 10.3v16.234c0 5.689 4.611 10.3 10.3 10.3s10.3-4.611 10.3-10.3v-16.234c0-5.689-4.611-10.3-10.3-10.3z" fill="#ebf0f2"></path><path d="m330.271 467.268c-5.688 0-10.3-4.611-10.3-10.3v16c0 5.689 4.612 10.3 10.3 10.3 5.689 0 10.3-4.611 10.3-10.3v-16c0 5.69-4.612 10.3-10.3 10.3z" fill="#c2d4e6"></path><path d="m181.728 467.268c-5.688 0-10.3-4.611-10.3-10.3v16c0 5.689 4.611 10.3 10.3 10.3s10.3-4.611 10.3-10.3v-16c0 5.69-4.611 10.3-10.3 10.3z" fill="#c2d4e6"></path><path d="m241.118 48.947c-25.434-20.282 18.26-33.051 18.26-33.051-19.243-9.511-53.461-2.74-74.35 22.801-17.38 21.251-30.772 24.437-35.6 24.842-1.093.092-1.84 1.148-1.559 2.208 1.871 7.066 9.088 11.643 12.143 13.302.849.461 1.203 1.538.718 2.373-1.45 2.497-4.549 4.011-6.368 4.72-.811.316-1.262 1.175-1.071 2.024 1.755 7.813 10.035 43.237 18.801 56.97 6.111 9.574 9.452 22.507 11.113 30.981.236 1.204 1.989 1.096 2.075-.128.652-9.245 1.598-24.316 1.966-38.437.453-17.324 15.587-27.505 22.483-31.254 1.331-.724 2.895.465 2.568 1.944l-.942 4.267c-.27 1.224.785 2.339 2.021 2.133 10.472-1.752 19.581-3.887 27.54-6.262-11.018-27.716 25.633-39.153.202-59.433z" fill="#2c2c42"></path></svg>',
            'rating' => 5
        ],
    ];

    $tims = [
        [
            'id' => 1,
            'name' => 'Nurwahid Abdillah',
            'position' => 'Chief Executive Officer',
            'image' => asset('frontend/assets/img/team/profil_wahid.jpg')
        ],
        [
            'id' => 2,
            'name' => 'Fabrizio Danindra K.',
            'position' => 'Chief Operating Officer',
            'image' => asset('frontend/assets/img/team/profil_dani.jpg')
        ],
        [
            'id' => 3,
            'name' => 'Bima Gani',
            'position' => 'Chief Marketing Officer',
            'image' => asset('frontend/assets/img/team/profil_bima.jpg')
        ],
        [
            'id' => 4,
            'name' => 'Rio Anugrah A.S',
            'position' => 'Chief Technology Officer',
            'image' => asset('frontend/assets/img/team/profil_rio.jpg')
        ],
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
                                        <div class="booking-list-area">
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
                                        </div>
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

    <section class="popular-destination-section section-padding pt-0">
        <div class="car-shape float-bob-x">
            <img src="{{ asset('frontend/') }}/assets/img/destination/car.png" alt="img">
        </div>
        <div class="container">
            <div class="section-title-area justify-content-between">
                <div class="section-title">
                    <span class="sub-title wow fadeInUp">
                        Tempat Terbaik yang Direkomendasikan
                    </span>
                    <h2 class="wow fadeInUp wow" data-wow-delay=".3s">
                        Destinasi Populer yang kami tawarkan untuk semua
                    </h2>
                </div>
                <a href="#" class="theme-btn wow fadeInUp wow" data-wow-delay=".5s">View All Tour<i
                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
            </div>
            <div class="row">
                @forelse ($destinations as $destination)
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".2s">
                    <div class="destination-card-items">
                        <div class="destination-image">
                            <img src="{{ asset('frontend/') }}/assets/img/destination/01.jpg" alt="img">
                            <div class="heart-icon">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                        <div class="destination-content">
                            <ul class="meta">
                                <li>
                                    <i class="fa-thin fa-location-dot"></i>
                                    {{ $destination['location'] }}
                                </li>
                                <li class="rating">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <p>4.7</p>
                                </li>
                            </ul>
                            <h5>
                                <a href="tour-details.html">
                                    {{ $destination['title'] }}
                                </a>
                            </h5>
                            <ul class="info">
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    {{ $destination['duration'] }}
                                </li>
                                <li>
                                    <i class="fa-thin fa-users"></i>
                                    {{ $destination['quantity'] }}
                                </li>
                            </ul>
                            <div class="price">
                                <h6>{{ 'IDR '.number_format($destination['price'],0,',','.') }}<span>/Per pax</span></h6>
                                <a href="tour-details.html" class="theme-btn style-2">Book Now<i
                                        class="fa-sharp fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-xl-12 col-lg-12 col-md-12 text-center wow fadeInUp wow" data-wow-delay=".3s">
                    Trip Belum Tersedia
                </div>
                @endforelse
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

    <section class="team-section fix section-padding">
        <div class="jip-shape float-bob-x">
            <img src="{{ asset('frontend/') }}/assets/img/team/jip.png" alt="img">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title wow fadeInUp">
                    Tim Kami
                </span>
                <h2 class="wow fadeInUp wow" data-wow-delay=".2s">Tim Kami</h2>
            </div>
            <div class="row">
                @foreach ($tims as $tim)
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp wow" data-wow-delay=".2s">
                    <div class="team-card-item">
                        <div class="team-image">
                            <img src="{{ $tim['image'] }}">
                        </div>
                        <div class="team-content">
                            <h4><a>{{ $tim['name'] }}</a></h4>
                            <p>{{ $tim['position'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
