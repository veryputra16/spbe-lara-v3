@extends('layouts.app')

@section('title', $title)

@push('style')
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.min.css" />
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">{{ $title }}</div>
                <div class="breadcrumb-item">Data Detail</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4>{{ __($title) }}</h4>
                        </div> --}}
                        <div class="card-body">
                            <div class="card card-large-icons">
                                <div class="card-icon bg-primary text-white">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="card-body">
                                    <h4>
                                        {{ $monevapp->app->nama_app }}
                                        @if ($monevapp->app->status == 1)
                                            <span class="btn btn-success btn btn-sm">Aktif</span>
                                        @else
                                            <span class="btn btn-danger btn btn-sm">Tidak Aktif</span>
                                        @endif
                                    </h4>
                                    <p><i class="fas fa-calendar-alt"></i>
                                        {{ $monevapp->tgl_monev->translatedFormat('d F Y') ? $monevapp->tgl_monev->translatedFormat('d F Y') : 'Belum ada Tanggal Monev' }}
                                    </p>
                                    <div><i class="fas fa-folder-open"></i>
                                        @if ($monevapp->bukti_monev)
                                            <a href="{{ asset(Storage::url($monevapp->bukti_monev)) }}" target="_blank">View
                                                Dokumen Bukti Monev</a>
                                        @else
                                            <span class="text-muted">{{ 'Tidak ada bukti Monev Aplikasi' }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="aplikasi-tab" data-toggle="tab" href="#aplikasi"
                                        role="tab" aria-controls="aplikasi" aria-selected="true">Aplikasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="monev-tab" data-toggle="tab" href="#monev" role="tab"
                                        aria-controls="monev" aria-selected="true">Monev</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pengembanganApp-tab" data-toggle="tab" href="#pengembanganApp"
                                        role="tab" aria-controls="pengembanganApp"
                                        aria-selected="false">Pengembangan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="interoperabilitas-tab" data-toggle="tab"
                                        href="#interoperabilitas" role="tab" aria-controls="interoperabilitas"
                                        aria-selected="false">Interoperabilitas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tenagaKelola-tab" data-toggle="tab" href="#tenagaKelola"
                                        role="tab" aria-controls="tenagaKelola" aria-selected="false">Tenaga Teknis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="keamananApp-tab" data-toggle="tab" href="#keamananApp"
                                        role="tab" aria-controls="keamananApp" aria-selected="false">Keamanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="dataApp-tab" data-toggle="tab" href="#dataApp" role="tab"
                                        aria-controls="dataApp" aria-selected="false">Data</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="aplikasi" role="tabpanel"
                                    aria-labelledby="aplikasi-tab">
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-sm" id="">
                                                <tbody>
                                                    <tr>
                                                        <th class="w-25">No Registrasi Aplikasi</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $monevapp->app->no_regis_app ? $monevapp->app->no_regis_app : 'No Regis Tidak Ada' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Perangkat Daerah</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $monevapp->app->opd->nama ? $monevapp->app->opd->nama : 'No Regis Tidak Ada' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Kategori Aplikasi</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $monevapp->app->katapp->kategori_aplikasi ? $monevapp->app->katapp->kategori_aplikasi : 'Kategori Aplikasi Null' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Server</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $monevapp->app->katserver->kategori_server ? $monevapp->app->katserver->kategori_server : 'Server Null' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">URL</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @empty($monevapp->app->url)
                                                                {{ 'Url Tidak Ada' }}
                                                            @else
                                                                <a href="{{ $monevapp->app->url }}"
                                                                    target="_blank">{{ $monevapp->app->url }}</a>
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Fungsi Aplikasi</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $monevapp->app->fungsi_app ? $monevapp->app->fungsi_app : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Dasar Hukum</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @empty($application->dasar_hukum)
                                                                <span class="btn btn-danger btn btn-sm">Dasar Hukum Tidak
                                                                    Ada</span>
                                                            @else
                                                                <a href="{{ asset(Storage::url($application->dasar_hukum)) }}"
                                                                    target="_blank">View Dokumen
                                                                    Dasar Hukum</a>
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Tahun Pembuatan</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $monevapp->app->tahun_buat ? $monevapp->app->tahun_buat : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Repositori</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @empty($application->repositori)
                                                                <span class="btn btn-danger btn btn-sm">Repositori Tidak
                                                                    Ada</span>
                                                            @else
                                                                <a href="{{ $application->repositori }}"
                                                                    target="_blank">{{ $application->repositori }}</a>
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Kategori Pengguna</th>
                                                        <td>:</td>
                                                        <td class="w-75"><span class="btn btn-sm btn-light">
                                                                {{ $monevapp->app->katpengguna->kategori_pengguna }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Layanan</th>
                                                        <td>:</td>
                                                        <td class="w-75"><span class="btn btn-sm btn-light">
                                                                {{ $monevapp->app->layananapp->layanan_app }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Aset Tak Berwujud</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @if ($monevapp->app->aset_takberwujud == 1)
                                                                <span class="btn btn-sm btn-info">Ya</span>
                                                            @else
                                                                <span class="btn btn-sm btn-info">Tidak</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Jaringan Intra</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @if ($monevapp->app->jaringan_intra == 1)
                                                                <span class="btn btn-sm btn-light">Internet</span>
                                                            @endif
                                                            @if ($monevapp->app->jaringan_intra == 2)
                                                                <span class="btn btn-sm btn-light">Intranet</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @if ($monevapp->app->status == 0)
                                                        <tr>
                                                            <th class="w-25">Alasan Nonaktif</th>
                                                            <td>:</td>
                                                            <td class="w-75">{{ $monevapp->app->alasan_nonaktif }}</td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <th class="w-25">Proses Bisnis</th>
                                                        <td>:</td>
                                                        <td class="w-75">{{ $monevapp->app->proses_bisnis }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Keterangan Proses Bisnis</th>
                                                        <td>:</td>
                                                        <td class="w-75">{{ $monevapp->app->ket_probis }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Data Diperbaharui</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            <span class="btn btn-sm btn-outline-dark">
                                                                {{ $monevapp->app->updated_at->translatedFormat('d F Y') }}
                                                                oleh
                                                                {{ $monevapp->app->user->name }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="monev" role="tabpanel" aria-labelledby="monev-tab">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-sm" id="">
                                            <tbody>
                                                <tr>
                                                    <th class="w-25">Keterangan Monev</th>
                                                    <td>:</td>
                                                    <td class="w-75">
                                                        @if ($monevapp->ket_monev)
                                                            {{ $monevapp->ket_monev }}
                                                        @else
                                                            <span class="text-muted">{{ 'Tidak ada Keterangan' }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pengembanganApp" role="tabpanel"
                                    aria-labelledby="pengembanganApp-tab">
                                    {{-- @include('pengembangan.pengembangan-index') --}}
                                </div>
                                <div class="tab-pane fade" id="tenagaKelola" role="tabpanel"
                                    aria-labelledby="tenagaKelola-tab">
                                    {{-- @include('sdmteknis.sdmteknis-index') --}}
                                </div>
                                <div class="tab-pane fade" id="keamananApp" role="tabpanel"
                                    aria-labelledby="keamananApp-tab">
                                    {{-- @include('keamanan.keamanan-index') --}}
                                </div>
                                <div class="tab-pane fade" id="interoperabilitas" role="tabpanel"
                                    aria-labelledby="interoperabilitas-tab">
                                    {{-- @include('interop.interop-index') --}}
                                </div>
                                <div class="tab-pane fade" id="dataApp" role="tabpanel" aria-labelledby="dataApp-tab">
                                    {{-- @include('data.data-index') --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.monevapp.index') }}"" class="btn btn-dark">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- SweetAlert2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: 'Apakah Anda yakin ingin menghapus data ini?',
                    text: "Jika Anda menghapus data ini, akan hilang selamanya.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>

    <!-- Data Tables -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $("#myTableMonev,#myTableKeamanan,#myTableTeknis,#myTableInterop,#myTablePengembangan").dataTable({
            "searching": false,
            "responsive": true,
            "lengthChange": false,
            "info": false,
            "paging": false,
        });
    </script>
@endpush
