@extends('layouts.app')

@section('title', 'Profil Pimpinan - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Profil Pimpinan Page -->
<section class="relative min-h-screen font-inter text-white pb-24 overflow-x-hidden">
    <!-- Modern Gradient Background with Decorative Elements -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/background.jpg') }}" class="w-full h-full object-cover" alt="">
        <div class="absolute inset-0 bg-gradient-to-br from-teal-950/95 via-slate-900/90 to-emerald-950/95"></div>
    </div>
    
    <!-- Decorative Blur Elements -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-emerald-500/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-40 right-10 w-96 h-96 bg-teal-400/10 rounded-full blur-[120px]"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-emerald-600/5 rounded-full blur-[150px]"></div>
    
    <!-- Subtle Dot Pattern -->
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(rgba(16, 185, 129, 0.5) 1px, transparent 1px); background-size: 40px 40px;"></div>

    <div class="container mx-auto px-4 relative z-10 pt-16">
        
        <!-- Page Header -->
        <div class="text-center mb-16">
            <span class="inline-block px-6 py-2 bg-emerald-500/20 border border-emerald-400/30 rounded-full text-[10px] md:text-xs text-emerald-300 uppercase font-black tracking-[0.2em] mb-6">
                Profil Inspektorat
            </span>
            <h2 class="text-4xl md:text-6xl font-black text-white px-2 font-montserrat uppercase tracking-tight leading-[1.1] mb-4">
                Profil <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">Pimpinan</span>
            </h2>
            <p class="text-white/60 text-sm md:text-base font-inter max-w-xl mx-auto">
                Mengenal lebih dekat pimpinan Inspektorat Kabupaten Mahakam Ulu
            </p>
        </div>

        <!-- Inspektur Profile Card -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-xl rounded-[2rem] border border-white/20 overflow-hidden shadow-2xl">
                <div class="flex flex-col lg:flex-row">
                    
                    <!-- Photo Section -->
                    <div class="lg:w-2/5 relative">
                        <div class="aspect-[3/4] lg:aspect-auto lg:h-full">
                            <img src="{{ asset('images/kepala inspektorat.png') }}" 
                                 alt="Inspektur Kabupaten Mahakam Ulu" 
                                 class="w-full h-full object-cover object-top">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent lg:bg-gradient-to-r"></div>
                        </div>
                        
                        <!-- Decorative Badge -->
                        <div class="absolute top-4 left-4 lg:top-6 lg:left-6">
                            <div class="bg-emerald-500/90 backdrop-blur-md px-4 py-2 rounded-xl">
                                <span class="text-white text-[10px] font-black uppercase tracking-widest">Inspektur</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Info Section -->
                    <div class="lg:w-3/5 p-6 md:p-10 flex flex-col justify-center">
                        <div class="mb-6">
                            <h3 class="text-2xl md:text-3xl font-black text-white font-montserrat uppercase tracking-tight mb-2">
                                Margono, S.T., M.Si
                            </h3>
                            <p class="text-emerald-400 text-sm font-bold uppercase tracking-widest mb-4">
                                Inspektur Kabupaten Mahakam Ulu
                            </p>
                            <div class="w-16 h-1 bg-gradient-to-r from-emerald-500 to-teal-400 rounded-full"></div>
                        </div>
                        
                        <!-- Bio Info Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                            <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                                <span class="text-emerald-400/70 text-[10px] font-bold uppercase tracking-widest">NIP</span>
                                <p class="text-white font-bold mt-1">19680215 198903 1 008</p>
                            </div>
                            <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                                <span class="text-emerald-400/70 text-[10px] font-bold uppercase tracking-widest">Pangkat</span>
                                <p class="text-white font-bold mt-1">Pembina Utama Muda</p>
                            </div>
                            <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                                <span class="text-emerald-400/70 text-[10px] font-bold uppercase tracking-widest">Golongan</span>
                                <p class="text-white font-bold mt-1">IV/c</p>
                            </div>
                            <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                                <span class="text-emerald-400/70 text-[10px] font-bold uppercase tracking-widest">Pendidikan</span>
                                <p class="text-white font-bold mt-1">S2 - Magister Sains</p>
                            </div>
                        </div>
                        
                        <!-- Quote Section -->
                        <div class="bg-gradient-to-r from-emerald-500/10 to-teal-500/10 rounded-xl p-6 border border-emerald-400/20 relative">
                            <svg class="absolute top-4 left-4 w-8 h-8 text-emerald-500/20" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                            <p class="text-white/80 text-sm md:text-base italic leading-relaxed pl-8">
                                "Pengawasan yang baik adalah pengawasan yang bersifat preventif dan konstruktif, 
                                bukan hanya mencari kesalahan tetapi juga memberikan solusi untuk perbaikan 
                                tata kelola pemerintahan yang lebih baik."
                            </p>
                            <div class="mt-4 pl-8">
                                <span class="text-emerald-400 text-xs font-bold">— Margono, S.T., M.Si</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Career History Section -->
        <div class="max-w-4xl mx-auto mt-16">
            <h3 class="text-xl md:text-2xl font-black text-white font-montserrat uppercase tracking-tight text-center mb-10">
                Riwayat <span class="text-emerald-400">Jabatan</span>
            </h3>
            
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-emerald-500/30 transform md:-translate-x-1/2"></div>
                
                <!-- Timeline Items -->
                <div class="space-y-8">
                    <!-- Item 1 -->
                    <div class="relative flex items-start gap-6 md:gap-0">
                        <div class="absolute left-4 md:left-1/2 w-3 h-3 bg-emerald-500 rounded-full transform md:-translate-x-1/2 mt-1.5 ring-4 ring-slate-900"></div>
                        <div class="ml-12 md:ml-0 md:w-1/2 md:pr-12 md:text-right">
                            <span class="text-emerald-400 text-xs font-bold">2022 - Sekarang</span>
                            <h4 class="text-white font-bold mt-1">Inspektur Kabupaten Mahakam Ulu</h4>
                            <p class="text-white/60 text-sm mt-1">Memimpin pengawasan internal pemerintah daerah</p>
                        </div>
                    </div>
                    
                    <!-- Item 2 -->
                    <div class="relative flex items-start gap-6 md:gap-0">
                        <div class="absolute left-4 md:left-1/2 w-3 h-3 bg-emerald-500/60 rounded-full transform md:-translate-x-1/2 mt-1.5 ring-4 ring-slate-900"></div>
                        <div class="ml-12 md:ml-auto md:w-1/2 md:pl-12">
                            <span class="text-emerald-400/80 text-xs font-bold">2018 - 2022</span>
                            <h4 class="text-white font-bold mt-1">Kepala Dinas PUPR</h4>
                            <p class="text-white/60 text-sm mt-1">Kabupaten Mahakam Ulu</p>
                        </div>
                    </div>
                    
                    <!-- Item 3 -->
                    <div class="relative flex items-start gap-6 md:gap-0">
                        <div class="absolute left-4 md:left-1/2 w-3 h-3 bg-emerald-500/40 rounded-full transform md:-translate-x-1/2 mt-1.5 ring-4 ring-slate-900"></div>
                        <div class="ml-12 md:ml-0 md:w-1/2 md:pr-12 md:text-right">
                            <span class="text-emerald-400/60 text-xs font-bold">2014 - 2018</span>
                            <h4 class="text-white font-bold mt-1">Sekretaris Dinas PUPR</h4>
                            <p class="text-white/60 text-sm mt-1">Kabupaten Mahakam Ulu</p>
                        </div>
                    </div>
                    
                    <!-- Item 4 -->
                    <div class="relative flex items-start gap-6 md:gap-0">
                        <div class="absolute left-4 md:left-1/2 w-3 h-3 bg-emerald-500/20 rounded-full transform md:-translate-x-1/2 mt-1.5 ring-4 ring-slate-900"></div>
                        <div class="ml-12 md:ml-auto md:w-1/2 md:pl-12">
                            <span class="text-emerald-400/40 text-xs font-bold">2010 - 2014</span>
                            <h4 class="text-white font-bold mt-1">Kabid Bina Marga</h4>
                            <p class="text-white/60 text-sm mt-1">Dinas PU Kabupaten Kutai Barat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    .font-inter { font-family: 'Inter', sans-serif; }
    
    html, body {
        overflow-y: auto !important;
        height: auto !important;
        position: static !important;
        background-color: #020617;
    }
</style>
@endsection
