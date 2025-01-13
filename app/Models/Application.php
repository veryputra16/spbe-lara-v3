<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'judul',
        'uraian_app',
        'fungsi_app',
        'link',
        'infografis',
        'status',
        'tahun_buat',
        'buku_manual',
        'repositori',
        'alasan_nonaktif',
        'nda',
        'aset_takberwujud',
        'sop',
        'jaringan_intra',
        'dokumen_perancangan',
        'katpengguna_id',
        'katapp_id',
        'dasar_hukum',
        'katplatform_id',
        // 'opd_pengelola_id',
        'bahasaprogram_id',
        'katdb_id',
        'katserver_id',
        'layananapp_id',
        'frameworkapp_id',
        'user_id',
    ];
}
