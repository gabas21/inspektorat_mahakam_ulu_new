<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'category',
        'image',
        'author',
        'excerpt',
        'content',
        'published_at',
        'views',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'date',
        'views' => 'integer',
        'is_published' => 'boolean',
    ];

    /**
     * Auto-generate slug from title on creating
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title);
            }
        });
    }

    // ─── Scopes ────────────────────────────────────────

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    public function scopeCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function scopePopular($query)
    {
        return $query->orderByDesc('views');
    }

    // ─── Accessors ─────────────────────────────────────

    /**
     * Get full image URL
     */
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) return null;

        // Support both external URLs and local storage paths
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        return asset('storage/' . $this->image);
    }

    /**
     * Get formatted date (e.g. "24 Januari 2026")
     */
    public function getFormattedDateAttribute(): string
    {
        if (!$this->published_at) return '-';

        return $this->published_at->translatedFormat('d F Y');
    }

    // ─── Relationships ─────────────────────────────────

    /**
     * Related news: same category, different article
     */
    public function relatedNews(int $limit = 5)
    {
        return static::published()
            ->where('category', $this->category)
            ->where('id', '!=', $this->id)
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }
}
