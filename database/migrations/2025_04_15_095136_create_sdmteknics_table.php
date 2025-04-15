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
        Schema::create('sdmteknics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->string('nama_tenaga_technic');
            $table->string('nip_jabatan_tenaga_technic')->nullable();
            $table->string('jabatan_tenaga_technic')->nullable();
            $table->string('nohp_tenaga_technic');
            $table->string('email_tenaga_technic')->unique()->nullable();
            $table->string('status_tenaga_technic');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdmteknics');
    }
};
