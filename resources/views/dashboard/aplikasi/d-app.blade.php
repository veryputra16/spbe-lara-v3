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
                                                <th>Apliaksi</th>
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
                                                            <a href="#" class="btn btn-secondary">
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
@endpush
