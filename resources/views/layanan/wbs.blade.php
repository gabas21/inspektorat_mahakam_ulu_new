@extends('layouts.app')

@section('title', 'Whistle Blowing System - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-16">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                Layanan Pengaduan
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                Whistle Blowing <span class="text-emerald-400">System</span>
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto">
            
            <!-- Intro Card -->
            <div class="bg-white rounded-[2.5rem] shadow-xl border border-gray-100 p-8 md:p-12 mb-12 reveal">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="w-full md:w-1/3">
                        <div class="aspect-square bg-emerald-50 rounded-3xl flex items-center justify-center relative overflow-hidden">
                            <svg class="w-24 h-24 text-emerald-600 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-100/50 to-transparent"></div>
                        </div>
                    </div>
                    <div class="w-full md:w-2/3">
                        <h3 class="text-2xl font-black text-slate-900 font-montserrat uppercase mb-4">Apa itu WBS?</h3>
                        <p class="text-slate-600 leading-relaxed mb-6 font-medium">
                            Whistle Blowing System (WBS) adalah mekanisme penyampaian pengaduan dugaan tindak pidana korupsi yang telah terjadi, sedang terjadi, atau akan terjadi yang melibatkan pegawai dan orang lain yang berkaitan dengan dugaan tindak pidana korupsi yang dilakukan di lingkungan Pemerintah Kabupaten Mahakam Ulu.
                        </p>
                        <div class="flex gap-4">
                            <a href="{{ route('layanan.pengaduan') }}" class="px-6 py-3 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 transition-colors shadow-lg shadow-emerald-500/30">
                                Buat Pengaduan
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Elements of WBS -->
            <div class="grid md:grid-cols-2 gap-6 mb-16 reveal">
                <div class="bg-slate-50 p-8 rounded-[2rem] border border-slate-100 hover:bg-white hover:shadow-lg hover:border-emerald-100 transition-all duration-300 group">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-md flex items-center justify-center mb-4 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h4 class="text-lg font-black text-slate-900 uppercase mb-2">Kerahasiaan Terjamin</h4>
                    <p class="text-slate-500 text-sm font-medium">Inspektorat menjamin kerahasiaan identitas pelapor dan isi laporan yang disampaikan.</p>
                </div>
                <div class="bg-slate-50 p-8 rounded-[2rem] border border-slate-100 hover:bg-white hover:shadow-lg hover:border-emerald-100 transition-all duration-300 group">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-md flex items-center justify-center mb-4 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-lg font-black text-slate-900 uppercase mb-2">Tindak Lanjut Pasti</h4>
                    <p class="text-slate-500 text-sm font-medium">Setiap laporan yang memenuhi syarat formil dan materiil akan ditindaklanjuti sesuai prosedur.</p>
                </div>
            </div>

            <!-- FAQ Accordion -->
            <div class="reveal">
                <h3 class="text-2xl font-black text-slate-900 font-montserrat uppercase mb-8 text-center">Pertanyaan Umum</h3>
                <div class="space-y-4">
                    @foreach([
                        'Apa saja yang bisa dilaporkan?' => 'Indikasi tindak pidana korupsi, pungutan liar, penyalahgunaan wewenang, dan pelanggaran disiplin pegawai.',
                        'Bagaimana cara melapor?' => 'Anda dapat mengisi formulir pengaduan secara online melalui tombol "Buat Pengaduan" atau datang langsung ke kantor Inspektorat.',
                        'Apakah saya perlu menyertakan bukti?' => 'Ya, laporan harus disertai dengan bukti permulaan yang cukup (data, dokumen, gambar, atau rekaman) yang mendukung laporan tersebut.'
                    ] as $q => $a)
                    <div x-data="{ open: false }" class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                        <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-slate-50 transition-colors">
                            <span class="font-bold text-slate-800">{{ $q }}</span>
                            <svg class="w-5 h-5 text-emerald-500 transform transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="px-6 py-4 bg-slate-50 border-t border-gray-100 text-slate-600 text-sm leading-relaxed" style="display: none;">
                            {{ $a }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>



@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
@endsection
