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
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @role('superadmin|admin-aplikasi|operator-aplikasi')
                            <a href="{{ route('admin.application.create') }}" class="btn btn-primary mb-3">
                                <i class="fas fa-plus"></i> Add
                            </a>

                            <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                                <!-- KIRI: Length -->
                                <div class="form-inline mb-2">
                                    <label for="customLength" class="mr-2 mb-0">Tampilkan</label>
                                    <select id="customLength" class="form-control form-control-sm" style="height: 40px;">
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                                <!-- KANAN: Filter -->
                                <div class="d-flex flex-wrap mb-2 justify-content-end" style="gap: 0.5rem;">
                                    <select id="filterOPD" class="form-control form-control-sm" style="width: 180px; height: 40px;">
                                        <option value="">-- Semua OPD --</option>
                                        @foreach ($opds as $opd)
                                            <option value="{{ strtolower($opd->nama) }}">{{ $opd->nama }}</option>
                                        @endforeach
                                    </select>

                                    <select id="filterLayanan" class="form-control form-control-sm" style="width: 180px; height: 40px;">
                                        <option value="">-- Semua Layanan --</option>
                                        @foreach ($layanans as $layanan)
                                            <option value="{{ strtolower($layanan->layanan_app) }}">{{ $layanan->layanan_app }}</option>
                                        @endforeach
                                    </select>

                                    <select id="filterTahun" class="form-control form-control-sm" style="width: 180px; height: 40px;">
                                        <option value="">-- Semua Tahun --</option>
                                        @foreach ($applications->pluck('tahun_buat')->unique()->sort() as $tahun)
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                        @endforeach
                                    </select>

                                    <select id="filterStatus" class="form-control form-control-sm" style="width: 180px; height: 40px;">
                                        <option value="">-- Semua Status --</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>

                                    <input type="text" id="customSearch" class="form-control form-control-sm" style="width: 250px; height: 40px;" placeholder="Cari...">
                                </div>
                            </div>
                            @endrole

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Action</th>
                                            <th>Nama Aplikasi</th>
                                            <th>OPD/Perumda/Kelurahan/Desa</th>
                                            <th>Tahun Pembuatan</th>
                                            <th>Status</th>
                                            <th>Aset Tak Berwujud</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        @foreach ($applications as $application)
                                            <tr data-layanan="{{ strtolower($application->layananapp->layanan_app ?? '') }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ route('admin.sdmpengembang.index', $application->id) }}" class="btn btn-primary btn-sm" title="Vendor">
                                                        <i class="fas fa-handshake"></i>
                                                    </a>

                                                    @role('superadmin|admin-aplikasi|operator-aplikasi|viewer-aplikasi')
                                                        <a href="{{ route('admin.application.show', $application->id) }}" class="btn btn-dark btn-sm" title="Detail">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @endrole

                                                    @role('superadmin|admin-aplikasi|operator-aplikasi')
                                                        <a href="{{ route('admin.application.edit', $application->id) }}" class="btn btn-light btn-sm" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endrole

                                                    @role('superadmin|admin-aplikasi')
                                                        <form action="{{ route('admin.application.destroy', $application->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-light btn-sm show_confirm" title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endrole
                                                </td>
                                                <td>{{ $application->nama_app }}</td>
                                                <td>{{ $application->opd->nama }}</td>
                                                <td>{{ $application->tahun_buat }}</td>
                                                <td>
                                                    @if ($application->status == 1)
                                                        <span class="badge badge-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-danger">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($application->aset_takberwujud == 1)
                                                        Ya
                                                    @else
                                                        Tidak
                                                    @endif
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
    </section>
@endsection

@push('scripts')
<!-- SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<!-- DataTables (meskipun tidak dipakai, tetap aman untuk disimpan) -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        function filterTable() {
            let searchText = $('#customSearch').val().toLowerCase();
            let filterTahun = $('#filterTahun').val();
            let filterStatus = $('#filterStatus').val().toLowerCase();
            let filterOPD = $('#filterOPD').val().toLowerCase();
            let filterLayanan = $('#filterLayanan').val().toLowerCase();
            let showCount = parseInt($('#customLength').val());

            let visibleRowCount = 0;

            $('#tableBody tr').each(function () {
                let row = $(this);
                let text = row.text().toLowerCase();
                let tahun = row.find('td:eq(4)').text().trim();
                let status = row.find('td:eq(5)').text().trim().toLowerCase();
                let opd = row.find('td:eq(3)').text().trim().toLowerCase();
                let layanan = row.data('layanan') ?? '';

                let matchSearch = text.includes(searchText);
                let matchTahun = filterTahun === "" || tahun === filterTahun;
                let matchStatus = filterStatus === "" || status === filterStatus;
                let matchOPD = filterOPD === "" || opd === filterOPD;
                let matchLayanan = filterLayanan === "" || layanan.includes(filterLayanan);

                if (matchSearch && matchTahun && matchStatus && matchOPD && matchLayanan) {
                    if (visibleRowCount < showCount) {
                        row.show();
                        visibleRowCount++;
                    } else {
                        row.hide();
                    }
                } else {
                    row.hide();
                }
            });
        }

        $('#customSearch, #filterTahun, #filterStatus, #filterOPD, #filterLayanan, #customLength').on('input change', function () {
            filterTable();
        });

        filterTable();
    });
</script>
@endpush
