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
        Schema::create('permohonan_sertifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('no_permohonan')->unique();
            $table->foreignId('asesi_id')->constrained('asesi')->onDelete('cascade');
            $table->foreignId('jadwal_ujikom_id')->constrained('jadwal_ujikom')->onDelete('cascade');
            $table->date('tanggal_permohonan');
            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_sertifikasi');
    }
};
