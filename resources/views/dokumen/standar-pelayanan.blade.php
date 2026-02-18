@extends('layouts.app')

@section('title', 'Standar Pelayanan - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section with Background -->
<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-32">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                Bank Data & Dokumentasi
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                {{ $title ?? 'Standar Pelayanan' }}
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-12 lg:py-16 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-6xl mx-auto">
            
            <!-- Table Card with Integrated Search -->
            <div id="table-container" class="bg-white rounded-[2rem] shadow-[0_20px_50px_-12px_rgba(0,0,0,0.08)] border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="px-6 py-6 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-8 bg-emerald-500 rounded-full"></div>
                        <h3 class="font-bold text-slate-800 text-lg uppercase tracking-wide">Daftar Dokumen Standar Pelayanan</h3>
                    </div>
                    <div class="relative w-full md:w-80 group">
                        <input type="text" id="searchInput" placeholder="Cari dokumen..." 
                               class="w-full pl-12 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm font-medium text-slate-600 focus:outline-none focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-500/10 transition-all placeholder:text-slate-400 z-0" style="padding-left: 50px;">
                        <div class="absolute top-1/2 left-3 transform -translate-y-1/2 flex items-center pointer-events-none z-10" style="top: 50%; transform: translateY(-50%); left: 12px;">
                            <svg class="w-4 h-4 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table id="documentTable" class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-900 text-white">
                                <th class="py-3 px-4 font-bold font-montserrat uppercase tracking-wider text-[11px] w-16 text-center">No</th>
                                <th class="py-3 px-4 font-bold font-montserrat uppercase tracking-wider text-[11px] cursor-pointer group hover:bg-slate-800 transition-colors" onclick="sortTable(1)">
                                    <div class="flex items-center justify-between">
                                        Nama Dokumen
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 sort-icon text-slate-400 opacity-50 transition-all group-hover:opacity-100">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="py-3 px-4 font-bold font-montserrat uppercase tracking-wider text-[11px] w-32 text-center cursor-pointer group hover:bg-slate-800 transition-colors" onclick="sortTable(2)">
                                    <div class="flex items-center justify-center gap-2">
                                        Jumlah Lihat
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 sort-icon text-slate-400 opacity-50 transition-all group-hover:opacity-100">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="py-3 px-4 font-bold font-montserrat uppercase tracking-wider text-[11px] w-40 text-center cursor-pointer group hover:bg-slate-800 transition-colors" onclick="sortTable(3)">
                                    <div class="flex items-center justify-center gap-2">
                                        Jumlah Download
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 sort-icon text-slate-400 opacity-50 transition-all group-hover:opacity-100">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </div>
                                </th>
                                <th class="py-3 px-4 font-bold font-montserrat uppercase tracking-wider text-[11px] w-24 text-center">Aksi</th>
                                <th class="py-3 px-4 font-bold font-montserrat uppercase tracking-wider text-[11px] w-32 text-center">Download</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($items as $item)
                            <tr class="bg-white hover:bg-emerald-50/50 transition-colors group">
                                <td class="py-3 px-4 text-sm font-bold text-slate-500 text-center">{{ $item['no'] }}</td>
                                <td class="py-3 px-4">
                                    <p class="text-sm md:text-[14px] font-semibold text-slate-800 leading-relaxed group-hover:text-emerald-700 transition-colors">
                                        {{ $item['name'] }}
                                    </p>
                                </td>
                                <td class="py-3 px-4 text-sm font-medium text-slate-500 text-center">{{ number_format($item['views']) }}</td>
                                <td class="py-3 px-4 text-sm font-medium text-slate-500 text-center">{{ number_format($item['downloads']) }}</td>
                                <td class="py-3 px-4 text-center">
                                    <button type="button" onclick="openPdfModal('{{ $item['file_url'] ?? '#' }}')" title="Lihat Detail" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </button>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <a href="{{ $item['file_url'] ?? '#' }}" download target="_blank" class="inline-flex items-center gap-2 px-3 py-1.5 bg-emerald-600 text-white text-[10px] font-black uppercase tracking-wider rounded-full hover:bg-emerald-700 hover:shadow-lg hover:shadow-emerald-500/25 transition-all transform hover:-translate-y-0.5">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                        Unduh
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            
                            @if(count($items) === 0)
                            <tr>
                                <td colspan="6" class="py-20 text-center bg-white">
                                    <div class="flex flex-col items-center">
                                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-6 animate-pulse">
                                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                        </div>
                                        <p class="text-slate-400 font-bold uppercase tracking-widest text-sm">Belum ada data {{ $title ?? 'Standar Pelayanan' }}</p>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $items->links() }}
                </div>
            </div>
            
        </div>
    </div>
</section>




@include('components.pdf-modal')

@push('scripts')
<script src="{{ asset('js/dokumen-search.js') }}"></script>
<style>
    .sort-icon { display: inline-block; vertical-align: middle; }
    .cursor-pointer { cursor: pointer; }
</style>
@endpush
@endsection
