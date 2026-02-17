<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peraturans', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');          // Undang-Undang, Peraturan Menteri, Peraturan Daerah, Peraturan Bupati, SK Bupati, SK Inspektur, Lain-Lain
            $table->string('nama');              // Judul peraturan
            $table->string('nomor')->nullable(); // Nomor peraturan (e.g. "No. 23 Tahun 2014")
            $table->year('tahun')->nullable();   // Tahun peraturan
            $table->string('file_path')->nullable(); // Path file di storage
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('downloads')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('kategori');
            $table->index('tahun');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peraturans');
    }
};
