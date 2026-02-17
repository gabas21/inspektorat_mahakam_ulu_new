# 📘 MASTER GUIDE: REDESIGN FRONTEND & UX STANDARDS
**Proyek: Inspektorat Kabupaten Mahakam Ulu**
**Status: Living Document (Updated: 5 Feb 2026)**

---

## 🛡️ Fase 0: Prinsip Utama (Core Principles)
Sebagai standar kualitas baru, setiap pengembangan tampilan **WAJIB** mematuhi 3 pilar ini:
1.  **Robust Interactivity**: Jangan gunakan link kecil. Area klik harus besar (Full Card Link) untuk kemudahan akses (mobile friendly).
2.  **Universal Accessibility**: Desain harus ramah untuk semua usia (termasuk 40th+). Font harus jelas, kontras harus tinggi, navigasi harus eksplisit.
3.  **Visual Hierarchy**: Gunakan layout standar (2/3 + 1/3) untuk halaman konten agar mata user terbiasa dan nyaman.

---

## 🏗️ Fase 1: Identitas & Desain System
### 1.1 Color Palette
- **Primary**: `emerald-600` (#059669) - Aksi Utama, Link.
- **Secondary**: `teal-900` (#134e4a) - Footer, Heavy Backgrounds.
- **Surface**: `slate-50` (#f8fafc) - Latar Halaman.
- **Text**:
  - `slate-900` (Judul/Heading) - **Wajib** untuk judul agar tegas.
  - `slate-700` (Body Text) - **Wajib** untuk artikel (jangan gunakan slate-400/500 yg sulit dibaca).

### 1.2 Layout Standards (Arsitektur Halaman)
Setiap halaman konten (Berita, Layanan, Profil) wajib mengikuti pola ini:
- **Hero Section**: Full Width, Gambar Background Gelap + Teks Putih Tengah.
- **Main Container**: `container mx-auto px-6`.
- **Content Structure (Grid)**:
  - **Desktop**: Layout 2 Kolom -> `lg:w-2/3` (Konten Utama) + `lg:w-1/3` (Sidebar).
  - **Mobile**: Stack 1 Kolom.
  - **Widget**: Sidebar berisi widget fungsional (Berita Populer, E-Pengaduan).

---

## 🛠️ Fase 2: Standar Interaksi & Komponen (Must-Have)

### 2.1 Kartu & Link (The "Clickable" Rule)
Setiap elemen kartu (Card) yang mengarah ke detail **HARUS** bisa diklik di seluruh permukaannya.
**JANGAN**: Membuat kartu dimana user harus memburu tombol kecil "Baca Selengkapnya".
**LAKUKAN**: Bungkus seluruh kartu dengan `<a>` atau gunakan teknik *Absolute Overlay Link*.

### 2.2 Navigasi & Orientasi
- **Breadcrumbs**: Wajib ada di atas judul halaman detail.
  *Format: Beranda > Kategori > Judul Halaman*
- **Back Buttons**: Wajib menggunakan desain High-Visibility (Bukan teks kecil).
  *Style: Gradient Background, White Text, Large Arrow Icon.*

### 2.3 Typography untuk Keterbacaan (Readability)
- **Body Text**: Gunakan class `prose-lg` dan `leading-loose`.
- **Heading**: Gunakan font `Montserrat` dengan `font-black` (Bold Berat) untuk kesan otoritas dan modern.

---

## 🚀 Fase 3: Checklist Kualitas (Quality Assurance)
Sebelum deploy atau lapor ke user, cek poin ini:
- [ ] **Click Test**: Apakah saya bisa mengklik kartu dengan mata tertutup? (Area klik besar).
- [ ] **Contrast Test**: Apakah teks artikel terbaca jelas tanpa harus menyipitkan mata?
- [ ] **Flow Test**: Apakah ada tombol "Kembali" yang jelas setelah saya masuk ke halaman dalam?
- [ ] **Responsive Test**: Apakah layout Sidebar turun ke bawah dengan rapi di layar HP?

---

## 💻 Fase 4: Referensi Teknis & Kode (Golden Samples)

Bagian ini menampung contoh kode "Emas" yang harus ditiru oleh AI/Developer untuk menjaga konsistensi.

### 4.1 Struktur HTML Kartu Standard (The "Safe" Card)
Gunakan struktur ini untuk menghindari bug klik:
```blade
<article class="group bg-white rounded-2xl shadow-md ... transition-all">
    <a href="{{ route('...') }}" class="flex flex-col h-full cursor-pointer">
        <!-- 1. Image Area -->
        <div class="relative h-56 overflow-hidden">
            <img src="..." class="object-cover ... group-hover:scale-110" />
        </div>
        
        <!-- 2. Content Area -->
        <div class="p-6 flex-1">
            <h3 class="... group-hover:text-emerald-600 ...">{{ $title }}</h3>
            <p>...</p>
        </div>
    </a>
</article>
```

### 4.2 Struktur Layout Halaman (Standard Grid)
```blade
<!-- Hero -->
<section>...</section>

<!-- Content -->
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                @yield('main-content')
            </div>
            
            <!-- Sidebar -->
            <div class="lg:w-1/3 space-y-8">
                <!-- Widget: Pengaduan/Populer -->
                @include('components.widgets.sidebar')
            </div>
        </div>
    </div>
</section>
```

### 4.3 Breadcrumb Pattern (Navigasi)
```blade
<nav class="flex mb-8 text-sm font-medium text-slate-500">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li><a href="{{ route('home') }}" class="...">Beranda</a></li>
        <li>/</li>
        <li><a href="{{ route('index') }}" class="...">Kategori</a></li>
        <li class="text-slate-900 truncate">Halaman Aktif</li>
    </ol>
</nav>
```

---

## 📦 Fase 5: Inventaris Proyek & Struktur Folder

### 5.1 Tech Stack (Depedensi Utama)
- **Framework**: Laravel 12.x (View via Blade)
- **Styling**: Tailwind CSS v4.0.0
- **Build Tool**: Vite v7.x
- **HTTP Client**: Axios
- **CSS Processor**: PostCSS + Autoprefixer

### 5.2 Struktur Folder Frontend (Peta Lengkap)
```plaintext
resources/
├── css/
│   └── app.css             # Konfigurasi Tailwind & Global Styles
├── js/
│   ├── app.js              # Entry Point JavaScript
├── views/
│   ├── layouts/            # Template Utama (Navbar, Footer included)
│   ├── components/         # Komponen UI Reusable
│   │
│   ├── berita/             # [ROLE MODEL] Modul Berita (Acuan Layout Terbaik)
│   ├── profil/             # Modul Profil Instansi (Halaman Statis)
│   ├── layanan/            # Modul Layanan Publik (Pengaduan & Survey)
│   ├── peraturan/          # Modul Produk Hukum
│   ├── dokumen/            # Modul Dokumen Kinerja (SAKIP/LHKPN)
│   └── ppid/               # Modul Transparansi Informasi
```

---

## 🤖 Fase 6: Panduan Khusus AI (Do's & Don'ts)

Agar AI dapat menghasilkan kode yang valid dalam sekali coba, patuhi aturan ini:

| ❌ JANGAN (DON'T) | ✅ LAKUKAN (DO) |
| :--- | :--- |
| Jangan gunakan CSS inline (`style="..."`). | Gunakan kelas **Tailwind CSS** (`class="p-4 bg-white"`). |
| Jangan gunakan unit pixel statis (`width: 300px`). | Gunakan skala responsif (`w-full md:w-1/3`). |
| Jangan membuat tombol navigasi yang kecil/hidden. | Buat tombol navigasi yang **Bold** & **Prominent**. |
| Jangan gunakan warna random/bebas. | HANYA gunakan palet `emerald-*`, `teal-*`, `slate-*`. |
| Jangan lupakan state `hover` & `active`. | Selalu tambahkan efek `hover:scale-105` atau `hover:text-emerald`. |

---

## 🧩 Fase 7: Katalog Komponen (Reusable Registry)
Jangan buat ulang komponen ini, panggil saja jika ada:

1.  **`x-news-card`**: Kartu berita standar (digunakan di Landing Page).
    - Props: `image`, `title`, `date`, `category`, `author`.
2.  **`x-service-card`**: Kartu layanan dengan icon SVG.
    - Props: `title`, `description`, `link`, `icon`.
3.  **`x-news-sidebar-item`**: List berita kecil untuk widget sidebar.
    - Props: `title`, `date`, `category`.

---

## 🤝 Fase 8: Protokol Handover ke Tim Backend

Agar tampilan yang sudah rapi tidak rusak saat integrasi, berikan panduan ini ke Developer Backend:

### 8.1 Data Contracts (Struktur Data Wajib)
Frontend Views mengharapkan variabel dengan struktur spesifik. Pastikan Controller Backend mengirim data sesuai kontrak ini:

**A. Authentication (Login)**
Frontend tidak memiliki halaman login khusus (menggunakan Filament/Default), namun jika nanti dibuatkan API Login, wajib mereturn:
```json
// POST /api/login
{
    "token": "ey...",
    "user": {
        "id": 1,
        "name": "Admin",
        "email": "admin@mahakamulukab.go.id",
        "role": "admin"
    }
}
```

**B. Halaman Utama (`landing.blade.php`)**
- `$newsItems` (Array/Collection): Daftar berita terbaru untuk Carousel Utama.
- `$popularNewsItems` (Array/Collection): Daftar berita untuk Widget Popular.
- `$allLinks` (Array): Daftar External Links (SIPD, LAPOR, dll).

**C. Halaman `berita.index` (`berita.blade.php`)**
- `$posts` (Pagination Instance): Data berita dengan method `links()` untuk pagination.
- Struktur Item: `title`, `slug`, `image`, `date`, `category`.

**D. Modul Publik (`peraturan/*.index` & `dokumen/*.index`)**
Untuk fitur **Download** dan **View (Modal)**, setiap item dalam `$items` WAJIB memiliki field `file_url`.

**Struktur Data Item (Wajib):**
```php
[
    'no' => 1,
    'name' => 'Judul Dokumen Lengkap',
    'year' => 2024,
    'views' => 100,
    'downloads' => 50,
    'file_url' => 'https://domain.com/storage/file.pdf' // WAJIB ADA (URL Absolut)
]
```
> **Catatan Backend:**
> - Jika `file_url` kosong atau null, tombol "Lihat" dan "Unduh" akan otomatis disable/alert.
> - Pastikan URL yang dikirim bisa diakses publik (CORS enabled jika beda domain) agar bisa nampil di Iframe Modal.

**E. Modul Layanan (Pengaduan & Survey)**
- `layanan.status-pengaduan`: Wajib menerima variabel `$pengaduan` (Model) berisi status laporan.
- `layanan.pengaduan-success`: Wajib menerima variabel `$pengaduan` (Model) berisi kode tiket.

### 8.2 Catatan untuk Halaman Statis
Halaman di folder `profil/` dan `ppid/` saat ini bersifat **Statis** (Tidak memerlukan data contract khusus). Namun, jika di masa depan ingin didinamiskan, gunakan struktur data `$content` (HTML String) yang sederhana.

### 8.3 Pesan untuk Backend Developer
> "Tolong JANGAN ubah struktur HTML atau Class Tailwind di file `.blade.php`. Cukup sesuaikan nama variabel di Controller Anda agar cocok dengan Data Contracts di atas. Jika terpaksa mengubah View, pertahankan class `group`, `hover:`, dan `transition` agar animasi tidak hilang."

---

## 📝 Appendix: System Prompt untuk AI Baru
*Jika Anda memulai chat dengan AI baru, copy-paste prompt ini agar ia langsung paham:*

> "Halo, saya sedang mengembangkan website Inspektorat Mahakam Ulu menggunakan Laravel & Tailwind. Saya memiliki SOP Frontend yang ketat. Tolong bertindak sebagai Frontend Specialist yang mematuhi 'SOP Frontend' terlampir. Fokus pada: 1. Layout Robusta (2/3 Sidebar), 2. Aksesibilitas (Font 40th+), 3. Interaksi Full Card Link. Gunakan palette Emerald-600 & Slate-900. Jangan gunakan CSS inline. Mengerti?"

---
*Dokumen ini disusun sebagai acuan standar pengembangan UX/UI Inspektorat Mahakam Ulu.*
