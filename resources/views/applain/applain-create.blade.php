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
                            action="{{ route('admin.applain.store') }}" enctype="multipart/form-data" autocomplete="on">
                            @csrf
                            {{-- <div class="card-header">
                            <h4>{{ __($title) }}</h4>
                        </div> --}}
                            <div class="card-body">
                                <input type="hidden" class="form-control @error('user_id') is-invalid @enderror"
                                    name="user_id" value="{{ old('user_id', auth()->user()->id) }}" required readonly
                                    autocomplete="user_id" placeholder="{{ __('ID User') }}">
                                <div class="section-title mt-0">Umum</div>
                                <hr>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Instansi *)') }}</label>
                                    <select class="form-control select2 @error('opd_id') is-invalid @enderror"
                                        name="opd_id" required autocomplete="opd_id">
                                        <option value="">-</option>
                                        @forelse ($opds as $opd)
                                            <option value="{{ $opd['id'] }}"
                                                {{ old('opd_id') == $opd['id'] ? 'selected' : '' }}>
                                                {{ $opd['nama'] }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('opd_pengelola')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Nama Aplikasi *)') }}</label>
                                    <input type="text" class="form-control @error('nama_app') is-invalid @enderror"
                                        name="nama_app" value="{{ old('nama_app') }}" required autocomplete="name"
                                        placeholder="{{ __('Nama Aplikasi') }}">
                                    @error('nama_app')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Fungsi Aplikasi *)') }}</label>
                                    <textarea class="form-control @error('fungsi_app') is-invalid @enderror" name="fungsi_app" required
                                        autocomplete="fungsi_app" placeholder="{{ __('Fungsi Aplikasi') }}" style="height: 200px;resize: vertical">{{ old('fungsi_app') }}</textarea>
                                    <small id="fungsi_app" class="form-text text-muted">
                                        Menjelaskan fungsi dari aplikasi
                                    </small>
                                    @error('fungsi_app')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Url') }}</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        name="url" value="{{ old('url') }}" autocomplete="url"
                                        placeholder="{{ __('Url') }}">
                                    <small id="url" class="form-text text-muted">
                                        Link website atau link mobile dari Playstore maupun Appstore
                                    </small>
                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Tahun Pembuatan *)') }}</label>
                                    <select class="form-control select2 @error('tahun_buat') is-invalid @enderror"
                                        name="tahun_buat" required autocomplete="tahun_buat">
                                        <option>-</option>
                                        @for ($i = date('Y'); $i >= 2005; $i--)
                                            <option value="{{ $i }}"
                                                {{ old('tahun_buat') == $i ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('tahun_buat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Repositori') }}</label>
                                    <input type="text" class="form-control @error('repositori') is-invalid @enderror"
                                        name="repositori" value="{{ old('repositori') }}" autocomplete="repositori"
                                        placeholder="{{ __('Repositori') }}">
                                    <small id="repositori" class="form-text text-muted">
                                        Link dari github, gitlab atau yang lainnya
                                    </small>
                                    @error('repositori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>{{ __('Layanan Aplikasi *)') }}</label>
                                    <select class="form-control select2 @error('layananapp_id') is-invalid @enderror"
                                        name="layananapp_id" required autocomplete="layananapp_id">
                                        <option value="">-</option>
                                        @forelse ($layananapps as $layananapp)
                                            <option value="{{ $layananapp->id }}"
                                                {{ old('layananapp_id') == $layananapp->id ? 'selected' : '' }}>
                                                {{ $layananapp->layanan_app }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('layananapp_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Jaringan Intra *)') }}</label>
                                    <select class="form-control select2 @error('jaringan_intra') is-invalid @enderror"
                                        name="jaringan_intra" required autocomplete="jaringan_intra">
                                        <option value="">-</option>
                                        <option value="1" {{ old('jaringan_intra') == '1' ? 'selected' : '' }}>
                                            Internet</option>
                                        <option value="2" {{ old('jaringan_intra') == '2' ? 'selected' : '' }}>
                                            Intranet</option>
                                    </select>
                                    @error('jaringan_intra')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Status *)') }}</label>
                                    <select class="form-control select2 @error('status') is-invalid @enderror"
                                        name="status" id="status" required autocomplete="status">
                                        <option value="">-</option>
                                        <option value="1"{{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0"{{ old('status') == '0' ? 'selected' : '' }}>Tidak Aktif
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="alasan_nonaktif" class="form-group col-md-8 col-12" style="display: none">
                                    <label>{{ __('Alasan Nonaktif') }}</label>
                                    <textarea class="form-control @error('alasan_nonaktif') is-invalid @enderror" name="alasan_nonaktif"
                                        id="alasan_nonaktif" autocomplete="alasan_nonaktif" placeholder="{{ __('Alasan Non-aktif') }}"
                                        style="height: 200px;resize: vertical">{{ old('alasan_nonaktif') }}</textarea>
                                    <small id="alasan_nonaktif" class="form-text text-muted">
                                        Menjelaskan alasan mengapa aplikasi di non-aktifkan
                                    </small>
                                    @error('alasan_nonaktif')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="section-title mt-0">Regulasi</div>
                                <hr>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Dasar Hukum') }}</label>
                                    <input type="file" class="form-control @error('dasar_hukum') is-invalid @enderror"
                                        name="dasar_hukum" autocomplete="dasar_hukum">
                                    <small id="dasar_hukum" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('dasar_hukum')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="section-title mt-0">Software dan Hardware</div>
                                <hr>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Kategori Pengguna *)') }}</label>
                                    <select class="form-control select2 @error('katpengguna_id') is-invalid @enderror"
                                        name="katpengguna_id" required autocomplete="katpengguna_id">
                                        <option value="">-</option>
                                        @forelse ($katpenggunas as $katpengguna)
                                            <option value="{{ $katpengguna->id }}"
                                                {{ old('katpengguna_id') == $katpengguna->id ? 'selected' : '' }}>
                                                {{ $katpengguna->kategori_pengguna }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('katpengguna_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Kategori Server *)') }}</label>
                                    <select class="form-control select2 @error('katserver_id') is-invalid @enderror"
                                        name="katserver_id" required autocomplete="katserver_id">
                                        <option value="">-</option>
                                        @forelse ($katservers as $katserver)
                                            <option value="{{ $katserver->id }}"
                                                {{ old('katserver_id') == $katserver->id ? 'selected' : '' }}>
                                                {{ $katserver->kategori_server }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('katserver_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Kategori Wilayah *)') }}</label>
                                    <select class="form-control select2 @error('katapp_id') is-invalid @enderror"
                                        name="katapp_id" required autocomplete="katapp_id">
                                        {{-- <option value="">-</option> --}}
                                        @forelse ($katapps as $katapp)
                                            <option value="{{ $katapp->id }}"
                                                {{ old('katapp_id') == $katapp->id ? 'selected' : '' }}>
                                                {{ $katapp->kategori_aplikasi }}</option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('katapp_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="section-title mt-0">Lainnya</div>
                                <hr>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Aset Tak Berwujud') }}</label>
                                    <select class="form-control select2 @error('aset_takberwujud') is-invalid @enderror"
                                        name="aset_takberwujud" autocomplete="aset_takberwujud">
                                        <option value="">-</option>
                                        <option value="0" {{ old('aset_takberwujud') == '0' ? 'selected' : '' }}>
                                            Tidak</option>
                                        <option value="1" {{ old('aset_takberwujud') == '1' ? 'selected' : '' }}>Ya
                                        </option>
                                    </select>
                                    @error('aset_takberwujud')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <a href="{{ route('admin.applain.index') }}""
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

    <script>
        $(document).ready(function() {
            $('#status').change(function() {
                if ($(this).val() === '0') {
                    $('#alasan_nonaktif').show();
                } else {
                    $('#alasan_nonaktif').hide();
                }
            });
        });
    </script>
@endpush
