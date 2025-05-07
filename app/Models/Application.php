<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_app',
        'fitur_app',
        'fungsi_app',
        'url',
        'dasar_hukum',
        'opd_pengelola',
        'tahun_buat',
        'buku_manual',
        'repositori',
        'status',
        'alasan_nonaktif',
        'katplatform_id',
        'katapp_id',
        'katpengguna_id',
        'bahasaprogram_id',
        'katdb_id',
        'katserver_id',
        'layananapp_id',
        'frameworkapp_id',
        'nda',
        'aset_takberwujud',
        'sop',
        'jaringan_intra',
        'dokumen_perancangan',
        'capture_frontend',
        'capture_backend',
        'surat_mohon',
        'kak',
        'implemen_app',
        'lapor_pentest',
        'video_pengguna',
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
        return $this->belongsTo(Katapp::class);
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

    public function opd(): BelongsTo
    {
        return $this->belongsTo(Opd::class, 'opd_pengelola');
    }

    public function apps(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
