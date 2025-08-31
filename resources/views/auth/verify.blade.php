{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.auth.backend.app')
@section('title')
    Verifikasi Email
@endsection
@section('content')
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 bg-black auth-header-box rounded-top">
                                <div class="text-center p-3">
                                    <a class="logo logo-admin">
                                        <img src="{{ asset('backend') }}/assets/logo/logo_plesiran_new_white.png" height="50" alt="logo"
                                            class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Verifikasi Email Pesona Plesiran Indonesia</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success alert-dismissible fade show shadow-sm border-theme-white-2 mb-2"
                                        role="alert">
                                        {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                                    </div>
                                @endif
                                {{ __('Sebelum melanjutkan, harap periksa email Anda untuk tautan verifikasi.') }}
                                {{ __('Jika Anda tidak menerima email') }},
                                <form class="mt-2 text-center" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-primary">{{ __('klik di sini untuk meminta lagi') }}</button>.
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
