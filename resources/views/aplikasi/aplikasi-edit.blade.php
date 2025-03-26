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
                            action="{{ route('admin.application.update', $application) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                    <label>{{ __('Perangkat Daerah/Perumda/Kelurahan/Desa *)') }}</label>
                                    <select class="form-control select2 @error('opd_pengelola') is-invalid @enderror"
                                        name="opd_pengelola" required autocomplete="opd_pengelola">
                                        <option value="">-</option>
                                        @forelse ($opds as $opd)
                                            <option value="{{ $opd['id'] }}"
                                                {{ $application->opd_pengelola == $opd['id'] ? 'selected' : '' }}>
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
                                        name="nama_app" value="{{ old('nama_app', $application->nama_app) }}" required
                                        autocomplete="name" placeholder="{{ __('Nama Aplikasi') }}">
                                    {{-- <small id="passwordHelpBlock" class="form-text text-muted">
                                        Nama Aplikasi
                                    </small> --}}
                                    @error('nama_app')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Fitur Aplikasi *)') }}</label>
                                    <textarea class="form-control @error('fitur_app') is-invalid @enderror" name="fitur_app" required
                                        autocomplete="fitur_app" placeholder="{{ __('Fitur Aplikasi') }}" style="height: 200px;resize: vertical">{{ old('fitur_app', $application->fitur_app) }}</textarea>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Menjelaskan fitur dari aplikasi
                                    </small>
                                    @error('fitur_app')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Fungsi Aplikasi *)') }}</label>
                                    <textarea class="form-control @error('fungsi_app') is-invalid @enderror" name="fungsi_app" required
                                        autocomplete="fungsi_app" placeholder="{{ __('Fungsi Aplikasi') }}" style="height: 200px;resize: vertical">{{ old('fungsi_app', $application->fungsi_app) }}</textarea>
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
                                        name="url" value="{{ old('url', $application->url) }}" autocomplete="url"
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
                                                {{ $application->tahun_buat == $i ? 'selected' : '' }}>
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
                                        name="repositori" value="{{ old('repositori', $application->repositori) }}"
                                        autocomplete="repositori" placeholder="{{ __('Repositori') }}">
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
                                                {{ $application->layananapp_id == $layananapp->id ? 'selected' : '' }}>
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
                                        <option value="1"
                                            {{ $application->jaringan_intra == '1' ? 'selected' : '' }}>
                                            Internet</option>
                                        <option value="2"
                                            {{ $application->jaringan_intra == '2' ? 'selected' : '' }}>
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
                                        {{-- <option value="">-</option> --}}
                                        <option value="1"{{ $application->status == '1' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="0"{{ $application->status == '0' ? 'selected' : '' }}>Tidak
                                            Aktif
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @if ($application->status == 0)
                                    <div id="alasan_non_aktif" class="form-group col-md-8 col-12">
                                        <label>{{ __('Alasan Nonaktif') }}</label>
                                        <textarea class="form-control @error('alasan_nonaktif') is-invalid @enderror" name="alasan_nonaktif"
                                            id="alasan_nonaktif" autocomplete="alasan_nonaktif" placeholder="{{ __('Alasan Non-aktif') }}"
                                            style="height: 200px;resize: vertical">{{ old('alasan_nonaktif', $application->alasan_nonaktif) }}</textarea>
                                        <small id="alasan_nonaktif" class="form-text text-muted">
                                            Menjelaskan alasan mengapa aplikasi di non-aktifkan
                                        </small>
                                        @error('alasan_nonaktif')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endif
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
                                                {{ $application->katpengguna_id == $katpengguna->id ? 'selected' : '' }}>
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
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Kategori Aplikasi *)') }}</label>
                                    <select class="form-control select2 @error('katapp_id') is-invalid @enderror"
                                        name="katapp_id" required autocomplete="katapp_id">
                                        <option value="">-</option>
                                        @forelse ($katapps as $katapp)
                                            <option value="{{ $katapp->id }}"
                                                {{ $application->katapp_id == $katapp->id ? 'selected' : '' }}>
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
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Kategori Platform *)') }}</label>
                                    <select class="form-control select2 @error('katplatform_id') is-invalid @enderror"
                                        name="katplatform_id" required autocomplete="katplatform_id">
                                        <option value="">-</option>
                                        @forelse ($katplatforms as $katplatform)
                                            <option value="{{ $katplatform->id }}"
                                                {{ $application->katplatform_id == $katplatform->id ? 'selected' : '' }}>
                                                {{ $katplatform->kategori_platform }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('katplatform_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <label>{{ __('Kategori Database *)') }}</label>
                                    <select class="form-control select2 @error('katdb_id') is-invalid @enderror"
                                        name="katdb_id" required autocomplete="katdb_id">
                                        <option value="">-</option>
                                        @forelse ($katdbs as $katdb)
                                            <option value="{{ $katdb->id }}"
                                                {{ $application->katdb_id == $katdb->id ? 'selected' : '' }}>
                                                {{ $katdb->kategori_database }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('katdb_id')
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
                                                {{ $application->katserver_id == $katserver->id ? 'selected' : '' }}>
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
                                <div class="form-group col-md-3 col-12">
                                    <label>{{ __('Bahasa Program *)') }}</label>
                                    <select class="form-control select2 @error('bahasaprogram_id') is-invalid @enderror"
                                        name="bahasaprogram_id" required autocomplete="bahasaprogram_id">
                                        <option value="">-</option>
                                        @forelse ($bahasaprograms as $bahasaprogram)
                                            <option value="{{ $bahasaprogram->id }}"
                                                {{ $application->bahasaprogram_id == $bahasaprogram->id ? 'selected' : '' }}>
                                                {{ $bahasaprogram->bhs_program }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('bahasaprogram_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Framework Aplikasi *)') }}</label>
                                    <select class="form-control select2 @error('frameworkapp_id') is-invalid @enderror"
                                        name="frameworkapp_id" required autocomplete="frameworkapp_id">
                                        <option>-</option>
                                        @forelse ($frameworkapps as $frameworkapp)
                                            <option value="{{ $frameworkapp->id }}"
                                                {{ $application->frameworkapp_id == $frameworkapp->id ? 'selected' : '' }}>
                                                {{ $frameworkapp->framework_app }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('frameworkapp_id')
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
                                    @if ($application->dasar_hukum != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($application->dasar_hukum)) }}"
                                                target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
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
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('NDA') }}</label>
                                    @if ($application->nda != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($application->nda)) }}" target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('nda') is-invalid @enderror"
                                        name="nda" autocomplete="nda">
                                    <small id="nda" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('nda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('SOP *)') }}</label>
                                    @if ($application->sop != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($application->sop)) }}" target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('sop') is-invalid @enderror"
                                        name="sop" autocomplete="sop">
                                    <small id="sop" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('sop')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('KAK') }}</label>
                                    @if ($application->kak != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($application->kak)) }}" target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('kak') is-invalid @enderror"
                                        name="kak" autocomplete="kak">
                                    <small id="kak" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('kak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="section-title mt-0">Berkas</div>
                                <hr>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Capture Frontend *)') }}</label>
                                    <div class="media">
                                        <img src="{{ asset(Storage::url($application->capture_frontend)) }}"
                                            alt="Capture Frontend" class="mb-1 rounded-lg" style="width: 10%;">
                                    </div>
                                    <input type="file"
                                        class="form-control @error('capture_frontend') is-invalid @enderror"
                                        name="capture_frontend" autocomplete="capture_frontend">
                                    <small id="capture_frontend" class="form-text text-muted">
                                        file ekstensi .jpg/.jpeg/.png dengan maksimal size 10MB
                                    </small>
                                    @error('capture_frontend')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Capture Backend *)') }}</label>
                                    <div class="media">
                                        <img src="{{ asset(Storage::url($application->capture_backend)) }}"
                                            alt="Capture Backend" class="mb-1 rounded-lg" style="width: 10%;">
                                    </div>
                                    <input type="file"
                                        class="form-control @error('capture_backend') is-invalid @enderror"
                                        name="capture_backend" autocomplete="capture_backend">
                                    <small id="capture_backend" class="form-text text-muted">
                                        file ekstensi .jpg/.jpeg/.png dengan maksimal size 10MB
                                    </small>
                                    @error('capture_backend')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Buku Manual') }}</label>
                                    @if ($application->buku_manual != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($application->buku_manual)) }}"
                                                target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('buku_manual') is-invalid @enderror"
                                        name="buku_manual" autocomplete="buku_manual">
                                    <small id="buku_manual" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('buku_manual')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Dokumen Perancangan') }}</label>
                                    @if ($application->dokumen_perancangan != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($application->dokumen_perancangan)) }}"
                                                target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
                                    <input type="file"
                                        class="form-control @error('dokumen_perancangan') is-invalid @enderror"
                                        name="dokumen_perancangan" autocomplete="dokumen_perancangan">
                                    <small id="dokumen_perancangan" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('dokumen_perancangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Surat Permohonan') }}</label>
                                    @if ($application->surat_mohon != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($application->surat_mohon)) }}"
                                                target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('surat_mohon') is-invalid @enderror"
                                        name="surat_mohon" autocomplete="surat_mohon">
                                    <small id="surat_mohon" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('surat_mohon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Implementasi Aplikasi') }}</label>
                                    @if ($application->implemen_app != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($application->implemen_app)) }}"
                                                target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
                                    <input type="file"
                                        class="form-control @error('implemen_app') is-invalid @enderror"
                                        name="implemen_app" autocomplete="implemen_app">
                                    <small id="implemen_app" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('implemen_app')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Laporan Pentesting') }}</label>
                                    @if ($application->lapor_pentest != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($application->lapor_pentest)) }}"
                                                target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
                                    <input type="file"
                                        class="form-control @error('lapor_pentest') is-invalid @enderror"
                                        name="lapor_pentest" autocomplete="lapor_pentest">
                                    <small id="lapor_pentest" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('lapor_pentest')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="section-title mt-0">Lainnya</div>
                                <hr>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Aset Tak Berwujud *)') }}</label>
                                    <select class="form-control select2 @error('aset_takberwujud') is-invalid @enderror"
                                        name="aset_takberwujud" autocomplete="aset_takberwujud">
                                        <option value="">-</option>
                                        <option value="0"
                                            {{ $application->aset_takberwujud == '0' ? 'selected' : '' }}>
                                            Tidak</option>
                                        <option value="1"
                                            {{ $application->aset_takberwujud == '1' ? 'selected' : '' }}>Ya
                                        </option>
                                    </select>
                                    @error('aset_takberwujud')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Video Pengguna') }}</label>
                                    <input type="text"
                                        class="form-control @error('video_pengguna') is-invalid @enderror"
                                        name="video_pengguna"
                                        value="{{ old('video_pengguna', $application->video_pengguna) }}"
                                        autocomplete="video_pengguna" placeholder="{{ __('Video Pengguna') }}">
                                    <small id="video_pengguna" class="form-text text-muted">
                                        Sertakan Link Video disini jika ada
                                    </small>
                                    @error('video_pengguna')
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
    <style>
        .hidden {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        // $(document).ready(function() {
        //     $('#status').change(function() {
        //         if ($(this).val() === '0') {
        //             $('#alasan_non_aktif').show();
        //         } else {
        //             $('#alasan_non_aktif').hide();
        //         }
        //     });
        // });

        $(document).ready(function() {
            $('#status').change(function() {
                if ($(this).val() == '0') {
                    $('#alasan_non_aktif').removeClass('d-none');
                } else {
                    $('#alasan_non_aktif').addClass('d-none');
                }
            });
        });
    </script>
@endpush
