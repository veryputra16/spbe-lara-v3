<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sdmteknic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'application_id',
        'nama_tenaga_technic',
        'nip_jabatan_tenaga_technic',
        'jabatan_tenaga_technic',
        'nohp_tenaga_technic',
        'email_tenaga_technic',
        'status_tenaga_technic',
    ];

    public function app(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
