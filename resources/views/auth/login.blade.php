@extends('layouts.auth')

@section('pageTitle', 'Masuk')

@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <h3 class="display-4"><a href="{{ url('/') }}" class="text-decoration-none">{{ config('app.name') }}</a></h3>
                    </div>
                    <h1 class="auth-title">Login</h1>
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group position-relative mb-4">
                            <input id="username" type="username" class="form-control form-control-xl @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Nama Pengguna">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative mb-4">
                            <input id="password" type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Kata Sandi">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-xl shadow-lg mt-4">Masuk</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        @if (Route::has('password.request'))
                            <p><a class="font-bold" href="{{ route('password.request') }}">Lupa Password</a></p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endsection
