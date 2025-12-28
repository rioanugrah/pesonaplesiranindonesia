@extends('layouts.backend.app')
@section('title')
    {{ $trip->trip_name }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">{{ $trip->trip_name }}</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">Trips</li>
                            <li class="breadcrumb-item active">{{ $trip->trip_name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Images</label>
                            <div>
                                <img src="{{ Storage::disk('s3')->url('/plesiranindonesia/trip/'.$trip->trip_code.'/'.$trip->trip_images) }}" width="200">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Trip Name</label>
                                    <div>
                                        {{ $trip->trip_name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Trip Category</label>
                                    <div>
                                        {{ $trip->trip_category == 'O' ? 'Open Trip' : 'Private Trip' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Trip Price</label>
                                    <div>
                                        {{ 'IDR '.number_format($trip->trip_price,2,',','.') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Status</label>
                                    <div>
                                        {!! $trip->status == 'Active' ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">InActive</span>' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Trip Description</label>
                                    <div>
                                        {!! $trip->trip_description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Country</label>
                                    <div>{{ $trip->trip_country }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Trip Experience</label>
                                    <div>
                                        <ul class="list-group list-group-flush">
                                            @foreach (json_decode($trip->trip_experience) as $trip_experience)
                                                <li class="list-group-item"><i class="la la-angle-double-right text-info me-2"></i> {{ $trip_experience->experience }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Trip Facilities</label>
                                    <div>
                                        <ul class="list-group list-group-flush">
                                            @foreach (json_decode($trip->trip_facilities) as $trip_facilities)
                                                <li class="list-group-item"><i class="la la-angle-double-right text-info me-2"></i> {{ $trip_facilities->facilities }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Trip Tour Plan</label>
                                    <div>
                                        <ul class="list-group list-group-flush">
                                            @foreach (json_decode($trip->trip_tour_plan) as $trip_tour_plan)
                                                <li class="list-group-item"><i class="la la-angle-double-right text-info me-2"></i> {{ $trip_tour_plan->tour_plan }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="col-form-label">Trip Extra</label>
                                    <div>
                                        <ul class="list-group list-group-flush">
                                            @foreach ($trip->trip_extra as $trip_extra)
                                                <li class="list-group-item"><i class="la la-angle-double-right text-info me-2"></i> {{ $trip_extra->extra_name.' - IDR '.number_format($trip_extra->extra_price,2,',','.') }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Gallery</label>
                            <div class="row">
                                @foreach (json_decode($trip->trip_gallery) as $trip_gallery)
                                    <div class="col-md-3 mx-auto">
                                        <img src="{{ Storage::disk('s3')->url('/plesiranindonesia/trip/trip_gallery/'.$trip->trip_code.'/'.$trip_gallery->trip_gallery) }}" class="rounded" width="250">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('admin.trip') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                            <a href="{{ route('admin.trip.edit',['id' => $trip->id]) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
