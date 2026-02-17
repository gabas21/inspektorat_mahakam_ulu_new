@extends('layouts.app')

@section('title', 'Informasi Lainnya - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section with Background -->
<section class="relative h-[450px] mt-32 overflow-hidden bg-slate-900 rounded-t-[2rem] mx-4 md:mx-6">
    <!-- Image -->
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none opacity-60" 
         alt="Background">
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-teal-950/90 to-teal-900/40"></div>
    
    <!-- Content - Centered -->
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
        <div class="relative z-10">
            <span class="inline-block px-4 py-1.5 bg-emerald-500/20 backdrop-blur-md border border-emerald-400/30 text-emerald-300 text-[10px] md:text-xs font-black rounded-full mb-6 tracking-[0.3em] uppercase shadow-lg">
                Info & Berita
            </span>
            <h2 class="text-4xl md:text-6xl font-black text-white px-2 drop-shadow-[0_10px_10px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-none">
                Informasi <span class="text-emerald-400">Lainnya</span>
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-12 lg:py-16 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto">
             <div class="bg-white p-8 md:p-12 rounded-[2.5rem] shadow-[0_20px_50px_-12px_rgba(0,0,0,0.05)] border border-emerald-50 relative overflow-hidden group text-center">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-emerald-400 to-teal-500"></div>
                <div class="mb-8 relative inline-block">
                    <div class="absolute inset-0 bg-emerald-200 rounded-full blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
                    <svg class="w-20 h-20 text-emerald-500 relative transform transition-transform duration-500 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                
                <h3 class="text-2xl font-bold text-slate-800 mb-4 font-montserrat">Belum Ada Informasi Tambahan</h3>
                <p class="text-slate-500 mb-10 leading-relaxed max-w-lg mx-auto">
                    Saat ini belum ada informasi lain yang perlu ditampilkan. Silakan cek kembali nanti atau hubungi PPID Utama untuk pertanyaan lebih lanjut.
                </p>
                
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-emerald-600 text-white rounded-full font-bold hover:bg-emerald-700 transition-all hover:shadow-[0_10px_20px_-5px_rgba(16,185,129,0.3)] transform hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Kembali ke Beranda
                </a>
             </div>
        </div>
    </div>
</section>



@endsection
