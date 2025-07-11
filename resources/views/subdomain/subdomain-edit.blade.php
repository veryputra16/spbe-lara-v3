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
                            action="{{ route('admin.subdomain.update', $subdomain) }}">
                            @csrf
                            @method('PUT')
                            {{-- <div class="card-header">
                            <h4>{{ __($title) }}</h4>
                        </div> --}}
                            <div class="card-body">
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('URL') }}</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        name="url" value="{{ old('url', $subdomain->url) }}" required autocomplete="URL"
                                        placeholder="{{ __('Link Portal Subdomain') }}" disabled>
                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Operator Teknis') }}</label>
                                    <input type="text" class="form-control @error('op_teknis') is-invalid @enderror"
                                        name="op_teknis" value="{{ old('op_teknis', $subdomain->op_teknis) }}"
                                        autocomplete="op_teknis" placeholder="{{ __('Operator Teknis') }}">
                                    <small id="op_teknis" class="form-text text-muted">
                                        Nama Operator
                                    </small>
                                    @error('op_teknis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>{{ __('Kontak Teknis') }}</label>
                                    <input type="text" class="form-control @error('kontak_teknis') is-invalid @enderror"
                                        name="kontak_teknis" value="{{ old('kontak_teknis', $subdomain->kontak_teknis) }}"
                                        autocomplete="kontak_teknis" placeholder="{{ __('Nomor Kontak Teknis') }}">
                                    <small id="op_teknis" class="form-text text-muted">
                                        Nomor Kontak Operator Teknis
                                    </small>
                                    @error('kontak_teknis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @role('superadmin|admin-aplikasi')
                                    <div class="form-group col-md-8 col-12">
                                        <label>{{ __('Perangkat Daerah') }}</label>
                                        <select class="form-control select2 @error('opd_id') is-invalid @enderror"
                                            name="opd_id" required autocomplete="opd_id">
                                            <option value="">-</option>
                                            @forelse ($opds as $opd)
                                                <option value="{{ $opd['id'] }}"
                                                    {{ $opd['id'] == $subdomain->opd_id ? 'selected' : '' }}>
                                                    {{ $opd['nama'] }}</option>
                                                {{-- <option value="{{ $opd->id }}" {{ ( $opd->id == $users->opd_id) ? 'selected' : '' }}>{{ $opd->nama_opd }}</option> --}}
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
                                @endrole
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Keterangan') }}</label>
                                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" autocomplete="keterangan"
                                        placeholder="{{ __('Keterangan') }}" style="height: 150px;resize: vertical">{{ old('keterangan', $subdomain->keterangan) }}</textarea>
                                    @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <a href="{{ route('admin.subdomain.index') }}""
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
