# 🔌 Backend Integration Guide (API Mapping)

> **Untuk:** Tim Backend Developer
> **Tujuan:** Menghubungkan Controller Frontend ke Database/Model Filament.
> **Status:** Frontend sudah 100% siap menerima data dari Model.

---

## 📋 Prasyarat Wajib
Sebelum Coding, jalankan ini di terminal:
```bash
php artisan migrate
php artisan storage:link
php artisan make:filament-user  # Buat akun admin untuk testing input data
```

---

## 1. Modul BERITA (`BeritaController.php`)

**Tugas:** Ganti data array statis dengan Query Model `News`.

### Langkah-langkah:
1.  Buka `app/Http/Controllers/BeritaController.php`.
2.  Hapus private function `getNewsItems()`.
3.  Ubah method `berita()` dan `showNews($slug)` seperti di bawah:

```php
use App\Models\News; // ✅ Jangan lupa import Model

public function berita()
{
    // Search logic (ambil dari request 'q')
    $query = News::published();
    
    if ($search = request('q')) {
        $query->where('title', 'like', "%{$search}%")
              ->orWhere('content', 'like', "%{$search}%");
    }

    // Paginate 9 item per halaman
    $posts = $query->latest('published_at')->paginate(9);

    return view('berita.berita', ['posts' => $posts]);
}

public function showNews($slug)
{
    // Cari berita berdasarkan slug
    $news = News::published()->where('slug', $slug)->firstOrFail();

    // Increment views counter
    $news->increment('views');

    // Berita terkait (kategori sama, kecuali berita ini)
    $relatedNews = News::published()
        ->where('category', $news->category)
        ->where('id', '!=', $news->id)
        ->take(5)
        ->get();

    return view('berita.show', compact('news', 'relatedNews'));
}
```

---

## 2. Modul LANDING PAGE (`LandingController.php`)

**Tugas:** Menampilkan Berita Utama dinamis di Halaman Depan.

### Langkah-langkah:
1.  Buka `app/Http/Controllers/LandingController.php`.
2.  Ubah method `index()`:

```php
use App\Models\News;

public function index()
{
    // Ambil 6 Berita Utama Terbaru untuk Slider/Grid
    $newsItems = News::published()
        ->where('category', 'Berita Utama') // Sesuaikan dengan enum kategori di DB
        ->latest('published_at')
        ->take(6)
        ->get();

    // Berita Populer (Berdasarkan Views tertinggi)
    $popularNewsItems = News::published()
        ->orderByDesc('views')
        ->take(5)
        ->get();

    // Link Eksternal (Bisa dipindah ke tabel DB jika mau, sementara array dulu ok)
    $allLinks = [ ... ]; // Keep existing array or move to ExternalLink model

    return view('landing', compact('newsItems', 'popularNewsItems', 'allLinks'));
}
```

---

## 3. Modul PERATURAN & DOKUMEN (`PeraturanController.php` & `DokumenController.php`)

**Tugas:** Mengganti dummy data dengan file PDF asli dari storage.

### Data Mapping Guide (PENTING)
Frontend mengharapkan variabel dengan struktur tertentu di Blade. Pastikan Model Anda memiliki **Accessor** atau di-map di Controller.

| Field di Blade View | Kolom di Database | Solusi Mapping |
|---|---|---|
| `{{ $item['name'] }}` | `nama` | Gunakan Aliasing di Select / Map Collection |
| `{{ $item['file_url'] }}` | `file_path` | Buat Accessor `getFileUrlAttribute` di Model |
| `{{ $item['downloads'] }}` | `downloads` | Sama, aman. |

### Contoh Implementasi `PeraturanController.php`:
```php
use App\Models\Peraturan;

private function getPeraturan($kategori)
{
    return Peraturan::where('kategori', $kategori)
        ->where('is_active', true)
        ->latest('tahun')
        ->paginate(10);
}

public function undangUndang() 
{ 
    return view('peraturan.undang-undang', [
        'title' => 'Undang-Undang', 
        'items' => $this->getPeraturan('Undang-Undang')
    ]); 
}
// Ulangi untuk method lainnya (peraturanMenteri, dll)
```

**⚠️ Catatan untuk Model `Peraturan`:**
Pastikan ada Accessor `file_url` di `app/Models/Peraturan.php` agar tombol download Frontend bekerja:
```php
// Di Model
public function getFileUrlAttribute()
{
    return asset('storage/' . $this->file_path);
}
// Di Controller/View, Frontend akan panggil $item->file_url
```

---

## 4. Modul PPID (`PpidController.php`)

**Tugas:** Integrasi Dokumen Keterbukaan Informasi Publik.

### Langkah-langkah:
1.  Buka `app/Http/Controllers/PpidController.php`.
2.  Grup data berdasarkan Sub-Kategori (karena UI PPID menggunakan Accordion per sub-kategori).

```php
use App\Models\PpidDocument;

public function ppidBerkala() 
{ 
    // Ambil data tipe 'Berkala', grup berdasarkan sub_kategori
    $groupedItems = PpidDocument::where('tipe', 'Berkala')
        ->where('is_active', true)
        ->get()
        ->groupBy('sub_kategori'); // Collection grouping

    return view('ppid.berkala', [
        'title' => 'Informasi Berkala', 
        'groupedItems' => $groupedItems
    ]); 
}
```

---

## 🚨 Cheatsheet Troubleshooting

1.  **Gambar Tidak Muncul?**
    *   Cek apakah sudah jalan `php artisan storage:link`?
    *   Cek apakah data di database kolom `image` berisi path relatif (contoh: `news/image1.jpg`) atau URL full? Frontend menghandle keduanya via Helper `getImageUrlAttribute` di Model `News`.

2.  **Pagination Error?**
    *   Frontend pakai `$items->links()`. Pastikan Controller mengirim object `LengthAwarePaginator` (hasil dari `.paginate()`), BUKAN `Collection` (hasil dari `.get()`).

3.  **Search Tidak Jalan?**
    *   Pastikan form search di Blade View name-nya `q` atau `search`.
    *   Di Controller tangkap dengan `request('q')`.

---

**Selamat Mengoding!** 🚀
Frontend sudah didesain se-modular mungkin. Jika ada error variable undefined, cek kembali nama kolom di Database vs nama variable di View.
