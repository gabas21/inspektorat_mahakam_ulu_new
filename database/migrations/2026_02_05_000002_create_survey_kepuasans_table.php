<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('survey_kepuasans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('usia')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('jenis_layanan');
            // Pertanyaan survey (1-4: Tidak Baik, Kurang Baik, Baik, Sangat Baik)
            $table->tinyInteger('q1_prosedur'); // Kesesuaian Prosedur
            $table->tinyInteger('q2_persyaratan'); // Kemudahan Persyaratan
            $table->tinyInteger('q3_waktu'); // Kecepatan Waktu
            $table->tinyInteger('q4_biaya'); // Kewajaran Biaya
            $table->tinyInteger('q5_produk'); // Kesesuaian Produk
            $table->tinyInteger('q6_kompetensi'); // Kompetensi Petugas
            $table->tinyInteger('q7_perilaku'); // Perilaku Petugas
            $table->tinyInteger('q8_penanganan'); // Penanganan Pengaduan
            $table->tinyInteger('q9_sarana'); // Kualitas Sarana Prasarana
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_kepuasans');
    }
};
