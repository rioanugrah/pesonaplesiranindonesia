@extends('layouts.frontend.app')
@section('title')
    Team
@endsection
@section('description')
    Kami percaya bahwa di balik setiap produk atau layanan hebat, ada tim yang luar biasa.
    Tim kami bukan sekadar sekelompok individu, melainkan sebuah kolektif yang dipersatukan oleh visi yang sama: menciptakan solusi
    yang berdampak positif dan nyata. Setiap anggota tim membawa keahlian unik dan pengalaman mendalam di
    bidangnya masing-masing. Mulai dari ahli strategi yang visioner, insinyur perangkat lunak yang inovatif,
    hingga desainer yang berorientasi pada pengguna, kami bekerja bersama-sama untuk memecahkan masalah yang
    kompleks dengan cara yang sederhana dan elegan.
@endsection
@section('keywords')
    tour, trip, travel, agency, life, vacation, climbing, wisata, pesona, plesiran, indonesia, pesona plesiran indonesia,
    pesona indonesia, tim pesona plesiran indonesia
@endsection
@section('canonical')
    {{ route('frontend.team') }}
@endsection
@section('url')
    {{ route('frontend.team') }}
@endsection

@php
    $tims = [
        [
            'id' => 1,
            'name' => 'Nurwahid Abdillah',
            'position' => 'Chief Executive Officer',
            'image' => asset('frontend/assets/img/team/profil_wahid.jpg'),
        ],
        [
            'id' => 2,
            'name' => 'Fabrizio Danindra K.',
            'position' => 'Chief Operating Officer',
            'image' => asset('frontend/assets/img/team/profil_dani.jpg'),
        ],
        [
            'id' => 3,
            'name' => 'Bima Gani',
            'position' => 'Chief Marketing Officer',
            'image' => asset('frontend/assets/img/team/profil_bima.jpg'),
        ],
        [
            'id' => 4,
            'name' => 'Rio Anugrah A.S',
            'position' => 'Chief Technology Officer',
            'image' => asset('frontend/assets/img/team/profil_rio.jpg'),
        ],
    ];
@endphp

@section('content')
    <section class="team-section fix section-padding">
        <div class="container">
            <h2 class="text-center mb-4">Tim Kami</h2>
            <p class="mb-4" style="text-align: justify">Kami percaya bahwa di balik setiap produk atau layanan hebat, ada
                tim yang luar biasa.
                Tim kami bukan sekadar
                sekelompok individu, melainkan sebuah kolektif yang dipersatukan oleh visi yang sama: menciptakan solusi
                yang berdampak positif dan nyata. Setiap anggota tim membawa keahlian unik dan pengalaman mendalam di
                bidangnya masing-masing. Mulai dari ahli strategi yang visioner, insinyur perangkat lunak yang inovatif,
                hingga desainer yang berorientasi pada pengguna, kami bekerja bersama-sama untuk memecahkan masalah yang
                kompleks dengan cara yang sederhana dan elegan.</p>
            <div class="row g-4">
                @foreach ($tims as $tim)
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp text-white" data-wow-delay=".2s">
                        <div class="team-card-item mt-0">
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
