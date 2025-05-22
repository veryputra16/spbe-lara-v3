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
                            action="{{ route('admin.interop.store', $application->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="card-header">
                            <h4>{{ __($title) }}</h4>
                        </div> --}}
                            <div class="card-body">
                                <input type="hidden" class="form-control @error('application_id') is-invalid @enderror"
                                    name="application_id" value="{{ old('application_id', $application->id) }}" readonly
                                    autocomplete="application_id" placeholder="{{ __('ID Application') }}">
                                <input type="hidden" class="form-control @error('user_id') is-invalid @enderror"
                                    name="user_id" value="{{ old('user_id', auth()->user()->id) }}" required readonly
                                    autocomplete="user_id" placeholder="{{ __('ID User') }}">
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Nama Aplikasi') }}</label>
                                    <input type="text" class="form-control"
                                        value="{{ old('application_id', $application->nama_app) }}" disabled>
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Dokumen Integrasi') }}</label>
                                    <input type="file" class="form-control @error('doc_interop') is-invalid @enderror"
                                        name="doc_interop" autocomplete="doc_interop">
                                    <small id="doc_interop" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('doc_interop')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="ket_interop" class="form-group col-md-8 col-12">
                                    <label>{{ __('Keterangan') }}</label>
                                    <textarea class="form-control @error('ket_interop') is-invalid @enderror" name="ket_interop" id="ket_interop"
                                        autocomplete="ket_interop" placeholder="{{ __('Alamat Vendor') }}" style="height: 200px;">{{ old('ket_interop') }}</textarea>
                                    @error('ket_interop')
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
