@extends('layouts.app')

@section('title', 'Daftar Dokumen - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-16">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                Bank Data & Dokumentasi
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                Daftar <span class="text-emerald-400">Dokumen</span>
            </h2>
            <p class="text-white/60 mt-4 max-w-lg mx-auto">Semua file PDF yang tersedia di folder peraturan</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-5xl mx-auto">
            
            <!-- Stats Card -->
            <div class="bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl p-6 mb-8 text-white">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-white/80 text-sm font-medium">Total Dokumen</p>
                            <p class="text-3xl font-black">{{ count($documents) }} File</p>
                        </div>
                    </div>
                    <a href="{{ route('home') }}" class="px-6 py-3 bg-white/20 hover:bg-white/30 rounded-xl font-bold text-sm uppercase tracking-wider transition-all">
                        ← Kembali
                    </a>
                </div>
            </div>

            <!-- Document List -->
            <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 p-6 md:p-10">
                
                @if(count($documents) > 0)
                    <!-- Table Header -->
                    <div class="hidden md:grid grid-cols-12 gap-4 px-4 py-3 bg-slate-50 rounded-xl mb-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                        <div class="col-span-1 text-center">No</div>
                        <div class="col-span-5">Nama Dokumen</div>
                        <div class="col-span-2 text-center">Ukuran</div>
                        <div class="col-span-2 text-center">Terakhir Diubah</div>
                        <div class="col-span-2 text-center">Aksi</div>
                    </div>

                    <!-- Document Items -->
                    <div class="space-y-3">
                        @foreach($documents as $doc)
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center p-4 bg-gray-50 hover:bg-emerald-50 rounded-2xl transition-all border border-transparent hover:border-emerald-200 group">
                            <!-- No -->
                            <div class="hidden md:flex col-span-1 justify-center">
                                <span class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600 font-bold text-sm">{{ $doc['no'] }}</span>
                            </div>
                            
                            <!-- Name -->
                            <div class="col-span-5 flex items-center gap-3">
                                <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z M6,20V4h7v5h5v11H6z M11.5,18 c-0.4,0-0.8-0.1-1.1-0.3l0.9-0.9c0.3,0.2,0.6,0.3,1,0.3c0.5,0,0.9-0.2,0.9-0.6c0-0.3-0.2-0.5-0.8-0.7l-0.5-0.2 c-1-0.4-1.5-0.9-1.5-1.7c0-1,0.8-1.7,2-1.7c0.6,0,1.1,0.2,1.4,0.4l-0.7,0.9c-0.3-0.2-0.6-0.3-0.9-0.3c-0.4,0-0.7,0.2-0.7,0.5 c0,0.3,0.2,0.5,0.7,0.7l0.5,0.2c1.1,0.4,1.6,1,1.6,1.8C13.7,17.3,12.8,18,11.5,18z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="font-bold text-slate-800 truncate">{{ $doc['name'] }}</p>
                                    <p class="text-xs text-slate-400">{{ $doc['filename'] }}</p>
                                </div>
                            </div>
                            
                            <!-- Size -->
                            <div class="hidden md:block col-span-2 text-center">
                                <span class="text-sm font-medium text-slate-600">{{ $doc['size'] }}</span>
                            </div>
                            
                            <!-- Modified Date -->
                            <div class="hidden md:block col-span-2 text-center">
                                <span class="text-xs text-slate-500">{{ $doc['modified'] }}</span>
                            </div>
                            
                            <!-- Actions -->
                            <div class="col-span-2 flex items-center justify-center gap-2">
                                <button onclick="openPdfModal('{{ $doc['file_url'] }}')" class="w-10 h-10 bg-emerald-500 hover:bg-emerald-600 rounded-xl flex items-center justify-center text-white transition-colors" title="Lihat">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <a href="{{ $doc['file_url'] }}" download class="w-10 h-10 bg-slate-200 hover:bg-slate-300 rounded-xl flex items-center justify-center text-slate-600 transition-colors" title="Download">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </a>
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
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Belum Ada Dokumen</h3>
                        <p class="text-slate-500 mb-6">Upload file PDF ke folder <code class="bg-slate-100 px-2 py-1 rounded">public/documents/peraturan/</code></p>
                    </div>
                @endif

            </div>

            <!-- Info Box -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-2xl p-5">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-blue-800 mb-1">Cara Menambah Dokumen</p>
                        <p class="text-sm text-blue-700">Upload file PDF ke folder <code class="bg-blue-100 px-1.5 py-0.5 rounded text-xs">public/documents/peraturan/</code> melalui file manager atau FTP. Halaman ini akan otomatis menampilkan file yang baru ditambahkan.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- PDF Modal -->
@include('components.pdf-modal')

@endsection
