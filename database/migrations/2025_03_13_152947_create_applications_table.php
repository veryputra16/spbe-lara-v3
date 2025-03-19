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
            $table->string('nama_app');
            $table->text('fitur_app')->nullable();
            $table->text('fungsi_app')->nullable();
            $table->text('url')->nullable();
            $table->text('dasar_hukum')->nullable();
            $table->bigInteger('opd_pengelola');
            $table->string('tahun_buat');
            $table->text('buku_manual')->nullable();
            $table->text('repositori')->nullable();
            $table->string('status');
            $table->text('alasan_nonaktif')->nullable();
            $table->foreignId('katplatform_id')->constrained()->onDelete('cascade');
            $table->foreignId('katapp_id')->constrained()->onDelete('cascade');
            $table->foreignId('katpengguna_id')->constrained()->onDelete('cascade');
            $table->foreignId('bahasaprogram_id')->constrained()->onDelete('cascade');
            $table->foreignId('katdb_id')->constrained()->onDelete('cascade');
            $table->foreignId('katserver_id')->constrained()->onDelete('cascade');
            $table->foreignId('layananapp_id')->constrained()->onDelete('cascade');
            $table->foreignId('frameworkapp_id')->constrained()->onDelete('cascade');
            $table->text('nda')->nullable();
            $table->string('aset_takberwujud')->nullable();
            $table->text('sop')->nullable();
            $table->string('jaringan_intra')->nullable();
            $table->text('dokumen_perancangan')->nullable();
            $table->text('capture_frontend')->nullable();
            $table->text('capture_backend')->nullable();
            $table->text('surat_mohon')->nullable();
            $table->text('kak')->nullable();
            $table->text('implemen_app')->nullable();
            $table->text('lapor_pentest')->nullable();
            $table->text('video_pengguna')->nullable();
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
