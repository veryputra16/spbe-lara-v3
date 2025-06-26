<!-- Table Pengembangan -->
<div class="table-responsive">
    <a href="{{ route('admin.pengembangan.create', $application->id) }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Add
    </a>

    <table class="table table-bordered table-hover" id="myTablePengembangan">
        <thead>
            <tr>
                <th>#</th>
                <th>Action</th>
                <th>Tahun Pengembangan</th>
                <th>Video Penggunaan</th>
                <th>Platform</th>
                <th>Database</th>
                <th>Bahasa Program</th>
                <th>Framework</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengembangans as $pengembangan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="d-flex gap-1">
                        <button type="button" class="btn btn-light btn-sm" data-toggle="modal"
                            data-target="#modalDetail{{ $pengembangan->id }}" title="Detail">
                            <i class="fas fa-eye"></i>
                        </button>
                        <a href="{{ route('admin.pengembangan.edit', ['application' => $application->id, 'pengembangan' => $pengembangan->id]) }}"
                            class="btn btn-light btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form
                            action="{{ route('admin.pengembangan.destroy', ['application' => $application->id, 'pengembangan' => $pengembangan->id]) }}"
                            method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light btn-sm show_confirm" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td>{{ $pengembangan->tahun_pengembangan }}</td>
                    <td>
                        @if ($pengembangan->video_penggunaan)
                            <a href="{{ $pengembangan->video_penggunaan }}"
                                target="_blank">{{ $pengembangan->video_penggunaan }}</a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $pengembangan->platform->kategori_platform }}</td>
                    <td>{{ $pengembangan->db->kategori_database }}</td>
                    <td>{{ $pengembangan->bahasaprogram->bhs_program }}</td>
                    <td>{{ $pengembangan->frameworkapp->framework_app }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data pengembangan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@push('scripts')
    @foreach ($pengembangans as $pengembangan)
        <div class="modal fade" id="modalDetail{{ $pengembangan->id }}" tabindex="-1"
            aria-labelledby="modalDetailLabel{{ $pengembangan->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailLabel{{ $pengembangan->id }}">
                            Detail Pengembangan {{ $pengembangan->app->nama_app }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- KIRI -->
                                <div class="col-md-6">
                                    <table class="table table-borderless table-sm w-100">
                                        <tr>
                                            <td style="width: 220px; white-space: nowrap;"><strong>Nama Aplikasi</strong>
                                            </td>
                                            <td class="text-muted">:</td>
                                            <td>{{ $pengembangan->app->nama_app ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Tahun Pembuatan Aplikasi</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>{{ $pengembangan->app->tahun_buat ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Tahun Pengembangan</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>{{ $pengembangan->tahun_pengembangan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Platform</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>{{ $pengembangan->platform->kategori_platform ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Database</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>{{ $pengembangan->db->kategori_database ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Bahasa Program</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>{{ $pengembangan->bahasaprogram->bhs_program ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Framework</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>{{ $pengembangan->frameworkapp->framework_app ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Riwayat Pengembangan</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>{{ $pengembangan->riwayat_pengembangan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Fitur</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>{{ $pengembangan->fitur ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Capture Frontend</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>
                                                @if ($pengembangan->capture_frontend)
                                                    <img src="{{ asset('storage/' . $pengembangan->capture_frontend) }}"
                                                        alt="Frontend" class="img-fluid rounded border"
                                                        style="max-width: 100%; height: auto;">
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <!-- KANAN -->
                                <div class="col-md-6">
                                    <table class="table table-borderless table-sm w-100">
                                        <tr>
                                            <td style="width: 220px; white-space: nowrap;"><strong>Video Penggunaan</strong>
                                            </td>
                                            <td class="text-muted">:</td>
                                            <td>
                                                @if ($pengembangan->video_penggunaan)
                                                    <a href="{{ $pengembangan->video_penggunaan }}" target="_blank">Lihat
                                                        Video</a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>NDA</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>
                                                @if ($pengembangan->nda)
                                                    <a href="{{ asset('storage/' . $pengembangan->nda) }}"
                                                        target="_blank">Lihat Dokumen NDA</a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Dokumen Perancangan</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>
                                                @if ($pengembangan->doc_perancangan)
                                                    <a href="{{ asset('storage/' . $pengembangan->doc_perancangan) }}"
                                                        target="_blank">Lihat Dokumen</a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Surat Permohonan</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>
                                                @if ($pengembangan->surat_mohon)
                                                    <a href="{{ asset('storage/' . $pengembangan->surat_mohon) }}"
                                                        target="_blank">Lihat Surat</a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>KAK</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>
                                                @if ($pengembangan->kak)
                                                    <a href="{{ asset('storage/' . $pengembangan->kak) }}"
                                                        target="_blank">Lihat KAK</a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>SOP</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>
                                                @if ($pengembangan->sop)
                                                    <a href="{{ asset('storage/' . $pengembangan->sop) }}"
                                                        target="_blank">Lihat SOP</a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Dokumen Pentest</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>
                                                @if ($pengembangan->doc_pentest)
                                                    <a href="{{ asset('storage/' . $pengembangan->doc_pentest) }}"
                                                        target="_blank">Lihat Pentest</a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Dokumen UAT</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>
                                                @if ($pengembangan->doc_uat)
                                                    <a href="{{ asset('storage/' . $pengembangan->doc_uat) }}"
                                                        target="_blank">Lihat UAT</a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Buku Manual</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>
                                                @if ($pengembangan->buku_manual)
                                                    <a href="{{ asset('storage/' . $pengembangan->buku_manual) }}"
                                                        target="_blank">Lihat Buku</a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="white-space: nowrap;"><strong>Capture Backend</strong></td>
                                            <td class="text-muted">:</td>
                                            <td>
                                                @if ($pengembangan->capture_backend)
                                                    <img src="{{ asset('storage/' . $pengembangan->capture_backend) }}"
                                                        alt="Backend" class="img-fluid rounded border"
                                                        style="max-width: 100%; height: auto;">
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endpush
