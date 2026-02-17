<?php

namespace App\Services\Api;

/**
 * Service untuk mengambil data Profil Organisasi dari CMS
 * 
 * Digunakan di:
 * - Halaman Visi Misi
 * - Halaman Tujuan Sasaran
 * - Halaman Tugas Fungsi
 * - Halaman Aparatur
 * - Halaman Struktur Organisasi
 * - Halaman Motto Maklumat
 * - Halaman Penghargaan
 */
class ProfilApiService extends ApiService
{
    /**
     * Ambil data Visi Misi
     */
    public function getVisiMisi(): array
    {
        return $this->getWithFallback('/profil/visi-misi', [], [
            'visi' => 'Menjadi Lembaga Pengawasan Internal Yang Profesional dan Berintegritas',
            'misi' => [
                'Meningkatkan kualitas pengawasan internal melalui audit berbasis risiko',
                'Mendorong tata kelola pemerintahan yang bersih dan akuntabel',
                'Meningkatkan kapabilitas dan profesionalisme aparatur pengawasan',
                'Memberikan konsultasi dan pendampingan kepada unit kerja'
            ]
        ], 3600); // Cache 1 jam karena jarang berubah
    }

    /**
     * Ambil data Tujuan dan Sasaran
     */
    public function getTujuanSasaran(): array
    {
        return $this->getWithFallback('/profil/tujuan-sasaran', [], [
            'tujuan' => [
                'Terwujudnya tata kelola pemerintahan yang baik (Good Governance)',
                'Tercapainya akuntabilitas kinerja dan keuangan daerah'
            ],
            'sasaran' => [
                'Meningkatnya kualitas hasil pengawasan',
                'Meningkatnya kepatuhan terhadap peraturan perundang-undangan',
                'Terlaksananya tindak lanjut hasil pemeriksaan'
            ]
        ], 3600);
    }

    /**
     * Ambil data Tugas dan Fungsi
     */
    public function getTugasFungsi(): array
    {
        return $this->getWithFallback('/profil/tugas-fungsi', [], [
            'tugas_pokok' => 'Membantu Bupati dalam melaksanakan pengawasan internal terhadap pelaksanaan urusan pemerintahan daerah.',
            'fungsi' => [
                'Perumusan kebijakan teknis bidang pengawasan dan fasilitasi pengawasan',
                'Pelaksanaan pengawasan internal terhadap kinerja dan keuangan melalui audit, reviu, evaluasi, pemantauan, dan kegiatan pengawasan lainnya',
                'Pelaksanaan pengawasan untuk tujuan tertentu atas penugasan Bupati',
                'Penyusunan laporan hasil pengawasan',
                'Pelaksanaan koordinasi pencegahan tindak pidana korupsi'
            ]
        ], 3600);
    }

    /**
     * Ambil data Aparatur/Pegawai
     */
    public function getAparatur(): array
    {
        return $this->getWithFallback('/profil/aparatur', [], $this->getDummyAparatur());
    }

    /**
     * Ambil data Struktur Organisasi
     */
    public function getStrukturOrganisasi(): array
    {
        return $this->getWithFallback('/profil/struktur-organisasi', [], [
            'chart_image' => null,
            'positions' => $this->getDummyStruktur()
        ], 3600);
    }

    /**
     * Ambil data Motto dan Maklumat Pelayanan
     */
    public function getMottoMaklumat(): array
    {
        return $this->getWithFallback('/profil/motto-maklumat', [], [
            'motto' => 'PRIMA (Profesional, Responsif, Inovatif, Modern, Akuntabel)',
            'maklumat' => 'Dengan ini kami menyatakan sanggup menyelenggarakan pelayanan sesuai standar pelayanan yang telah ditetapkan dan apabila tidak menepati janji ini, kami siap menerima sanksi sesuai peraturan perundang-undangan yang berlaku.'
        ], 3600);
    }

    /**
     * Ambil data Penghargaan
     */
    public function getPenghargaan(): array
    {
        return $this->getWithFallback('/profil/penghargaan', [], [
            ['year' => 2024, 'title' => 'Predikat SAKIP "B" dari Kemenpan RB', 'description' => 'Penghargaan atas capaian akuntabilitas kinerja'],
            ['year' => 2023, 'title' => 'Level 3 IACM (Integrated)', 'description' => 'Penilaian kapabilitas APIP tingkat nasional'],
            ['year' => 2023, 'title' => 'Zona Integritas Menuju WBK', 'description' => 'Komitmen membangun wilayah bebas korupsi'],
        ]);
    }

    // ========================================
    // DUMMY DATA (untuk development/fallback)
    // ========================================

    private function getDummyAparatur(): array
    {
        return [
            'pimpinan' => [
                ['name' => 'Margono ST., M.SI', 'position' => 'Inspektur', 'nip' => '197505152000031005', 'photo' => '/images/kepala inspektorat.png']
            ],
            'irban' => [
                ['name' => 'Drs. Ahmad Yani, M.Si', 'position' => 'Inspektur Pembantu Wilayah I', 'nip' => '197012101995031003', 'photo' => null],
                ['name' => 'Ir. Siti Rahma, M.M', 'position' => 'Inspektur Pembantu Wilayah II', 'nip' => '197508202001122004', 'photo' => null],
            ],
            'staff' => [
                ['name' => 'Budi Santoso, S.E', 'position' => 'Auditor Muda', 'nip' => '198203152010011012', 'photo' => null],
                ['name' => 'Maya Dewi, S.Ak', 'position' => 'Auditor Pertama', 'nip' => '199005122015042001', 'photo' => null],
            ]
        ];
    }

    private function getDummyStruktur(): array
    {
        return [
            [
                'level' => 1,
                'name' => 'Margono ST., M.SI',
                'position' => 'Inspektur',
                'photo' => '/images/kepala inspektorat.png'
            ],
            [
                'level' => 2,
                'name' => 'Drs. Ahmad Yani, M.Si',
                'position' => 'Inspektur Pembantu Wilayah I',
                'photo' => null
            ],
            [
                'level' => 2,
                'name' => 'Ir. Siti Rahma, M.M',
                'position' => 'Inspektur Pembantu Wilayah II',
                'photo' => null
            ],
        ];
    }
}
