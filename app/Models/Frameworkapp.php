<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Frameworkapp extends Model
{
    use HasFactory;

    protected $fillable = [
        'framework_app',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
