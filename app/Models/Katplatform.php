<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katplatform extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_platform',
    ];
}
