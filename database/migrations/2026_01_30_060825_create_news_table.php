<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category');              // berita utama, hukum & peraturan, pengawasan, pengumuman, berita umum, kegiatan, sosialisasi
            $table->string('image')->nullable();     // Path gambar di storage
            $table->string('author')->default('Admin Inspektorat');
            $table->text('excerpt')->nullable();     // Ringkasan singkat
            $table->longText('content');              // Isi berita (HTML)
            $table->date('published_at')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->boolean('is_published')->default(false);
            $table->timestamps();

            $table->index('category');
            $table->index('is_published');
            $table->index('published_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
