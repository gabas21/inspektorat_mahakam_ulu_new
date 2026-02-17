<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class PeraturanController extends Controller
{
    private function formatFileSize($bytes)
    {
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }
        return $bytes . ' B';
    }

    private function getDummyPeraturan($type)
    {
        // Mock data dictionary with 10 specific items for each category
        $allData = [
            'Undang-Undang' => [
                ['name' => 'UUD 1945 (Amandemen ke-4) - Undang-Undang Dasar Negara Republik Indonesia Tahun 1945', 'file' => 'uud-1945.pdf'],
                ['name' => 'UU No. 23 Tahun 2014 tentang Pemerintahan Daerah', 'file' => 'uu-23-2014-pemerintahan-daerah.pdf'],
                ['name' => 'UU No. 30 Tahun 2014 tentang Administrasi Pemerintahan', 'file' => 'uu-30-2014-administrasi-pemerintahan.pdf'],
                ['name' => 'UU No. 5 Tahun 2014 tentang Aparatur Sipil Negara', 'file' => 'uu-5-2014-asn.pdf'],
                ['name' => 'UU No. 17 Tahun 2003 tentang Keuangan Negara', 'file' => 'uu-17-2003-keuangan-negara.pdf'],
                ['name' => 'UU No. 1 Tahun 2004 tentang Perbendaharaan Negara', 'file' => 'uu-1-2004-perbendaharaan.pdf'],
                ['name' => 'UU No. 15 Tahun 2004 tentang Pemeriksaan Pengelolaan dan Tanggung Jawab Keuangan Negara', 'file' => 'uu-15-2004-pemeriksaan-keuangan.pdf'],
                ['name' => 'UU No. 25 Tahun 2009 tentang Pelayanan Publik', 'file' => 'uu-25-2009-pelayanan-publik.pdf'],
                ['name' => 'UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik', 'file' => 'uu-14-2008-keterbukaan-informasi.pdf'],
                ['name' => 'UU No. 19 Tahun 2019 tentang Perubahan Kedua atas UU No. 30 Tahun 2002 tentang KPK', 'file' => 'uu-19-2019-kpk.pdf'],
                ['name' => 'UU No. 12 Tahun 2011 tentang Pembentukan Peraturan Perundang-undangan', 'file' => 'uu-12-2011-pembentukan-peraturan.pdf'],
            ],
            'Peraturan Menteri' => [
                ['name' => 'Permendagri No. 12 Tahun 2017 tentang Pedoman Pembinaan dan Pengawasan Penyelenggaraan Pemerintahan Daerah', 'file' => 'permendagri-12-2017.pdf'],
                ['name' => 'Permenpan RB No. 3 Tahun 2023 tentang Perubahan Roadmap Reformasi Birokrasi', 'file' => 'permenpan-3-2023.pdf'],
                ['name' => 'Permendagri No. 77 Tahun 2020 tentang Pedoman Teknis Pengelolaan Keuangan Daerah', 'file' => 'permendagri-77-2020.pdf'],
                ['name' => 'Permenpan RB No. 8 Tahun 2021 tentang Sistem Manajemen Kinerja PNS', 'file' => 'permenpan-8-2021.pdf'],
                ['name' => 'Permendagri No. 10 Tahun 2018 tentang Reviu atas Dokumen Perencanaan Pembangunan dan Anggaran Daerah Tahunan', 'file' => 'permendagri-10-2018.pdf'],
                ['name' => 'Permenkeu No. 17/PMK.09/2019 tentang Pedoman Penerapan, Penilaian, dan Reviu Pengendalian Intern', 'file' => 'permenkeu-17-2019.pdf'],
                ['name' => 'Permendagri No. 70 Tahun 2019 tentang Sistem Informasi Pemerintahan Daerah', 'file' => 'permendagri-70-2019.pdf'],
                ['name' => 'Permenpan RB No. 26 Tahun 2020 tentang Pedoman Evaluasi Pelaksanaan Reformasi Birokrasi', 'file' => 'permenpan-26-2020.pdf'],
                ['name' => 'Permendagri No. 99 Tahun 2018 tentang Pembinaan dan Pengendalian Penataan Perangkat Daerah', 'file' => 'permendagri-99-2018.pdf'],
                ['name' => 'Permendagri No. 19 Tahun 2016 tentang Pedoman Pengelolaan Barang Milik Daerah', 'file' => 'permendagri-19-2016.pdf'],
            ],
            'Peraturan Daerah' => [
                ['name' => 'Perda No. 5 Tahun 2021 tentang APBD Tahun Anggaran 2022', 'file' => 'perda-5-2021-apbd.pdf'],
                ['name' => 'Perda No. 2 Tahun 2023 tentang Pajak Daerah dan Retribusi Daerah', 'file' => 'perda-2-2023-pajak.pdf'],
                ['name' => 'Perda No. 3 Tahun 2020 tentang Rencana Pembangunan Jangka Menengah Daerah (RPJMD)', 'file' => 'perda-3-2020-rpjmd.pdf'],
                ['name' => 'Perda No. 1 Tahun 2024 tentang Organisasi dan Tata Kerja Perangkat Daerah', 'file' => 'perda-1-2024-sotk.pdf'],
                ['name' => 'Perda No. 6 Tahun 2019 tentang Penyelenggaraan Ketertiban Umum', 'file' => 'perda-6-2019-ketertiban.pdf'],
                ['name' => 'Perda No. 4 Tahun 2022 tentang Pengelolaan Keuangan Daerah', 'file' => 'perda-4-2022-keuangan.pdf'],
                ['name' => 'Perda No. 7 Tahun 2021 tentang Perlindungan Lahan Pertanian Pangan Berkelanjutan', 'file' => 'perda-7-2021-pertanian.pdf'],
                ['name' => 'Perda No. 8 Tahun 2020 tentang Pengelolaan Sampah', 'file' => 'perda-8-2020-sampah.pdf'],
                ['name' => 'Perda No. 9 Tahun 2023 tentang Kawasan Tanpa Rokok', 'file' => 'perda-9-2023-ktr.pdf'],
                ['name' => 'Perda No. 10 Tahun 2018 tentang Pelestarian Kebudayaan Daerah', 'file' => 'perda-10-2018-budaya.pdf'],
            ],
            'Peraturan Bupati' => [
                ['name' => 'Perbup No. 10 Tahun 2024 tentang Tambahan Penghasilan Pegawai (TPP)', 'file' => 'perbup-10-2024-tpp.pdf'],
                ['name' => 'Perbup No. 15 Tahun 2023 tentang Disiplin Pegawai Negeri Sipil di Lingkungan Pemkab', 'file' => 'perbup-15-2023-disiplin.pdf'],
                ['name' => 'Perbup No. 22 Tahun 2022 tentang Kode Etik ASN', 'file' => 'perbup-22-2022-kode-etik.pdf'],
                ['name' => 'Perbup No. 45 Tahun 2021 tentang Standar Biaya Umum Tahun Anggaran 2022', 'file' => 'perbup-45-2021-sbu.pdf'],
                ['name' => 'Perbup No. 30 Tahun 2023 tentang Tata Cara Pengadaan Barang/Jasa di Desa', 'file' => 'perbup-30-2023-pengadaan.pdf'],
                ['name' => 'Perbup No. 12 Tahun 2024 tentang Pedoman Perjalanan Dinas', 'file' => 'perbup-12-2024-perjalanan-dinas.pdf'],
                ['name' => 'Perbup No. 50 Tahun 2022 tentang Sistem Akuntabilitas Kinerja Instansi Pemerintah', 'file' => 'perbup-50-2022-sakip.pdf'],
                ['name' => 'Perbup No. 18 Tahun 2021 tentang Tugas Pokok dan Fungsi Inspektorat', 'file' => 'perbup-18-2021-tupoksi.pdf'],
                ['name' => 'Perbup No. 5 Tahun 2023 tentang Pakaian Dinas ASN', 'file' => 'perbup-5-2023-pakaian.pdf'],
                ['name' => 'Perbup No. 8 Tahun 2024 tentang Jam Kerja ASN', 'file' => 'perbup-8-2024-jam-kerja.pdf'],
            ],
            'SK Bupati' => [
                ['name' => 'SK Bupati No. 100/K-15/2024 tentang Pembentukan Tim Reformasi Birokrasi', 'file' => 'sk-bupati-100-2024-rb.pdf'],
                ['name' => 'SK Bupati No. 200/K-20/2024 tentang Penunjukan Pejabat Pengelola Keuangan Daerah', 'file' => 'sk-bupati-200-2024-ppkd.pdf'],
                ['name' => 'SK Bupati No. 300/K-05/2024 tentang Pembentukan Satgas SPIP', 'file' => 'sk-bupati-300-2024-spip.pdf'],
                ['name' => 'SK Bupati No. 100/K-30/2024 tentang Tim Koordinasi Supervisi dan Pencegahan Korupsi', 'file' => 'sk-bupati-100-2024-korupsi.pdf'],
                ['name' => 'SK Bupati No. 500/K-12/2024 tentang Penetapan Status Tanggap Darurat Bencana', 'file' => 'sk-bupati-500-2024-bencana.pdf'],
                ['name' => 'SK Bupati No. 800/K-08/2024 tentang Kenaikan Pangkat PNS Periode April', 'file' => 'sk-bupati-800-2024-pangkat.pdf'],
                ['name' => 'SK Bupati No. 900/K-01/2024 tentang Penetapan Penerima Hibah Daerah', 'file' => 'sk-bupati-900-2024-hibah.pdf'],
                ['name' => 'SK Bupati No. 050/K-10/2024 tentang Tim Penyusun RKPD', 'file' => 'sk-bupati-050-2024-rkpd.pdf'],
                ['name' => 'SK Bupati No. 700/K-25/2024 tentang Tindak Lanjut Hasil Pemeriksaan BPK RI', 'file' => 'sk-bupati-700-2024-tlhp.pdf'],
                ['name' => 'SK Bupati No. 600/K-18/2024 tentang Tim Percepatan Penurunan Stunting', 'file' => 'sk-bupati-600-2024-stunting.pdf'],
            ],
            'SK Inspektur' => [
                ['name' => 'SK Inspektur No. 01 Tahun 2024 tentang Pembentukan Tim Audit Kinerja', 'file' => 'sk-inspektur-01-2024-audit.pdf'],
                ['name' => 'SK Inspektur No. 02 Tahun 2024 tentang Pemberlakuan Kode Etik Auditor', 'file' => 'sk-inspektur-02-2024-etik.pdf'],
                ['name' => 'SK Inspektur No. 03 Tahun 2024 tentang Program Kerja Pengawasan Tahunan (PKPT)', 'file' => 'sk-inspektur-03-2024-pkpt.pdf'],
                ['name' => 'SK Inspektur No. 04 Tahun 2024 tentang Tim Penilai Angka Kredit Jafung Auditor', 'file' => 'sk-inspektur-04-2024-pak.pdf'],
                ['name' => 'SK Inspektur No. 05 Tahun 2024 tentang Tim Reviu Laporan Keuangan Pemerintah Daerah', 'file' => 'sk-inspektur-05-2024-reviu.pdf'],
                ['name' => 'SK Inspektur No. 06 Tahun 2024 tentang Standar Audit Internal', 'file' => 'sk-inspektur-06-2024-standar.pdf'],
                ['name' => 'SK Inspektur No. 07 Tahun 2024 tentang Tim Evaluasi Mandiri Kapabilitas APIP', 'file' => 'sk-inspektur-07-2024-apip.pdf'],
                ['name' => 'SK Inspektur No. 08 Tahun 2024 tentang Penunjukan Mentor PPL', 'file' => 'sk-inspektur-08-2024-ppl.pdf'],
                ['name' => 'SK Inspektur No. 09 Tahun 2024 tentang Tim Verifikasi LHKPN', 'file' => 'sk-inspektur-09-2024-lhkpn.pdf'],
                ['name' => 'SK Inspektur No. 10 Tahun 2024 tentang Tim Audit Investigasi', 'file' => 'sk-inspektur-10-2024-investigasi.pdf'],
            ],
            'Lain-Lain' => [
                ['name' => 'Surat Edaran KPK No. 19 Tahun 2023 tentang Imbauan Pencegahan Korupsi', 'file' => 'se-kpk-19-2023.pdf'],
                ['name' => 'Instruksi Presiden No. 2 Tahun 2014 tentang Aksi Pencegahan dan Pemberantasan Korupsi', 'file' => 'inpres-2-2014.pdf'],
                ['name' => 'Surat Edaran Menpan RB tentang Netralitas ASN', 'file' => 'se-menpan-netralitas.pdf'],
                ['name' => 'MoU Antara Pemkab dengan Kejaksaan Negeri tentang Penanganan Masalah Hukum Perdata', 'file' => 'mou-kejari.pdf'],
                ['name' => 'Berita Acara Kesepakatan Hasil Musrenbang Kabupaten', 'file' => 'ba-musrenbang.pdf'],
                ['name' => 'Laporan Hasil Pemeriksaan (LHP) BPK RI atas LKPD Tahun 2023', 'file' => 'lhp-bpk-2023.pdf'],
                ['name' => 'Piagam Audit Intern (Internal Audit Charter) Versi 2.0', 'file' => 'piagam-audit-v2.pdf'],
                ['name' => 'Pedoman Umum Governansi Sektor Publik', 'file' => 'pedoman-governansi.pdf'],
                ['name' => 'Modul Pelatihan Audit Kinerja Berbasis Risiko', 'file' => 'modul-audit-risiko.pdf'],
                ['name' => 'Buku Saku Kode Etik ASN', 'file' => 'buku-saku-etik.pdf'],
            ]
        ];

        // Default item if type not found (fallback)
        $items = $allData[$type] ?? [['name' => 'Dokumen ' . $type . ' belum tersedia', 'file' => null]];

        // File dummy untuk preview (gunakan file yang sudah ada)
        $dummyFile = 'UUD45 ASLI.pdf';

        $data = [];
        foreach ($items as $index => $item) {
            // Handle both old string format and new array format
            $name = is_array($item) ? $item['name'] : $item;
            $file = is_array($item) && isset($item['file']) ? $item['file'] : null;
            
            // Gunakan file dummy jika file asli belum ada
            // Nanti bisa diganti dengan file yang sesuai
            $actualFile = $file ? $file : $dummyFile;
            
            $data[] = [
                'no' => $index + 1,
                'name' => $name,
                'views' => rand(100, 5000),
                'downloads' => rand(50, 1000),
                'file_url' => asset('documents/peraturan/' . $dummyFile) // Sementara pakai dummy
            ];
        }
        return $data;
    }

    private function filterPeraturan($data, $search)
    {
        Log::info('FilterPeraturan called with search: ' . $search);
        if (!$search) return $data;
        
        return collect($data)->filter(function ($item) use ($search) {
            return stripos($item['name'], $search) !== false || 
                   stripos((string)$item['no'], $search) !== false;
        })->values()->all();
    }

    public function daftarDokumen()
    {
        $documents = [];
        $folderPath = public_path('documents/peraturan');
        
        if (is_dir($folderPath)) {
            $files = scandir($folderPath);
            $index = 1;
            
            foreach ($files as $file) {
                // Skip directories and non-PDF files
                if ($file === '.' || $file === '..' || !str_ends_with(strtolower($file), '.pdf')) {
                    continue;
                }
                
                $filePath = $folderPath . '/' . $file;
                $documents[] = [
                    'no' => $index++,
                    'name' => pathinfo($file, PATHINFO_FILENAME), // nama tanpa ekstensi
                    'filename' => $file,
                    'size' => $this->formatFileSize(filesize($filePath)),
                    'modified' => date('d M Y, H:i', filemtime($filePath)),
                    'file_url' => asset('documents/peraturan/' . $file)
                ];
            }
        }
        
        return view('peraturan.daftar-dokumen', compact('documents'));
    }

    public function undangUndang() { return view('peraturan.undang-undang', ['title' => 'Undang-Undang', 'items' => $this->getDummyPeraturan('Undang-Undang')]); }
    public function peraturanMenteri() { return view('peraturan.peraturan-menteri', ['title' => 'Peraturan Menteri', 'items' => $this->getDummyPeraturan('Peraturan Menteri')]); }
    public function peraturanDaerah() { return view('peraturan.peraturan-daerah', ['title' => 'Peraturan Daerah', 'items' => $this->getDummyPeraturan('Peraturan Daerah')]); }
    public function peraturanBupati() { return view('peraturan.peraturan-bupati', ['title' => 'Peraturan Bupati', 'items' => $this->getDummyPeraturan('Peraturan Bupati')]); }
    public function skBupati() { return view('peraturan.sk-bupati', ['title' => 'SK Bupati', 'items' => $this->getDummyPeraturan('SK Bupati')]); }
    public function skInspektur() { return view('peraturan.sk-inspektur', ['title' => 'SK Inspektur', 'items' => $this->getDummyPeraturan('SK Inspektur')]); }
    public function lainLain() { return view('peraturan.lain-lain', ['title' => 'Lain-Lain', 'items' => $this->getDummyPeraturan('Lain-Lain')]); }
}
