<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    protected $table = 'peraturans';

    protected $fillable = [
        'kategori',
        'nama',
        'nomor',
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
     * Scope: filter by kategori
     */
    public function scopeKategori($query, string $kategori)
    {
        return $query->where('kategori', $kategori);
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
