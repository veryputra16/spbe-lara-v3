<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'judul',
        'uraian_app',
        'fungsi_app',
        'link',
        'capture_frontend',
        'capture_backend',
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
        'opd_pengelola',
        'app_sudah_terintegrasi',
        'jelaskan_app_sudah_terintegrasi_apa_saja',
        'bahasaprogram_id',
        'katdb_id',
        'katserver_id',
        'layananapp_id',
        'frameworkapp_id',
        'user_id',
    ];

    public function bahasaprogram(): BelongsTo
    {
        return $this->belongsTo(Bahasaprogram::class);
    }

    public function frameworkapp(): BelongsTo
    {
        return $this->belongsTo(Frameworkapp::class);
    }

    public function katapp(): BelongsTo
    {
        return $this->belongsTo(Frameworkapp::class);
    }

    public function katdb(): BelongsTo
    {
        return $this->belongsTo(Katdb::class);
    }

    public function katpengguna(): BelongsTo
    {
        return $this->belongsTo(Katpengguna::class);
    }

    public function katplatform(): BelongsTo
    {
        return $this->belongsTo(Katplatform::class);
    }

    public function katserver(): BelongsTo
    {
        return $this->belongsTo(Katserver::class);
    }

    public function layananapp(): BelongsTo
    {
        return $this->belongsTo(Layananapp::class);
    }
}
