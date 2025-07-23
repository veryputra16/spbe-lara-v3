<?php

namespace Database\Seeders;

use App\Models\Opd;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $opdList = [
            ['nama' => 'Inspektorat', 'singkatan' => null],
            ['nama' => 'Sekretariat DPRD', 'singkatan' => null],
            ['nama' => 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'singkatan' => null],
            ['nama' => 'Badan Kesatuan Bangsa dan Politik', 'singkatan' => 'KESBANGPOL'],
            ['nama' => 'Badan Penanggulangan Bencana Daerah', 'singkatan' => 'BPBD'],
            ['nama' => 'Badan Pendapatan Daerah', 'singkatan' => null],
            ['nama' => 'Badan Riset dan Inovasi Daerah', 'singkatan' => 'BRIDA'],
            ['nama' => 'Badan Pengelola Keuangan dan Aset Daerah', 'singkatan' => null],
            ['nama' => 'Badan Perencanaan Pembangunan Daerah', 'singkatan' => null],
            ['nama' => 'Dinas Kebudayaan', 'singkatan' => null],
            ['nama' => 'Dinas Kependudukan dan Pencatatan Sipil', 'singkatan' => null],
            ['nama' => 'Dinas Kesehatan', 'singkatan' => 'DINKES'],
            ['nama' => 'Dinas Komunikasi, Informatika dan Statistik', 'singkatan' => 'DKIS'],
            ['nama' => 'Dinas Koperasi, Usaha Mikro Kecil dan Menengah', 'singkatan' => null],
            ['nama' => 'Dinas Lingkungan Hidup dan Kebersihan', 'singkatan' => 'DLHK'],
            ['nama' => 'Dinas Pariwisata', 'singkatan' => null],
            ['nama' => 'Dinas Pekerjaan Umum dan Penataan Ruang', 'singkatan' => 'DPUPR'],
            ['nama' => 'Dinas Pemberdayaan Masyarakat dan Desa', 'singkatan' => null],
            ['nama' => 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana', 'singkatan' => null],
            ['nama' => 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'singkatan' => null],
            ['nama' => 'Dinas Pendidikan, Kepemudaan dan Olahraga', 'singkatan' => 'DIKPORA'],
            ['nama' => 'Dinas Perhubungan', 'singkatan' => 'DISHUB'],
            ['nama' => 'Dinas Perikanan dan Ketahanan', 'singkatan' => 'DPK'],
            ['nama' => 'Dinas Perindustrian dan Perdagangan', 'singkatan' => 'DISPERINDAG'],
            ['nama' => 'Dinas Perpustakaan dan Kearsipan', 'singkatan' => null],
            ['nama' => 'Dinas Pertanian', 'singkatan' => null],
            ['nama' => 'Dinas Perumahan, Kawasan Permukiman dan Pertanahan', 'singkatan' => null],
            ['nama' => 'Dinas Sosial', 'singkatan' => 'DINSOS'],
            ['nama' => 'Dinas Tenaga Kerja dan Sertifikasi Kompetensi', 'singkatan' => null],
            ['nama' => 'Dinas Pemadam Kebakaran Dan Penyelamatan', 'singkatan' => null],
            ['nama' => 'Satuan Polisi Pamong Praja', 'singkatan' => null],
            ['nama' => 'Bagian Administrasi Pembangunan', 'singkatan' => null],
            ['nama' => 'Bagian Hukum', 'singkatan' => null],
            ['nama' => 'Bagian Kerjasama', 'singkatan' => null],
            ['nama' => 'Bagian Kesejahteraan Rakyat', 'singkatan' => null],
            ['nama' => 'Bagian Organisasi', 'singkatan' => null],
            ['nama' => 'Bagian Pengadaan Barang / Jasa', 'singkatan' => null],
            ['nama' => 'Bagian Perekonomian', 'singkatan' => null],
            ['nama' => 'Bagian Protokol dan Komunikasi Pimpinan', 'singkatan' => null],
            ['nama' => 'Bagian Tata Pemerintahan', 'singkatan' => null],
            ['nama' => 'Bagian Umum', 'singkatan' => null],
            ['nama' => 'Perumda Bhukti Praja Sewakadarma Kota Denpasar', 'singkatan' => null],
            ['nama' => 'Perumda Pasar Sewakadarma Kota Denpasar', 'singkatan' => null],
            ['nama' => 'Perumda Air Minum Tirta Sewakadarma Kota Denpasar', 'singkatan' => null],
            ['nama' => 'RSUD Wangaya', 'singkatan' => null],
            ['nama' => 'Kecamatan Denpasar Timur', 'singkatan' => null],
            ['nama' => 'Kecamatan Denpasar Barat', 'singkatan' => null],
            ['nama' => 'Kecamatan Denpasar Utara', 'singkatan' => null],
            ['nama' => 'Kecamatan Denpasar Selatan', 'singkatan' => null],
            ['nama' => 'Kelurahan Dauh Puri', 'singkatan' => null],
            ['nama' => 'Kelurahan Padangasambian', 'singkatan' => null],
            ['nama' => 'Kelurahan Pemecutan', 'singkatan' => null],
            ['nama' => 'Kelurahan Sumerta', 'singkatan' => null],
            ['nama' => 'Kelurahan Kesiman', 'singkatan' => null],
            ['nama' => 'Kelurahan Penatih', 'singkatan' => null],
            ['nama' => 'Kelurahan Dangin Puri', 'singkatan' => null],
            ['nama' => 'Kelurahan Ubung', 'singkatan' => null],
            ['nama' => 'Kelurahan Peguyangan', 'singkatan' => null],
            ['nama' => 'Kelurahan Tonja', 'singkatan' => null],
            ['nama' => 'Kelurahan Panjer', 'singkatan' => null],
            ['nama' => 'Kelurahan Renon', 'singkatan' => null],
            ['nama' => 'Kelurahan Sesetan', 'singkatan' => null],
            ['nama' => 'Kelurahan Sanur', 'singkatan' => null],
            ['nama' => 'Kelurahan Pedungan', 'singkatan' => null],
            ['nama' => 'Kelurahan Serangan', 'singkatan' => null],
            ['nama' => 'Desa Dauh Puri Kauh', 'singkatan' => null],
            ['nama' => 'Desa Dauh Puri Kangin', 'singkatan' => null],
            ['nama' => 'Desa Dauh Puri Klod', 'singkatan' => null],
            ['nama' => 'Desa Padangasambian Kaja', 'singkatan' => null],
            ['nama' => 'Desa Padangsambian Klod', 'singkatan' => null],
            ['nama' => 'Desa Pemecutan Klod', 'singkatan' => null],
            ['nama' => 'Desa Tegal Kerta', 'singkatan' => null],
            ['nama' => 'Desa Tegal Harum', 'singkatan' => null],
            ['nama' => 'Desa Sumerta Kauh', 'singkatan' => null],
            ['nama' => 'Desa Sumerta Kaja', 'singkatan' => null],
            ['nama' => 'Desa Sumerta Klod', 'singkatan' => null],
            ['nama' => 'Desa Kesiman Petilan', 'singkatan' => null],
            ['nama' => 'Desa Kesiman Kertalangu', 'singkatan' => null],
            ['nama' => 'Desa Penatih Dangin Puri', 'singkatan' => null],
            ['nama' => 'Desa Dangin Puri Klod', 'singkatan' => null],
            ['nama' => 'Desa Ubung Kaja', 'singkatan' => null],
            ['nama' => 'Desa Peguyangan Kaja', 'singkatan' => null],
            ['nama' => 'Desa Peguyangan Kangin', 'singkatan' => null],
            ['nama' => 'Desa Pemecutan Kaja', 'singkatan' => null],
            ['nama' => 'Desa Dauh Puri Kaja', 'singkatan' => null],
            ['nama' => 'Desa Dangin Puri Kaja', 'singkatan' => null],
            ['nama' => 'Desa Dangin Puri Kauh', 'singkatan' => null],
            ['nama' => 'Desa Dangin Puri Kangin', 'singkatan' => null],
            ['nama' => 'Desa Sidakarya', 'singkatan' => null],
            ['nama' => 'Desa Pemogan', 'singkatan' => null],
            ['nama' => 'Desa Sanur Kauh', 'singkatan' => null],
            ['nama' => 'Desa Sanur Kaja', 'singkatan' => null],
            ['nama' => 'Puskesmas I Denpasar Barat', 'singkatan' => null],
            ['nama' => 'Puskesmas II Denpasar Barat', 'singkatan' => null],
            ['nama' => 'Puskesmas I Denpasar Selatan', 'singkatan' => null],
            ['nama' => 'Puskesmas II Denpasar Selatan', 'singkatan' => null],
            ['nama' => 'Puskesmas III Denpasar Selatan', 'singkatan' => null],
            ['nama' => 'Puskesmas IV Denpasar Selatan', 'singkatan' => null],
            ['nama' => 'Puskesmas I Denpasar Timur', 'singkatan' => null],
            ['nama' => 'Puskesmas II Denpasar Timur', 'singkatan' => null],
            ['nama' => 'Puskesmas I Denpasar Utara', 'singkatan' => null],
            ['nama' => 'Puskesmas II Denpasar Utara', 'singkatan' => null],
            ['nama' => 'Puskesmas III Denpasar Utara', 'singkatan' => null],
        ];

        foreach ($opdList as $data) {
            Opd::create([
                'nama' => $data['nama'],
                'singkatan' => $data['singkatan'],
            ]);
        }

        // add User with opd
        $userAplikasi = User::role(['operator-aplikasi', 'viewer-aplikasi'])->get();
        $randomOpdId = Opd::inRandomOrder()->value('id');
        foreach ($userAplikasi as $userApp) {
            $userApp->opdPivot()->attach($randomOpdId);
        }
    }
}
