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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('uraian_app')->nullable();
            $table->text('fungsi_app')->nullable();
            $table->text('link')->nullable();
            $table->text('capture_frontend')->nullable();
            $table->text('capture_backend')->nullable();
            $table->string('status');
            $table->string('tahun_buat');
            $table->text('buku_manual')->nullable();
            $table->text('repositori')->nullable();
            $table->text('alasan_nonaktif')->nullable();
            $table->text('nda')->nullable();
            $table->string('aset_takberwujud')->nullable();
            $table->text('sop')->nullable();
            $table->string('jaringan_intra')->nullable();
            $table->text('dokumen_perancangan')->nullable();
            $table->foreignId('katpengguna_id')->constrained()->onDelete('cascade');
            $table->foreignId('katapp_id')->constrained()->onDelete('cascade');
            $table->text('dasar_hukum')->nullable();
            $table->foreignId('katplatform_id')->constrained()->onDelete('cascade');
            $table->bigInteger('opd_pengelola');
            $table->string('app_sudah_terintegrasi')->nullable();
            $table->text('jelaskan_app_sudah_terintegrasi_apa_saja')->nullable();
            $table->foreignId('bahasaprogram_id')->constrained()->onDelete('cascade');
            $table->foreignId('katdb_id')->constrained()->onDelete('cascade');
            $table->foreignId('katserver_id')->constrained()->onDelete('cascade');
            $table->foreignId('layananapp_id')->constrained()->onDelete('cascade');
            $table->foreignId('frameworkapp_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('applications');
    }
};
