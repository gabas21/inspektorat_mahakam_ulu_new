<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private function getNewsItems()
    {
        return [
            // Berita Utama (6 items)
            ['image' => 'https://images.unsplash.com/photo-1573163063945-849c71618635?w=800&h=600&fit=crop', 'category' => 'berita utama', 'title' => 'Inspektorat Mahakam Ulu Lakukan Audiensi dengan BPK RI Perwakilan Kaltim', 'date' => '24 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&h=600&fit=crop', 'category' => 'berita utama', 'title' => 'Rapat Koordinasi Pengawasan Daerah (Rakorwasda) Tahun 2026', 'date' => '05 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=800&h=600&fit=crop', 'category' => 'berita utama', 'title' => 'Penandatanganan Pakta Integritas Pejabat Eselon II dan III', 'date' => '01 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=800&h=600&fit=crop', 'category' => 'berita utama', 'title' => 'Inspektorat Luncurkan Aplikasi Whistleblowing System Terbaru', 'date' => '28 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=800&h=600&fit=crop', 'category' => 'berita utama', 'title' => 'Bupati Mahakam Ulu Apresiasi Kinerja Pengawasan Inspektorat', 'date' => '25 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1560179707-f14e90ef3623?w=800&h=600&fit=crop', 'category' => 'berita utama', 'title' => 'Refleksi Akhir Tahun: Capaian dan Target Pengawasan', 'date' => '20 Desember 2025', 'views' => rand(100, 5000)],

            // Hukum & Peraturan (6 items)
            ['image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=800&h=600&fit=crop', 'category' => 'hukum & peraturan', 'title' => 'Sosialisasi Peraturan Bupati Terkait Tata Kelola Keuangan Desa', 'date' => '22 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=800&h=600&fit=crop', 'category' => 'hukum & peraturan', 'title' => 'Bedah Regulasi Baru tentang Disiplin ASN', 'date' => '15 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1505664194779-8beaceb93744?w=800&h=600&fit=crop', 'category' => 'hukum & peraturan', 'title' => 'Penyuluhan Hukum Pencegahan Korupsi bagi Kepala Desa', 'date' => '10 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1479142506502-19b3a3b7ff33?w=800&h=600&fit=crop', 'category' => 'hukum & peraturan', 'title' => 'Harmonisasi Rancangan Peraturan Daerah Tahun 2026', 'date' => '05 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1521791055366-0d553872125f?w=800&h=600&fit=crop', 'category' => 'hukum & peraturan', 'title' => 'Update Aturan Pengadaan Barang dan Jasa Pemerintah', 'date' => '28 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&h=600&fit=crop', 'category' => 'hukum & peraturan', 'title' => 'Sosialisasi Perpres tentang Supervisi Pemberantasan Korupsi', 'date' => '22 Desember 2025', 'views' => rand(100, 5000)],

            // Pengawasan (6 items)
            ['image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=800&h=600&fit=crop', 'category' => 'pengawasan', 'title' => 'Audit Kinerja Triwulan IV Tahun Anggaran 2025 Resmi Dimulai', 'date' => '20 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&h=600&fit=crop', 'category' => 'pengawasan', 'title' => 'Reviu Dokumen Perencanaan Pembangunan Daerah Mahakam Ulu', 'date' => '08 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop', 'category' => 'pengawasan', 'title' => 'Monitoring dan Evaluasi Proyek Strategis Daerah', 'date' => '02 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1554224154-26032ffc0d07?w=800&h=600&fit=crop', 'category' => 'pengawasan', 'title' => 'Pemeriksaan Reguler pada Dinas Pendidikan dan Kebudayaan', 'date' => '27 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1542744095-fcf48d8bc008?w=800&h=600&fit=crop', 'category' => 'pengawasan', 'title' => 'Audit Tujuan Tertentu terkait Pengelolaan Aset Desa', 'date' => '20 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=800&h=600&fit=crop', 'category' => 'pengawasan', 'title' => 'Evaluasi Penyerapan Anggaran Akhir Tahun', 'date' => '15 Desember 2025', 'views' => rand(100, 5000)],

            // Pengumuman (6 items)
            ['image' => 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=800&h=600&fit=crop', 'category' => 'pengumuman', 'title' => 'Penerimaan Laporan Pengaduan Masyarakat Melalui Platform E-Lapor', 'date' => '18 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=800&h=600&fit=crop', 'category' => 'pengumuman', 'title' => 'Jadwal Cuti Bersama dan Libur Nasional Tahun 2026', 'date' => '10 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1504384308090-c54be3855485?w=800&h=600&fit=crop', 'category' => 'pengumuman', 'title' => 'Himbauan Netralitas ASN dalam Pilkada Serentak', 'date' => '05 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&h=600&fit=crop', 'category' => 'pengumuman', 'title' => 'Pengumuman Hasil Seleksi Kompetensi Dasar CPNS', 'date' => '28 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1577962917302-cd874c4e3169?w=800&h=600&fit=crop', 'category' => 'pengumuman', 'title' => 'Surat Edaran Jam Kerja Selama Bulan Ramadhan', 'date' => '20 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=800&h=600&fit=crop', 'category' => 'pengumuman', 'title' => 'Pemeliharaan Server Website Inspektorat', 'date' => '15 Desember 2025', 'views' => rand(100, 5000)],

            // Berita Umum (6 items)
            ['image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800&h=600&fit=crop', 'category' => 'berita umum', 'title' => 'Workshop Peningkatan Kapasitas Aparatur Pengawasan Internal Pemerintah', 'date' => '15 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=800&h=600&fit=crop', 'category' => 'berita umum', 'title' => 'Kunjungan Kerja Tim Inspektorat Jenderal Kemendagri ke Mahulu', 'date' => '02 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=800&h=600&fit=crop', 'category' => 'berita umum', 'title' => 'Partisipasi Inspektorat dalam Pameran Pembangunan Daerah', 'date' => '29 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=800&h=600&fit=crop', 'category' => 'berita umum', 'title' => 'Senam Bersama dalam Rangka Hari Jadi Kabupaten', 'date' => '22 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&h=600&fit=crop', 'category' => 'berita umum', 'title' => 'Gotong Royong Membersihkan Lingkungan Kantor', 'date' => '18 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1557426272-fc759fdf7a8d?w=800&h=600&fit=crop', 'category' => 'berita umum', 'title' => 'Rapat Evaluasi Triwulan Dinas Kominfo', 'date' => '10 Desember 2025', 'views' => rand(100, 5000)],

            // Kegiatan (6 items)
            ['image' => 'https://images.unsplash.com/photo-1589330273594-fade1ee91647?w=800&h=600&fit=crop', 'category' => 'kegiatan', 'title' => 'Pendampingan Penyusunan Laporan Keuangan SKPD Semester II', 'date' => '12 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=800&h=600&fit=crop', 'category' => 'kegiatan', 'title' => 'Bimbingan Teknis Pengelolaan Arsip Dinamis', 'date' => '08 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1544928147-79a2e746b5bd?w=800&h=600&fit=crop', 'category' => 'kegiatan', 'title' => 'Forum Group Discussion (FGD) Manajemen Risiko', 'date' => '03 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1558403194-611308249627?w=800&h=600&fit=crop', 'category' => 'kegiatan', 'title' => 'Pelatihan Kantor Sendiri (PKS) Audit Pengadaan Barang dan Jasa', 'date' => '27 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800&h=600&fit=crop', 'category' => 'kegiatan', 'title' => 'Studi Banding ke Inspektorat Kota Balikpapan', 'date' => '20 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?w=800&h=600&fit=crop', 'category' => 'kegiatan', 'title' => 'Outbound Peningkatan Sinergitas Pegawai', 'date' => '15 Desember 2025', 'views' => rand(100, 5000)],

            // Sosialisasi (6 items)
            ['image' => 'https://images.unsplash.com/photo-1573163539414-ef6a6c4b2663?w=800&h=600&fit=crop', 'category' => 'sosialisasi', 'title' => 'Sosialisasi Anti Gratifikasi di Lingkungan Dinas Pendidikan', 'date' => '10 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1560523160-754a9e25c68f?w=800&h=600&fit=crop', 'category' => 'sosialisasi', 'title' => 'Kampanye Anti Korupsi di Sekolah Menengah Atas', 'date' => '05 Januari 2026', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1531545514256-b1400bc00f31?w=800&h=600&fit=crop', 'category' => 'sosialisasi', 'title' => 'Penyuluhan Sistem Pengendalian Intern Pemerintah (SPIP)', 'date' => '28 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1576267423445-b2e0074d68a4?w=800&h=600&fit=crop', 'category' => 'sosialisasi', 'title' => 'Sosialisasi Whistleblowing System pada Masyarakat', 'date' => '21 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1562564055-71e051d33c19?w=800&h=600&fit=crop', 'category' => 'sosialisasi', 'title' => 'Sosialisasi Saber Pungli kepada Pelaku Usaha', 'date' => '14 Desember 2025', 'views' => rand(100, 5000)],
            ['image' => 'https://images.unsplash.com/photo-1560439514-e960a3ef5019?w=800&h=600&fit=crop', 'category' => 'sosialisasi', 'title' => 'Webinar Integritas Aparatur Negara', 'date' => '10 Desember 2025', 'views' => rand(100, 5000)],
        ];
    }

    public function index()
    {
        $newsItems = $this->getNewsItems();

        $popularNewsItems = [
            ['category' => 'berita utama', 'title' => 'Pendaftaran Pelatihan APIP Tahun 2026 Dibuka', 'date' => '24 Januari 2026', 'views' => rand(100, 5000)],
            ['category' => 'pengumuman', 'title' => 'Jadwal Libur Nasional dan Cuti Bersama Tahun 2026', 'date' => '22 Januari 2026', 'views' => rand(100, 5000)],
            ['category' => 'hukum & peraturan', 'title' => 'Update Aturan Perjalanan Dinas Terbaru', 'date' => '20 Januari 2026', 'views' => rand(100, 5000)],
            ['category' => 'pengawasan', 'title' => 'Hasil Evaluasi SAKIP Kabupaten Mahakam Ulu', 'date' => '18 Januari 2026', 'views' => rand(100, 5000)],
            ['category' => 'berita umum', 'title' => 'Kunjungan Kerja Inspektur Provinsi Kalimantan Timur', 'date' => '15 Januari 2026', 'views' => rand(100, 5000)],
        ];

        $allLinks = [
            ['name' => 'SIPD KEMENDAGRI', 'desc' => 'Sistem Informasi Pemerintahan Daerah', 'logo' => asset('images/logo_sipd_kemendagri.png'), 'link' => 'https://sipd-ri.kemendagri.go.id/'],
            ['name' => 'LAPOR.GO.ID', 'desc' => 'Layanan Aspirasi dan Pengaduan Online Rakyat', 'logo' => asset('images/logo_lapor_go_id.png'), 'link' => 'https://www.lapor.go.id/'],
            ['name' => 'SRIKANDI', 'desc' => 'Sistem Informasi Kearsipan Dinamis Terintegrasi', 'logo' => asset('images/logo_srikandi.png'), 'link' => 'https://srikandi.arsip.go.id/'],
            ['name' => 'E-CATALOG', 'desc' => 'Aplikasi Belanja Online Pemerintah (LKPP)', 'logo' => asset('images/logo_e_catalogue.png'), 'link' => 'https://e-katalog.lkpp.go.id/'],
            ['name' => 'LPSE MAHULU', 'desc' => 'Layanan Pengadaan Secara Elektronik Mahakam Ulu', 'logo' => asset('images/logo_lpse.png'), 'link' => 'https://lpse.mahakamulukab.go.id/eproc4/'],
            ['name' => 'SIRUP MAHAKAM ULU', 'desc' => 'Sistem Informasi Rencana Umum Pengadaan', 'logo' => asset('images/logo_sirup.png'), 'link' => 'https://sirup.lkpp.go.id/'],
        ];

        return view('landing', compact('newsItems', 'popularNewsItems', 'allLinks'));
    }

    // Layanan Methods
    public function wbs() { return view('layanan.wbs'); }
}
