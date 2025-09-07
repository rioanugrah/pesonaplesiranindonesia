@extends('layouts.frontend.app')

@section('title')
    Booking - {{ $booking->booking_code }}
@endsection

@section('css')
    <style>
        .background {
            font-family: 'Poppins', sans-serif;
            background-color: #e9ecef; /* Softer gray background */
        }

        .invoice-container {
            max-width: 900px;
            margin: 4rem auto;
            background: linear-gradient(to top, #ffffff 70%, #f8f9fa 100%);
            border-radius: 1rem;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1);
            overflow: hidden;
            /* To keep children within border-radius */
        }

        .invoice-header {
            background: linear-gradient(90deg, #0F828C, #4DA8DA);
            padding: 3rem;
            color: white;
            border-radius: 1rem 1rem 0 0;
        }

        .invoice-body {
            padding: 3rem;
        }

        .brand-logo h2 {
            font-weight: 700;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        .invoice-details .badge {
            font-size: 1.25rem;
            font-weight: 600;
            padding: 0.75rem 1.25rem;
        }

        .invoice-table thead th {
            background-color: #f8f9fa;
            border-bottom-width: 1px;
            font-weight: 600;
        }

        .invoice-table td,
        .invoice-table th {
            vertical-align: middle;
        }

        .total-section {
            border-top: 2px solid #dee2e6;
            padding-top: 1.5rem;
            margin-top: 1.5rem;
        }

        .action-buttons .btn {
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .action-buttons .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="invoice-container">
            <!-- Header Invoice -->
            <header class="invoice-header">
                <div class="row align-items-center">
                    <div class="col-md-6 brand-logo">
                        <h2 class="mb-1 text-white" style="font-size: 18pt">CV. Pesona Plesiran Indonesia</h2>
                        <p class="mb-0 small">Jl. Raya Tlogowaru No. 3, Tlogowaru, Malang, Jawa Timur</p>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <h1 class="fw-bold mb-2 text-white" style="font-size: 24pt">E-TICKET</h1>
                        <p class="mb-0">{{ $booking->booking_code }}</p>
                    </div>
                </div>
            </header>

            <main class="invoice-body">
                <!-- Informasi Klien dan Status -->
                @php
                    $subTotal = [];
                @endphp
                <div class="row mb-5">
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Ditagihkan Kepada:</h6>
                        <h5 class="fw-bold mb-1">{{ json_decode($booking->payment->payment_billing)->first_name.' '.json_decode($booking->payment->payment_billing)->last_name }}</h5>
                        <p class="text-muted mb-0">{{ json_decode($booking->payment->payment_billing)->email }}</p>
                        <p class="text-muted mb-0">{{ json_decode($booking->payment->payment_billing)->phone }}</p>
                    </div>
                    <div class="col-md-6 text-md-end mt-4 mt-md-0">
                        <h6 class="text-muted mb-2">Status Pembayaran:</h6>
                        @switch($booking->payment->status)
                            @case('Pending')
                                <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Menunggu Pembayaran</span>
                                @break
                            @case('Success')
                                <span class="badge bg-success-subtle text-success-emphasis rounded-pill">Lunas</span>
                                @break
                            @case('Success')
                                <span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Belum Dibayar</span>
                                @break
                            @default

                        @endswitch
                         <div class="mt-3">
                            <small class="text-muted d-block">Tanggal Booking : {{ \Carbon\Carbon::create($booking->bookingDeparture->booking_date)->isoFormat('DD MMMM Y') }}</small>
                            <small class="text-muted d-block">Berangkat Pukul : {{ $booking->bookingDeparture->booking_time }}</small>
                         </div>
                    </div>
                </div>

                <!-- Tabel Item -->
                <div class="table-responsive mb-5">
                    <table class="table table-borderless invoice-table">
                        <thead>
                            <tr>
                                <th scope="col">Deskripsi</th>
                                <th scope="col" class="text-center">Jumlah</th>
                                <th scope="col" class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p class="fw-bold mb-0">{{ $booking->booking_name }}</p>
                                    <small class="text-muted">Dewasa : {{ $booking->bookingDeparture->num_of_people.' - Rp.'.number_format($booking->bookingDeparture->people_price,2,',','.') }}</small> <br>
                                    @if ($booking->bookingDeparture->num_of_adult > 0)
                                    <small class="text-muted">Anak-anak : {{ $booking->bookingDeparture->num_of_adult.' - Rp.'.number_format($booking->bookingDeparture->adult_price,2,',','.') }}</small>
                                    @endif
                                </td>
                                <td class="text-center">{{ $booking->bookingDeparture->num_of_people + $booking->bookingDeparture->num_of_adult }}</td>
                                {{-- <td class="text-end">Rp. {{ number_format(($booking->bookingDeparture->people_price/$booking->bookingDeparture->num_of_people)+($booking->bookingDeparture->adult_price/$booking->bookingDeparture->num_of_adult), 2,',','.') }}</td> --}}
                                {{-- <td class="text-end">Rp. {{ number_format(($booking->bookingDeparture->people_price)+($booking->bookingDeparture->adult_price), 2,',','.') }}</td> --}}
                                <td class="text-end fw-bold">Rp. {{ number_format(($booking->bookingDeparture->people_price*$booking->bookingDeparture->num_of_people)+($booking->bookingDeparture->adult_price*$booking->bookingDeparture->num_of_adult), 2,',','.') }}</td>
                            </tr>
                            @foreach ($booking->bookingExtra as $item)
                            @php
                                array_push($subTotal,$item->booking_extra_price);
                            @endphp
                            <tr>
                                <td>
                                    <p class="fw-bold mb-0">{{ $item->booking_extra_name }}</p>
                                    <small class="text-muted">Rp. {{ number_format($item->booking_extra_price,2,',','.') }}</small>
                                </td>
                                <td class="text-center">1</td>
                                {{-- <td class="text-end">Rp. {{ number_format($item->booking_extra_price,2,',','.') }}</td> --}}
                                <td class="text-end fw-bold">Rp. {{ number_format($item->booking_extra_price,2,',','.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Total -->
                @php
                    // $total = array_sum($subTotal)+($booking->bookingDeparture->people_price*$booking->bookingDeparture->num_of_people)+($booking->bookingDeparture->adult_price*$booking->bookingDeparture->num_of_adult);
                    $total = array_sum($subTotal)+(
                        $booking->bookingDeparture->people_price*$booking->bookingDeparture->num_of_people
                        )+(
                            $booking->bookingDeparture->adult_price*$booking->bookingDeparture->num_of_adult
                        );
                @endphp
                <div class="row justify-content-end">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal:</span>
                            <span class="fw-medium">Rp {{ number_format($total,2,',','.') }}</span>
                        </div>
                        <div class="total-section d-flex justify-content-between">
                            <h5 class="fw-bold mb-0">Total Akhir:</h5>
                            <h5 class="fw-bold text-primary mb-0">Rp {{ number_format($total,2,',','.') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="fw-bold mt-4">Informasi:</div>
                <div class="row">
                    <div class="col-md-4">
                        {!! $barcode !!}
                    </div>
                    <div class="col-md-4">
                        <div style="font-size: 10pt">Gunakan <b>E-TIKET</b> sebagai bukti validasi untuk melakukan pengecekan kepada team kami.</div>
                    </div>
                    <div class="col-md-4">
                        <div style="font-size: 10pt"><b>E-TIKET</b> ini hanya dipakai 1x.</div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="text-center mt-5 pt-4 border-top">
                    <p class="text-muted small">Terima kasih atas kepercayaan Anda. Jika ada pertanyaan, silakan hubungi kami.</p>
                     {{-- <div class="action-buttons">
                        <button class="btn btn-outline-primary px-4"><i class="fa-solid fa-download me-2"></i> Unduh PDF</button>
                        <a class="btn btn-primary px-4" href="{{ route('user.booking.pdf',['id' => $booking->id, 'booking_code' => $booking->booking_code]) }}"><i class="fa-solid fa-print me-2"></i> Cetak Invoice</a>
                     </div> --}}
                </footer>
            </main>
        </div>
    </div>
@endsection
