@extends('layouts.frontend.app')
@section('title')
    Checkout
@endsection
@section('content')
    <section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url({{ asset('frontend') }}/assets/img/breadcrumb/breadcrumb.jpg);">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="{{ route('frontend.index') }}">Beranda</a>
                        </li>
                        <li><i class="fa-solid fa-chevrons-right"></i></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="activities-details-section fix section-padding">
        {{-- @dd(request('id')) --}}
        <form action="{{ route('frontend.checkout.simpan',['id' => request('id'), 'trip_code' => request('trip_code')]) }}" method="post">
            @csrf
            <div class="container">
                {{-- <h3>Checkout</h3> --}}
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <h4 class="mb-3 fw-bold">Booking Form</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name" id="">
                                            <label>First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" id="">
                                            <label>Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Email" id="">
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="no_telp" class="form-control" placeholder="No.Telp / Whatsapp" id="">
                                            <label>No. Telp / Whatsapp</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3 shadow-lg">
                            <div class="card-body">
                                <h4 class="mb-3">Payment Method</h4>
                                <hr>
                                <div class="mb-3">
                                    <div style="font-weight: bold">Virtual Account</div>
                                    @foreach ($listPayments as $item)
                                    @if ($item->group == 'Virtual Account')
                                    <div class="form-check">
                                        <input type="radio" name="method" class="form-check-input paymentMethod" id="{{ $item->code }}" value="{{ $item->code.'|'.$item->total_fee->flat }}">
                                        <label for="{{ $item->code }}">{{ explode('Virtual Account',$item->name)[0] }} &nbsp; - &nbsp; <span style="font-weight: bold">{{ 'Rp. '.number_format($item->total_fee->flat,0,',','.') }}</span></label>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="mb-3">
                                    <div style="font-weight: bold">E-Wallet</div>
                                    @foreach ($listPayments as $item)
                                    @if ($item->group == 'E-Wallet')
                                    <div class="form-check">
                                        <input type="radio" name="method" class="form-check-input paymentMethod" id="{{ $item->code }}" value="{{ $item->code.'|'.$item->total_fee->percent.'|'.$item->total_fee->flat }}">
                                        <label for="{{ $item->code }}">{{ $item->name }} &nbsp; - &nbsp; <span style="font-weight: bold">{{ $item->total_fee->percent }} %</span></label>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="main-bar">
                                    <div class="activities-card">
                                        <h4 class="mb-3">Booking Detail :</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="ticket mb-3">
                                                    <li class="mb-2 fw-bold">
                                                        Nama Trip:
                                                    </li>
                                                    <li>
                                                        {{ $trip->trip_name }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="ticket mb-3">
                                                    <li class="mb-2 fw-bold">
                                                        Tanggal Berangkat:
                                                    </li>
                                                    <li>
                                                        <input type="date" name="departure_date" class="form-control" value="{{ request()->post('departure_date') }}" readonly id="">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="ticket mb-3">
                                                    <li class="mb-2 fw-bold">
                                                        Waktu Berangkat:
                                                    </li>
                                                    <li>
                                                        <input type="text" name="departure_time" class="form-control" value="{{ request()->post('departure_time') }}" readonly id="">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-12">
                                                <ul class="ticket mb-3">
                                                    <li>
                                                        <input type="hidden" name="qty" class="form-control" min="1" max="5" value="{{ request()->post('qty') }}" readonly id="">
                                                        <input type="hidden" name="child" class="form-control" min="0" max="5" value="{{ request()->post('child') }}" readonly id="inputChild">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="fw-bold">Perjalanan Ekstra:</div>
                                        <div class="row mb-3">
                                            @foreach ($extra_prices as $item)
                                            <div class="col-md-6">
                                                {{ $item['extra_name'] }}
                                                <input type="hidden" name="extra_id[]" class="form-control" value="{{ $item['id'] }}" id="">
                                            </div>
                                            <div class="col-md-6 text-end">
                                                Rp. {{ number_format($item['extra_price'],2,',','.') }}
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="fw-bold">Dewasa</div>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <div>{{ request()->post('qty') }} x Rp. {{ number_format($trip->trip_price,2,',','.') }}</div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="fw-bold">Anak - Anak</div>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <div id="child"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="fw-bold">Biaya Admin</div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-end" id="feeAdmin"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="fw-bold">Total</div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="fw-bold text-end" id="total"></div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <button type="submit" class="theme-btn">Booking Now <i
                                class="fa-sharp fa-regular fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('js')
    <script>
        const formatterIDR = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        });

        const paymentMethod = document.querySelectorAll('input[name="method"]');
            paymentMethod.forEach((radio) => {
            radio.addEventListener('change', function() {
                console.log('Selected value:', this.value);
                if (this.value.split('|')[0] != 'QRISC') {
                    document.getElementById('feeAdmin').innerHTML = formatterIDR.format(this.value.split('|')[1]);
                    document.getElementById('total').innerHTML = formatterIDR.format(parseFloat(this.value.split('|')[1])+parseFloat({{ $total }})+parseFloat(50000*parseInt($('#inputChild').val())));
                    document.getElementById('child').innerHTML = {{ request()->post('child') }}+' x '+formatterIDR.format(50000*parseInt($('#inputChild').val()));
                }else{
                    document.getElementById('feeAdmin').innerHTML = formatterIDR.format((({{ $total }}*this.value.split('|')[1])/100)+parseFloat(this.value.split('|')[2]));
                    document.getElementById('total').innerHTML = formatterIDR.format(parseFloat(({{ $total }}*this.value.split('|')[1])/100)+parseFloat({{ $total }})+parseFloat(this.value.split('|')[2])+parseFloat(50000*parseInt($('#inputChild').val())));
                    document.getElementById('child').innerHTML = {{ request()->post('child') }}+' x '+formatterIDR.format(50000*parseInt($('#inputChild').val()));
                }
                // You can perform actions here based on the selected radio button
            });
        });
    </script>
@endsection
