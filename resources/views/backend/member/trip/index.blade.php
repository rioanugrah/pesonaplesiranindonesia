@extends('layouts.backend.member.app')
@section('title')
    Trip
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Trips</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Trips</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($trips as $trip)
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <img class="card-img-top img-fluid bg-light-alt" src="{{ Storage::disk('s3')->url('/plesiranindonesia/trip/'.$trip->trip_code.'/'.$trip->trip_images) }}" alt="Card image cap">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">{{ $trip->trip_name }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        {{-- <p class="card-text text-muted ">
                            {!! $trip->trip_description !!}
                        </p> --}}
                        @switch($trip->trip_category)
                            @case('O')
                                <p>Kategori : Open Trip</p>
                                @break
                            @case('P')
                                <p>Kategori : Private Trip</p>
                                @break
                            @default
                        @endswitch
                        <div>Harga : {{ 'IDR '.number_format($trip->trip_price,2,',','.') }}</div>
                        <div class="mt-2 mb-2">
                            <a href="#" class="btn btn-success btn-sm">Detail</a>
                            {{-- <a href="#" class="btn btn-primary btn-sm">Link Referral</a> --}}
                        </div>
                        <div>Link Referral : </div>
                        <div>{{ route('frontend.trip_detail',['id' => $trip->id, 'trip_code' => $trip->trip_code]) }}</div>
                    </div>
                    <div class="card-footer">
                        <span class="badge bg-primary-subtle text-primary">Posting Date {{ $trip->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
