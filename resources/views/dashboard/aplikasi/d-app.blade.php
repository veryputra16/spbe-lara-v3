@extends('layouts.app')

@section('title', $title)

@push('style')
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.min.css" />
@endpush

@section('content')
    <section class="section">
      
            <div class="col-lg-12">
                <div class="card card-statistic-2">
                    <div class="col-lg-12">
                        <div class="card-header">
                            <h4>Budget vs Sales</h4>
                        </div>
                        <div class="card-body d-flex justify-content-around text-center">
                            <div>
                                <h3 class="font-weight-bold">{{ $totalAplikasi }}</h3>
                                <span class="badge badge-pill badge-primary px-3 py-2">Total Aplikasi</span>
                            </div>
                            <div>
                                <h3 class="font-weight-bold">{{ $aplikasiAktif }}</h3>
                                <span class="badge badge-pill badge-success px-3 py-2">Aplikasi Aktif</span>
                            </div>
                            <div>
                                <h3 class="font-weight-bold">{{ $aplikasiNonAktif }}</h3>
                                <span class="badge badge-pill badge-danger px-3 py-2">Aplikasi Non Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
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
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Best Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="owl-carousel owl-theme" id="products-carousel">
                            <div>
                                <div class="product-item pb-3">
                                    <div class="product-image">
                                        <img alt="image" src="../assets/img/products/product-4-50.png"
                                            class="img-fluid">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">iBook Pro 2018</div>
                                        <div class="product-review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="text-muted text-small">67 Sales</div>
                                        <div class="product-cta">
                                            <a href="#" class="btn btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-item">
                                    <div class="product-image">
                                        <img alt="image" src="../assets/img/products/product-3-50.png"
                                            class="img-fluid">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">oPhone S9 Limited</div>
                                        <div class="product-review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half"></i>
                                        </div>
                                        <div class="text-muted text-small">86 Sales</div>
                                        <div class="product-cta">
                                            <a href="#" class="btn btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="product-item">
                                    <div class="product-image">
                                        <img alt="image" src="../assets/img/products/product-1-50.png"
                                            class="img-fluid">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">Headphone Blitz</div>
                                        <div class="product-review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="text-muted text-small">63 Sales</div>
                                        <div class="product-cta">
                                            <a href="#" class="btn btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Top Countries</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-title mb-2">July</div>
                                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                    <li class="media">
                                        <img class="img-fluid mt-1 img-shadow"
                                            src="../node_modules/flag-icon-css/flags/4x3/id.svg" alt="image"
                                            width="40">
                                        <div class="media-body ml-3">
                                            <div class="media-title">Indonesia</div>
                                            <div class="text-small text-muted">3,282 <i
                                                    class="fas fa-caret-down text-danger"></i></div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="img-fluid mt-1 img-shadow"
                                            src="../node_modules/flag-icon-css/flags/4x3/my.svg" alt="image"
                                            width="40">
                                        <div class="media-body ml-3">
                                            <div class="media-title">Malaysia</div>
                                            <div class="text-small text-muted">2,976 <i
                                                    class="fas fa-caret-down text-danger"></i></div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="img-fluid mt-1 img-shadow"
                                            src="../node_modules/flag-icon-css/flags/4x3/us.svg" alt="image"
                                            width="40">
                                        <div class="media-body ml-3">
                                            <div class="media-title">United States</div>
                                            <div class="text-small text-muted">1,576 <i
                                                    class="fas fa-caret-up text-success"></i></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 mt-sm-0 mt-4">
                                <div class="text-title mb-2">August</div>
                                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mb-0">
                                    <li class="media">
                                        <img class="img-fluid mt-1 img-shadow"
                                            src="../node_modules/flag-icon-css/flags/4x3/id.svg" alt="image"
                                            width="40">
                                        <div class="media-body ml-3">
                                            <div class="media-title">Indonesia</div>
                                            <div class="text-small text-muted">3,486 <i
                                                    class="fas fa-caret-up text-success"></i></div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="img-fluid mt-1 img-shadow"
                                            src="../node_modules/flag-icon-css/flags/4x3/ps.svg" alt="image"
                                            width="40">
                                        <div class="media-body ml-3">
                                            <div class="media-title">Palestine</div>
                                            <div class="text-small text-muted">3,182 <i
                                                    class="fas fa-caret-up text-success"></i></div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="img-fluid mt-1 img-shadow"
                                            src="../node_modules/flag-icon-css/flags/4x3/de.svg" alt="image"
                                            width="40">
                                        <div class="media-body ml-3">
                                            <div class="media-title">Germany</div>
                                            <div class="text-small text-muted">2,317 <i
                                                    class="fas fa-caret-down text-danger"></i></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Invoices</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-87239</a></td>
                                    <td class="font-weight-600">Kusnadi</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 19, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-48574</a></td>
                                    <td class="font-weight-600">Hasan Basri</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 21, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-76824</a></td>
                                    <td class="font-weight-600">Muhamad Nuruzzaki</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 22, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-84990</a></td>
                                    <td class="font-weight-600">Agung Ardiansyah</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 22, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-87320</a></td>
                                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 28, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="far fa-question-circle"></i>
                        </div>
                        <h4>14</h4>
                        <div class="card-description">Customers need help</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tickets-list">
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>My order hasn't arrived yet</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Laila Tazkiah</div>
                                    <div class="bullet"></div>
                                    <div class="text-primary">1 min ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Please cancel my order</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Rizal Fakhri</div>
                                    <div class="bullet"></div>
                                    <div>2 hours ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Do you see my mother?</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Syahdan Ubaidillah</div>
                                    <div class="bullet"></div>
                                    <div>6 hours ago</div>
                                </div>
                            </a>
                            <a href="features-tickets.html" class="ticket-item ticket-more">
                                View All <i class="fas fa-chevron-right"></i>
                            </a>
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
            "searching": true
        });
    </script>
@endpush
