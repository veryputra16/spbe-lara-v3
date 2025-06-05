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
        Schema::create('pengembangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->string('tahun_pengembangan');
            $table->text('riwayat_pengembangan')->nullable();
            $table->text('fitur')->nullable();
            $table->text('nda')->nullable();
            $table->text('doc_perancangan')->nullable();
            $table->text('surat_mohon')->nullable();
            $table->text('kak')->nullable();
            $table->text('sop')->nullable();
            $table->text('doc_pentest')->nullable();
            $table->text('doc_uat')->nullable();
            $table->text('video_penggunaan')->nullable();
            $table->text('buku_manual')->nullable();
            $table->foreignId('katplatform_id')->constrained()->onDelete('cascade');
            $table->foreignId('katdb_id')->constrained()->onDelete('cascade');
            $table->foreignId('bahasaprogram_id')->constrained()->onDelete('cascade');
            $table->foreignId('frameworkapp_id')->constrained()->onDelete('cascade');
            $table->text('capture_frontend')->nullable();
            $table->text('capture_backend')->nullable();
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
        Schema::dropIfExists('pengembangans');
    }
};
