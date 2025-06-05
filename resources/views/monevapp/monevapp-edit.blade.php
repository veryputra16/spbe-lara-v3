@extends('layouts.app')

@section('title', $title)

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">{{ $title }}</div>
                <div class="breadcrumb-item">Edit Data</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate=""
                            action="{{ route('admin.monevapp.update', ['application' => $application->id, 'monevapp' => $monevapp]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                <div class="form-group col-md-4 col-12">
                                    <label>{{ __('Tanggal Monev Aplikasi') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control datepicker @error('tgl_monev') is-invalid @enderror"
                                            name="tgl_monev" value="{{ old('tgl_monev', $monevapp->tgl_monev) }}"
                                            autocomplete="tgl_monev" placeholder="{{ __('Tanggal Monev Aplikasi') }}">
                                        @error('tgl_monev')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Bukti Laporan Monev') }}</label>
                                    @if ($monevapp->bukti_monev != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($monevapp->bukti_monev)) }}" target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('bukti_monev') is-invalid @enderror"
                                        name="bukti_monev" autocomplete="bukti_monev">
                                    <small id="bukti_monev" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 10MB
                                    </small>
                                    @error('bukti_monev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Keterangan Monev Aplikasi') }}</label>
                                    <textarea class="form-control @error('ket_monev') is-invalid @enderror" name="ket_monev" autocomplete="ket_monev"
                                        placeholder="{{ __('Keterangan Monev Aplikasi') }}" style="height: 150px;resize: vertical">{{ old('ket_monev', $monevapp->ket_monev) }}</textarea>
                                    @error('ket_monev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <a href="{{ route('admin.application.show', $application->id) }}""
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
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endpush
