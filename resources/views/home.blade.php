@extends('layouts.backend.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-globe-img">
                            <div class="card-body">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fs-16 fw-semibold">Balance</span>
                                    </div>

                                    <h4 class="my-2 fs-24 fw-semibold">IDR 0</h4>
                                    <button type="button" class="btn btn-soft-primary">Transfer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="card bg-corner-img">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Total Omset</p>
                                        <h4 class="mt-1 mb-0 fw-medium">IDR 0</h4>
                                    </div>

                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                                            <i class="iconoir-dollar-circle fs-22 align-self-center mb-0 text-primary"></i>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="card bg-corner-img">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">New Order</p>
                                        <h4 class="mt-1 mb-0 fw-medium">0</h4>
                                    </div>

                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-md border-dashed border-info rounded mx-auto">
                                            <i class="iconoir-cart fs-22 align-self-center mb-0 text-info"></i>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="card bg-corner-img">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Sessions</p>
                                        <h4 class="mt-1 mb-0 fw-medium">0</h4>
                                    </div>

                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-md border-dashed border-warning rounded mx-auto">
                                            <i
                                                class="iconoir-percentage-circle fs-22 align-self-center mb-0 text-warning"></i>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="card bg-corner-img">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Rata-Rata Order</p>
                                        <h4 class="mt-1 mb-0 fw-medium">IDR 0</h4>
                                    </div>

                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-md border-dashed border-danger rounded mx-auto">
                                            <i class="iconoir-hexagon-dice fs-22 align-self-center mb-0 text-danger"></i>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-6 order-1 order-lg-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Booking History</h4>
                            </div>
                            <div class="col-auto">

                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Booking Code</th>
                                        <th class="border-top-0">Booking User</th>
                                        <th class="border-top-0">Booking Name</th>
                                        <th class="border-top-0">Amount</th>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->booking_code }}</td>
                                            <td>{{ $booking->user_id }}</td>
                                            <td>{{ $booking->booking_name }}</td>
                                            <td>{{ 'IDR ' . number_format($booking->total_price, 2, ',', '.') }}</td>
                                            <td>{{ $booking->status }}</td>
                                            <td></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-danger">No Booking</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 order-1 order-lg-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Transaction History</h4>
                            </div>
                            <div class="col-auto">

                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Transaction</th>
                                        <th class="border-top-0">Payment Date</th>
                                        <th class="border-top-0">Payment Method</th>
                                        <th class="border-top-0">Amount</th>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $payment)
                                        <tr>
                                            <td>{{ $payment->id }}</td>
                                            <td>20 July 2024 <span>03:25pm</span></td>
                                            <td>Transfer</td>
                                            <td>IDR 500000</td>
                                            <td><span
                                                    class="badge bg-success-subtle text-success fs-11 fw-medium px-2">Credit</span>
                                            </td>
                                            <td>20 July 2024 <span>03:25pm</span></td>
                                            <td>
                                                <a href="#"><i class="las la-print text-secondary fs-18"></i></a>
                                                <a href="#"><i class="las la-download text-secondary fs-18"></i></a>
                                                <a href="#"><i
                                                        class="las la-trash-alt text-secondary fs-18"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-danger text-center" colspan="7">No Transactions</td>
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
