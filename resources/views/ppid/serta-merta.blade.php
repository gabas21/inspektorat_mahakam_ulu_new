@extends('layouts.app')

@section('title', 'Informasi Serta Merta - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-16">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                Klasifikasi Informasi
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                Informasi <span class="text-emerald-400">Serta Merta</span>
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-12 lg:py-16 overflow-hidden min-h-screen">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-5xl mx-auto space-y-4" x-data="{ active: null }">
            
            <div class="mb-8 text-center max-w-2xl mx-auto">
                <p class="text-slate-600 text-sm leading-relaxed">
                    Informasi yang berkaitan dengan hajat hidup orang banyak dan ketertiban umum dan wajib diumumkan secara serta merta tanpa penundaan.
                </p>
            </div>

            @foreach($groupedItems as $category => $items)
            <!-- Accordion Item -->
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-lg hover:border-emerald-100 px-1"
                 x-data="paginatedTable({{ Js::from($items) }})">
                
                <!-- Accordion Header -->
                <button @click="active === '{{ $loop->index }}' ? active = null : (active = '{{ $loop->index }}', setTimeout(() => scrollToItem($el.closest('div[x-data]')), 400))"
                        class="w-full flex items-center justify-between p-6 text-left focus:outline-none bg-white group">
                    <span class="text-base md:text-lg font-bold text-slate-800 group-hover:text-emerald-700 transition-colors font-montserrat">
                        {{ $category }}
                    </span>
                    <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center transition-all duration-300 group-hover:bg-emerald-50"
                         :class="{ 'rotate-180 bg-emerald-100 text-emerald-600': active === '{{ $loop->index }}', 'text-slate-400': active !== '{{ $loop->index }}' }">
                        <svg class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </button>

                <!-- Accordion Content -->
                <div x-show="active === '{{ $loop->index }}'" 
                     x-collapse
                     x-cloak
                     class="border-t border-dashed border-gray-100 bg-slate-50/30">
                    
                    <div class="p-6">
                        <!-- Local Search & Info -->
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                            <div class="text-xs text-slate-500 font-medium">
                                Menampilkan <span x-text="paginatedItems.length"></span> dari <span x-text="filteredItems.length"></span> dokumen
                            </div>
                            <div class="relative max-w-xs w-full">
                                <div class="absolute top-1/2 left-3 -translate-y-1/2 pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input x-model="search" 
                                       @input="currentPage = 1"
                                       type="text" 
                                       class="block w-full pl-12 pr-3 py-2 border border-gray-100 rounded-xl leading-5 bg-white placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 text-sm transition-shadow" 
                                       placeholder="Cari dokumen...">
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="bg-slate-900 text-white text-[11px] uppercase tracking-wider">
                                            <th class="py-3 px-4 font-bold w-16 text-center">No</th>
                                            <th class="py-3 px-4 font-bold">Nama Dokumen</th>
                                            <th class="py-3 px-4 font-bold w-32 text-center">Dilihat</th>
                                            <th class="py-3 px-4 font-bold w-32 text-center">Didownload</th>
                                            <th class="py-3 px-4 font-bold w-24 text-center">Aksi</th>
                                            <th class="py-3 px-4 font-bold w-32 text-center">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100/50">
                                        <template x-for="(item, index) in paginatedItems" :key="index">
                                            <tr class="hover:bg-slate-50 transition-colors">
                                                <td class="py-3 px-4 text-sm text-slate-500 text-center font-bold" x-text="item.no"></td>
                                                <td class="py-3 px-4">
                                                    <p class="text-sm font-bold text-slate-700" x-text="item.name"></p>
                                                </td>
                                                <td class="py-3 px-4 text-center text-sm text-slate-500" x-text="item.views.toLocaleString()"></td>
                                                <td class="py-3 px-4 text-center text-sm text-slate-500" x-text="item.downloads.toLocaleString()"></td>
                                                <td class="py-3 px-4 text-center">
                                                    <button type="button" @click="openPdfModal(item.file_url || '#')" 
                                                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-emerald-50 text-emerald-500 hover:bg-emerald-100 transition-colors">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                                <td class="py-3 px-4 text-center">
                                                    <a :href="item.file_url || '#'" download target="_blank" 
                                                       class="inline-flex items-center gap-2 px-3 py-1.5 bg-emerald-500 text-white text-[10px] font-bold uppercase tracking-wider rounded-full hover:bg-emerald-600 transition-colors shadow-sm hover:shadow-emerald-500/30">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                        </svg>
                                                        Unduh
                                                    </a>
                                                </td>
                                            </tr>
                                        </template>
                                        <template x-if="paginatedItems.length === 0">
                                            <tr>
                                                <td colspan="6" class="py-8 text-center text-slate-400 italic text-sm">
                                                    Tidak ada dokumen yang ditemukan.
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Pagination Controls -->
                        <div class="mt-4 flex items-center justify-between" x-show="totalPages > 1">
                            <button @click="prevPage" 
                                    :disabled="currentPage === 1"
                                    class="px-3 py-1 bg-white border border-gray-200 rounded-lg text-xs font-semibold text-slate-600 hover:bg-slate-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                                Previous
                            </button>
                            
                            <span class="text-xs text-slate-500">
                                Halaman <span x-text="currentPage" class="font-bold text-slate-800"></span> dari <span x-text="totalPages" class="font-bold text-slate-800"></span>
                            </span>
                            
                            <button @click="nextPage" 
                                    :disabled="currentPage === totalPages"
                                    class="px-3 py-1 bg-white border border-gray-200 rounded-lg text-xs font-semibold text-slate-600 hover:bg-slate-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                                Next
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@push('scripts')


<style>
    [x-cloak] { display: none !important; }
</style>
@endpush
@endsection
