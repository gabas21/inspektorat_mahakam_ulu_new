<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PpidController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\SurveyController;

Route::get('/', [LandingController::class, 'index'])->name('home');

Route::prefix('profil')->group(function () {
    Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('profil.visi-misi');
    Route::get('/tujuan-sasaran', [ProfilController::class, 'tujuanSasaran'])->name('profil.tujuan-sasaran');
    Route::get('/tugas-fungsi', [ProfilController::class, 'tugasFungsi'])->name('profil.tugas-fungsi');
    Route::get('/profil-pimpinan', [ProfilController::class, 'profilPimpinan'])->name('profil.profil-pimpinan');
    Route::get('/aparatur', [ProfilController::class, 'aparatur'])->name('profil.aparatur');
    Route::get('/struktur-organisasi', [ProfilController::class, 'strukturOrganisasi'])->name('profil.struktur-organisasi');
    Route::get('/motto-maklumat', [ProfilController::class, 'mottoMaklumat'])->name('profil.motto-maklumat');
    Route::get('/penghargaan', [ProfilController::class, 'penghargaan'])->name('profil.penghargaan');
});

Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'berita'])->name('berita.index');
    Route::get('/informasi-lainnya', [BeritaController::class, 'informasiLainnya'])->name('berita.informasi-lainnya');
    Route::get('/{slug}', [BeritaController::class, 'showNews'])->name('berita.show');
});

Route::prefix('peraturan')->group(function () {
    Route::get('/undang-undang', [PeraturanController::class, 'undangUndang'])->name('peraturan.undang-undang');
    Route::get('/peraturan-menteri', [PeraturanController::class, 'peraturanMenteri'])->name('peraturan.peraturan-menteri');
    Route::get('/peraturan-daerah', [PeraturanController::class, 'peraturanDaerah'])->name('peraturan.peraturan-daerah');
    Route::get('/peraturan-bupati', [PeraturanController::class, 'peraturanBupati'])->name('peraturan.peraturan-bupati');
    Route::get('/sk-bupati', [PeraturanController::class, 'skBupati'])->name('peraturan.sk-bupati');
    Route::get('/sk-inspektur', [PeraturanController::class, 'skInspektur'])->name('peraturan.sk-inspektur');
    Route::get('/lain-lain', [PeraturanController::class, 'lainLain'])->name('peraturan.lain-lain');
    Route::get('/daftar-dokumen', [PeraturanController::class, 'daftarDokumen'])->name('peraturan.daftar-dokumen');
});

Route::prefix('dokumen')->group(function () {
    Route::get('/sakip', [DokumenController::class, 'sakip'])->name('dokumen.sakip');
    Route::get('/spip', [DokumenController::class, 'spip'])->name('dokumen.spip');
    Route::get('/gratifikasi', [DokumenController::class, 'gratifikasi'])->name('dokumen.gratifikasi');
    Route::get('/lhkpn', [DokumenController::class, 'lhkpn'])->name('dokumen.lhkpn');
    Route::get('/kapabilitas-apip', [DokumenController::class, 'kapabilitasApip'])->name('dokumen.kapabilitas-apip');
    Route::get('/piagam-audit', [DokumenController::class, 'piagamAudit'])->name('dokumen.piagam-audit');
    Route::get('/standar-pelayanan', [DokumenController::class, 'standarPelayanan'])->name('dokumen.standar-pelayanan');
    Route::get('/laporan-keuangan', [DokumenController::class, 'laporanKeuangan'])->name('dokumen.laporan-keuangan');
});

Route::prefix('layanan')->group(function () {
    Route::get('/wbs', [LandingController::class, 'wbs'])->name('layanan.wbs');
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('layanan.pengaduan');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('layanan.pengaduan.store');
    Route::get('/pengaduan/success/{kode}', [PengaduanController::class, 'success'])->name('layanan.pengaduan.success');
    Route::get('/cek-pengaduan', [PengaduanController::class, 'cekPengaduan'])->name('layanan.cek-pengaduan');
    Route::post('/cek-pengaduan', [PengaduanController::class, 'cekStatus'])->name('layanan.cek-pengaduan.check');
    Route::get('/survey', [SurveyController::class, 'index'])->name('layanan.survey');
    Route::post('/survey', [SurveyController::class, 'store'])->name('layanan.survey.store');
    Route::get('/daftar-pengaduan', [PengaduanController::class, 'daftarPengaduan'])->name('layanan.daftar-pengaduan');
});

Route::prefix('ppid')->group(function () {
    Route::get('/tentang', [PpidController::class, 'ppidTentang'])->name('ppid.tentang');
    Route::get('/berkala', [PpidController::class, 'ppidBerkala'])->name('ppid.berkala');
    Route::get('/serta-merta', [PpidController::class, 'ppidSertaMerta'])->name('ppid.serta-merta');
    Route::get('/dikecualikan', [PpidController::class, 'ppidDikecualikan'])->name('ppid.dikecualikan');
    Route::get('/setiap-saat', [PpidController::class, 'ppidSetiapSaat'])->name('ppid.setiap-saat');
});
