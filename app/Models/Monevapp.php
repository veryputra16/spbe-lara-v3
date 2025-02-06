<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
