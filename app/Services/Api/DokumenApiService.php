<?php

namespace App\Services\Api;

/**
 * Service untuk mengambil data Dokumen dari CMS
 * 
 * Digunakan di:
 * - Halaman SAKIP
 * - Halaman SPIP
 * - Halaman Gratifikasi
 * - Halaman LHKPN
 * - Halaman Kapabilitas APIP
 * - Halaman Piagam Audit
 * - Halaman Standar Pelayanan
 * - Halaman Laporan Keuangan
 */
class DokumenApiService extends ApiService
{
    // Tipe dokumen yang tersedia
    public const TYPE_SAKIP = 'sakip';
    public const TYPE_SPIP = 'spip';
    public const TYPE_GRATIFIKASI = 'gratifikasi';
    public const TYPE_LHKPN = 'lhkpn';
    public const TYPE_KAPABILITAS_APIP = 'kapabilitas-apip';
    public const TYPE_PIAGAM_AUDIT = 'piagam-audit';
    public const TYPE_STANDAR_PELAYANAN = 'standar-pelayanan';
    public const TYPE_LAPORAN_KEUANGAN = 'laporan-keuangan';

    /**
     * Ambil daftar dokumen berdasarkan tipe
     */
    public function getByType(string $type, int $limit = 20, int $page = 1): array
    {
        return $this->getWithFallback('/dokumen', [
            'type' => $type,
            'limit' => $limit,
            'page' => $page
        ], $this->getDummyDokumen($type));
    }

    /**
     * Ambil detail dokumen
     */
    public function getDetail(int $id): array
    {
        return $this->get("/dokumen/{$id}");
    }

    /**
     * Download dokumen (increment download count)
     */
    public function recordDownload(int $id): void
    {
        $this->post("/dokumen/{$id}/download");
    }

    /**
     * Ambil dokumen berdasarkan tahun
     */
    public function getByYear(string $type, int $year): array
    {
        return $this->get('/dokumen', [
            'type' => $type,
            'year' => $year
        ]);
    }

    // ========================================
    // DUMMY DATA (untuk development/fallback)
    // ========================================

    private function getDummyDokumen(string $type): array
    {
        $data = [
            self::TYPE_SAKIP => [
                ['no' => 1, 'name' => 'Laporan Kinerja Instansi Pemerintah (LKjIP) 2024', 'year' => 2024, 'views' => 580, 'downloads' => 145, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Rencana Aksi Kinerja 2025', 'year' => 2025, 'views' => 420, 'downloads' => 98, 'file_url' => '#'],
                ['no' => 3, 'name' => 'Perjanjian Kinerja Tahun 2025', 'year' => 2025, 'views' => 380, 'downloads' => 85, 'file_url' => '#'],
            ],
            self::TYPE_SPIP => [
                ['no' => 1, 'name' => 'Laporan Penyelenggaraan SPIP 2024', 'year' => 2024, 'views' => 320, 'downloads' => 78, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Rencana Tindak Pengendalian (RTP)', 'year' => 2025, 'views' => 280, 'downloads' => 65, 'file_url' => '#'],
            ],
            self::TYPE_GRATIFIKASI => [
                ['no' => 1, 'name' => 'Laporan Rekapitulasi Gratifikasi Semester I', 'year' => 2025, 'views' => 450, 'downloads' => 112, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Pedoman Pengendalian Gratifikasi', 'year' => 2024, 'views' => 520, 'downloads' => 135, 'file_url' => '#'],
            ],
            self::TYPE_LHKPN => [
                ['no' => 1, 'name' => 'Pengumuman Kepatuhan LHKPN 2024', 'year' => 2024, 'views' => 680, 'downloads' => 165, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Daftar Wajib Lapor LHKPN', 'year' => 2025, 'views' => 420, 'downloads' => 95, 'file_url' => '#'],
            ],
            self::TYPE_KAPABILITAS_APIP => [
                ['no' => 1, 'name' => 'Laporan Self Assessment Kapabilitas APIP', 'year' => 2024, 'views' => 280, 'downloads' => 68, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Quality Assurance Improvement Program', 'year' => 2025, 'views' => 220, 'downloads' => 52, 'file_url' => '#'],
            ],
            self::TYPE_PIAGAM_AUDIT => [
                ['no' => 1, 'name' => 'Piagam Audit Intern (Internal Audit Charter) 2025', 'year' => 2025, 'views' => 350, 'downloads' => 88, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Keputusan Inspektur tentang Piagam Audit', 'year' => 2025, 'views' => 280, 'downloads' => 72, 'file_url' => '#'],
            ],
            self::TYPE_STANDAR_PELAYANAN => [
                ['no' => 1, 'name' => 'Standar Pelayanan Pengaduan Masyarakat', 'year' => 2024, 'views' => 520, 'downloads' => 128, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Standar Pelayanan Konsultasi Pengawasan', 'year' => 2024, 'views' => 380, 'downloads' => 95, 'file_url' => '#'],
            ],
            self::TYPE_LAPORAN_KEUANGAN => [
                ['no' => 1, 'name' => 'Laporan Realisasi Anggaran (LRA) 2024', 'year' => 2024, 'views' => 750, 'downloads' => 185, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Neraca SKPD Tahun 2024', 'year' => 2024, 'views' => 480, 'downloads' => 120, 'file_url' => '#'],
                ['no' => 3, 'name' => 'Catatan atas Laporan Keuangan (CaLK)', 'year' => 2024, 'views' => 420, 'downloads' => 105, 'file_url' => '#'],
            ],
        ];

        return $data[$type] ?? [];
    }
}
