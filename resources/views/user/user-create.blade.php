@extends('layouts.app')

@section('title', $title)

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">{{ $title }}</div>
                <div class="breadcrumb-item">Add Data</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate=""
                            action="{{ route('admin.user.store') }}">
                            @csrf
                            {{-- <div class="card-header">
                            <h4>{{ __($title) }}</h4>
                        </div> --}}
                            <div class="card-body">
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Nama') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name"
                                        placeholder="{{ __('Nama') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>{{ __('Username') }}</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        name="username" value="{{ old('username') }}" required autocomplete="username"
                                        placeholder="{{ __('Username') }}">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email"
                                        placeholder="{{ __('Email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Passsword') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" value="{{ old('password') }}" required autocomplete="password"
                                        placeholder="{{ __('Password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Konfirmasi Passsword') }}</label>
                                    <input type="password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        name="confirm_password" value="{{ old('confirm_password') }}" required
                                        autocomplete="confirm_password" placeholder="{{ __('Konfirmasi Password') }}">
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('OPD/Perumda/Kelurahan/Desa') }}</label>
                                    <select class="form-control select2 @error('opd_id') is-invalid @enderror"
                                        name="opd_id" autocomplete="opd_id">
                                        <option value="">-</option>
                                        @forelse ($opds as $opd)
                                            <option value="{{ $opd['id'] }}">{{ $opd['nama'] }}</option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('opd_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <label>{{ __('Role') }}</label>
                                    <select class="form-control select2 @error('role_id') is-invalid @enderror"
                                        name="role_id" required autocomplete="role_id">
                                        <option value="">-</option>
                                        @forelse ($roles as $role)
                                            <option value="{{ $role['name'] }}">
                                                {{ strtoupper(Str::headline($role['name'])) }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <a href="{{ route('admin.user.index') }}"" class="btn btn-dark">{{ __('Back') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
