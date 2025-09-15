@extends('layouts.backend.app')
@section('title')
    Booking Detail
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Booking Detail</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">Booking</li>
                            <li class="breadcrumb-item active">{{ $booking->booking_name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Booking Code</label>
                                    <div>{{ $booking->booking_code }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Booking Name</label>
                                    <div>{{ $booking->booking_name }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Booking Status</label>
                                    <div>{{ $booking->status }}</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Total</label>
                                    <div>{{ 'Rp. '.number_format($booking->total_price,2,',','.') }}</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <h5>Billing :</h5>
                                </div>
                                <div class="mb-3">
                                    <label for="">Nama</label>
                                    <div>{{ json_decode($booking->payment->payment_billing)->first_name.' '.json_decode($booking->payment->payment_billing)->last_name }}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <div>{{ json_decode($booking->payment->payment_billing)->email }}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="">No. Telp/Whatsapp</label>
                                    <div>{{ json_decode($booking->payment->payment_billing)->phone }}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <h5>Pemberangkatan</h5>
                                </div>
                                <div class="mb-3">
                                    <label for="">Tanggal Berangkat</label>
                                    <div>{{ $booking->bookingDeparture->booking_date }}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="">Waktu Berangkat</label>
                                    <div>{{ $booking->bookingDeparture->booking_time }}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="">Tiket Dewasa</label>
                                    <div>{{ $booking->bookingDeparture->num_of_adult }} pax</div>
                                </div>
                                <div class="mb-3">
                                    <label for="">Tiket Anak - Anak</label>
                                    <div>{{ $booking->bookingDeparture->num_of_child }} pax</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    Extra
                                </div>
                                <div class="mb-3">
                                    <ul>
                                        @forelse ($booking->bookingExtra as $item)
                                        <li>{{ $item->booking_extra_name.' - Rp. '.number_format($item->booking_extra_price,2,',','.') }}</li>
                                        @empty
                                        <li>Tidak Tersedia</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.booking') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
