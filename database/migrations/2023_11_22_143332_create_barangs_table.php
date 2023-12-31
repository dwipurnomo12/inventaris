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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kd_barang')->unique();
            $table->string('gambar');
            $table->string('nm_barang');
            $table->text('deskripsi');
            $table->date('tgl_penambahan');
            $table->foreignId('kategori_id');
            $table->foreignId('merk_id');
            $table->foreignId('lokasi_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
