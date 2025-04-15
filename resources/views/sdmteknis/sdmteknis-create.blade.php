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
                            action="{{ route('admin.sdmteknic.store', $application->id) }}">
                            @csrf
                            {{-- <div class="card-header">
                            <h4>{{ __($title) }}</h4>
                        </div> --}}
                            <div class="card-body">
                                <input type="hidden" class="form-control @error('application_id') is-invalid @enderror"
                                    name="application_id" value="{{ old('application_id', $application->id) }}" readonly
                                    autocomplete="application_id" placeholder="{{ __('ID Application') }}">
                                @error('application_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Nama Aplikasi') }}</label>
                                    <input type="text" class="form-control"
                                        value="{{ old('application_id', $application->nama_app) }}" disabled>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Nama Tenaga Teknis') }}</label>
                                    <input type="text"
                                        class="form-control @error('nama_tenaga_technic') is-invalid @enderror"
                                        name="nama_tenaga_technic" value="{{ old('nama_tenaga_technic') }}" required
                                        autocomplete="name" placeholder="{{ __('Nama Tenaga Teknis') }}">
                                    @error('nama_tenaga_technic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>{{ __('NIP Tenaga Teknis') }}</label>
                                    <input type="text"
                                        class="form-control @error('nip_jabatan_tenaga_technic') is-invalid @enderror"
                                        name="nip_jabatan_tenaga_technic" value="{{ old('nip_jabatan_tenaga_technic') }}"
                                        autocomplete="name" placeholder="{{ __('NIP Tenaga Teknis') }}">
                                    @error('nip_jabatan_tenaga_technic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Jabatan Tenaga Teknis') }}</label>
                                    <input type="text"
                                        class="form-control @error('jabatan_tenaga_technic') is-invalid @enderror"
                                        name="jabatan_tenaga_technic" value="{{ old('jabatan_tenaga_technic') }}" required
                                        autocomplete="name" placeholder="{{ __('Jabatan Tenaga Teknis') }}">
                                    @error('jabatan_tenaga_technic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>{{ __('No HP Tenaga Teknis') }}</label>
                                    <input type="text"
                                        class="form-control @error('nohp_tenaga_technic') is-invalid @enderror"
                                        name="nohp_tenaga_technic" value="{{ old('nohp_tenaga_technic') }}" required
                                        autocomplete="name" placeholder="{{ __('No HP Tenaga Teknis') }}">
                                    @error('nohp_tenaga_technic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>{{ __('Email Tenaga Teknis') }}</label>
                                    <input type="text"
                                        class="form-control @error('email_tenaga_technic') is-invalid @enderror"
                                        name="email_tenaga_technic" value="{{ old('email_tenaga_technic') }}"
                                        autocomplete="name" placeholder="{{ __('Email Tenaga Teknis') }}">
                                    @error('email_tenaga_technic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Status Tenaga Teknis') }}</label>
                                    <select
                                        class="form-control select2 @error('status_tenaga_technic') is-invalid @enderror"
                                        name="status_tenaga_technic" id="status_tenaga_technic" required
                                        autocomplete="status_tenaga_technic">
                                        <option value="">-</option>
                                        <option
                                            value="pejabat"{{ old('status_tenaga_technic') == 'pejabat' ? 'selected' : '' }}>
                                            Pejabat</option>
                                        <option
                                            value="teknis"{{ old('status_tenaga_technic') == 'teknis' ? 'selected' : '' }}>
                                            Teknis
                                        </option>
                                    </select>
                                    @error('status_tenaga_technic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <a href="{{ route('admin.application.index') }}""
                                    class="btn btn-dark">{{ __('Back') }}</a>
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
