<div class="table-responsive">
    <a href="{{ route('admin.sdmteknic.create', $application->id) }}" class="btn btn-primary mb-3"><i
            class="fas fa-plus"></i> Add</a>
    <table class="table table-bordered table-hover" id="myTableTeknis">
        <thead>
            <tr>
                <th>Action</th>
                {{-- <th>Aplikasi</th> --}}
                <th>NIP Tenaga Teknis</th>
                <th>Nama Tenaga Teknis</th>
                <th>Jabatan Tenaga Teknis</th>
                <th>No Handphone</th>
                <th>Email Tenaga Teknis</th>
                <th>Status Tenaga Teknis</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sdmteknics as $sdmteknis)
                <tr>
                    <td>
                        <a href="{{ route('admin.sdmteknic.edit', ['application' => $application->id, 'sdmteknic' => $sdmteknis->id]) }}"
                            class="btn btn-light btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                        <form
                            action="{{ route('admin.sdmteknic.destroy', ['application' => $application->id, 'sdmteknic' => $sdmteknis->id]) }}"
                            method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light btn-sm show_confirm" title="Delete"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    {{-- <td>{{ $sdmteknis->app->nama_app }}</td> --}}
                    <td>{!! $sdmteknis->nip_jabatan_tenaga_technic
                        ? $sdmteknis->nip_jabatan_tenaga_technic
                        : '<span class="text-muted">-</span>' !!}
                    </td>
                    <td>{{ $sdmteknis->nama_tenaga_technic }}</td>
                    <td>{!! $sdmteknis->jabatan_tenaga_technic
                        ? $sdmteknis->jabatan_tenaga_technic
                        : '<span class="text-muted">-</span>' !!}
                    </td>
                    <td>{!! $sdmteknis->nohp_tenaga_technic ? $sdmteknis->nohp_tenaga_technic : '<span class="text-muted">-</span>' !!}
                    </td>
                    <td>{!! $sdmteknis->email_tenaga_technic ? $sdmteknis->email_tenaga_technic : '<span class="text-muted">-</span>' !!}
                    </td>
                    <td><span class="badge badge-dark">{!! $sdmteknis->status_tenaga_technic
                        ? ucfirst(strtolower($sdmteknis->status_tenaga_technic))
                        : '<span class="text-muted">-</span>' !!}</span>
                    </td>
                </tr>
            @empty
                {{-- <tr>
                    <td colspan="7">No data available in table</td>
                </tr> --}}
            @endforelse
        </tbody>
    </table>
</div>
