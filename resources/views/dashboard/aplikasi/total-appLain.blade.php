<div class="col-lg-4 d-flex">
    <div class="card card-height-fix w-100">
        <div class="card-header">
            <h4>Aplikasi Lainnya</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive table-invoice">
                <!-- Aplikasi -->
                <div class="mb-4">
                    <div class="mb-2 d-flex justify-content-center">
                        <div class="text-center">
                            <h4 class="text-dark">{{ $totalLainnya }}</h4>
                            <span class="badge badge-primary" style="min-width: 150px">Total</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-3">
                        <div class="text-center mr-3">
                            <h5 class="text-dark">{{ $aktifLainnya }}</h5>
                            <span class="badge badge-success" style="min-width: 130px">Aktif</span>
                        </div>
                        <div class="text-center mr-3">
                            <h5 class="text-dark">{{ $nonaktifLainnya }}</h5>
                            <span class="badge badge-danger" style="min-width: 130px">Non Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
