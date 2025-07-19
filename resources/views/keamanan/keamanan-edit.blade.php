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
                            action="{{ route('admin.keamanan.update', ['application' => $application->id, 'keamanan' => $keamanan]) }}"
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
                                <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                        <label class="custom-switch mt-2">
                                            <input type="hidden" name="menerapkan_manajemen_katasandi" value="0">
                                            <input type="checkbox" name="menerapkan_manajemen_katasandi"
                                                id="menerapkan_manajemen_katasandi"
                                                autocomplete="menerapkan_manajemen_katasandi" value="1"
                                                class="custom-switch-input"
                                                {{ old('menerapkan_manajemen_katasandi', $keamanan->menerapkan_manajemen_katasandi) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('Menerapkan Manajemen Kata Sandi') }}</span>
                                        </label>
                                        @error('menerapkan_manajemen_katasandi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label class="custom-switch mt-2">
                                            <input type="hidden" name="menerapkan_metode_hashing" value="0">
                                            <input type="checkbox" name="menerapkan_metode_hashing"
                                                id="menerapkan_metode_hashing" autocomplete="menerapkan_metode_hashing"
                                                value="1" class="custom-switch-input"
                                                {{ old('menerapkan_metode_hashing', $keamanan->menerapkan_metode_hashing) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('Menerapkan Metode Hashing') }}</span>
                                        </label>
                                        @error('menerapkan_metode_hashing')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label class="custom-switch mt-2">
                                            <input type="hidden" name="menerapkan_enkripsi_data" value="0">
                                            <input type="checkbox" name="menerapkan_enkripsi_data"
                                                id="menerapkan_enkripsi_data" autocomplete="menerapkan_enkripsi_data"
                                                value="1"
                                                class="custom-switch-input"{{ old('menerapkan_enkripsi_data', $keamanan->menerapkan_enkripsi_data) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('Menerapkan Enkripsi data') }}</span>
                                        </label>
                                        @error('menerapkan_enkripsi_data')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label class="custom-switch mt-2">
                                            <input type="hidden" name="menerapkan_ssl" value="0">
                                            <input type="checkbox" name="menerapkan_ssl" id="menerapkan_ssl"
                                                autocomplete="menerapkan_ssl" value="1" class="custom-switch-input"
                                                {{ old('menerapkan_ssl', $keamanan->menerapkan_ssl) }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('Menerapkan SSL') ? 'checked' : '' }}</span>
                                        </label>
                                        @error('menerapkan_ssl')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label class="custom-switch mt-2">
                                            <input type="hidden" name="menerapkan_captcha_login" value="0">
                                            <input type="checkbox" name="menerapkan_captcha_login"
                                                id="menerapkan_captcha_login" autocomplete="menerapkan_captcha_login"
                                                value="1" class="custom-switch-input"
                                                {{ old('menerapkan_captcha_login', $keamanan->menerapkan_captcha_login) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('Menerapkan Captcha Login') }}</span>
                                        </label>
                                        @error('menerapkan_captcha_login')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label class="custom-switch mt-2">
                                            <input type="hidden" name="menerapkan_token_api" value="0">
                                            <input type="checkbox" name="menerapkan_token_api" id="menerapkan_token_api"
                                                autocomplete="menerapkan_token_api" value="1"
                                                class="custom-switch-input"
                                                {{ old('menerapkan_token_api', $keamanan->menerapkan_token_api) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('Menerapkan Token API') }}</span>
                                        </label>
                                        @error('menerapkan_token_api')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label class="custom-switch mt-2">
                                            <input type="hidden" name="menerapkan_manajemen_sesi" value="0">
                                            <input type="checkbox" name="menerapkan_manajemen_sesi"
                                                id="menerapkan_manajemen_sesi" autocomplete="menerapkan_manajemen_sesi"
                                                value="1" class="custom-switch-input"
                                                {{ old('menerapkan_manajemen_sesi', $keamanan->menerapkan_manajemen_sesi) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('Menerapkan Manajemen Sesi') }}</span>
                                        </label>
                                        @error('menerapkan_manajemen_sesi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label class="custom-switch mt-2">
                                            <input type="hidden" name="notif_user_login_bersama" value="0">
                                            <input type="checkbox" name="notif_user_login_bersama"
                                                id="notif_user_login_bersama" autocomplete="notif_user_login_bersama"
                                                value="1" class="custom-switch-input"
                                                {{ old('notif_user_login_bersama', $keamanan->notif_user_login_bersama) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('Notif User Login Bersama') }}</span>
                                        </label>
                                        @error('notif_user_login_bersama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label class="custom-switch mt-2">
                                            <input type="hidden" name="menerapkan_fitur_log" value="0">
                                            <input type="checkbox" name="menerapkan_fitur_log" id="menerapkan_fitur_log"
                                                autocomplete="menerapkan_fitur_log" value="1"
                                                class="custom-switch-input"
                                                {{ old('menerapkan_fitur_log', $keamanan->menerapkan_fitur_log) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('Menerapkan Fitur Log') }}</span>
                                        </label>
                                        @error('menerapkan_fitur_log')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label class="custom-switch mt-2">
                                            <input type="hidden" name="menerapkan_size_file" value="0">
                                            <input type="checkbox" name="menerapkan_size_file" id="menerapkan_size_file"
                                                autocomplete="menerapkan_size_file" value="1"
                                                class="custom-switch-input"
                                                {{ old('menerapkan_size_file', $keamanan->menerapkan_size_file) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('Menerapkan Size File') }}</span>
                                        </label>
                                        @error('menerapkan_size_file')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label class="custom-switch mt-2">
                                            <input type="hidden" name="pernah_mengalami_serangan_cyber" value="0">
                                            <input type="checkbox" name="pernah_mengalami_serangan_cyber"
                                                id="pernah_mengalami_serangan_cyber"
                                                autocomplete="pernah_mengalami_serangan_cyber" value="1"
                                                class="custom-switch-input"
                                                {{ old('pernah_mengalami_serangan_cyber', $keamanan->pernah_mengalami_serangan_cyber) ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">{{ __('Pernah Mengalami Serangan Cyber') }}</span>
                                        </label>
                                        @error('pernah_mengalami_serangan_cyber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-8 col-12">
                                    <label>{{ __('Penanganan Serangan Cyber') }}</label>
                                    @if ($keamanan->penanganan_serangan_cyber != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($keamanan->penanganan_serangan_cyber)) }}"
                                                target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
                                    <input type="file"
                                        class="form-control @error('penanganan_serangan_cyber') is-invalid @enderror"
                                        name="penanganan_serangan_cyber" autocomplete="penanganan_serangan_cyber">
                                    <small id="penanganan_serangan_cyber" class="form-text text-muted">
                                        file ekstensi pdf dengan maksimal size 10MB
                                    </small>
                                    @error('penanganan_serangan_cyber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>{{ __('Pernah Audit Keamanan') }}</label>
                                    <select
                                        class="form-control select2 @error('pernah_audit_keamanan') is-invalid @enderror"
                                        name="pernah_audit_keamanan" required autocomplete="pernah_audit_keamanan">
                                        {{-- <option value="">-</option> --}}
                                        <option value="sudah"
                                            {{ old('pernah_audit_keamanan', $keamanan->pernah_audit_keamanan) == 'pernah' ? 'selected' : '' }}>
                                            Pernah
                                        </option>
                                        <option value="belum"
                                            {{ old('pernah_audit_keamanan', $keamanan->pernah_audit_keamanan) == 'belum' ? 'selected' : '' }}>
                                            Belum
                                        </option>
                                    </select>
                                    @error('pernah_audit_keamanan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-12" style="display: none"
                                    id="siapa_melakukan_audit_keamanan">
                                    <label>{{ __('Siapa Melakukan Audit Keamanan') }}</label>
                                    <select
                                        class="form-control select2 @error('siapa_melakukan_audit_keamanan') is-invalid @enderror"
                                        name="siapa_melakukan_audit_keamanan"
                                        autocomplete="siapa_melakukan_audit_keamanan">
                                        {{-- <option value="">-</option> --}}
                                        {{-- <option value="belum-dilaksanakan-audit"
                                            {{ old('siapa_melakukan_audit_keamanan', $keamanan->siapa_melakukan_audit_keamanan) == 'belum-dilaksanakan-audit' ? 'selected' : '' }}>
                                            Belum Dilaksanakan Audit
                                        </option> --}}
                                        <option value="mandiri"
                                            {{ old('siapa_melakukan_audit_keamanan', $keamanan->siapa_melakukan_audit_keamanan) == 'mandiri' ? 'selected' : '' }}>
                                            Mandiri
                                        </option>
                                        <option value="dinas-kominfos"
                                            {{ old('siapa_melakukan_audit_keamanan', $keamanan->siapa_melakukan_audit_keamanan) == 'dinas-kominfos' ? 'selected' : '' }}>
                                            Dinas Kominfos
                                        </option>
                                        <option value="pihak-lainnya"
                                            {{ old('siapa_melakukan_audit_keamanan', $keamanan->siapa_melakukan_audit_keamanan) == 'pihak-lainnya' ? 'selected' : '' }}>
                                            Pihak Lainnya
                                        </option>
                                    </select>
                                    @error('siapa_melakukan_audit_keamanan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8 col-12" id="bukti_dukung_audit_keamanan"
                                    style="display: none">
                                    <label>{{ __('Bukti Dukung Audit Keamanan') }}</label>
                                    @if ($keamanan->bukti_dukung_audit_keamanan != '')
                                        <div class="mb-0 d-block">
                                            <a href="{{ asset(Storage::url($keamanan->bukti_dukung_audit_keamanan)) }}"
                                                target="_blank">
                                                <i class="fas fa-file-alt"></i> View Dokumen
                                            </a>
                                        </div>
                                    @endif
                                    <input type="file"
                                        class="form-control @error('bukti_dukung_audit_keamanan') is-invalid @enderror"
                                        name="bukti_dukung_audit_keamanan" id="bukti_dukung_audit_keamanan"
                                        autocomplete="bukti_dukung_audit_keamanan">
                                    <small id="bukti_dukung_audit_keamanan" class="form-text text-muted">
                                        file ekstensi pdf dengan maksimal size 10MB
                                    </small>
                                    @error('bukti_dukung_audit_keamanan')
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

    <script>
        $(document).ready(function() {
            $('#pernah_audit_keamanan').change(function() {
                if ($(this).val() === 'pernah') {
                    $('#siapa_melakukan_audit_keamanan').show();
                    $('#bukti_dukung_audit_keamanan').show();
                } else {
                    $('#siapa_melakukan_audit_keamanan').hide();
                    $('#bukti_dukung_audit_keamanan').hide();
                }
            });
        });
    </script>
@endpush
