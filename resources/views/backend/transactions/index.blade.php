@extends('layouts.backend.app')
@section('title')
    Transactions
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Transactions</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Transactions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-9">
                                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Harian</p>
                                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">{{ \Carbon\Carbon::now()->isoFormat('DD MMMM YYYY') }}</p>
                                                        <h4 class="mt-1 mb-0 fw-medium">Rp. {{ number_format($totalDay,2,',','.') }}</h4>
                                                    </div>

                                                    <div class="col-3 align-self-center">
                                                        <div
                                                            class="d-flex justify-content-center align-items-center thumb-md rounded mx-auto">
                                                            <i
                                                                class="iconoir-dollar-circle fs-28 align-self-center mb-0 text-muted opacity-50"></i>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-9">
                                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Mingguan</p>
                                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">{{ \Carbon\Carbon::now()->startOfWeek()->isoFormat('DD MMMM YYYY').' - '.\Carbon\Carbon::now()->endOfWeek()->isoFormat('DD MMMM YYYY') }}</p>
                                                        <h4 class="mt-1 mb-0 fw-medium">Rp. {{ number_format($totalWeek,2,',','.') }}</h4>
                                                    </div>

                                                    <div class="col-3 align-self-center">
                                                        <div
                                                            class="d-flex justify-content-center align-items-center thumb-md rounded mx-auto">
                                                            <i
                                                                class="iconoir-calendar fs-22 align-self-center mb-0 text-muted opacity-50"></i>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-9">
                                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Bulanan
                                                        </p>
                                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">{{ \Carbon\Carbon::now()->startOfMonth()->isoFormat('DD MMMM YYYY').' - '.\Carbon\Carbon::now()->endOfMonth()->isoFormat('DD MMMM YYYY') }}</p>
                                                        <h4 class="mt-1 mb-0 fw-medium">Rp. {{ number_format($totalMonth,2,',','.') }}</h4>
                                                    </div>

                                                    <div class="col-3 align-self-center">
                                                        <div
                                                            class="d-flex justify-content-center align-items-center thumb-md  rounded mx-auto">
                                                            <i
                                                                class="iconoir-stats-report fs-28 align-self-center mb-0 text-muted opacity-50"></i>
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
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">All Transactions</h4>
                            </div>
                            <div class="col-auto">
                                <div class="dropdown">
                                    <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icofont-calendar fs-5 me-1"></i> This Month<i
                                            class="las la-angle-down ms-1"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">This Year</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-top-0 text-center">#</th>
                                        <th class="border-top-0 text-center">Tanggal</th>
                                        <th class="border-top-0 text-center">Metode Pembayaran</th>
                                        <th class="border-top-0 text-center">Total</th>
                                        <th class="border-top-0 text-center">Status</th>
                                        <th class="border-top-0 text-center">Tanggal Pembayaran</th>
                                        <th class="border-top-0 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $key => $payment)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::create($payment->created_at)->isoFormat('LLLL') }}</td>
                                        <td class="text-center">{{ $payment->payment_method }}</td>
                                        <td class="text-end">Rp. {{ number_format($payment->amount,2,',','.') }}</td>
                                        <td class="text-center">
                                            @switch($payment->status)
                                                @case('Pending')
                                                    <span
                                                        class="badge bg-warning-subtle text-warning fs-11 fw-medium px-2">Menunggu Pembayaran</span>
                                                        @break
                                                @case('Success')
                                                    <span
                                                        class="badge bg-success-subtle text-success fs-11 fw-medium px-2">Pembayaran Berhasil</span>
                                                    @break
                                                @case('Failed')
                                                    <span
                                                        class="badge bg-danger-subtle text-danger fs-11 fw-medium px-2">Pembayaran Gagal</span>
                                                    @break
                                                @default

                                            @endswitch
                                        </td>
                                        <td class="text-center">
                                            @if (empty($payment->payment_date))
                                                <span class="text-danger">Belum Terbayar</span>
                                            @else
                                            {{ \Carbon\Carbon::create($payment->payment_date)->isoFormat('LLLL') }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.transaction.download',['id' => $payment->id]) }}" target="_blank"><i class="las la-download text-primary fs-18"></i></a>
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
