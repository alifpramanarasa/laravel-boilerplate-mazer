@extends('layouts.app')

@section('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
        </div>

        @if(session('message'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                {{ session('message') }}
            </div>
        </div>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-2"></div>
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/users/' .$user->id) }}" class="needs-validation" novalidate="">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kata Sandi Baru</label>
                                    <input name="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Kata Sandi</label>
                                    <input name="password_confirmation" type="password" class="form-control pwstrength" data-indicator="pwindicator">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="choices form-select @error('role') is-invalid @enderror" name="role">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" {{ in_array($role->name, $userRole) ? 'selected' : '' }} {{ (collect(old('role'))->contains($role->name)) ? 'selected':'' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>

    <!-- Page Specific JS File -->

@endsection
