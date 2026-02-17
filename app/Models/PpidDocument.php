<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidDocument extends Model
{
    protected $table = 'ppid_documents';

    protected $fillable = [
        'tipe',
        'sub_kategori',
        'nama',
        'penanggung_jawab',
        'tahun',
        'file_path',
        'views',
        'downloads',
        'is_active',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'views' => 'integer',
        'downloads' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Scope: filter by tipe (Berkala, Serta Merta, Setiap Saat, Dikecualikan)
     */
    public function scopeTipe($query, string $tipe)
    {
        return $query->where('tipe', $tipe);
    }

    /**
     * Scope: filter by sub_kategori
     */
    public function scopeSubKategori($query, string $subKategori)
    {
        return $query->where('sub_kategori', $subKategori);
    }

    /**
     * Scope: only active
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get full file URL
     */
    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }
}
