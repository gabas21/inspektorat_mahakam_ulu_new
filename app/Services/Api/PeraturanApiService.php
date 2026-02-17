<?php

namespace App\Services\Api;

/**
 * Service untuk mengambil data Peraturan dari CMS
 * 
 * Digunakan di:
 * - Halaman Undang-Undang
 * - Halaman Peraturan Menteri
 * - Halaman Peraturan Daerah
 * - Halaman Peraturan Bupati
 * - Halaman SK Bupati
 * - Halaman SK Inspektur
 * - Halaman Lain-Lain
 */
class PeraturanApiService extends ApiService
{
    // Tipe peraturan yang tersedia
    public const TYPE_UNDANG_UNDANG = 'undang-undang';
    public const TYPE_PERATURAN_MENTERI = 'peraturan-menteri';
    public const TYPE_PERATURAN_DAERAH = 'peraturan-daerah';
    public const TYPE_PERATURAN_BUPATI = 'peraturan-bupati';
    public const TYPE_SK_BUPATI = 'sk-bupati';
    public const TYPE_SK_INSPEKTUR = 'sk-inspektur';
    public const TYPE_LAIN_LAIN = 'lain-lain';

    /**
     * Ambil daftar peraturan berdasarkan tipe
     */
    public function getByType(string $type, int $limit = 20, int $page = 1): array
    {
        return $this->getWithFallback('/peraturan', [
            'type' => $type,
            'limit' => $limit,
            'page' => $page
        ], $this->getDummyPeraturan($type));
    }

    /**
     * Ambil detail peraturan
     */
    public function getDetail(int $id): array
    {
        return $this->get("/peraturan/{$id}");
    }

    /**
     * Cari peraturan
     */
    public function search(string $query, ?string $type = null): array
    {
        $params = ['q' => $query];
        if ($type) $params['type'] = $type;

        return $this->get('/peraturan/search', $params);
    }

    /**
     * Download file peraturan (increment download count)
     */
    public function recordDownload(int $id): void
    {
        $this->post("/peraturan/{$id}/download");
    }

    /**
     * Ambil statistik peraturan
     */
    public function getStats(): array
    {
        return $this->getWithFallback('/peraturan/stats', [], [
            'total' => 0,
            'by_type' => []
        ]);
    }

    // ========================================
    // DUMMY DATA (untuk development/fallback)
    // ========================================

    private function getDummyPeraturan(string $type): array
    {
        $data = [
            self::TYPE_UNDANG_UNDANG => [
                ['no' => 1, 'name' => 'UU No. 23 Tahun 2014 tentang Pemerintahan Daerah', 'year' => 2014, 'views' => 1520, 'downloads' => 450, 'file_url' => '#'],
                ['no' => 2, 'name' => 'UU No. 30 Tahun 2014 tentang Administrasi Pemerintahan', 'year' => 2014, 'views' => 1230, 'downloads' => 380, 'file_url' => '#'],
                ['no' => 3, 'name' => 'UU No. 5 Tahun 2014 tentang Aparatur Sipil Negara', 'year' => 2014, 'views' => 980, 'downloads' => 290, 'file_url' => '#'],
            ],
            self::TYPE_PERATURAN_MENTERI => [
                ['no' => 1, 'name' => 'Permendagri No. 12 Tahun 2017 tentang Pembinaan APIP', 'year' => 2017, 'views' => 890, 'downloads' => 210, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Permenpan RB No. 3 Tahun 2023 tentang Jabatan Fungsional Auditor', 'year' => 2023, 'views' => 750, 'downloads' => 180, 'file_url' => '#'],
            ],
            self::TYPE_PERATURAN_DAERAH => [
                ['no' => 1, 'name' => 'Perda No. 5 Tahun 2021 tentang APBD Kabupaten Mahakam Ulu', 'year' => 2021, 'views' => 650, 'downloads' => 120, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Perda No. 2 Tahun 2023 tentang Pajak Daerah dan Retribusi', 'year' => 2023, 'views' => 580, 'downloads' => 95, 'file_url' => '#'],
            ],
            self::TYPE_PERATURAN_BUPATI => [
                ['no' => 1, 'name' => 'Perbup No. 10 Tahun 2024 tentang Tunjangan Perbaikan Penghasilan', 'year' => 2024, 'views' => 1820, 'downloads' => 520, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Perbup No. 15 Tahun 2023 tentang Disiplin Pegawai', 'year' => 2023, 'views' => 920, 'downloads' => 280, 'file_url' => '#'],
            ],
            self::TYPE_SK_BUPATI => [
                ['no' => 1, 'name' => 'SK Bupati tentang Pembentukan Tim Reformasi Birokrasi', 'year' => 2024, 'views' => 320, 'downloads' => 85, 'file_url' => '#'],
                ['no' => 2, 'name' => 'SK Bupati tentang Penunjukan Pejabat PPID', 'year' => 2024, 'views' => 280, 'downloads' => 65, 'file_url' => '#'],
            ],
            self::TYPE_SK_INSPEKTUR => [
                ['no' => 1, 'name' => 'SK Inspektur tentang Tim Audit Kinerja Tahun 2026', 'year' => 2026, 'views' => 180, 'downloads' => 45, 'file_url' => '#'],
                ['no' => 2, 'name' => 'SK Inspektur tentang Kode Etik Auditor Internal', 'year' => 2025, 'views' => 250, 'downloads' => 78, 'file_url' => '#'],
            ],
            self::TYPE_LAIN_LAIN => [
                ['no' => 1, 'name' => 'Surat Edaran KPK tentang Pencegahan Gratifikasi', 'year' => 2024, 'views' => 420, 'downloads' => 110, 'file_url' => '#'],
                ['no' => 2, 'name' => 'Himbauan Pencegahan Korupsi di Lingkungan Pemerintah Daerah', 'year' => 2024, 'views' => 350, 'downloads' => 85, 'file_url' => '#'],
            ],
        ];

        return $data[$type] ?? [];
    }
}
