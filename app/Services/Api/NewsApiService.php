<?php

namespace App\Services\Api;

/**
 * Service untuk mengambil data Berita dari CMS
 * 
 * Digunakan di:
 * - Landing page (news carousel, news sidebar)
 * - Halaman berita index
 * - Halaman informasi lainnya
 */
class NewsApiService extends ApiService
{
    /**
     * Ambil berita terbaru
     * 
     * @param int $limit Jumlah berita
     * @param int $page Halaman (untuk pagination)
     */
    public function getLatestNews(int $limit = 10, int $page = 1): array
    {
        return $this->getWithFallback('/news', [
            'limit' => $limit,
            'page' => $page,
            'sort' => 'latest'
        ], $this->getDummyNews($limit));
    }

    /**
     * Ambil berita populer (berdasarkan views)
     */
    public function getPopularNews(int $limit = 5): array
    {
        return $this->getWithFallback('/news/popular', [
            'limit' => $limit
        ], $this->getDummyPopularNews($limit));
    }

    /**
     * Ambil berita berdasarkan kategori
     */
    public function getNewsByCategory(string $category, int $limit = 10): array
    {
        return $this->getWithFallback('/news', [
            'category' => $category,
            'limit' => $limit
        ], []);
    }

    /**
     * Ambil detail berita berdasarkan slug
     */
    public function getNewsDetail(string $slug): array
    {
        return $this->get("/news/{$slug}");
    }

    /**
     * Ambil agenda/kegiatan
     */
    public function getAgenda(string $month = null, string $year = null): array
    {
        $params = [];
        if ($month) $params['month'] = $month;
        if ($year) $params['year'] = $year;

        return $this->getWithFallback('/agenda', $params, $this->getDummyAgenda());
    }

    /**
     * Cari berita
     */
    public function searchNews(string $query, int $limit = 10): array
    {
        return $this->get('/news/search', [
            'q' => $query,
            'limit' => $limit
        ]);
    }

    // ========================================
    // DUMMY DATA (untuk development/fallback)
    // Hapus setelah API backend ready
    // ========================================

    private function getDummyNews(int $limit): array
    {
        $items = [
            ['id' => 1, 'image' => 'https://images.unsplash.com/photo-1573163063945-849c71618635?w=800&h=600&fit=crop', 'category' => 'berita utama', 'title' => 'Inspektorat Mahakam Ulu Lakukan Audiensi dengan BPK RI Perwakilan Kaltim', 'date' => '24 Januari 2026', 'slug' => 'audiensi-bpk-ri'],
            ['id' => 2, 'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=800&h=600&fit=crop', 'category' => 'hukum & peraturan', 'title' => 'Sosialisasi Peraturan Bupati Terkait Tata Kelola Keuangan Desa', 'date' => '22 Januari 2026', 'slug' => 'sosialisasi-perbup'],
            ['id' => 3, 'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=800&h=600&fit=crop', 'category' => 'pengawasan', 'title' => 'Audit Kinerja Triwulan IV Tahun Anggaran 2025 Resmi Dimulai', 'date' => '20 Januari 2026', 'slug' => 'audit-kinerja-q4'],
            ['id' => 4, 'image' => 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=800&h=600&fit=crop', 'category' => 'pengumuman', 'title' => 'Penerimaan Laporan Pengaduan Masyarakat Melalui Platform E-Lapor', 'date' => '18 Januari 2026', 'slug' => 'pengaduan-elapor'],
            ['id' => 5, 'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800&h=600&fit=crop', 'category' => 'berita umum', 'title' => 'Workshop Peningkatan Kapasitas Aparatur Pengawasan Internal Pemerintah', 'date' => '15 Januari 2026', 'slug' => 'workshop-apip'],
            ['id' => 6, 'image' => 'https://images.unsplash.com/photo-1589330273594-fade1ee91647?w=800&h=600&fit=crop', 'category' => 'kegiatan', 'title' => 'Pendampingan Penyusunan Laporan Keuangan SKPD Semester II', 'date' => '12 Januari 2026', 'slug' => 'pendampingan-lk'],
            ['id' => 7, 'image' => 'https://images.unsplash.com/photo-1573163539414-ef6a6c4b2663?w=800&h=600&fit=crop', 'category' => 'sosialisasi', 'title' => 'Sosialisasi Anti Gratifikasi di Lingkungan Dinas Pendidikan', 'date' => '10 Januari 2026', 'slug' => 'sosialisasi-gratifikasi'],
            ['id' => 8, 'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&h=600&fit=crop', 'category' => 'pengawasan', 'title' => 'Reviu Dokumen Perencanaan Pembangunan Daerah Mahakam Ulu', 'date' => '08 Januari 2026', 'slug' => 'reviu-dokumen'],
            ['id' => 9, 'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&h=600&fit=crop', 'category' => 'berita utama', 'title' => 'Rapat Koordinasi Pengawasan Daerah (Rakorwasda) Tahun 2026', 'date' => '05 Januari 2026', 'slug' => 'rakorwasda-2026'],
            ['id' => 10, 'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=800&h=600&fit=crop', 'category' => 'berita umum', 'title' => 'Kunjungan Kerja Tim Inspektorat Jenderal Kemendagri ke Mahulu', 'date' => '02 Januari 2026', 'slug' => 'kunjungan-itjen'],
        ];

        return array_slice($items, 0, $limit);
    }

    private function getDummyPopularNews(int $limit): array
    {
        $items = [
            ['id' => 11, 'category' => 'berita utama', 'title' => 'Pendaftaran Pelatihan APIP Tahun 2026 Dibuka', 'date' => '24 Januari 2026', 'views' => 1520],
            ['id' => 12, 'category' => 'pengumuman', 'title' => 'Jadwal Libur Nasional dan Cuti Bersama Tahun 2026', 'date' => '22 Januari 2026', 'views' => 1350],
            ['id' => 13, 'category' => 'hukum & peraturan', 'title' => 'Update Aturan Perjalanan Dinas Terbaru', 'date' => '20 Januari 2026', 'views' => 980],
            ['id' => 14, 'category' => 'pengawasan', 'title' => 'Hasil Evaluasi SAKIP Kabupaten Mahakam Ulu', 'date' => '18 Januari 2026', 'views' => 875],
            ['id' => 15, 'category' => 'berita umum', 'title' => 'Kunjungan Kerja Inspektur Provinsi Kalimantan Timur', 'date' => '15 Januari 2026', 'views' => 720],
        ];

        return array_slice($items, 0, $limit);
    }

    private function getDummyAgenda(): array
    {
        return [
            '4-2-2026' => [
                'Rapat Koordinasi Internal Pagi',
                'Review Laporan Keuangan Semester II',
                'Audiensi dengan Dinas Pendidikan',
            ],
            '24-1-2026' => ['Audiensi BPK RI Perwakilan Kaltim', 'Rapat Koordinasi Mingguan'],
            '22-1-2026' => ['Sosialisasi Perbub Tata Kelola Keuangan'],
            '20-1-2026' => ['Audit Kinerja Triwulan IV'],
            '15-1-2026' => ['Workshop APIP Nasional'],
            '28-1-2026' => ['Evaluasi SAKIP Kabupaten'],
        ];
    }
}
