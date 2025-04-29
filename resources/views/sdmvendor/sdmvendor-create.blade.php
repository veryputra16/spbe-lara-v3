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
                            action="{{ route('admin.sdmpengembang.store', $application->id) }}">
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
                                    <label>{{ __('Nama Vendor') }}</label>
                                    <input type="text"
                                        class="form-control @error('nama_pengembang') is-invalid @enderror"
                                        name="nama_pengembang" value="{{ old('nama_pengembang') }}" required
                                        autocomplete="nama_pengembang" placeholder="{{ __('Nama Vendor') }}">
                                    @error('nama_pengembang')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="alamat_pengembang" class="form-group col-md-8 col-12">
                                    <label>{{ __('Alamat Vendor') }}</label>
                                    <textarea class="form-control @error('alamat_pengembang') is-invalid @enderror" name="alamat_pengembang"
                                        id="alamat_pengembang" autocomplete="alamat_pengembang" placeholder="{{ __('Alamat Vendor') }}"
                                        style="height: 100px;">{{ old('alamat_pengembang') }}</textarea>
                                    @error('alamat_pengembang')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('No HP Vendor') }}</label>
                                    <input type="text"
                                        class="form-control @error('nohp_pengembang') is-invalid @enderror"
                                        name="nohp_pengembang" value="{{ old('nohp_pengembang') }}" required
                                        autocomplete="nohp_pengembang" placeholder="{{ __('No HP Vendor') }}">
                                    @error('nohp_pengembang')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>{{ __('No Kantor Vendor') }}</label>
                                    <input type="text"
                                        class="form-control @error('nokantor_pengembang') is-invalid @enderror"
                                        name="nokantor_pengembang" value="{{ old('nokantor_pengembang') }}"
                                        autocomplete="nokantor_pengembang" placeholder="{{ __('No Kantor Vendor') }}">
                                    @error('nokantor_pengembang')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>{{ __('Email Vendor') }}</label>
                                    <input type="text"
                                        class="form-control @error('email_pengembang') is-invalid @enderror"
                                        name="email_pengembang" value="{{ old('email_pengembang') }}"
                                        autocomplete="email_pengembang" placeholder="{{ __('Email Vendor') }}">
                                    @error('email_pengembang')
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
