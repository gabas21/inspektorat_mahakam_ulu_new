@extends('layouts.app')

@section('title', 'Daftar Pengaduan - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-16">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                Admin Panel
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                Daftar <span class="text-emerald-400">Pengaduan</span>
            </h2>
            <p class="text-white/60 mt-4 max-w-lg mx-auto">Semua laporan pengaduan yang telah disubmit</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-6xl mx-auto">
            
            <!-- Stats Card -->
            <div class="bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl p-6 mb-8 text-white">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-white/80 text-sm font-medium">Total Pengaduan</p>
                            <p class="text-3xl font-black">{{ count($pengaduans) }} Laporan</p>
                        </div>
                    </div>
                    <a href="{{ route('layanan.cek-pengaduan') }}" class="px-6 py-3 bg-white/20 hover:bg-white/30 rounded-xl font-bold text-sm uppercase tracking-wider transition-all">
                        ← Kembali
                    </a>
                </div>
            </div>

            <!-- Pengaduan List -->
            <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 p-6 md:p-10">
                
                @if(count($pengaduans) > 0)
                    <div class="space-y-4">
                        @foreach($pengaduans as $pengaduan)
                        <div class="bg-gray-50 hover:bg-emerald-50 rounded-2xl p-5 border border-transparent hover:border-emerald-200 transition-all">
                            <div class="flex flex-col lg:flex-row lg:items-center gap-4">
                                <!-- Kode & Status -->
                                <div class="flex items-center gap-4 lg:w-64">
                                    <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-black text-slate-800 font-mono">{{ $pengaduan->kode_laporan }}</p>
                                        <span class="inline-block px-2 py-0.5 text-[10px] font-bold uppercase rounded-full
                                            @if($pengaduan->status == 'pending') bg-yellow-100 text-yellow-700
                                            @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-700
                                            @elseif($pengaduan->status == 'selesai') bg-emerald-100 text-emerald-700
                                            @else bg-red-100 text-red-700 @endif">
                                            {{ ucfirst($pengaduan->status ?? 'pending') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Info -->
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-3 text-sm">
                                    <div>
                                        <p class="text-xs text-slate-400 uppercase tracking-wider mb-0.5">Pelapor</p>
                                        <p class="font-bold text-slate-700">{{ $pengaduan->nama }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-400 uppercase tracking-wider mb-0.5">Kategori</p>
                                        <p class="font-bold text-slate-700 capitalize">{{ $pengaduan->kategori }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-400 uppercase tracking-wider mb-0.5">Tanggal</p>
                                        <p class="font-bold text-slate-700">{{ $pengaduan->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>

                                <!-- Dokumen & Actions -->
                                <div class="flex items-center gap-2">
                                    @if($pengaduan->identitas_path)
                                    <a href="{{ asset('storage/' . $pengaduan->identitas_path) }}" download target="_blank" class="w-10 h-10 bg-blue-100 hover:bg-blue-200 rounded-xl flex items-center justify-center text-blue-600 transition-colors" title="Lihat KTP">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                                    </a>
                                    @endif
                                    
                                    @if($pengaduan->data_pendukung_path)
                                    <a href="{{ asset('storage/' . $pengaduan->data_pendukung_path) }}" download target="_blank" class="w-10 h-10 bg-orange-100 hover:bg-orange-200 rounded-xl flex items-center justify-center text-orange-600 transition-colors" title="Lihat Bukti">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                    </a>
                                    @endif

                                    <a href="{{ route('layanan.cek-pengaduan') }}?kode={{ $pengaduan->kode_laporan }}" class="w-10 h-10 bg-emerald-500 hover:bg-emerald-600 rounded-xl flex items-center justify-center text-white transition-colors" title="Detail">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Topik -->
                            <div class="mt-3 pt-3 border-t border-gray-200">
                                <p class="text-xs text-slate-400 uppercase tracking-wider mb-1">Topik</p>
                                <p class="text-sm text-slate-700">{{ $pengaduan->topik }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Belum Ada Pengaduan</h3>
                        <p class="text-slate-500 mb-6">Belum ada laporan pengaduan yang masuk</p>
                        <a href="{{ route('layanan.pengaduan') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-500 text-white rounded-xl font-bold hover:bg-emerald-600 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Buat Pengaduan Baru
                        </a>
                    </div>
                @endif

            </div>

        </div>
    </div>
</section>

@endsection
