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
            <div class="col-md-3 col-lg-3">
                <div class="card bg-corner-img">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Total Omset</p>
                                <h4 class="mt-1 mb-0 fw-medium">Rp. {{ number_format($total_omset, 2, ',', '.') }}</h4>
                            </div>

                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-md border-dashed border-success rounded mx-auto">
                                    <i class="iconoir-dollar-circle fs-22 align-self-center mb-0 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="card bg-corner-img">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Total Order</p>
                                <h4 class="mt-1 mb-0 fw-medium">{{ $total_order }}</h4>
                            </div>

                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-md border-dashed border-success rounded mx-auto">
                                    <i class="iconoir-cart fs-22 align-self-center mb-0 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="card bg-corner-img">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Total Pending</p>
                                <h4 class="mt-1 mb-0 fw-medium">{{ $total_pending }}</h4>
                            </div>

                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-md border-dashed border-success rounded mx-auto">
                                    <i class="iconoir-cart fs-22 align-self-center mb-0 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="card bg-corner-img">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Total Cancelled</p>
                                <h4 class="mt-1 mb-0 fw-medium">{{ $total_cancel }}</h4>
                            </div>

                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-md border-dashed border-success rounded mx-auto">
                                    <i class="iconoir-cart fs-22 align-self-center mb-0 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="card bg-corner-img">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Rata-Rata Omset</p>
                                <h4 class="mt-1 mb-0 fw-medium">Rp. {{ number_format($total_average, 2, ',', '.') }}</h4>
                            </div>

                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-md border-dashed border-success rounded mx-auto">
                                    <i class="iconoir-dollar-circle fs-22 align-self-center mb-0 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 order-1 order-lg-2">
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
                                        <th class="border-top-0 text-center">#</th>
                                        <th class="border-top-0 text-center">Kode Booking</th>
                                        <th class="border-top-0 text-center">User</th>
                                        <th class="border-top-0 text-center">Item</th>
                                        <th class="border-top-0 text-center">Total</th>
                                        <th class="border-top-0 text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bookings as $key => $booking)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $booking->booking_code }}</td>
                                            <td class="text-center">{{ $booking->user->name }}</td>
                                            <td>{{ $booking->booking_name }}</td>
                                            <td class="text-end">
                                                {{ 'Rp. ' . number_format($booking->total_price, 2, ',', '.') }}</td>
                                            <td class="text-center">
                                                @switch($booking->status)
                                                    @case('Pending')
                                                        <span
                                                            class="badge bg-warning-subtle text-warning fs-11 fw-medium px-2">Menunggu
                                                            Konfirmasi</span>
                                                    @break

                                                    @case('Confirmed')
                                                        <span
                                                            class="badge bg-success-subtle text-success fs-11 fw-medium px-2">Success</span>
                                                    @break

                                                    @case('Cancelled')
                                                        <span
                                                            class="badge bg-danger-subtle text-danger fs-11 fw-medium px-2">Batal</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
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
                <div class="col-md-12 col-lg-12 order-1 order-lg-2">
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
                                            <th class="border-top-0 text-center">#</th>
                                            <th class="border-top-0 text-center">Transaction</th>
                                            <th class="border-top-0 text-center">Payment Date</th>
                                            <th class="border-top-0 text-center">Payment Method</th>
                                            <th class="border-top-0 text-center">Fee Admin</th>
                                            <th class="border-top-0 text-center">Sub Total</th>
                                            <th class="border-top-0 text-center">Total</th>
                                            <th class="border-top-0 text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($payments as $key => $payment)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td class="text-center">{{ $payment->booking->booking_code }}</td>
                                                <td class="text-center">
                                                    {{ empty($payment->payment_date) ? '-' : $payment->payment_date }}</td>
                                                <td class="text-center">{{ $payment->payment_method }}</td>
                                                <td class="text-end">Rp. {{ number_format($payment->fee_admin,2,',','.') }}</td>
                                        <td class="text-end">Rp. {{ number_format($payment->amount,2,',','.') }}</td>
                                        <td class="text-end">Rp. {{ number_format($payment->amount+$payment->fee_admin,2,',','.') }}</td>
                                                </td>
                                                <td class="text-center">
                                                    @switch($payment->status)
                                                        @case('Pending')
                                                            <span
                                                                class="badge bg-warning-subtle text-warning fs-11 fw-medium px-2">Menunggu
                                                                Pembayaran</span>
                                                        @break

                                                        @case('Success')
                                                            <span
                                                                class="badge bg-success-subtle text-success fs-11 fw-medium px-2">Success</span>
                                                        @break

                                                        @case('Failed')
                                                            <span class="badge bg-danger-subtle text-danger fs-11 fw-medium px-2">Gagal
                                                                Pembayaran</span>
                                                        @break

                                                        @default
                                                    @endswitch
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
