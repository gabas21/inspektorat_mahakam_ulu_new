<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('layanan.pengaduan');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|string',
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'identitas' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'pekerjaan' => 'required|string|max:255',
            'unit_kerja' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'topik' => 'required|string|max:255',
            'kronologis' => 'required|string',
            'data_pendukung' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
        ]);

        // Handle file uploads
        $identitasPath = null;
        if ($request->hasFile('identitas')) {
            $identitasPath = $request->file('identitas')->store('pengaduan/identitas', 'public');
        }

        $dataPendukungPath = null;
        if ($request->hasFile('data_pendukung')) {
            $dataPendukungPath = $request->file('data_pendukung')->store('pengaduan/bukti', 'public');
        }

        $pengaduan = Pengaduan::create([
            'kategori' => $validated['kategori'],
            'nama' => $validated['nama'],
            'nik' => $validated['nik'],
            'identitas_path' => $identitasPath,
            'alamat' => $validated['alamat'],
            'email' => $validated['email'],
            'telepon' => $validated['telepon'],
            'pekerjaan' => $validated['pekerjaan'],
            'unit_kerja' => $validated['unit_kerja'],
            'tanggal_kejadian' => $validated['tanggal'],
            'topik' => $validated['topik'],
            'kronologis' => $validated['kronologis'],
            'data_pendukung_path' => $dataPendukungPath,
        ]);

        return redirect()->route('layanan.cek-pengaduan', ['kode' => $pengaduan->kode_laporan])
            ->with('success', 'Laporan Anda berhasil dikirim! Kode laporan: ' . $pengaduan->kode_laporan);
    }

    public function success($kode)
    {
        $pengaduan = Pengaduan::where('kode_laporan', $kode)->firstOrFail();
        return view('layanan.pengaduan-success', compact('pengaduan'));
    }

    public function cekPengaduan()
    {
        return view('layanan.cek-pengaduan');
    }

    public function cekStatus(Request $request)
    {
        $validated = $request->validate([
            'kode_laporan' => 'required|string',
        ]);

        $pengaduan = Pengaduan::where('kode_laporan', $validated['kode_laporan'])->first();

        if (!$pengaduan) {
            return back()->with('error', 'Kode laporan tidak ditemukan.');
        }

        return view('layanan.status-pengaduan', compact('pengaduan'));
    }

    public function daftarPengaduan()
    {
        $pengaduans = Pengaduan::orderBy('created_at', 'desc')->get();
        return view('layanan.daftar-pengaduan', compact('pengaduans'));
    }
}
