<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppid_documents', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');              // Berkala, Serta Merta, Setiap Saat, Dikecualikan
            $table->string('sub_kategori');      // Sub-kategori dalam tipe (e.g. "Informasi Profil Badan Publik", "Kumpulan Paparan")
            $table->string('nama');              // Judul dokumen/informasi
            $table->string('penanggung_jawab')->nullable(); // PPID Utama, PPID Pelaksana, dll
            $table->year('tahun')->nullable();   // Tahun dokumen
            $table->string('file_path')->nullable(); // Path file di storage
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('downloads')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('tipe');
            $table->index('sub_kategori');
            $table->index('tahun');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppid_documents');
    }
};
