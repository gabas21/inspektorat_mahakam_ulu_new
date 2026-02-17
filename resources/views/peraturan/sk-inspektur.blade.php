@extends('layouts.app')

@section('title', $title . ' - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section with Background -->
@if(request()->has('q'))
<!-- Debug: Search query received: {{ request('q') }} -->
@endif
<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-16">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                Bank Data & Regulasi
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                {{ $title }}
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-12 lg:py-16 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-6xl mx-auto">
            
            <!-- Search Bar Section -->
            <div class="mb-10 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-1.5 h-8 bg-emerald-500 rounded-full"></div>
                    <h3 class="font-black text-slate-800 text-lg uppercase tracking-tight">Cari Regulasi</h3>
                </div>
                <div class="relative w-full md:w-96 group z-30">
                    <input type="text" id="searchInput" placeholder="Cari nomor/judul..." 
                           class="w-full pl-14 pr-12 py-4 bg-white border border-gray-200 rounded-[1.5rem] text-sm font-bold text-slate-700 shadow-sm focus:outline-none focus:border-emerald-400 focus:ring-4 focus:ring-emerald-500/10 transition-all placeholder:text-slate-400 placeholder:font-medium">
                    <div class="absolute top-1/2 left-5 transform -translate-y-1/2 flex items-center text-slate-400 group-focus-within:text-emerald-500 transition-colors pointer-events-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <a href="#" id="clearSearch" class="hidden absolute top-1/2 right-4 transform -translate-y-1/2 p-1 bg-slate-100 rounded-full text-slate-400 hover:bg-slate-200 hover:text-slate-600 transition-colors" title="Hapus pencarian">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                </div>
            </div>

            <!-- Document List (Redesigned from Table) -->
            <div id="documentContainer" class="space-y-6">
                @foreach($items as $item)
                <div class="document-card relative bg-white rounded-[2rem] shadow-[0_15px_40px_-12px_rgba(0,0,0,0.06)] border border-gray-100 overflow-hidden group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
                    <!-- National Identity Strip -->
                    <div class="absolute left-0 top-0 bottom-0 w-2 flex flex-col">
                        <div class="h-1/2 bg-[#FF0000]"></div>
                        <div class="h-1/2 bg-white border-r border-gray-100"></div>
                    </div>

                    <div class="flex flex-col lg:flex-row p-6 md:p-8 ml-2 gap-6 lg:gap-10 items-center">
                        <!-- Left: Document Icon & Number -->
                        <div class="relative flex-shrink-0">
                            <div class="w-16 h-20 md:w-20 md:h-24 bg-slate-50 border-2 border-slate-100 rounded-xl flex items-center justify-center relative shadow-inner group-hover:bg-emerald-50 group-hover:border-emerald-100 transition-colors duration-500">
                                <svg class="w-8 h-8 md:w-10 md:h-10 text-slate-300 group-hover:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <div class="absolute -top-3 -right-3 w-8 h-8 bg-slate-900 text-white text-[10px] font-black rounded-full flex items-center justify-center border-4 border-white shadow-lg">
                                    {{ $item['no'] }}
                                </div>
                            </div>
                        </div>

                        <!-- Middle: Title and Info -->
                        <div class="flex-grow text-center lg:text-left title-container">
                            <div class="flex flex-wrap justify-center lg:justify-start gap-3 mb-3">
                                <span class="px-3 py-1 bg-slate-100 text-slate-600 text-[9px] font-black uppercase tracking-widest rounded-full">Regulasi Negara</span>
                                <span class="px-3 py-1 bg-emerald-100 text-emerald-700 text-[9px] font-black uppercase tracking-widest rounded-full">Edisi Digital</span>
                            </div>
                            <h3 class="document-title text-lg md:text-xl font-black text-slate-900 font-montserrat leading-tight mb-4 group-hover:text-emerald-700 transition-colors">
                                {{ $item['name'] }}
                            </h3>
                            
                            <!-- Stats Badges -->
                            <div class="flex flex-wrap justify-center lg:justify-start gap-6">
                                <div class="flex items-center gap-2 text-slate-400">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <span class="text-[11px] font-bold uppercase tracking-wider">{{ number_format($item['views']) }} Dilihat</span>
                                </div>
                                <div class="flex items-center gap-2 text-slate-400">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    <span class="text-[11px] font-bold uppercase tracking-wider">{{ number_format($item['downloads']) }} Diunduh</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Actions -->
                        <div class="flex flex-row lg:flex-col gap-3 flex-shrink-0 w-full lg:w-40 pt-4 lg:pt-0 border-t lg:border-t-0 lg:border-l border-gray-100 lg:pl-10">
                            <a href="{{ $item['file_url'] ?? '#' }}" download target="_blank" class="flex-1 lg:flex-none inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-emerald-600 text-white text-[11px] font-black uppercase tracking-widest rounded-2xl hover:bg-emerald-700 hover:shadow-xl hover:shadow-emerald-500/25 transition-all transform hover:-translate-y-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Unduh
                            </a>
                            <button type="button" onclick="openPdfModal('{{ $item['file_url'] ?? '#' }}')" class="flex-1 lg:flex-none inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-slate-50 text-slate-600 text-[11px] font-black uppercase tracking-widest rounded-2xl border border-slate-200 hover:bg-white hover:text-emerald-600 hover:border-emerald-500 hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                                Lihat
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- No Results State (Hidden by default) -->
                <div id="noResults" class="hidden bg-white rounded-[2rem] p-20 text-center border border-dashed border-gray-200 group">
                    <div class="w-24 h-24 bg-gray-50 rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-12 h-12 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-800 mb-2 font-montserrat uppercase tracking-tight">Tidak Ditemukan</h4>
                    <p class="text-slate-400 text-sm font-medium tracking-wide">Pencarian Anda tidak membuahkan hasil.</p>
                </div>

                @if(count($items) === 0)
                <div id="noData" class="bg-white rounded-[2rem] p-20 text-center border border-dashed border-gray-200 group">
                    <div class="w-24 h-24 bg-gray-50 rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-12 h-12 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-800 mb-2 font-montserrat uppercase tracking-tight">Belum Ada Data</h4>
                    <p class="text-slate-400 text-sm font-medium tracking-wide">Silakan periksa kembali nanti untuk pembaruan data {{ $title }}.</p>
                </div>
                @endif
            </div>

            <!-- Pagination Controls -->
            <div id="paginationContainer" class="flex justify-center items-center gap-4 mt-10 hidden">
                <button id="prevBtn" class="px-5 py-2.5 bg-white border border-gray-200 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider hover:bg-emerald-50 hover:text-emerald-600 hover:border-emerald-200 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                    Sebelumnya
                </button>
                <span id="pageIndicator" class="text-slate-500 text-xs font-bold uppercase tracking-widest">Halaman 1 dari 1</span>
                <button id="nextBtn" class="px-5 py-2.5 bg-white border border-gray-200 rounded-xl text-slate-600 font-bold text-xs uppercase tracking-wider hover:bg-emerald-50 hover:text-emerald-600 hover:border-emerald-200 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                    Selanjutnya
                </button>
            </div>
            
        </div>
    </div>
</section>



@push('scripts')
<script src="{{ asset('js/peraturan-search.js') }}"></script>
@endpush
@endsection
