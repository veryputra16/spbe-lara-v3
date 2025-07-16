@extends('layouts.app')

@section('title', $title)

@push('style')
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.min.css" />
@endpush

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-primary">Data Aplikasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-4 mb-3">
                                <h2 class="text-dark">{{ $total }}</h2>
                                <span class="badge badge-pill badge-primary">Total Aplikasi</span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h2 class="text-dark">{{ $aktif }}</h2>
                                <span class="badge badge-pill badge-success">Aplikasi Aktif</span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h2 class="text-dark">{{ $nonaktif }}</h2>
                                <span class="badge badge-pill badge-danger">Aplikasi Non Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">Data Aplikasi Apa Ni ?</h4>
                </div>
                <div class="card-body">

                    <!-- Layanan -->
                    <div class="mb-4 section">
                        <h6 class="text-muted">Layanan</h6>
                        {{-- <br>
                            <div class="section">Layanan</div>
                        <hr> --}}
                        <div class="d-flex flex-wrap justify-content-center">
                            @foreach ($layananCounts as $layanan)
                                <span class="badge bg-success text-white d-inline-flex align-items-center px-4 py-2 rounded shadow-sm"
                                    style="height: 34px; line-height: 1; margin-right: 12px; margin-bottom: 12px;">
                                    {{ $layanan['nama'] ?? 'Tanpa Nama' }}
                                    <span class="d-inline-block text-white rounded-circle fw-bold"
                                        style="background-color: rgba(255,255,255,0.3); min-width: 28px; height: 28px; line-height: 28px; text-align: center; margin-left: 16px;">
                                        {{ $layanan['jumlah'] }}
                                    </span>
                                </span>
                            @endforeach
                        </div>
                        <hr>
                    </div>

                    <!-- Kategori Aplikasi -->
                    <div class="mb-4">
                        <h6 class="text-muted">Kategori</h6>
                        <div class="d-flex flex-wrap justify-content-center">
                            @foreach ($kategoriAppCounts as $kategori)
                                <span class="badge bg-dark text-white d-inline-flex align-items-center px-4 py-2 rounded shadow-sm"
                                    style="height: 34px; line-height: 1; margin-right: 12px; margin-bottom: 12px;">
                                    {{ $kategori['nama'] }}
                                    <span class="d-inline-block text-white rounded-circle fw-bold"
                                        style="background-color: rgba(255,255,255,0.3); min-width: 28px; height: 28px; line-height: 28px; text-align: center; margin-left: 16px;">
                                        {{ $kategori['jumlah'] }}
                                    </span>
                                </span>
                            @endforeach
                        </div>
                        <hr>
                    </div>

                    <!-- Klasifikasi / Kategori Pengguna -->
                    <div class="mb-4">
                        <h6 class="text-muted">Klasifikasi</h6>
                        <div class="d-flex flex-wrap justify-content-center">
                            @foreach ($kategoriPenggunaCounts as $klasifikasi)
                                <span class="badge bg-info text-white d-inline-flex align-items-center px-4 py-2 rounded shadow-sm"
                                    style="height: 34px; line-height: 1; margin-right: 12px; margin-bottom: 12px;">
                                    {{ $klasifikasi['nama'] }}
                                    <span class="d-inline-block text-white rounded-circle fw-bold"
                                        style="background-color: rgba(255,255,255,0.3); min-width: 28px; height: 28px; line-height: 28px; text-align: center; margin-left: 16px;">
                                        {{ $klasifikasi['jumlah'] }}
                                    </span>
                                </span>
                            @endforeach
                        </div>
                        <hr>
                    </div>

                    <!-- Jaringan -->
                    <div class="mb-2">
                        <h6 class="text-muted">Jaringan</h6>
                        <div class="d-flex flex-wrap justify-content-center">
                            @foreach ($jaringanCounts as $jaringan)
                                <span class="badge bg-warning text-dark d-inline-flex align-items-center px-4 py-2 rounded shadow-sm"
                                    style="height: 34px; line-height: 1; margin-right: 12px; margin-bottom: 12px;">
                                    {{ $jaringan['nama'] }}
                                    <span class="d-inline-block text-dark rounded-circle fw-bold"
                                        style="background-color: rgba(255,255,255,0.5); min-width: 28px; height: 28px; line-height: 28px; text-align: center; margin-left: 16px;">
                                        {{ $jaringan['jumlah'] }}
                                    </span>
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Perangkat Daerah Pengelola Aplikasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-bordered table-hover" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Nama Perangkat Daerah</th>
                                                <th>Aplikasi</th>
                                                <th>Pusat | Lokal</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($opds as $opd)
                                                    <tr>
                                                        <td>{{ $opd->nama }}</td>
                                                        <td>{{ $opd->applications->count() }}</td>
                                                        <td>
                                                            <div class="badge badge-secondary text-dark">
                                                                {{ $opd->pusat_count ?? 0 }} | {{ $opd->lokal_count ?? 0 }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="badge badge-secondary text-dark">
                                                                {{ $opd->aktif_count ?? 0 }}
                                                                <i class="fas fa-check-circle text-success"></i>
                                                            </div>
                                                            <div class="badge badge-secondary text-dark">
                                                                {{ $opd->nonaktif_count ?? 0 }}
                                                                <i class="fas fa-times-circle text-danger"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.application.index', ['opd' => strtolower($opd->nama)]) }}" class="btn btn-secondary">
                                                                <i class="fas fa-info-circle text-dark"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <div id="chartTahun" style="height: 400px;"></div>
    </section>
@endsection

@push('scripts')
<!-- Data Tables -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $("#myTable").dataTable({
            "searching": true,
            "ordering": false
        });
    </script>

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('chartTahun', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Data Aplikasi berdasarkan Tahun'
                },
                xAxis: {
                    categories: {!! json_encode($yearlyData->pluck('tahun')) !!}
                },
                yAxis: {
                    title: {
                        text: 'Total Aplikasi'
                    },
                    allowDecimals: false,
                    min: 0
                },
                series: [
                    {
                        name: 'Semua',
                        data: {!! json_encode($yearlyData->pluck('semua')) !!}
                    },
                    {
                        name: 'Lokal',
                        data: {!! json_encode($yearlyData->pluck('lokal')) !!}
                    },
                    {
                        name: 'Pusat',
                        data: {!! json_encode($yearlyData->pluck('pusat')) !!}
                    },
                    {
                        name: 'Aktif',
                        data: {!! json_encode($yearlyData->pluck('aktif')) !!}
                    },
                    {
                        name: 'Non Aktif',
                        data: {!! json_encode($yearlyData->pluck('nonaktif')) !!}
                    }
                ]
            });
        });
    </script>
@endpush