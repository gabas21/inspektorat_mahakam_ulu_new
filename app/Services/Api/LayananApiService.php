<?php

namespace App\Services\Api;

/**
 * Service untuk mengambil data Layanan dari CMS
 * 
 * Digunakan di:
 * - Halaman WBS (Whistle Blowing System)
 * - Halaman Pengaduan
 * - Halaman Cek Pengaduan
 */
class LayananApiService extends ApiService
{
    /**
     * Submit pengaduan masyarakat
     */
    public function submitPengaduan(array $data): array
    {
        return $this->post('/layanan/pengaduan', [
            'nama' => $data['nama'] ?? null,
            'email' => $data['email'] ?? null,
            'telepon' => $data['telepon'] ?? null,
            'judul' => $data['judul'],
            'isi' => $data['isi'],
            'lampiran' => $data['lampiran'] ?? null,
            'anonim' => $data['anonim'] ?? false,
        ]);
    }

    /**
     * Submit WBS (Whistle Blowing System)
     * Untuk pelaporan korupsi/penyelewengan
     */
    public function submitWbs(array $data): array
    {
        return $this->post('/layanan/wbs', [
            'terlapor' => $data['terlapor'],
            'jabatan_terlapor' => $data['jabatan_terlapor'],
            'unit_kerja' => $data['unit_kerja'],
            'peristiwa' => $data['peristiwa'],
            'waktu_kejadian' => $data['waktu_kejadian'],
            'tempat_kejadian' => $data['tempat_kejadian'],
            'bukti' => $data['bukti'] ?? null,
            'saksi' => $data['saksi'] ?? null,
            // Data pelapor (opsional untuk anonim)
            'nama_pelapor' => $data['nama_pelapor'] ?? null,
            'telepon_pelapor' => $data['telepon_pelapor'] ?? null,
            'email_pelapor' => $data['email_pelapor'] ?? null,
            'anonim' => $data['anonim'] ?? false,
        ]);
    }

    /**
     * Cek status pengaduan
     */
    public function cekStatusPengaduan(string $kodePengaduan): array
    {
        return $this->get("/layanan/pengaduan/{$kodePengaduan}");
    }

    /**
     * Cek status WBS
     */
    public function cekStatusWbs(string $kodeWbs): array
    {
        return $this->get("/layanan/wbs/{$kodeWbs}");
    }

    /**
     * Ambil statistik layanan
     */
    public function getStatistik(): array
    {
        return $this->getWithFallback('/layanan/statistik', [], [
            'pengaduan_total' => 0,
            'pengaduan_proses' => 0,
            'pengaduan_selesai' => 0,
            'wbs_total' => 0,
            'wbs_ditindaklanjuti' => 0,
        ]);
    }

    /**
     * Ambil FAQ layanan
     */
    public function getFaq(): array
    {
        return $this->getWithFallback('/layanan/faq', [], [
            [
                'question' => 'Bagaimana cara melaporkan dugaan korupsi?',
                'answer' => 'Anda dapat melaporkan melalui menu Whistle Blowing System (WBS) dengan mengisi formulir yang tersedia. Identitas pelapor akan dijaga kerahasiaannya.'
            ],
            [
                'question' => 'Berapa lama proses pengaduan ditangani?',
                'answer' => 'Pengaduan akan diproses maksimal 14 hari kerja sejak diterima. Anda dapat memantau status melalui menu Cek Pengaduan.'
            ],
            [
                'question' => 'Apakah bisa melapor secara anonim?',
                'answer' => 'Ya, Anda dapat memilih untuk melapor secara anonim. Namun kami menyarankan untuk mencantumkan kontak agar dapat dihubungi untuk klarifikasi.'
            ]
        ]);
    }
}
