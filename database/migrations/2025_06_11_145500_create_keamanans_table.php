<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keamanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->integer('menerapkan_manajemen_katasandi')->nullable();
            $table->integer('menerapkan_metode_hashing')->nullable();
            $table->integer('menerapkan_enkripsi_data')->nullable();
            $table->integer('menerapkan_ssl')->nullable();
            $table->integer('menerapkan_captcha_login')->nullable();
            $table->integer('menerapkan_token_api')->nullable();
            $table->integer('menerapkan_manajemen_sesi')->nullable();
            $table->integer('notif_user_login_bersama')->nullable();
            $table->integer('menerapkan_fitur_log')->nullable();
            $table->integer('menerapkan_size_file')->nullable();
            $table->integer('pernah_mengalami_serangan_cyber')->nullable();
            $table->text('penanganan_serangan_cyber')->nullable();
            $table->string('pernah_audit_keamanan')->nullable();
            $table->string('siapa_melakukan_audit_keamanan')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keamanans');
    }
};
