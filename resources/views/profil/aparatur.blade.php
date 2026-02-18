@extends('layouts.app')

@section('title', 'Aparatur - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Aparatur Page - Real Organizational Chart (Standard Web Scale) -->
<section class="relative min-h-screen font-inter text-white pb-24 overflow-x-hidden flex flex-col items-center">
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

    <div class="container mx-auto px-4 relative z-10 pt-40 flex flex-col items-center">
        
        <!-- Page Title -->
        <div class="text-center mb-16 reveal">
            <span class="inline-block px-5 py-2 bg-emerald-500/20 backdrop-blur-md border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-6 tracking-[0.3em] uppercase shadow-lg shadow-emerald-500/10">
                Profil Inspektorat
            </span>
            <h2 class="text-4xl md:text-6xl font-black text-white px-2 font-montserrat uppercase tracking-tight leading-[1.1] mb-4">
                Data <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">Aparatur</span>
            </h2>
            <p class="text-white/60 text-sm md:text-base font-inter max-w-xl mx-auto">
                Sumber Daya Manusia yang Profesional dan Berintegritas
            </p>
        </div>

@php
    $pejabat = [
        ['name' => 'Rini Sari Dewi, SE', 'jabatan' => 'Sekretaris', 'pangkat' => 'Pembina', 'golongan' => 'IV/a'],
        ['name' => 'Budi Santoso, S.Sos', 'jabatan' => 'Irban Wilayah I', 'pangkat' => 'Pembina', 'golongan' => 'IV/a'],
        ['name' => 'Dr. Ahmad Fauzi', 'jabatan' => 'Irban Wilayah II', 'pangkat' => 'Pembina', 'golongan' => 'IV/a'],
        ['name' => 'Siti Aminah, M.Ak', 'jabatan' => 'Irban Wilayah III', 'pangkat' => 'Pembina', 'golongan' => 'IV/a'],
        ['name' => 'H. Muhammad Yusuf', 'jabatan' => 'Auditor Muda', 'pangkat' => 'Penata Tk.I', 'golongan' => 'III/d'],
        ['name' => 'Dewi Lestari, SE', 'jabatan' => 'Auditor Pratama', 'pangkat' => 'Penata', 'golongan' => 'III/c'],
        ['name' => 'Andi Wijaya, ST', 'jabatan' => 'P2UPD Muda', 'pangkat' => 'Penata Tk.I', 'golongan' => 'III/d'],
        ['name' => 'Siska Amelia, MH', 'jabatan' => 'Analis Hukum', 'pangkat' => 'Penata', 'golongan' => 'III/c'],
        ['name' => 'Rudy Hartono, SE', 'jabatan' => 'Kasubag Umum', 'pangkat' => 'Penata', 'golongan' => 'III/c'],
        ['name' => 'Linda Permata, S.Ak', 'jabatan' => 'Bendahara', 'pangkat' => 'Penata Muda Tk.I', 'golongan' => 'III/b'],
        ['name' => 'Ferry Irawan, S.Kom', 'jabatan' => 'Pranata Komputer', 'pangkat' => 'Penata Muda', 'golongan' => 'III/a'],
        ['name' => 'Maya Indah, SE', 'jabatan' => 'Pengelola Gaji', 'pangkat' => 'Pengatur Tk.I', 'golongan' => 'II/d'],
        ['name' => 'Hendra Kurniawan', 'jabatan' => 'Staf Administrasi', 'pangkat' => 'Pengatur', 'golongan' => 'II/c'],
        ['name' => 'Anita Safitri', 'jabatan' => 'Staf Kepegawaian', 'pangkat' => 'Pengatur', 'golongan' => 'II/c'],
        ['name' => 'Bambang Sudarsono', 'jabatan' => 'Staf Operasional', 'pangkat' => 'Pengatur Muda', 'golongan' => 'II/a'],
        ['name' => 'Rina Marlina', 'jabatan' => 'Staf Umum', 'pangkat' => 'Pengatur Muda', 'golongan' => 'II/a']
    ];
@endphp
        </div>

        <!-- THE CHART AREA (Version 3.0 - Fail-safe Layout) -->
        <div class="w-full max-w-5xl py-10">
            
            <!-- 1. TOP LEADER -->
            <div class="flex flex-col items-center mb-16 px-4">
                <div class="bg-white/10 backdrop-blur-xl p-3 rounded-[2rem] shadow-2xl border border-white/20 overflow-hidden" 
                     style="width: 280px;">
                    <div class="w-full bg-slate-900 rounded-[1.5rem] overflow-hidden relative">
                        <img src="{{ url('images/kepala%20inspektorat.png') }}" alt="Inspektur" 
                             class="w-full h-52 object-cover object-top">
                        
                        <div class="bg-gradient-to-t from-black via-black/90 to-transparent p-5">
                            <h3 class="text-base font-black uppercase text-white leading-tight text-center mb-1">Margono, S.T., M.Si</h3>
                            <p class="text-xs text-white/60 text-center">NIP: 19680215 198903 1 008</p>
                            <div class="w-12 h-0.5 bg-emerald-500 mx-auto my-3 rounded-full"></div>
                            <p class="text-sm text-emerald-400 font-black tracking-wider uppercase text-center">INSPEKTUR</p>
                            <div class="mt-3 space-y-1 text-center">
                                <p class="text-xs text-white/70"><span class="text-emerald-400/80">Pangkat:</span> Pembina Utama Muda</p>
                                <p class="text-xs text-white/70"><span class="text-emerald-400/80">Golongan:</span> IV/c</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. STAFF GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full max-w-7xl px-4 pb-24">
                @foreach($pejabat as $p)
                <div class="flex justify-center">
                    <div class="bg-white/10 backdrop-blur-xl p-3 rounded-2xl shadow-xl border border-white/20 hover:border-emerald-400/40 transition-all duration-300 overflow-hidden w-full max-w-[260px]">
                        <div class="w-full bg-slate-900 rounded-xl overflow-hidden">
                            <img src="{{ url('images/kepala%20inspektorat.png') }}" 
                                 class="w-full h-40 object-cover object-top" alt="">
                            
                            <div class="bg-gradient-to-t from-black via-black/95 to-black/80 p-4">
                                <h4 class="text-sm font-bold text-white leading-tight text-center mb-1">{{ $p['name'] }}</h4>
                                <div class="w-10 h-0.5 bg-emerald-500/50 mx-auto my-2 rounded-full"></div>
                                <p class="text-sm text-white font-bold uppercase text-center mb-3">{{ $p['jabatan'] }}</p>
                                <div class="space-y-1.5 text-center text-xs">
                                    <p class="text-white"><span class="text-white/70">Pangkat:</span> {{ $p['pangkat'] }}</p>
                                    <p class="text-white"><span class="text-white/70">Golongan:</span> {{ $p['golongan'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>

        <!-- Footer Info -->
        <div class="mt-24 text-center opacity-20">
            <p class="text-[9px] font-black uppercase tracking-[0.4em]">Struktur Organisasi &bull; Inspektorat Kabupaten Mahakam Ulu</p>
        </div>

    </div>
</section>



<style>
    /* Ensure clean rendering of thin lines */
    .font-inter { font-family: 'Inter', sans-serif; }
    
    /* Flowing layout - No more viewport locking */
    html, body {
        overflow-y: auto !important;
        height: auto !important;
        position: static !important;
        background-color: #020617;
    }
</style>
@endsection
