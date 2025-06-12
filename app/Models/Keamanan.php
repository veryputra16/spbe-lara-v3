<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keamanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'application_id',
        'menerapkan_manajemen_katasandi',
        'menerapkan_metode_hashing',
        'menerapkan_enkripsi_data',
        'menerapkan_ssl',
        'menerapkan_captcha_login',
        'menerapkan_token_api',
        'menerapkan_manajemen_sesi',
        'notif_user_login_bersama',
        'menerapkan_fitur_log',
        'menerapkan_size_file',
        'pernah_mengalami_serangan_cyber',
        'penanganan_serangan_cyber',
        'pernah_audit_keamanan',
        'siapa_melakukan_audit_keamanan',
        'user_id',
    ];
}
