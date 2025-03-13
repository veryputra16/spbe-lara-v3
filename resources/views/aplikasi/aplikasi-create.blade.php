@extends('layouts.app')

@section('title', $title)

@push('css')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

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
                            action="{{ route('admin.data-aplikasi.store') }}">
                            @csrf
                            {{-- <div class="card-header">
                            <h4>{{ __($title) }}</h4>
                        </div> --}}
                            <div class="card-body">
                                <div class="section-title mt-0">Umum</div>
                                <hr>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('OPD Pengelola *)') }}</label>
                                    <select class="form-control select2 @error('opd_pengelola') is-invalid @enderror"
                                        name="opd_pengelola" required autocomplete="opd_pengelola">
                                        <option value="">-</option>
                                        @forelse ($opds as $opd)
                                            <option value="{{ $opd['id'] }}">{{ $opd['nama'] }}</option>
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
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" value="{{ old('judul') }}" required autocomplete="name"
                                        placeholder="{{ __('Nama Aplikasi') }}">
                                    {{-- <small id="passwordHelpBlock" class="form-text text-muted">
                                        Nama Aplikasi
                                    </small> --}}
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Uraian Aplikasi *)') }}</label>
                                    <textarea class="form-control @error('uraian_app') is-invalid @enderror" name="uraian_app" required
                                        autocomplete="uraian_app" placeholder="{{ __('Uraian Aplikasi') }}" style="height: 200px;resize: vertical">{{ old('uraian_app') }}</textarea>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Menjelaskan uraian dari aplikasi
                                    </small>
                                    @error('uraian_app')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Fungsi Aplikasi *)') }}</label>
                                    <textarea class="form-control @error('fungsi_app') is-invalid @enderror" name="fungsi_app" required
                                        autocomplete="fungsi_app" placeholder="{{ __('Fungsi Aplikasi') }}" style="height: 200px;resize: vertical">{{ old('fungsi_app') }}</textarea>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Menjelaskan fungsi dari aplikasi
                                    </small>
                                    @error('fungsi_app')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Link') }}</label>
                                    <input type="text" class="form-control @error('link') is-invalid @enderror"
                                        name="link" value="{{ old('link') }}" required autocomplete="link"
                                        placeholder="{{ __('Link') }}">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Link website atau link mobile dari Playstore maupun Appstore
                                    </small>
                                    @error('link')
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
                                        @for ($i = 2005; $i <= date('Y'); $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
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
                                        name="repositori" value="{{ old('repositori') }}" required
                                        autocomplete="repositori" placeholder="{{ __('Repositori') }}">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Link dari github, gitlab atau yang lainnya
                                    </small>
                                    @error('repositori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Layanan Aplikasi *)') }}</label>
                                    <select class="form-control select2 @error('layananapp_id') is-invalid @enderror"
                                        name="layananapp_id" required autocomplete="layananapp_id">
                                        <option value="">-</option>
                                        @forelse ($layananapps as $layananapp)
                                            <option value="{{ $layananapp->id }}">{{ $layananapp->layanan_app }}
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
                                        <option>Internet</option>
                                        <option>Intranet</option>
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
                                        name="status" required autocomplete="status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Alasan Nonaktif') }}</label>
                                    <textarea class="form-control @error('alasan_nonaktif') is-invalid @enderror" name="alasan_nonaktif"
                                        autocomplete="alasan_nonaktif" placeholder="{{ __('Alasan Non-aktif') }}"
                                        style="height: 200px;resize: vertical">{{ old('alasan_nonaktif') }}</textarea>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Menjelaskan alasan mengapa aplikasi di non-aktifkan
                                    </small>
                                    @error('alasan_nonaktif')
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
                                            <option value="{{ $katpengguna->id }}">{{ $katpengguna->kategori_pengguna }}
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
                                    <select class="form-control select2 @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                        <option value="">-</option>
                                        @forelse ($katapps as $katapp)
                                            <option value="{{ $katapp->id }}">{{ $katapp->kategori_aplikasi }}</option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Kategori Platform *)') }}</label>
                                    <select class="form-control select2 @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                        <option value="">-</option>
                                        @forelse ($katplatforms as $katplatform)
                                            <option value="{{ $katplatform->id }}">{{ $katplatform->kategori_platform }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3 col-12">
                                    <label>{{ __('Kategori Database *)') }}</label>
                                    <select class="form-control select2 @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                        <option value="">-</option>
                                        @forelse ($katdbs as $katdb)
                                            <option value="{{ $katdb->id }}">{{ $katdb->kategori_database }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Kategori Server *)') }}</label>
                                    <select class="form-control select2 @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                        <option value="">-</option>
                                        @forelse ($katservers as $katserver)
                                            <option value="{{ $katserver->id }}">{{ $katserver->kategori_server }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Bahasa Program *)') }}</label>
                                    <select class="form-control select2 @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                        <option value="">-</option>
                                        @forelse ($bahasaprograms as $bahasaprogram)
                                            <option value="{{ $bahasaprogram->id }}">{{ $bahasaprogram->bhs_program }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('Framework Aplikasi *)') }}</label>
                                    <select class="form-control select2 @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                        <option>-</option>
                                        @forelse ($frameworkapps as $frameworkapp)
                                            <option value="{{ $frameworkapp->id }}">{{ $frameworkapp->framework_app }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data</option>
                                        @endforelse
                                    </select>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="section-title mt-0">Regulasi</div>
                                <hr>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Dasar Hukum *)') }}</label>
                                    <input type="file" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('NDA *)') }}</label>
                                    <input type="file" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('SOP *)') }}</label>
                                    <input type="file" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Aset Tak Berwujud *)') }}</label>
                                    <select class="form-control select2 @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                        <option value="">-</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                    @error('judul')
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
                                    <input type="file" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        file ekstensi .jpg/.jpeg/.png dengan maksimal size 100MB
                                    </small>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Capture Backend *)') }}</label>
                                    <input type="file" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        file ekstensi .jpg/.jpeg/.png dengan maksimal size 100MB
                                    </small>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Buku Manual *)') }}</label>
                                    <input type="file" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Dokumen Perancangan *)') }}</label>
                                    <input type="file" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        file ekstensi .pdf dengan maksimal size 100MB
                                    </small>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="section-title mt-0">Interoperabilitas</div>
                                <hr>
                                <div class="form-group col-md-2 col-12">
                                    <label>{{ __('Aplikasi Sudah Terintegrasi') }}</label>
                                    <select class="form-control select2 @error('judul') is-invalid @enderror"
                                        name="judul" required autocomplete="name">
                                        <option value="">-</option>
                                        <option value="1">Sudah</option>
                                        <option value="0">Belum</option>
                                    </select>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Jelaskan Aplikasi Sudah Terintegrasi Apa Saja') }}</label>
                                    <textarea class="form-control @error('judul') is-invalid @enderror" name="judul" required autocomplete="name"
                                        placeholder="{{ __('Jelaskan Aplikasi Sudah Terintegrasi Apa Saja') }}" style="height: 200px;resize: vertical">{{ old('judul') }}</textarea>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Menjelaskan API yang dimiliki aplikasi ini ataupun menjelaskan aplikasi ini sudah
                                        terintegrasi ke aplikasi apa saja
                                    </small>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <a href="{{ route('admin.data-aplikasi.index') }}""
                                    class="btn btn-dark">{{ __('Back') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
