<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApplicationExport implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Application::with(['opd', 'layananapp', 'katpengguna', 'katserver', 'katapp'])
            ->whereIn('katapp_id', [1, 2]);

        if ($this->filters['opd']) {
            $query->whereHas('opd', function ($q) {
                $q->where('nama', 'like', '%' . $this->filters['opd'] . '%');
            });
        }

        if ($this->filters['layanan']) {
            $query->whereHas('layananapp', function ($q) {
                $q->where('layanan_app', 'like', '%' . $this->filters['layanan'] . '%');
            });
        }

        if ($this->filters['tahun']) {
            $query->where('tahun_buat', $this->filters['tahun']);
        }

        if ($this->filters['status'] !== null && $this->filters['status'] !== '') {
            $query->where('status', strtolower($this->filters['status']) === 'aktif' ? 1 : 0);
        }

        $applications = $query->get();

        return $applications->filter(function ($app) {
            if (!$this->filters['search']) return true;

            $search = strtolower($this->filters['search']);

            return str_contains(strtolower($app->nama_app ?? ''), $search)
                || str_contains(strtolower($app->fungsi_app ?? ''), $search)
                || str_contains(strtolower($app->opd->nama ?? ''), $search)
                || str_contains(strtolower($app->layananapp->layanan_app ?? ''), $search);
        })->map(function ($app) {
            return [
                'Perangkat Daerah' => $app->opd->nama ?? '-',
                'Nama Aplikasi' => $app->nama_app ?? '-',
                'Fungsi Aplikasi' => $app->fungsi_app ?? '-',
                'URL' => $app->url ?? '-',
                'Tahun Pembuatan' => $app->tahun_buat ?? '-',
                'Repositori' => $app->repositori ?? '-',
                'Layanan Aplikasi' => $app->layananapp->layanan_app ?? '-',
                'Jaringan Intra' => $app->jaringan_intra == 1 ? 'Internet' : ($app->jaringan_intra == 2 ? 'Intranet' : '-'),
                'Status' => $app->status == 1 ? 'Aktif' : 'Tidak Aktif',
                'Alasan Nonaktif' => $app->alasan_nonaktif ?? '-',
                'Kategori Pengguna' => $app->katpengguna->kategori_pengguna ?? '-',
                'Kategori Server' => $app->katserver->kategori_server ?? '-',
                'Kategori Aplikasi' => $app->katapp->kategori_aplikasi ?? '-',
                'Dasar Hukum' => $app->dasar_hukum ? asset('storage/' . $app->dasar_hukum) : '-',
                'Aset Tak Berwujud' => $app->aset_takberwujud == 1 ? 'Ya' : 'Tidak',
                'Proses Bisnis' => $app->proses_bisnis ?? '-',
                'Keterangan Proses Bisnis' => $app->ket_probis ?? '-',
                'Created At' => $app->created_at ? $app->created_at->format('Y-m-d H:i:s') : '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Perangkat Daerah',
            'Nama Aplikasi',
            'Fungsi Aplikasi',
            'URL',
            'Tahun Pembuatan',
            'Repositori',
            'Layanan Aplikasi',
            'Jaringan Intra',
            'Status',
            'Alasan Nonaktif',
            'Kategori Pengguna',
            'Kategori Server',
            'Kategori Aplikasi',
            'Dasar Hukum',
            'Aset Tak Berwujud',
            'Proses Bisnis',
            'Keterangan Proses Bisnis',
            'Created At',
        ];
    }
}
