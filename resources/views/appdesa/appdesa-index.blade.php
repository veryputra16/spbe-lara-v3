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
                        {{-- <div class="card-header">
                            <h4>{{ __($title) }}</h4>
                        </div> --}}
                        <div class="card-body">
                            <div class="alert alert-light alert-has-icon">
                                <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Attention</div>
                                    Fitur ini berfungsi untuk mendata aset digital tak berwujud yang terhubung dengan domain
                                    <code>.desa.id</code>, seperti website desa dan sistem informasi desa yang dimiliki oleh
                                    Pemerintah Desa.
                                </div>
                            </div>
                            @role('superadmin|admin-aplikasi|operator-aplikasi')
                                <a href="{{ route('admin.appdesa.create') }}" class="btn btn-primary mb-3"><i
                                        class="fas fa-plus"></i> Add</a>
                            @endrole
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Action</th>
                                            <th>Nama Aplikasi</th>
                                            <th>Desa</th>
                                            <th>Tahun Pembuatan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appdesas as $appdesa)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ route('admin.appdesa.show', $appdesa->id) }}"
                                                        class="btn btn-dark btn-sm" title="Detail"><i
                                                            class="fas fa-eye"></i></a>
                                                    @role('superadmin|admin-aplikasi|operator-aplikasi')
                                                        <a href="{{ route('admin.appdesa.edit', $appdesa->id) }}"
                                                            class="btn btn-light btn-sm" title="Edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <form action="{{ route('admin.appdesa.destroy', $appdesa->id) }}"
                                                            method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-light btn-sm show_confirm"
                                                                title="Delete"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    @endrole
                                                </td>
                                                <td>{{ $appdesa->nama_app }}</td>
                                                <td>{{ $appdesa->opd->nama }}</td>
                                                <td>{{ $appdesa->tahun_buat }}</td>
                                                <td>
                                                    @if ($appdesa->status == 1)
                                                        <span class="badge badge-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-danger">Tidak Aktif</span>
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
            "searching": true
        });
    </script>
@endpush
