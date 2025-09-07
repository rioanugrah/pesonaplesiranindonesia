@extends('layouts.frontend.app')
@section('title')
    Payment
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5 text-center">
                    <!-- Ikon Centang -->
                    @switch($detailPayment->data->status)
                    @case('PAID')
                            <div class="mx-auto bg-success-subtle rounded-circle d-flex align-items-center justify-content-center mb-4"
                                style="width: 100px; height: 100px;">
                                <svg class="text-success" style="width: 60px; height: 60px;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h1 class="h2 fw-bold text-dark mb-3">Pembayaran Berhasil!</h1>
                            <p class="text-secondary mb-4 fs-5">
                                Terima kasih! Kami telah menerima pembayaran Anda. Pesanan Anda sedang kami proses.
                            </p>
                            @break
                            @case('UNPAID')
                            <div class="mx-auto bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center mb-4"
                                style="width: 100px; height: 100px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alert-circle text-warning">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                    <path d="M12 8v4" />
                                    <path d="M12 16h.01" />
                                </svg>
                            </div>
                            <h1 class="h2 fw-bold text-dark mb-3">Menunggu Pembayaran!</h1>
                            <p class="text-secondary mb-4 fs-5">
                                Terima kasih! Kami telah menerima pembayaran Anda. Selesaikan Pesanan Anda akan segera kami proses.
                            </p>
                            @break
                            @default

                        @endswitch

                    <!-- Detail Transaksi -->
                    <div class="bg-light-subtle border rounded-3 p-4 text-start mb-4">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="fw-medium text-muted">ID Transaksi:</span>
                            <span class="font-monospace text-dark">{{ $detailPayment->data->reference }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="fw-medium text-muted">Tanggal:</span>
                            <span class="text-dark">{{ date('d-m-Y H:i:s', $detailPayment->data->paid_at) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="fw-medium text-muted">Metode Bayar:</span>
                            <span class="text-dark">{{ $detailPayment->data->payment_method }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <span class="fw-medium text-muted">Jumlah Bayar:</span>
                            <span class="fw-bold text-success fs-4">Rp
                                {{ number_format($detailPayment->data->amount, 2, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <a href="{{ route('user.home') }}" class="btn btn-primary w-100 py-3 fs-5 rounded-3 shadow-sm">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
