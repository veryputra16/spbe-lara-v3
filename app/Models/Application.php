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
        'fungsi_app',
        'url',
        'dasar_hukum',
        'opd_id',
        'tahun_buat',
        'repositori',
        'aset_takberwujud',
        'no_regis_app',
        'proses_bisnis',
        'ket_probis',
        'katpengguna_id',
        'katserver_id',
        'layananapp_id',
        'katapp_id',
        'jaringan_intra',
        'status',
        'alasan_nonaktif',
        'user_id'
    ];

    public function opd(): BelongsTo
    {
        return $this->belongsTo(Opd::class);
    }

    public function apps(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function katpengguna(): BelongsTo
    {
        return $this->belongsTo(Katpengguna::class);
    }

    public function katserver(): BelongsTo
    {
        return $this->belongsTo(Katserver::class);
    }

    public function layananapp(): BelongsTo
    {
        return $this->belongsTo(Layananapp::class);
    }

    public function katapp(): BelongsTo
    {
        return $this->belongsTo(Katapp::class);
    }
}
