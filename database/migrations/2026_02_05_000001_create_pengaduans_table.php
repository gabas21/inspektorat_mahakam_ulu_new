<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_laporan')->unique();
            $table->string('kategori');
            $table->string('nama');
            $table->string('nik');
            $table->string('identitas_path')->nullable();
            $table->text('alamat');
            $table->string('email');
            $table->string('telepon');
            $table->string('pekerjaan');
            $table->string('unit_kerja');
            $table->date('tanggal_kejadian');
            $table->string('topik');
            $table->text('kronologis');
            $table->string('data_pendukung_path')->nullable();
            $table->enum('status', ['pending', 'diproses', 'selesai', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
