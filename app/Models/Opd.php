<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Opd extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'singkatan',
    ];

    public function opds(): HasMany
    {
        return $this->hasMany(Opd::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'opd_users')->withTimestamps();
    }
}
