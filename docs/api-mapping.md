# 🗺️ API Mapping: The Holy Grail (Gen Z Edition)

**Status:** *Fresh from the Oven* 🔥  
**Vibe:** *informative but make it fun* ✨

Yo, welcome to the documentation! 👋
Dokumen ini adalah "Peta Harta Karun" buat nge-link **Frontend** (Tampilan Kece) kita sama **Backend** (Otak-nya). Kita bahas pakai bahasa manusia dan bahasa robot, biar Frontend Dev & Backend Dev bisa *bestie*-an. 🤝

---

## 🏗️ 1. The Core: Berita & Landing Page
*> "Main Character" dari website kita. Paling sering dilihat orang.*

### 🤓 Technical Side (Buat Si Paling Coding)
- **Files**: `landing.blade.php`, `berita/index.blade.php`, `berita/show.blade.php`
- **Data Contract**: Butuh `title`, `slug`, `image`, `date`, `category` (Wajib ada!).

| Method | Endpoint | Fungsi | Parameter |
| :--- | :--- | :--- | :--- |
| `GET` | `/api/news` | Ambil semua berita (pake paging!) | `page`, `limit` |
| `GET` | `/api/news/popular` | Ambil berita yang lagi *hype* | `limit` |
| `GET` | `/api/news/{slug}` | Ambil 1 berita lengkap | - |
| `GET` | `/api/agenda` | Jadwal kegiatan (biar ga lupa) | `month`, `year` |

### 🗣️ Non-Technical Side (Buat Manusia)
- **Landing Page**: "Bro, tolong munculin 5 berita terbaru di carousel, terus yang *most viewed* taruh di sidebar ya."
- **Detail Page**: "Pas kartunya diklik, buka halaman baca. Jangan lupa *related news* di samping biar pembaca betah."

---

## ⚖️ 2. The Law: Produk Hukum (Peraturan)
*> "The Serious Stuff". Gudang aturan main di Mahakam Ulu.*

### 🤓 Technical Side
- **Files**: Folder `resources/views/peraturan/*` (Ada 7 jenis!).
- **Unified Endpoint**: Backend ga perlu bikin 7 endpoint beda, cukup 1 endpoint pinter.

| Method | Endpoint | Fungsi | Parameter |
| :--- | :--- | :--- | :--- |
| `GET` | `/api/peraturan` | List dokumen hukum | `type` (Wajib!) |
| `POST` | `/api/peraturan/{id}/download` | Hitung jumlah download | - |

**Type Values (Jangan Typo!):**
`undang-undang`, `peraturan-menteri`, `peraturan-daerah`, `peraturan-bupati`, `sk-bupati`, `sk-inspektur`, `lain-lain`.

### 🗣️ Non-Technical Side
- "Kita punya banyak jenis aturan (UU, Perda, SK, dll). Tampilannya sama semua kok (tabel), cuma isinya beda. Jadi tolong filter datanya sesuai menu yang diklik user ya!"

---

## 📊 3. The Receipts: Dokumen Kinerja (SAKIP/LHKPN)
*> "No Pix Hoax". Bukti kerja nyata inspektorat.*

### 🤓 Technical Side
- **Files**: Folder `resources/views/dokumen/*` (Ada 8 jenis!).
- **Logic**: Mirip banget sama *Peraturan*, cuma beda konteks.

| Method | Endpoint | Fungsi | Parameter |
| :--- | :--- | :--- | :--- |
| `GET` | `/api/dokumen` | List dokumen kinerja | `type`, `year` |

**Type Values:**
`sakip`, `spip`, `gratifikasi`, `lhkpn`, `kapabilitas-apip`, `piagam-audit`, `standar-pelayanan`, `laporan-keuangan`.

### 🗣️ Non-Technical Side
- "Ini tempat kita pamer transparansi. User bisa download Laporan Keuangan atau LHKPN. Pastikan tombol download-nya jalan dan nge-counter angka download ya!"

---

## 📢 4. The Voice: Layanan Pengaduan & WBS
*> "Spill The Tea". Tempat warga lapor masalah.*

### 🤓 Technical Side
- **Files**: `layanan/pengaduan.blade.php`, `layanan/wbs.blade.php`
- **Validation**: Strict banget! Jangan sampe data sampah masuk.

| Method | Endpoint | Fungsi | Payload (Isi Paket) |
| :--- | :--- | :--- | :--- |
| `POST` | `/api/pengaduan` | Kirim laporan umum | `nik`, `nama`, `kategori`, `kronologis`, `bukti` |
| `POST` | `/api/wbs` | Whistleblowing (Rahasia!) | `terlapor`, `peristiwa`, `lokasi`, `is_anonim` |
| `GET` | `/api/cek-status` | Tracking laporan | `kode_tiket` (e.g., `#TICKET-123`) |

### 🗣️ Non-Technical Side
- **Pengaduan**: "Kalo ada warga yang mau komplain pelayanan publik, mereka isi form ini. Backend harus simpan & kasih *Kode Tiket* biar mereka bisa cek statusnya nanti."
- **WBS**: "Ini mode *incognito* buat pelapor korupsi. Datanya harus super aman & rahasia!"

---

## ⭐ 5. The Review: Survey Kepuasan (SKM)
*> "Rate My Service". Bintang 5 kakak!*

### 🤓 Technical Side
- **File**: `layanan/survey.blade.php`
- **Data Structure**: 9 Pertanyaan (q1-q9) dengan skala 1-4.

| Method | Endpoint | Fungsi | Payload |
| :--- | :--- | :--- | :--- |
| `POST` | `/api/survey` | Submit penilaian | `q1`...`q9` (Int 1-4), `saran` (Text) |

### 🗣️ Non-Technical Side
- "Habis warga dilayanin, kita minta feedback. 'Gimana pelayanan kami?'. Survey ini penting buat naikin nilai rapor dinas."

---

## 🔍 6. Public Info: PPID
*> "Open Book". Hak warga untuk tahu.*

### 🤓 Technical Side
- **Files**: Folder `resources/views/ppid/*`.
- **Logic**: Mirip *Peraturan*, menampilkan list file PDF.

| Method | Endpoint | Fungsi | Parameter |
| :--- | :--- | :--- | :--- |
| `GET` | `/api/ppid` | List info publik | `kategori` (`berkala`, `serta-merta`, dll) |
| `POST` | `/api/ppid/request` | Form permohonan info | `nik`, `alasan`, `rincian_info` |

### 🗣️ Non-Technical Side
- "Kalo ada info yang belum kita upload, warga boleh *request* resmi lewat form 'Permohonan Informasi'. Formnya agak panjang, pastikan semua kolom tersimpan ya."

---

## 🚀 Summary for Devs (TL;DR)

1.  **Frontend (Kita)**: Tugasnya bikin UI cantik, *loading* cepet, dan validasi form di awal.
2.  **Backend (Mereka)**: Tugasnya sediain API sesuai tabel di atas. Jangan ubah nama variabel sembarangan (misal: `title` jadi `judul`) nanti error! 💥
3.  **Authentication**: Belum perlu login user umum, semua endpoint di atas sifatnya *Public* (kecuali Admin Panel nanti).

*Happy Coding, Guys! Jangan lupa ngopi. ☕*
