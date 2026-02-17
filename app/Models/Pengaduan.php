<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    protected $fillable = [
        'kode_laporan',
        'kategori',
        'nama',
        'nik',
        'identitas_path',
        'alamat',
        'email',
        'telepon',
        'pekerjaan',
        'unit_kerja',
        'tanggal_kejadian',
        'topik',
        'kronologis',
        'data_pendukung_path',
        'status',
    ];

    protected $casts = [
        'tanggal_kejadian' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pengaduan) {
            $pengaduan->kode_laporan = 'PGD-' . strtoupper(Str::random(8));
            $pengaduan->status = 'pending';
        });
    }
}
