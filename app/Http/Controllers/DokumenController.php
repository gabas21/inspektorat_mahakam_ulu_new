<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class DokumenController extends Controller
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

    private function getDummyDokumen($type)
    {
        $data = [];
        $titles = [
            'SAKIP' => ['Laporan Kinerja Instansi Pemerintah (LKjIP)', 'Rencana Aksi Kinerja', 'Perjanjian Kinerja', 'Evaluasi SAKIP', 'Cascading Kinerja', 'Indikator Kinerja Utama (IKU)', 'Rencana Strategis (Renstra)', 'Rencana Kerja Tahunan (RKT)'],
            'SPIP' => ['Laporan Penyelenggaraan SPIP', 'Rencana Tindak Pengendalian (RTP)', 'Laporan Manajemen Risiko', 'Register Risiko', 'Pemantauan Tindak Lanjut'],
            'Gratifikasi' => ['Laporan Rekapitulasi Gratifikasi', 'Pedoman Pengendalian Gratifikasi', 'SK Unit Pengendalian Gratifikasi', 'Laporan Monitoring Gratifikasi'],
            'LHKPN' => ['Pengumuman Kepatuhan LHKPN', 'Daftar Wajib Lapor LHKPN', 'Rekapitulasi Pelaporan LHKPN', 'Monev Kepatuhan LHKPN'],
            'Kapabilitas APIP' => ['Laporan Self Assessment Kapabilitas APIP', 'Quality Assurance Improvement Program', 'Telaah Sejawat Eksternal', 'Program Kerja Pengawasan Tahunan (PKPT)'],
            'Piagam Audit' => ['Piagam Audit Intern (Internal Audit Charter)', 'Keputusan Inspektur tentang Piagam Audit', 'Standar Audit Intern Pemerintah Indonesia'],
            'Standar Pelayanan' => ['Standar Pelayanan Pengaduan Masyarakat', 'Standar Pelayanan Konsultasi Pengawasan', 'Maklumat Pelayanan', 'SK Standar Pelayanan'],
            'Laporan Keuangan' => ['Laporan Realisasi Anggaran (LRA)', 'Neraca SKPD', 'Catatan atas Laporan Keuangan (CaLK)', 'Laporan Operasional']
        ];

        $baseTitles = $titles[$type] ?? ['Dokumen ' . $type];
        $years = range(2020, 2026);

        // Generate 50 dummy items
        for ($i = 0; $i < 50; $i++) {
            $baseTitle = $baseTitles[array_rand($baseTitles)];
            $year = $years[array_rand($years)];
            $data[] = [
                'no' => $i + 1,
                'name' => "$baseTitle Tahun $year " . ($i + 1),
                'views' => rand(50, 5000),
                'downloads' => rand(10, 1000),
                'file_url' => '#'
            ];
        }

        return $this->paginateItems($data, 10);
    }

    public function sakip() { return view('dokumen.sakip', ['title' => 'Daftar Dokumen SAKIP', 'items' => $this->getDummyDokumen('SAKIP')]); }
    public function spip() { return view('dokumen.spip', ['title' => 'Daftar Dokumen SPIP', 'items' => $this->getDummyDokumen('SPIP')]); }
    public function gratifikasi() { return view('dokumen.gratifikasi', ['title' => 'Daftar Dokumen Gratifikasi', 'items' => $this->getDummyDokumen('Gratifikasi')]); }
    public function lhkpn() { return view('dokumen.lhkpn', ['title' => 'Daftar Dokumen LHKPN', 'items' => $this->getDummyDokumen('LHKPN')]); }
    public function kapabilitasApip() { return view('dokumen.kapabilitas-apip', ['title' => 'Daftar Dokumen Kapabilitas APIP', 'items' => $this->getDummyDokumen('Kapabilitas APIP')]); }
    public function piagamAudit() { return view('dokumen.piagam-audit', ['title' => 'Daftar Dokumen Piagam Audit', 'items' => $this->getDummyDokumen('Piagam Audit')]); }
    public function standarPelayanan() { return view('dokumen.standar-pelayanan', ['title' => 'Daftar Dokumen Standar Pelayanan', 'items' => $this->getDummyDokumen('Standar Pelayanan')]); }
    public function laporanKeuangan() { return view('dokumen.laporan-keuangan', ['title' => 'Daftar Dokumen Laporan Keuangan', 'items' => $this->getDummyDokumen('Laporan Keuangan')]); }
}
