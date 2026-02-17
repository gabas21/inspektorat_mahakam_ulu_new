# 🎨 Rencana Prioritas Frontend (Frontend-Only Action Plan)

> **Konteks:** Integrasi Backend & CMS dikerjakan oleh Tim Backend terpisah.
> **Fokus:** Kualitas Kode, Konfigurasi, SEO, dan UX Polish.

---

## 🔴 PRIORITAS 1: CRITICAL (Wajib & Mendesak)
*Isu konfigurasi yang berdampak langsung pada tampilan data/waktu di Frontend.*

1.  **App Configuration (Localization) 🌍**
    *   **Masalah:** File `config/app.php` masih default.
        *   `'timezone' => 'UTC'` (Waktu posting berita akan selisih 8 jam).
        *   `'locale' => 'en'` (Nama hari/bulan akan bahasa Inggris: "January", "Monday").
    *   **Tindakan:** Ubah menjadi `Asia/Kuala_Lumpur` (WITA) dan `'id'` (Indonesia).

2.  **SEO & Meta Tags (Social Sharing) 🔗**
    *   **Masalah:** File `layouts/app.blade.php` tidak memiliki meta tags dinamis (OG Type, OG Image).
    *   **Dampak:** Link website akan terlihat jelek (kosong) saat dibagikan di WhatsApp/Facebook.
    *   **Tindakan:** Tambahkan `@yield('meta')` di `app.blade.php` dan `push` meta tags dari halaman detail berita.

3.  **Asset Storage Link 🖼️**
    *   **Masalah:** Frontend mengakses gambar via `asset('storage/...')`. Jika symlink belum dibuat, gambar tidak muncul meski database sudah benar.
    *   **Tindakan:** Pastikan folder `public/storage` ada. Jika tidak, run: `php artisan storage:link`.

---

## 🟡 PRIORITAS 2: WARNING (Code Quality & Maintenance)
*Isu teknis yang tidak merusak tampilan sekarang, tapi menyulitkan maintenance.*

1.  **JS Event Listener Safety (Refactoring) 🧠**
    *   **Masalah:** Di `spa-init.js` (Baris 43), tombol menu mobile di-reset dengan `.cloneNode(true)`.
    *   **Risiko:** Ini teknik "Brute Force" yang menghapus semua event listener lain (misal: Google Analytics tracking event).
    *   **Tindakan:** Ubah menjadi: `mobileMenuBtn.removeEventListener('click', toggleMenu);` (Named Function).

2.  **Navbar Blade Cleanup 🧹**
    *   **Masalah:** File `floating-navbar.blade.php` berisi 150+ baris CSS/JS internal.
    *   **Tindakan:** Extract CSS ke `resources/css/nav.css` dan JS ke `resources/js/nav.js`. Ini membuat file Blade bersih & mudah dibaca.

---

## 🟢 PRIORITAS 3: GREEN (Visual Polish)
*Peningkatan estetika untuk kesan "Premium Government Website".*

1.  **Custom Scrollbar 💅**
    *   **Masalah:** Scrollbar browser default (abu-abu tebal) merusak tema Emerald.
    *   **Tindakan:** Tambahkan CSS `::-webkit-scrollbar` di `app.css`.

2.  **Lazy Loading Images 🐢**
    *   **Masalah:** Gambar berita di halaman depan dimuat sekaligus (Load Time Performance).
    *   **Tindakan:** Tambahkan `loading="lazy"` pada tag `<img>` di `news-card.blade.php` (kecuali slider utama).

3.  **UserWay Accessibility Position ♿**
    *   **Masalah:** Widget UserWay kadang menutupi tombol "Back to Top" atau Chat.
    *   **Tindakan:** Sesuaikan `bottom` offset di CSS `app.blade.php`.

---

## 🏁 Rekomendasi Langkah Selanjutnya
Karena Backend dikerjakan tim lain, tugas Anda (Frontend) adalah **menyiapkan wadahnya**:

1.  **Setting `.env` & `config/app.php`** (Sekarang).
2.  **Pasang Meta Tags SEO** (Supaya saat Tim Backend input berita, link-nya sudah siap share).
3.  **Refactor Navbar & JS** (Supaya kode bersih saat handover final).
