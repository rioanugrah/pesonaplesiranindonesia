@extends('layouts.frontend.app')

@section('title')
    Dashboard
@endsection

@section('css')
    <style>
        .h2 {
            color: #444;
            font-family: 'PT Sans', sans-serif
        }

        .thead {
            font-family: 'Poppins', sans-serif;
            font-weight: bolder;
            font-size: 16px;
            color: #666
        }

        .name {
            display: inline-block
        }

        .bg-blue {
            background-color: #EBF5FB;
            border-radius: 8px
        }

        .fa-check,
        .fa-minus {
            color: blue
        }

        .bg-blue:hover {
            background-color: #3e64ff;
            color: #eee;
            cursor: pointer
        }

        .bg-blue:hover .fa-check,
        .bg-blue:hover .fa-minus {
            background-color: #3e64ff;
            color: #eee
        }

        .table .thead .th,
        .table .td {
            border: none
        }

        .table .tbody .td:first-child {
            border-bottom-left-radius: 10px;
            border-top-left-radius: 10px
        }

        .table .tbody .td:last-child {
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px
        }

        #spacing-row {
            height: 10px
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-2">
                <ul>
                    <li class="mt-3 mb-3">
                        <a href="{{ route('user.home') }}">Booking</a>
                    </li>
                    <li class="mt-3 mb-3">
                        <hr>
                    </li>
                    <li class="mt-3 mb-3">
                        <a href="#">Settings</a>
                    </li>
                    <li class="mt-3 mb-3">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <h4 class="fw-bold mb-4">Dashboard</h4>
                <div class="row">
                    <table class="table">
                        <thead class="thead">
                            <tr class="tr">
                                <th class="th text-center" scope="col">Kode Booking</th>
                                <th class="th text-center" scope="col">Nama Booking</th>
                                <th class="th text-center" scope="col">Harga</th>
                                <th class="th text-center" scope="col">Status</th>
                                <th class="th text-center" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $booking)
                                @php
                                    $people_price = $booking->bookingDeparture->people_price;
                                    $adult_price = $booking->bookingDeparture->adult_price;
                                    $extra_price = $booking->bookingExtra->sum('booking_extra_price');

                                    // $total_booking = ($people_price*$booking->bookingDeparture->num_of_people) + ($adult_price*$booking->bookingDeparture->num_of_adult) + $extra_price;
                                    // $total_booking = ($people_price*$booking->bookingDeparture->num_of_people) + ($adult_price*$booking->bookingDeparture->num_of_adult) + $extra_price;
                                    $total_booking = $booking->total_price+$booking->payment->fee_admin;
                                @endphp
                                <tr>
                                    <td class="text-center"><a
                                            href="{{ route('user.booking.detail', ['id' => $booking->id, 'booking_code' => $booking->booking_code]) }}">{{ $booking->booking_code }}</a>
                                    </td>
                                    <td>{{ $booking->booking_name }}</td>
                                    <td class="text-end">{{ 'Rp. ' . number_format($total_booking, 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        @switch($booking->payment->status)
                                            @case('Pending')
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @break

                                            @case('Success')
                                                <span class="badge bg-success">PAID</span>
                                            @break

                                            @case('Cancel')
                                                <span class="badge bg-danger">Cancel</span>
                                            @break

                                            @default
                                        @endswitch
                                    </td>
                                    <td class="text-center">
                                        @if ($booking->status == 'Confirmed')
                                        <a href="{{ route('user.booking.cetakTiket',['id' => $booking->id]) }}" class="btn btn-primary btn-sm" target="_blank">Print Tiket</a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-danger">No Booking</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
