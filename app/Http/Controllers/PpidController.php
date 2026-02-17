<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class PpidController extends Controller
{
    private function paginateItems($items, $perPage = 10, $path = null)
    {
        $page = Paginator::resolveCurrentPage() ?: 1;
        $items = $items instanceof Collection ? $items : Collection::make($items);
        
        return new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            [
                'path' => $path ?? Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );
    }

    private function getDummyPpid($type)
    {
        $data = [];
        // Info types based on page
        $infoTypes = [
            'Berkala' => [
                'Informasi Profil Badan Publik',
                'Ringkasan Informasi Program dan/atau Kegiatan',
                'Ringkasan Informasi Kinerja',
                'Ringkasan Laporan Keuangan',
                'Ringkasan Laporan Akses Informasi Publik',
                'Informasi Peraturan, Keputusan, dan/atau Kebijakan',
                'Informasi Hak dan Tata Cara Memperoleh Informasi'
            ],
            'Serta Merta' => [
                'Standar Operasional Prosedur - Bid. Sekretariat',
                'Survey Kepuasan Masyarakat',
                'Profil Biro PBJ Setda Prov. Kaltim',
                'Laporan Keterbukaan Informasi Publik',
                'Panduan Praktis Katalog Elektronik',
                '10 Proyek Strategis',
                'Laporan PDN',
                'Standar Pelayanan Biro PBJ Setda Prov. Kaltim',
                'Maklumat Pelayanan Biro PBJ Setda Prov. Kaltim'
            ],
            'Setiap Saat' => [
                'Daftar Informasi Publik (DIP)',
                'Informasi tentang Peraturan, Keputusan, dan/atau Kebijakan',
                'Informasi tentang Organisasi, Administrasi, Kepegawaian, dan Keuangan',
                'Surat-surat Perjanjian dengan Pihak Ketiga',
                'Surat-menyurat Pimpinan atau Pejabat dalam Rangka Pelaksanaan Tupoksi',
                'Agenda Kerja Pimpinan',
                'Layanan Informasi Publik'
            ],
            'Dikecualikan' => [
                'Informasi yang Membahayakan Negara',
                'Informasi Berkaitan dengan Kepentingan Perlindungan Usaha',
                'Informasi Berkaitan dengan Hak-hak Pribadi',
                'Informasi Berkaitan dengan Rahasia Jabatan',
                'Informasi Publik yang Belum Dikuasai atau Didokumentasikan'
            ]
        ];

        $titles = $infoTypes[$type] ?? ['Informasi ' . $type];
        $responsibles = ['PPID Utama', 'PPID Pelaksana', 'Sekretariat', 'Bidang Pengawasan', 'Sub Bagian Umum'];
        $years = range(2020, 2026);

        // Generate 50 dummy items
        for ($i = 0; $i < 50; $i++) {
            $title = $titles[array_rand($titles)];
            $year = $years[array_rand($years)];
            $responsible = $responsibles[array_rand($responsibles)];
            
            $data[] = [
                'no' => $i + 1,
                'name' => "$title Tahun $year", // Judul Informasi / Jenis Informasi
                'responsible' => $responsible, // Penanggung Jawab / Dasar Hukum (simulated)
                'views' => rand(50, 5000),
                'downloads' => rand(10, 1000),
                'file_url' => asset('documents/peraturan/UUD45 ASLI.pdf') // Use existing dummy file
            ];
        }

        return $this->paginateItems($data, 10);
    }

    public function ppidTentang() { return view('ppid.tentang'); }

    public function ppidBerkala() 
    { 
        $categories = [
            'Informasi Profil Badan Publik',
            'Ringkasan Informasi Program dan/atau Kegiatan',
            'Ringkasan Informasi Kinerja',
            'Ringkasan Laporan Keuangan',
            'Ringkasan Laporan Akses Informasi Publik',
            'Informasi Peraturan, Keputusan, dan/atau Kebijakan',
            'Informasi Hak dan Tata Cara Memperoleh Informasi'
        ];

        $groupedData = [];
        $years = range(2020, 2026);

        foreach ($categories as $category) {
            $items = [];
            $count = rand(12, 20);
            
            for ($i = 0; $i < $count; $i++) {
                $year = $years[array_rand($years)];
                $items[] = [
                    'no' => $i + 1,
                    'name' => "$category Tahun $year",
                    'responsible' => 'PPID Utama',
                    'views' => rand(50, 5000),
                    'downloads' => rand(10, 1000),
                    'file_url' => '#'
                ];
            }
            $groupedData[$category] = $items;
        }

        return view('ppid.berkala', [
            'title' => 'Informasi Berkala', 
            'groupedItems' => $groupedData
        ]); 
    }

    public function ppidSertaMerta() 
    { 
        $categories = [
            'Kumpulan Paparan',
            'Sertifikat Standar Layanan LPSE Biro PBJ Setda Prov. Kaltim',
            'Profil Biro PBJ Setda Prov. Kaltim',
            'E-Katalog V6'
        ];

        $groupedData = [];
        $years = range(2020, 2026);

        foreach ($categories as $category) {
            $items = [];
            $count = rand(12, 20);
            
            for ($i = 0; $i < $count; $i++) {
                $year = $years[array_rand($years)];
                $items[] = [
                    'no' => $i + 1,
                    'name' => "Dokumen $category - $year",
                    'responsible' => 'PPID Utama',
                    'views' => rand(50, 5000),
                    'downloads' => rand(10, 1000),
                    'file_url' => '#'
                ];
            }
            $groupedData[$category] = $items;
        }

        return view('ppid.serta-merta', [
            'title' => 'Informasi Serta Merta',
            'groupedItems' => $groupedData
        ]); 
    }

    public function ppidDikecualikan() 
    { 
        $categories = [
            'Informasi yang Dikecualikan karena Sifat Rahasia',
            'Informasi yang Dikecualikan karena Privasi',
            'Informasi yang Dikecualikan karena HKI'
        ];

        $groupedData = [];
        $years = range(2020, 2026);

        foreach ($categories as $category) {
            $items = [];
            $count = rand(5, 12);
            
            for ($i = 0; $i < $count; $i++) {
                $year = $years[array_rand($years)];
                $items[] = [
                    'no' => $i + 1,
                    'name' => "Dokumen $category - $year",
                    'views' => rand(50, 5000),
                    'downloads' => rand(10, 1000),
                    'file_url' => '#'
                ];
            }
            $groupedData[$category] = $items;
        }

        return view('ppid.dikecualikan', [
            'title' => 'Informasi Dikecualikan',
            'groupedItems' => $groupedData
        ]); 
    }

    public function ppidSetiapSaat() 
    { 
        $categories = [
            'Peraturan Presiden',
            'Peraturan LKPP',
            'Keputusan Kepala LKPP',
            'SOP Pelayanan LPSE',
            'Daftar Informasi Publik',
            'Daftar Informasi Dikecualikan',
            'Renstra Setda Prov Kaltim',
            'Surat Edaran',
            'Peraturan Gubernur'
        ];

        $groupedData = [];
        $years = range(2020, 2026);

        foreach ($categories as $category) {
            $items = [];
            $count = rand(8, 15);
            
            for ($i = 0; $i < $count; $i++) {
                $year = $years[array_rand($years)];
                $items[] = [
                    'no' => $i + 1,
                    'name' => "Dokumen $category - $year",
                    'views' => rand(50, 5000),
                    'downloads' => rand(10, 1000),
                    'file_url' => '#'
                ];
            }
            $groupedData[$category] = $items;
        }

        return view('ppid.setiap-saat', [
            'title' => 'Informasi Setiap Saat',
            'groupedItems' => $groupedData
        ]); 
    }
}
