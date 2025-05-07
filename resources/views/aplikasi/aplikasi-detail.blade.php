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
                                    @if ($application->katplatform->kategori_platform == 'Website')
                                        <i class="fas fa-globe"></i>
                                    @endif
                                    @if ($application->katplatform->kategori_platform == 'Mobile')
                                        <i class="fas fa-mobile-alt"></i>
                                    @endif
                                    @if ($application->katplatform->kategori_platform == 'Dekstop')
                                        <i class="fas fa-desktop"></i>
                                    @endif
                                    @if ($application->katplatform->kategori_platform == 'Lainnya')
                                        <i class="fas fa-puzzle-piece"></i>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h4>
                                        {{ $application->nama_app }}
                                        @if ($application->status == 1)
                                            <span class="btn btn-success btn btn-sm">Aktif</span>
                                        @else
                                            <span class="btn btn-danger btn btn-sm">Tidak Aktif</span>
                                        @endif
                                    </h4>
                                    <p>{{ $application->opd->nama }}</p>
                                    <div>
                                        <span><i class="fas fa-desktop"></i>
                                            {{ $application->katplatform->kategori_platform ? $application->katplatform->kategori_platform : 'Platform Null' }}</span>
                                        &bull; <span><i class="fas fa-th"></i>
                                            {{ $application->katapp->kategori_aplikasi ? $application->katapp->kategori_aplikasi : 'Kategori Aplikasi Null' }}</span>
                                        &bull; <span><i class="fas fa-code"></i>
                                            {{ $application->bahasaprogram->bhs_program ? $application->bahasaprogram->bhs_program : 'Bahasa Program Null' }}</span>
                                        &bull; <span><i class="fas fa-server"></i>
                                            {{ $application->katserver->kategori_server ? $application->katserver->kategori_server : 'Server Null' }}</span>
                                        &bull; <span><i class="fas fa-link"></i>
                                            <a href="{{ $application->url ? $application->url : '#' }}"
                                                {{ $application->url ? 'target="_blank"' : '#' }}>{{ $application->url ? $application->url : 'Url Null' }}</a></span>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="umum-tab" data-toggle="tab" href="#umum"
                                        role="tab" aria-controls="umum" aria-selected="true">Umum</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="monevApp-tab" data-toggle="tab" href="#monevApp" role="tab"
                                        aria-controls="monevApp" aria-selected="false">Monev Aplikasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tenagaKelola-tab" data-toggle="tab" href="#tenagaKelola"
                                        role="tab" aria-controls="tenagaKelola" aria-selected="false">Tenaga Teknis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tenagaVendor-tab" data-toggle="tab" href="#tenagaVendor"
                                        role="tab" aria-controls="tenagaVendor" aria-selected="false">Vendor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="interopabilas-tab" data-toggle="tab" href="#interopabilas"
                                        role="tab" aria-controls="interopabilas" aria-selected="false">Interopabilas</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="umum" role="tabpanel"
                                    aria-labelledby="umum-tab">
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-sm" id="">
                                                <tbody>
                                                    <tr>
                                                        <th class="w-25">Fungsi Aplikasi</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->fungsi_app ? $application->fungsi_app : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Fitur Aplikasi</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->fitur_app ? $application->fitur_app : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Dasar Hukum</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->dasar_hukum ? $application->dasar_hukum : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Tahun Pembuatan</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->tahun_buat ? $application->tahun_buat : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Buku Manual</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->buku_manual ? $application->buku_manual : '-' }}
                                                        </td>
                                                    </tr>
                                                    @if ($application->status == 0)
                                                        <tr>
                                                            <th class="w-25">Alasan Nonaktif</th>
                                                            <td>:</td>
                                                            <td class="w-75">{{ $application->alasan_nonaktif }}</td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <th class="w-25">Kategori Pengguna</th>
                                                        <td>:</td>
                                                        <td class="w-75"><span class="btn btn-sm btn-light">
                                                                {{ $application->katpengguna->kategori_pengguna }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Database</th>
                                                        <td>:</td>
                                                        <td class="w-75"><span class="btn btn-sm btn-light">
                                                                {{ $application->katdb->kategori_database }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Layanan</th>
                                                        <td>:</td>
                                                        <td class="w-75"><span class="btn btn-sm btn-light">
                                                                {{ $application->layananapp->layanan_app }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Framework</th>
                                                        <td>:</td>
                                                        <td class="w-75"><span class="btn btn-sm btn-light">
                                                                {{ $application->frameworkapp->framework_app }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">NDA</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->nda ? $application->nda : '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Aset Tak Berwujud</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @if ($application->aset_takberwujud == 1)
                                                                <span class="btn btn-sm btn-info">Ya</span>
                                                            @else
                                                                <span class="btn btn-sm btn-info">Tidak</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">SOP</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->sop ? $application->sop : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Jaringan Intra</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @if ($application->jaringan_intra == 1)
                                                                <span class="btn btn-sm btn-light">Internet</span>
                                                            @endif
                                                            @if ($application->jaringan_intra == 2)
                                                                <span class="btn btn-sm btn-light">Intranet</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Dokumen Perancangan</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->dokumen_perancangan ? $application->dokumen_perancangan : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Capture Frontend</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->capture_frontend ? $application->capture_frontend : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Capture Bankend</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->capture_backend ? $application->capture_backend : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Surat Permohonan</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->surat_mohon ? $application->surat_mohon : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">KAK</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->kak ? $application->kak : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Implementasi Aplikasi</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->implemen_app ? $application->implemen_app : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Laporan Pentest</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            {{ $application->lapor_pentest ? $application->lapor_pentest : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Video Penggunaan</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            @if ($application->video_pengguna)
                                                                <a href="{{ $application->video_pengguna }}"
                                                                    target="_blank">{{ $application->video_pengguna }}</a>
                                                            @else
                                                                {{ '-' }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="w-25">Data Diperbaharui</th>
                                                        <td>:</td>
                                                        <td class="w-75">
                                                            <span class="btn btn-sm btn-outline-dark">
                                                                {{ $application->updated_at->translatedFormat('d F Y') }}
                                                                oleh
                                                                {{ $application->user->name }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="monevApp" role="tabpanel"
                                    aria-labelledby="monevApp-tab">
                                    Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin
                                    ligula massa, gravida in lacinia efficitur, hendrerit eget mauris.
                                    Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius
                                    leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare
                                    vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum
                                    venenatis ultrices. Proin bibendum bibendum augue ut luctus.
                                </div>
                                <div class="tab-pane fade" id="tenagaKelola" role="tabpanel"
                                    aria-labelledby="tenagaKelola-tab">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident voluptatibus atque
                                    ratione possimus nisi explicabo saepe reprehenderit et minima? Id iusto praesentium hic
                                    culpa debitis deserunt aliquam accusamus fugiat vitae!
                                </div>
                                <div class="tab-pane fade" id="tenagaVendor" role="tabpanel"
                                    aria-labelledby="tenagaVendor-tab">
                                    Nibh molestie torquent aliquam platea leo magnis. Id penatibus urna dis placerat sodales
                                    dignissim ultricies lobortis nec tempor phasellus. Curae mollis pretium lectus ex duis
                                    leo torquent erat congue. Facilisi quam facilisis dolor et tincidunt efficitur nisi
                                    turpis netus rhoncus volutpat. Ultricies dolor ac rhoncus placerat adipiscing. Nostra
                                    netus risus dapibus hendrerit venenatis ut nam viverra nec ultricies. Sagittis
                                    suspendisse dis ex aliquam orci dictumst ut parturient. Tristique congue curae dui
                                    conubia etiam placerat penatibus.
                                </div>
                                <div class="tab-pane fade" id="tenagaVendor" role="tabpanel"
                                    aria-labelledby="tenagaVendor-tab">
                                    Nibh molestie torquent aliquam platea leo magnis. Id penatibus urna dis placerat sodales
                                    dignissim ultricies lobortis nec tempor phasellus. Curae mollis pretium lectus ex duis
                                    leo torquent erat congue. Facilisi quam facilisis dolor et tincidunt efficitur nisi
                                    turpis netus rhoncus volutpat. Ultricies dolor ac rhoncus placerat adipiscing. Nostra
                                    netus risus dapibus hendrerit venenatis ut nam viverra nec ultricies. Sagittis
                                    suspendisse dis ex aliquam orci dictumst ut parturient. Tristique congue curae dui
                                    conubia etiam placerat penatibus.
                                </div>
                                <div class="tab-pane fade" id="interopabilas" role="tabpanel"
                                    aria-labelledby="interopabilas-tab">
                                    Nibh molestie torquent aliquam platea leo magnis. Id penatibus urna dis placerat sodales
                                    dignissim ultricies lobortis nec tempor phasellus. Curae mollis pretium lectus ex duis
                                    leo torquent erat congue. Facilisi quam facilisis dolor et tincidunt efficitur nisi
                                    turpis netus rhoncus volutpat. Ultricies dolor ac rhoncus placerat adipiscing. Nostra
                                    netus risus dapibus hendrerit venenatis ut nam viverra nec ultricies. Sagittis
                                    suspendisse dis ex aliquam orci dictumst ut parturient. Tristique congue curae dui
                                    conubia etiam placerat penatibus.
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.application.index') }}""
                                class="btn btn-dark">{{ __('Back') }}</a>
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
@endpush
