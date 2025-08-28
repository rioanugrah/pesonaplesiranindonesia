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
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-9">
                                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Daily</p>
                                                        <h4 class="mt-1 mb-0 fw-medium">IDR 0</h4>
                                                    </div>

                                                    <div class="col-3 align-self-center">
                                                        <div
                                                            class="d-flex justify-content-center align-items-center thumb-md rounded mx-auto">
                                                            <i
                                                                class="iconoir-dollar-circle fs-22 align-self-center mb-0 text-muted opacity-50"></i>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-9">
                                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Weekly</p>
                                                        <h4 class="mt-1 mb-0 fw-medium">IDR 0</h4>
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
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-9">
                                                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Monthly
                                                        </p>
                                                        <h4 class="mt-1 mb-0 fw-medium">IDR 0</h4>
                                                    </div>

                                                    <div class="col-3 align-self-center">
                                                        <div
                                                            class="d-flex justify-content-center align-items-center thumb-md  rounded mx-auto">
                                                            <i
                                                                class="iconoir-stats-report fs-22 align-self-center mb-0 text-muted opacity-50"></i>
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
                                        <th class="border-top-0 text-center">Date</th>
                                        <th class="border-top-0 text-center">Payment Method</th>
                                        <th class="border-top-0 text-center">Amount</th>
                                        <th class="border-top-0 text-center">Status</th>
                                        <th class="border-top-0 text-center">Payment Date</th>
                                        <th class="border-top-0 text-center">Action</th>
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
                                            <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
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
