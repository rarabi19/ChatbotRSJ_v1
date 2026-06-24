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
        Schema::create('data_ruangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruangan');
            $table->string('nama_gedung');
            $table->string('penanggung_jawab');
            $table->string('jabatan_struktural');
            $table->text('navigasi');
            $table->text('kata_kunci');
            $table->string('kategori');
            $table->text('fungsi_ruangan');
            $table->timestamps();
        });
    }

    // Batalkan migrasi
    public function down(): void
    {
        Schema::dropIfExists('data_ruangans');
    }
};
 