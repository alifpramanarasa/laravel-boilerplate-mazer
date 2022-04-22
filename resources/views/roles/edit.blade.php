@extends('layouts.app')

@section('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
        </div>

        @error('permissions')
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                {{ $message }}
            </div>
        </div>
        @enderror

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ url('/roles/' .$role->id) }}" class="needs-validation" novalidate="">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $role->name) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="control-label">Permissions</div>
                                    <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-3">
                                            <div class="d-inline-block checkbox mt-2">
                                                <input type="checkbox" id="checkbox" name="permissions[]" class="form-check-input" value="{{ $permission->id }}"
                                                @if(old('permissions'))
                                                    {{ (in_array($permission->id, old('permissions')) ? 'checked' : '') }}
                                                @else
                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                                @endif>
                                                <label for="checkbox">{{ $permission->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="text-center pt-5">
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
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Page Specific JS File -->
@endsection
