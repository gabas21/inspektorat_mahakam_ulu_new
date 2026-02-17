@extends('layouts.app')

@section('title', 'Pengaduan Berhasil - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-16">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                Laporan Terkirim
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                Pengaduan <span class="text-emerald-400">Berhasil</span>
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-2xl mx-auto">
            
            <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 p-8 md:p-12 text-center reveal">
                <!-- Success Icon -->
                <div class="w-24 h-24 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-8">
                    <svg class="w-12 h-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <h3 class="text-2xl font-black text-slate-900 font-montserrat uppercase mb-4">Laporan Anda Telah Diterima!</h3>
                
                <p class="text-slate-500 mb-8">
                    Terima kasih telah menyampaikan laporan. Tim kami akan segera menindaklanjuti laporan Anda.
                </p>

                <!-- Kode Laporan -->
                <div class="bg-slate-900 rounded-2xl p-6 mb-8">
                    <p class="text-xs text-white/60 uppercase tracking-widest mb-2">Kode Laporan Anda</p>
                    <p class="text-3xl font-black text-emerald-400 font-mono tracking-wider">{{ $pengaduan->kode_laporan }}</p>
                    <p class="text-xs text-white/40 mt-3">Simpan kode ini untuk mengecek status laporan Anda</p>
                </div>

                <!-- Detail Laporan -->
                <div class="bg-slate-50 rounded-2xl p-6 text-left mb-8">
                    <h4 class="text-sm font-black text-slate-900 uppercase mb-4">Detail Laporan</h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Nama:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->nama }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Kategori:</span>
                            <span class="font-bold text-slate-900 capitalize">{{ $pengaduan->kategori }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Topik:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->topik }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Status:</span>
                            <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold uppercase">{{ $pengaduan->status }}</span>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('layanan.cek-pengaduan') }}" class="flex-1 py-4 bg-emerald-600 text-white font-black uppercase tracking-widest rounded-xl hover:bg-emerald-700 transition-all text-center">
                        Cek Status Laporan
                    </a>
                    <a href="{{ route('home') }}" class="flex-1 py-4 bg-slate-100 text-slate-700 font-black uppercase tracking-widest rounded-xl hover:bg-slate-200 transition-all text-center">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>



@endsection
