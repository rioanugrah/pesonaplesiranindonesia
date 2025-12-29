@extends('layouts.frontend.app')
@section('title')
    Cek Booking
@endsection
@section('canonical')
    {{ route('frontend.team') }}
@endsection
@section('url')
    {{ route('frontend.team') }}
@endsection

@section('content')
    <section class="team-section fix section-padding">
        <div class="container">
            <h2 class="text-center mb-4">Check Booking</h2>
            <form id="form-search" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">No. Booking</label>
                    <input type="text" name="booking_code" class="form-control" id="">
                    <div class="text-center">
                        <button type="submit" class="theme-btn mt-2">Submit</button>
                    </div>
                </div>
            </form>
            <div id="result"></div>
            <hr>
            <div class="mb-3">
                <div class="fw-bold">Persetujuan</div>
                <div style="text-align: justify">Setiap pengunjung wajib memahami, menyetujui, syarat dan ketentuan-ketentuan di atas sebelum melakukan pendaftaran online. Segala persyaratan yang diisi wajib dipertanggungjawabkan, jika tidak sesuai/tidak lengkap tidak diberikan ijin melakukan wisata bromo, dan uang yang sudah ditransfer tidak dapat diambil kembali.</div>
            </div>
            <hr>
            <div class="mb-3">
                <div class="fw-bold">Checklist Persyaratan Pengunjung</div>
                <ol>
                    <li>Menunjukkan Bukti Booking Online dengan Scan QRcode di pintu masuk (melalui HP atau bukti cetak booking online).</li>
                    <li>Setelah melakukan pembayaran, pengunjung tidak dapat melakukan reschedule / jadwal ulang.</li>
                </ol>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $('#form-search').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('frontend.cariBooking') }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: () => {
                    document.getElementById('result').innerHTML = 'Loading...';
                },
                success: (result) => {
                    if (result.success != false) {
                        document.getElementById('result').innerHTML =
                            '<div>'+
                                '<div class="mb-3">'+
                                    '<div class="fw-bold">Kode Booking : </div>'+
                                    '<div>'+result.data.booking_code+'</div>'+
                                '</div>'+
                                '<div class="mb-3">'+
                                    '<div class="fw-bold">Status Pembayaran : </div>'+
                                    '<div>'+result.data.payment_status+'</div>'+
                                '</div>'+
                                '<div class="mb-3">'+
                                    '<div class="fw-bold">Status Booking : </div>'+
                                    '<div>'+result.data.booking_status+'</div>'+
                                '</div>'+
                                '<div class="mb-3">'+
                                    '<div class="fw-bold">Tanggal Pemberangkatan : </div>'+
                                    '<div>'+result.data.booking_date+'</div>'+
                                '</div>'+
                                '<div class="mb-3">'+
                                    '<div class="fw-bold">Pukul : </div>'+
                                    '<div>'+result.data.booking_time+'</div>'+
                                '</div>'+
                            '</div>'
                            ;
                    } else {
                        document.getElementById('result').innerHTML = 'Booking Tidak Ditemukan';
                    }
                },
                error: function(request, status, error) {

                }
            });
        });
    </script>
@endsection
