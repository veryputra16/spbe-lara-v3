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
                                    <i class="fas fa-desktop"></i>
                                </div>
                                <div class="card-body">
                                    <h4>
                                        {{ $applain->nama_app }}
                                        @if ($applain->status == 1)
                                            <span class="btn btn-success btn btn-sm">Aktif</span>
                                        @else
                                            <span class="btn btn-danger btn btn-sm">Tidak Aktif</span>
                                        @endif
                                    </h4>
                                    <p>{{ $applain->opd->nama }}</p>
                                    <div><span><i class="fas fa-th"></i>
                                            {{ $applain->katapp->kategori_aplikasi ? $applain->katapp->kategori_aplikasi : 'Kategori Wilayah Null' }}</span>
                                        &bull; <span><i class="fas fa-server"></i>
                                            {{ $applain->katserver->kategori_server ? $applain->katserver->kategori_server : 'Server Null' }}</span>
                                        &bull; <span><i class="fas fa-link"></i>
                                            @empty($applain->url)
                                                {{ 'Url Tidak Ada' }}
                                            @else
                                                <a href="{{ $applain->url }}" target="_blank">{{ $applain->url }}</a>
                                            @endempty
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="detailApp-tab" data-toggle="tab" href="#detailApp"
                                        role="tab" aria-controls="detailApp" aria-selected="true">Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pengembanganApp-tab" data-toggle="tab" href="#pengembanganApp"
                                        role="tab" aria-controls="pengembanganApp"
                                        aria-selected="false">Pengembangan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tenagaKelola-tab" data-toggle="tab" href="#tenagaKelola"
                                        role="tab" aria-controls="tenagaKelola" aria-selected="false">Tenaga Teknis</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="detailApp" role="tabpanel"
                                    aria-labelledby="detailApp-tab">
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-sm" id="">
                                                <tbody>
                                                    <tr>
                                                        <th class="w-25">Fungsi Aplikasi</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $applain->fungsi_app ? $applain->fungsi_app : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Dasar Hukum</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @empty($applain->dasar_hukum)
                                                                <span class="btn btn-danger btn btn-sm">Dasar Hukum Tidak
                                                                    Ada</span>
                                                            @else
                                                                <a href="{{ asset(Storage::url($applain->dasar_hukum)) }}"
                                                                    target="_blank">View Dokumen
                                                                    Dasar Hukum</a>
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Tahun Pembuatan</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $applain->tahun_buat ? $applain->tahun_buat : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Repositori</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @empty($applain->repositori)
                                                                <span class="btn btn-danger btn btn-sm">Repositori Tidak
                                                                    Ada</span>
                                                            @else
                                                                <a href="{{ $applain->repositori }}"
                                                                    target="_blank">{{ $applain->repositori }}</a>
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Kategori Pengguna</th>
                                                        <td>:</td>
                                                        <td class="w-75"><span class="btn btn-sm btn-light">
                                                                {{ $applain->katpengguna->kategori_pengguna }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Layanan</th>
                                                        <td>:</td>
                                                        <td class="w-75"><span class="btn btn-sm btn-light">
                                                                {{ $applain->layananapp->layanan_app }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Aset Tak Berwujud</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @if ($applain->aset_takberwujud == 1)
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
                                                            @if ($applain->jaringan_intra == 1)
                                                                <span class="btn btn-sm btn-light">Internet</span>
                                                            @endif
                                                            @if ($applain->jaringan_intra == 2)
                                                                <span class="btn btn-sm btn-light">Intranet</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @if ($applain->status == 0)
                                                        <tr>
                                                            <th class="w-25">Alasan Nonaktif</th>
                                                            <td>:</td>
                                                            <td class="w-75">{{ $applain->alasan_nonaktif }}</td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <th class="w-25">Data Diperbaharui</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            <span class="btn btn-sm btn-outline-dark">
                                                                {{ $applain->updated_at->translatedFormat('d F Y') }}
                                                                oleh
                                                                {{ $applain->user->name }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pengembanganApp" role="tabpanel"
                                    aria-labelledby="pengembanganApp-tab">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. In fugit quibusdam dolor
                                    possimus corporis blanditiis ducimus tempora voluptatem accusamus quos, maxime atque
                                    facilis natus nesciunt quis illum provident quod iusto quas recusandae cupiditate?
                                    Corrupti quo quas fugiat reprehenderit. Minima sed nulla, doloremque quam dignissimos
                                    placeat ea architecto dicta consequatur soluta?
                                </div>
                                <div class="tab-pane fade" id="tenagaKelola" role="tabpanel"
                                    aria-labelledby="tenagaKelola-tab">
                                    {{-- @include('sdmteknis.sdmteknis-index') --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.appdesa.index') }}" class="btn btn-dark">{{ __('Back') }}</a>
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
        $("#myTable").dataTable({
            "searching": false,
            "responsive": true,
            "lengthChange": false,
            "info": false,
            "paging": false,
        });
    </script>
@endpush
