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
                    <td>
                        <a type="button" class="btn btn-light btn-sm" data-toggle="modal" 
                        data-target="#modalDetail{{ $pengembangan->id }}" title="Detail"><i class="fas fa-eye"></i></a>
                        <!-- Edit -->
                        <a href="{{ route('admin.pengembangan.edit', ['application' => $application->id, 'pengembangan' => $pengembangan->id]) }}"
                            class="btn btn-light btn-sm" title="Edit"><i class="fas fa-edit"></i></a>

                        <!-- Delete -->
                        <form action="{{ route('admin.pengembangan.destroy', ['application' => $application->id, 'pengembangan' => $pengembangan->id]) }}"
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
                            <a href="{{ $pengembangan->video_penggunaan }}" target="_blank">{{ $pengembangan->video_penggunaan }}</a>
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
                    <td colspan="8" class="text-center text-muted">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@push('scripts')
@foreach ($pengembangans as $pengembangan)
        <div class="modal fade" id="modalDetail{{ $pengembangan->id }}" tabindex="-1"
            aria-labelledby="modalDetailLabel{{ $pengembangan->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailLabel{{ $pengembangan->id }}">
                            Detail Pengembangan Tahun {{ $pengembangan->tahun_pengembangan }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <table class="table table-borderless mt-3">
                                <tr>
                                    <th>Tahun Pengembangan</th>
                                    <td>{{ $pengembangan->tahun_pengembangan }}</td>
                                </tr>
                                <tr>
                                    <th>Riwayat Pengembangan</th>
                                    <td>{{ $pengembangan->riwayat_pengembangan }}</td>
                                </tr>
                                <tr>
                                    <th>Fitur</th>
                                    <td>{{ $pengembangan->fitur }}</td>
                                </tr>
                                <tr>
                                    <th>NDA</th>
                                    <td>
                                        @if ($pengembangan->nda)
                                        <a href="{{ asset('storage/' . $pengembangan->nda) }}" target="_blank">Lihat Dokumen</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Dokumen Perancangan</th>
                                    <td>
                                        @if ($pengembangan->doc_perancangan)
                                        <a href="{{ asset('storage/' . $pengembangan->doc_perancangan) }}" target="_blank">Lihat Dokumen</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Surat Permohonan</th>
                                    <td>
                                        @if ($pengembangan->surat_mohon)
                                        <a href="{{ asset('storage/' . $pengembangan->surat_mohon) }}" target="_blank">Lihat Dokumen</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>KAK</th>
                                    <td>
                                        @if ($pengembangan->kak)
                                        <a href="{{ asset('storage/' . $pengembangan->kak) }}" target="_blank">Lihat Dokumen</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>SOP</th>
                                    <td>
                                        @if ($pengembangan->sop)
                                        <a href="{{ asset('storage/' . $pengembangan->sop) }}" target="_blank">Lihat Dokumen</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Dokumen Pentest</th>
                                    <td>
                                        @if ($pengembangan->doc_pentest)
                                        <a href="{{ asset('storage/' . $pengembangan->doc_pentest) }}" target="_blank">Lihat Dokumen</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Dokumen UAT</th>
                                    <td>
                                        @if ($pengembangan->doc_uat)
                                        <a href="{{ asset('storage/' . $pengembangan->doc_uat) }}" target="_blank">Lihat Dokumen</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Video Penggunaan</th>
                                    <td>
                                        @if ($pengembangan->video_penggunaan)
                                            <a href="{{ $pengembangan->video_penggunaan }}" target="_blank">{{ $pengembangan->video_penggunaan }}</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Buku Manual</th>
                                    <td>
                                        @if ($pengembangan->buku_manual)
                                            <a href="{{ asset('storage/' . $pengembangan->buku_manual) }}" target="_blank">Lihat Dokumen</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Kategori Platform</th>
                                    <td>{{ $pengembangan->platform->kategori_platform }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori Database</th>
                                    <td>{{ $pengembangan->db->kategori_database }}</td>
                                </tr>
                                <tr>
                                    <th>Bahasa Program</th>
                                    <td>{{ $pengembangan->bahasaprogram->bhs_program }}</td>
                                </tr>
                                <tr>
                                    <th>Framework</th>
                                    <td>{{ $pengembangan->frameworkapp->framework_app }}</td>
                                </tr>
                                <tr>
                                    <th>Capture Frontend</th>
                                    <td>
                                        @if ($pengembangan->capture_frontend)
                                            <img src="{{ asset('storage/' . $pengembangan->capture_frontend) }}" alt="Capture Backend"
                                                class="img-fluid" style="max-height: 200px;">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Capture Backend</th>
                                    <td>
                                        @if ($pengembangan->capture_backend)
                                            <img src="{{ asset('storage/' . $pengembangan->capture_backend) }}" alt="Capture Backend"
                                                class="img-fluid" style="max-height: 200px;">
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
    @endforeach
@endpush