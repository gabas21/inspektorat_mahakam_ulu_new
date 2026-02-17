<?php

namespace App\Services\Api;

/**
 * Service untuk mengambil data PPID dari CMS
 * 
 * PPID = Pejabat Pengelola Informasi dan Dokumentasi
 * 
 * Digunakan di:
 * - Halaman PPID Tentang
 * - Halaman Informasi Berkala
 * - Halaman Informasi Serta Merta
 * - Halaman Informasi Dikecualikan
 * - Halaman Informasi Setiap Saat
 */
class PpidApiService extends ApiService
{
    // Tipe informasi PPID
    public const TYPE_BERKALA = 'berkala';
    public const TYPE_SERTA_MERTA = 'serta-merta';
    public const TYPE_SETIAP_SAAT = 'setiap-saat';
    public const TYPE_DIKECUALIKAN = 'dikecualikan';

    /**
     * Ambil data Tentang PPID
     */
    public function getTentang(): array
    {
        return $this->getWithFallback('/ppid/tentang', [], [
            'deskripsi' => 'Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah pejabat yang bertanggung jawab dalam penyimpanan, pendokumentasian, penyediaan, dan pelayanan informasi publik di Inspektorat Kabupaten Mahakam Ulu.',
            'dasar_hukum' => [
                'UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik',
                'Peraturan Pemerintah No. 61 Tahun 2010',
                'Peraturan Komisi Informasi No. 1 Tahun 2021'
            ],
            'struktur_ppid' => [
                ['position' => 'Atasan PPID', 'name' => 'Bupati Mahakam Ulu'],
                ['position' => 'PPID Utama', 'name' => 'Sekretaris Daerah'],
                ['position' => 'PPID Pembantu', 'name' => 'Sekretaris Inspektorat']
            ]
        ], 3600);
    }

    /**
     * Ambil daftar informasi berdasarkan tipe
     */
    public function getInformasi(string $type, int $limit = 20, int $page = 1): array
    {
        return $this->getWithFallback("/ppid/informasi/{$type}", [
            'limit' => $limit,
            'page' => $page
        ], $this->getDummyInformasi($type));
    }

    /**
     * Ambil statistik informasi publik
     */
    public function getStatistik(): array
    {
        return $this->getWithFallback('/ppid/statistik', [], [
            'total_informasi' => 45,
            'berkala' => 12,
            'serta_merta' => 8,
            'setiap_saat' => 18,
            'dikecualikan' => 7,
            'permohonan_bulan_ini' => 5
        ]);
    }

    /**
     * Submit permohonan informasi publik
     */
    public function submitPermohonan(array $data): array
    {
        return $this->post('/ppid/permohonan', $data);
    }

    /**
     * Cek status permohonan
     */
    public function cekPermohonan(string $nomorPermohonan): array
    {
        return $this->get("/ppid/permohonan/{$nomorPermohonan}");
    }

    // ========================================
    // DUMMY DATA (untuk development/fallback)
    // ========================================

    private function getDummyInformasi(string $type): array
    {
        $data = [
            self::TYPE_BERKALA => [
                ['no' => 1, 'name' => 'Laporan Kinerja Instansi Pemerintah (LKjIP) Tahunan', 'kategori' => 'Laporan', 'file_url' => '#'],
                ['no' => 2, 'name' => 'Laporan Keuangan Tahunan', 'kategori' => 'Keuangan', 'file_url' => '#'],
                ['no' => 3, 'name' => 'Profil Organisasi', 'kategori' => 'Informasi Umum', 'file_url' => '#'],
                ['no' => 4, 'name' => 'Rencana Kerja Tahunan', 'kategori' => 'Perencanaan', 'file_url' => '#'],
            ],
            self::TYPE_SERTA_MERTA => [
                ['no' => 1, 'name' => 'Pengumuman Rekrutmen Pegawai', 'kategori' => 'Pengumuman', 'file_url' => '#'],
                ['no' => 2, 'name' => 'Informasi Bencana atau Darurat', 'kategori' => 'Darurat', 'file_url' => '#'],
                ['no' => 3, 'name' => 'Pengumuman Hasil Seleksi', 'kategori' => 'Pengumuman', 'file_url' => '#'],
            ],
            self::TYPE_SETIAP_SAAT => [
                ['no' => 1, 'name' => 'Peraturan dan Kebijakan', 'kategori' => 'Regulasi', 'file_url' => '#'],
                ['no' => 2, 'name' => 'Prosedur Pelayanan', 'kategori' => 'SOP', 'file_url' => '#'],
                ['no' => 3, 'name' => 'Rekapitulasi Permohonan Informasi', 'kategori' => 'Statistik', 'file_url' => '#'],
                ['no' => 4, 'name' => 'Daftar Informasi Publik (DIP)', 'kategori' => 'Katalog', 'file_url' => '#'],
            ],
            self::TYPE_DIKECUALIKAN => [
                ['no' => 1, 'name' => 'Data Hasil Audit (dalam proses)', 'kategori' => 'Rahasia', 'alasan' => 'Dapat menghambat proses penegakan hukum'],
                ['no' => 2, 'name' => 'Dokumen Whistleblowing', 'kategori' => 'Rahasia', 'alasan' => 'Perlindungan identitas pelapor'],
            ],
        ];

        return $data[$type] ?? [];
    }
}
