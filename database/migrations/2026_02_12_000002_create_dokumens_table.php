<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');          // SAKIP, SPIP, Gratifikasi, LHKPN, Kapabilitas APIP, Piagam Audit, Standar Pelayanan, Laporan Keuangan
            $table->string('nama');              // Judul dokumen
            $table->year('tahun')->nullable();   // Tahun dokumen
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
        Schema::dropIfExists('dokumens');
    }
};
