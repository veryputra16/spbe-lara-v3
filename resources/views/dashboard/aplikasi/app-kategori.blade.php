<div class="col-lg-4 d-flex">
    <div class="card card-height-fix w-100">
        <div class="card-header">
            <h4 class="text-primary">Aplikasi Berdasarkan Kategori</h4>
        </div>
        <div class="card-body">
            <!-- Layanan -->
            <div class="mb-4 section">
                <h6 class="text-muted">Layanan</h6>

                <div class="d-flex flex-wrap justify-content-center">
                    @foreach ($layananCounts as $layanan)
                        <span
                            class="badge bg-success text-white d-inline-flex align-items-center px-4 py-2 rounded shadow-sm"
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
                <h6 class="text-muted">Wilayah</h6>
                <div class="d-flex flex-wrap justify-content-center">
                    @foreach ($kategoriAppCounts as $kategori)
                        <span
                            class="badge bg-dark text-white d-inline-flex align-items-center px-4 py-2 rounded shadow-sm"
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
                        <span
                            class="badge bg-info text-white d-inline-flex align-items-center px-4 py-2 rounded shadow-sm"
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
                        <span
                            class="badge bg-warning text-dark d-inline-flex align-items-center px-4 py-2 rounded shadow-sm"
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
</div>
