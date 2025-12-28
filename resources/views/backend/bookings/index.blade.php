@extends('layouts.backend.app')
@section('title')
    Booking
@endsection
@section('content')
    @include('backend.bookings.modalConfirm')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Booking</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Bookings</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div id="alert"></div>
        @include('components.alert')
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Booking</h4>
                            </div>
                            {{-- <div class="col-auto">
                                <a href="{{ route('admin.trip.create') }}" class="btn bt btn-primary">
                                    <i class="icofont-plus-circle fs-5 me-1"></i> Buat Baru
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="mb-2">No. Booking</label>
                                <input type="text" name="" class="form-control" placeholder="No. Booking" id="">
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2">Status</label>
                                <select class="form-control">
                                    <option value="">-- Pilih Status --</option>
                                    @foreach ($status as $item)
                                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Booking Code</th>
                                        <th class="text-center">Booking User</th>
                                        <th class="text-center">Booking Name</th>
                                        <th class="text-center">Booking Amount</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bookings as $key => $booking)
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td class="text-center">{{ $booking->booking_code }}</td>
                                            <td class="text-center">{{ $booking->user->name }}</td>
                                            <td class="text-center">{{ $booking->booking_name }}</td>
                                            <td class="text-end">{{ 'Rp. '.number_format($booking->total_price,2,',','.') }}</td>
                                            <td class="text-center">
                                                @switch($booking->status)
                                                    @case('Pending')
                                                        <span class="badge bg-warning-subtle text-warning fs-11 fw-medium px-2">Menunggu Konfirmasi</span>
                                                        @break
                                                    @case('Confirmed')
                                                        <span class="badge bg-success-subtle text-success fs-11 fw-medium px-2">Success</span>
                                                        @break
                                                    @case('Cancelled')
                                                        <span class="badge bg-danger-subtle text-danger fs-11 fw-medium px-2">Batal</span>
                                                        @break
                                                    @default

                                                @endswitch
                                            </td>
                                            <td class="text-center">
                                                @switch($booking->status)
                                                    @case('Pending')
                                                    <button onclick="modalConfirm(`{{ $booking->id }}`)" class="btn btn-info btn-sm text-dark"><i class="fas fa-check ms-1 me-1"></i> Konfirmasi</button>
                                                        @break
                                                    @default

                                                @endswitch
                                                <a href="{{ route('admin.booking.detail',['id' => $booking->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-eye ms-1 me-1"></i> Detail</a>
                                                @if ($booking->status == 'Confirmed')
                                                <a href="{{ route('admin.booking.cetakTiket',['id' => $booking->id]) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-print ms-1 me-1"></i> Cetak Tiket</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-danger">No Booking</td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function modalConfirm(id)
        {
            // $('.modalConfirm').modal('show');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/bookings/') }}"+'/'+id,
                beforeSend: () => {
                    var alert = '<div class="alert alert-info shadow-sm border-theme-white-2" role="alert">'+
                                    // '<div class="d-inline-flex justify-content-center align-items-center thumb-xs bg-success rounded-circle mx-auto me-1">'+
                                    //     '<i class="fas fa-check align-self-center mb-0 text-white "></i>'+
                                    // '</div>'+
                                    '<strong>Loading...</strong>'+
                                '</div>';
                    document.getElementById('alert').innerHTML = alert;
                },
                success: (result) => {
                    document.getElementById('alert').innerHTML = '';

                    if (result.success != false) {
                        $('#confirm-code').val(result.data.booking_code);
                        document.getElementById('confirm-booking-code').innerHTML = result.data.booking_code;
                        document.getElementById('confirm-booking-name').innerHTML = result.data.booking_name;
                        document.getElementById('confirm-booking-user').innerHTML = result.data.booking_user.name;
                        document.getElementById('confirm-booking-email').innerHTML = result.data.booking_user.email;
                        document.getElementById('confirm-booking-phone').innerHTML = result.data.booking_user.phone;
                        document.getElementById('confirm-booking-total-price').innerHTML = result.data.total_price;
                        document.getElementById('confirm-booking-adult').innerHTML = result.data.booking_people.adult;
                        document.getElementById('confirm-booking-child').innerHTML = result.data.booking_people.child;
                        switch (result.data.status_payment) {
                            case 'Pending':
                                document.getElementById('confirm-booking-status-payment').innerHTML = '<span class="badge bg-warning text-dark">Menunggu Pembayaran</span>';
                                break;
                            case 'Success':
                                document.getElementById('confirm-booking-status-payment').innerHTML = '<span class="badge bg-success text-dark">Pembayaran Berhasil</span>';
                                break;
                            case 'Failed':
                                document.getElementById('confirm-booking-status-payment').innerHTML = '<span class="badge bg-danger text-dark">Pembayaran Gagal</span>';
                                break;

                            default:
                                break;
                        }
                        $('.modalConfirm').modal('show');
                    } else {

                    }
                },
                error: function(request, status, error) {

                }
            });
        }

        $('#form-confirm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            let text = "Apakah Sudah Yakin?";
            if (confirm(text)) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.booking.konfirmasi.simpan') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: () => {
                        var alert = '<div class="alert alert-info shadow-sm border-theme-white-2" role="alert">'+
                                        // '<div class="d-inline-flex justify-content-center align-items-center thumb-xs bg-success rounded-circle mx-auto me-1">'+
                                        //     '<i class="fas fa-check align-self-center mb-0 text-white "></i>'+
                                        // '</div>'+
                                        '<strong>Konfirmasi Sedang Diproses...</strong>'+
                                    '</div>';
                        document.getElementById('alert').innerHTML = alert;
                    },
                    success: (result) => {
                        if (result.success == true) {
                            var alert = '<div class="alert alert-info shadow-sm border-theme-white-2" role="alert">'+
                                            '<div class="d-inline-flex justify-content-center align-items-center thumb-xs bg-success rounded-circle mx-auto me-1">'+
                                                '<i class="fas fa-check align-self-center mb-0 text-white "></i>'+
                                            '</div>'+
                                            '<strong>'+result.message_content+'</strong>'+
                                        '</div>';
                            document.getElementById('alert').innerHTML = alert;

                            $('.modalConfirm').modal('hide');
                        } else {

                        }
                    },
                    error: function(request, status, error) {

                    }
                });
            }
        });
    </script>
@endsection
