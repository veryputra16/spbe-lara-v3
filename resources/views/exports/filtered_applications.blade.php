<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Perangkat Daerah</th>
            <th>Nama Aplikasi</th>
            <th>Fungsi Aplikasi</th>
            <th>URL</th>
            <th>Tahun Pembuatan</th>
            <th>Repositori</th>
            <th>Layanan Aplikasi</th>
            <th>Jaringan Intra</th>
            <th>Status</th>
            <th>Alasan Nonaktif</th>
            <th>Kategori Pengguna</th>
            <th>Kategori Server</th>
            <th>Kategori Aplikasi</th>
            <th>Dasar Hukum</th>
            <th>Aset Tak Berwujud</th>
            <th>Proses Bisnis</th>
            <th>Keterangan Proses Bisnis</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($applications as $i => $app)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $app->opd->nama ?? '-' }}</td>
                <td>{{ $app->nama_app }}</td>
                <td>{{ $app->fungsi_aplikasi ?? '-' }}</td>
                <td>{{ $app->url ?? '-' }}</td>
                <td>{{ $app->tahun_buat ?? '-' }}</td>
                <td>{{ $app->repositori ?? '-' }}</td>
                <td>{{ $app->layananapp->layanan_app ?? '-' }}</td>
                <td>{{ $app->jaringan_intra ?? '-' }}</td>
                <td>{{ $app->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                <td>{{ $app->alasan_nonaktif ?? '-' }}</td>
                <td>{{ $app->kategori_pengguna ?? '-' }}</td>
                <td>{{ $app->kategori_server ?? '-' }}</td>
                <td>{{ $app->kategori_aplikasi ?? '-' }}</td>
                <td>{{ $app->dasar_hukum ?? '-' }}</td>
                <td>{{ $app->aset_takberwujud == 1 ? 'Ya' : 'Tidak' }}</td>
                <td>{{ $app->proses_bisnis ?? '-' }}</td>
                <td>{{ $app->keterangan_proses_bisnis ?? '-' }}</td>
                <td>{{ $app->created_at ? $app->created_at->format('Y-m-d H:i') : '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
