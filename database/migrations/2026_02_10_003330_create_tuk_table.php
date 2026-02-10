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
        Schema::create('tuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tuk')->unique();
            $table->string('nama_tuk');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->enum('jenis_tuk', ['sewaktu', 'tempat_kerja', 'mandiri']);
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuk');
    }
};
