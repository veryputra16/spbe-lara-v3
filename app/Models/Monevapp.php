<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monevapp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'application_id',
        'tgl_monev',
        'bukti_monev',
        'ket_monev',
    ];

    protected $casts = [
        'tgl_monev' => 'date', // atau 'datetime' kalau butuh jam juga
    ];

    public function app(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
