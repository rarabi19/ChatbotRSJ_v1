<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Jalankan migrasi
    public function up(): void
    {
        Schema::create('foto_ruangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_ruangan_id')->constrained('data_ruangans')->onDelete('cascade');
            $table->string('path_foto');
            $table->string('caption')->nullable();
            $table->timestamps();
        });
    }

    // Batalkan migrasi
    public function down(): void
    {
        Schema::dropIfExists('foto_ruangans');
    }
};
