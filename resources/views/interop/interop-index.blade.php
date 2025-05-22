<div>
    <a href="{{ route('admin.interop.create', $application->id) }}" class="btn btn-primary mb-3"><i
            class="fas fa-plus"></i> Add</a>
    <table class="table table-bordered table-hover" id="">
        <thead>
            <tr>
                <th>Action</th>
                <th>Dokumen Integrasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($interops as $interop)
                <tr>
                    <td>
                        <a href="{{ route('admin.interop.edit', ['application' => $application->id, 'interop' => $interop->id]) }}"
                            class="btn btn-light btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                        <form
                            action="{{ route('admin.interop.destroy', ['application' => $application->id, 'interop' => $interop->id]) }}"
                            method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light btn-sm show_confirm" title="Delete"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    <td>
                    @empty($interop->doc_interop)
                        {{ '-' }}
                    @else
                        <a href="{{ Storage::url($interop->doc_interop) }}" target="_blank">Dokumen
                            Integrasi</a>
                    @endempty
                </td>
                <td>{{ $interop->ket_interop ? $interop->ket_interop : '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No data available in table</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
