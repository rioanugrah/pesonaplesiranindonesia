@extends('layouts.backend.app')
@section('title')
    Trips
@endsection
@section('css')
    <link href="{{ asset('backend') }}/assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
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
        @include('components.alert')
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Trips</h4>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('admin.trip.create') }}" class="btn bt btn-primary">
                                    <i class="icofont-plus-circle fs-5 me-1"></i> Buat Baru
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trips as $trip)
                                        <tr>
                                            <td><img src="{{ Storage::disk('s3')->url('/plesiranindonesia/trip/'.$trip->trip_code.'/'.$trip->trip_images) }}" width="200"></td>
                                            <td>{{ $trip->trip_name }}</td>
                                            <td class="text-center">{{ $trip->trip_category == 'O' ? 'Open Trip' : 'Private Trip' }}</td>
                                            <td class="text-center">{{ 'IDR '.number_format($trip->trip_price,2,',','.') }}</td>
                                            <td class="text-center">{!! $trip->status == 'Active' ? '<span class="badge bg-success-subtle text-success fs-11 fw-medium px-2">Active</span>' : '<span class="badge bg-danger-subtle text-danger fs-11 fw-medium px-2">InActive</span>' !!}</td>
                                            <td class="text-center">
                                                <div class="d-flex flex-wrap gap-1">
                                                    <a href="{{ route('admin.trip.show',['id' => $trip->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</a>
                                                    @can('trip-edit')
                                                    <a href="{{ route('admin.trip.edit',['id' => $trip->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    @endcan
                                                    @can('trip-delete')
                                                    <form action="{{ route('admin.trip.destroy',['id' => $trip->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                                                    </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-danger">No Trips</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('backend') }}/assets/libs/simple-datatables/umd/simple-datatables.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/datatable.init.js"></script>
@endsection
