@extends('layouts.app')

@section('title', 'Berita - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section with Background -->
<!-- Hero Section -->
<section class="relative h-[300px] md:h-[400px] overflow-hidden">
    <!-- Image -->
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none opacity-100" 
         alt="Background">
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
    
    <!-- Content - Centered -->
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-20">
        <div class="relative z-10 reveal active">
            <span class="inline-block px-4 py-1.5 bg-emerald-500/20 backdrop-blur-md border border-emerald-400/30 text-emerald-300 text-[10px] md:text-xs font-black rounded-full mb-4 md:mb-6 tracking-[0.3em] uppercase shadow-lg">
                Info & Berita
            </span>
            <h2 class="text-2xl md:text-4xl lg:text-6xl font-black text-white px-2 drop-shadow-[0_10px_10px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-none">
                Indeks <span class="text-emerald-400">Berita</span>
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-slate-50 py-10 md:py-16 lg:py-24">
    <div class="container mx-auto px-4 md:px-6 relative z-10">
        
        <!-- Search Bar -->
        <div class="mb-8 md:mb-12 relative z-50">
            <div class="max-w-2xl mx-auto">
                <div class="relative group">
                    <input type="text" 
                           id="searchInput" 
                           placeholder="Cari berita atau pilih kategori..." 
                           autocomplete="off"
                           class="w-full px-5 md:px-6 py-3.5 md:py-4 pl-12 md:pl-14 pr-12 bg-white rounded-xl md:rounded-2xl text-slate-700 text-sm md:text-base font-medium border-2 border-slate-100 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all shadow-lg outline-none"
                    >
                    <svg class="absolute left-4 md:left-5 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <button id="clearSearch" class="absolute right-4 top-1/2 -translate-y-1/2 w-6 h-6 bg-slate-100 rounded-full hidden items-center justify-center hover:bg-slate-200 transition-colors">
                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <!-- Category Suggestions -->
                    <div id="categorySuggestions" class="absolute top-full left-0 right-0 mt-3 bg-white rounded-2xl shadow-xl border border-slate-100 p-4 hidden transform transition-all duration-200 origin-top">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3 px-2">Kategori Berita</p>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            <button onclick="selectCategory('Berita Utama')" class="flex items-center gap-2 p-2 rounded-lg hover:bg-emerald-50 text-left group/btn transition-colors">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 group-hover/btn:scale-125 transition-transform"></span>
                                <span class="text-xs md:text-sm font-medium text-slate-600 group-hover/btn:text-emerald-700">Berita Utama</span>
                            </button>
                            <button onclick="selectCategory('Hukum & Peraturan')" class="flex items-center gap-2 p-2 rounded-lg hover:bg-emerald-50 text-left group/btn transition-colors">
                                <span class="w-2 h-2 rounded-full bg-blue-500 group-hover/btn:scale-125 transition-transform"></span>
                                <span class="text-xs md:text-sm font-medium text-slate-600 group-hover/btn:text-emerald-700">Hukum & Peraturan</span>
                            </button>
                            <button onclick="selectCategory('Pengawasan')" class="flex items-center gap-2 p-2 rounded-lg hover:bg-emerald-50 text-left group/btn transition-colors">
                                <span class="w-2 h-2 rounded-full bg-amber-500 group-hover/btn:scale-125 transition-transform"></span>
                                <span class="text-xs md:text-sm font-medium text-slate-600 group-hover/btn:text-emerald-700">Pengawasan</span>
                            </button>
                            <button onclick="selectCategory('Pengumuman')" class="flex items-center gap-2 p-2 rounded-lg hover:bg-emerald-50 text-left group/btn transition-colors">
                                <span class="w-2 h-2 rounded-full bg-red-500 group-hover/btn:scale-125 transition-transform"></span>
                                <span class="text-xs md:text-sm font-medium text-slate-600 group-hover/btn:text-emerald-700">Pengumuman</span>
                            </button>
                            <button onclick="selectCategory('Berita Umum')" class="flex items-center gap-2 p-2 rounded-lg hover:bg-emerald-50 text-left group/btn transition-colors">
                                <span class="w-2 h-2 rounded-full bg-purple-500 group-hover/btn:scale-125 transition-transform"></span>
                                <span class="text-xs md:text-sm font-medium text-slate-600 group-hover/btn:text-emerald-700">Berita Umum</span>
                            </button>
                            <button onclick="selectCategory('Kegiatan')" class="flex items-center gap-2 p-2 rounded-lg hover:bg-emerald-50 text-left group/btn transition-colors">
                                <span class="w-2 h-2 rounded-full bg-teal-500 group-hover/btn:scale-125 transition-transform"></span>
                                <span class="text-xs md:text-sm font-medium text-slate-600 group-hover/btn:text-emerald-700">Kegiatan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex flex-col lg:flex-row gap-8 md:gap-12">
            
            <!-- Main Content (News Grid) -->
            <div class="lg:w-2/3">
                <div id="newsContainer" class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                    @foreach($posts as $post)
                    <article class="news-card group bg-white rounded-2xl border border-gray-100 shadow-md overflow-hidden hover:shadow-xl hover:border-emerald-100 hover:-translate-y-1 transition-all duration-300 flex flex-col h-full" data-title="{{ strtolower($post['title']) }}" data-category="{{ strtolower($post['category'] ?? 'berita') }}">
                        <a href="{{ route('berita.show', Str::slug($post['title'])) }}" class="flex flex-col h-full cursor-pointer">
                            <!-- Image Container -->
                            <div class="relative h-48 md:h-56 overflow-hidden">
                                <img src="{{ Str::startsWith($post['image'], 'http') ? $post['image'] : asset('storage/' . $post['image']) }}" 
                                     alt="{{ $post['title'] }}" 
                                     onerror="this.onerror=null; this.src='{{ asset('images/background.jpg') }}';"
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                
                                <!-- Category Badge -->
                                <div class="absolute top-3 md:top-4 left-3 md:left-4">
                                    <span class="px-2 md:px-3 py-1 bg-white/90 backdrop-blur-sm text-emerald-600 text-[9px] md:text-[10px] font-black uppercase tracking-wider rounded-full shadow-sm">
                                        {{ $post['category'] ?? 'Berita' }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-4 md:p-6 flex-1 flex flex-col">
                                <div class="flex items-center gap-3 md:gap-4 text-[10px] md:text-xs text-slate-400 mb-3 md:mb-4">
                                    <div class="flex items-center gap-1 md:gap-1.5">
                                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        {{ $post['date'] }}
                                    </div>
                                    <div class="flex items-center gap-1 md:gap-1.5">
                                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                        {{ $post['category'] ?? 'Berita' }}
                                    </div>
                                </div>
                                
                                <h3 class="text-base md:text-xl font-bold text-slate-800 mb-2 md:mb-3 leading-tight group-hover:text-emerald-600 transition-colors line-clamp-2">
                                    {{ $post['title'] }}
                                </h3>
                                
                                <p class="text-slate-500 text-xs md:text-sm leading-relaxed mb-4 md:mb-6 line-clamp-2 md:line-clamp-3">
                                    {{ Str::limit($post['excerpt'] ?? strip_tags($post['content'] ?? ''), 120, '...') }}
                                </p>
                                
                                <div class="mt-auto pt-4 md:pt-6 border-t border-gray-50 flex items-center justify-between">
                                    <span class="inline-flex items-center gap-2 text-xs md:text-sm font-bold text-emerald-600 group-hover:gap-3 transition-all">
                                        Baca Selengkapnya
                                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </article>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="flex items-center justify-center gap-2 mt-12 hidden" id="pagination">
                    <button onclick="changePage('prev')" id="prevBtn" class="w-10 h-10 rounded-xl bg-white border border-gray-200 text-gray-400 hover:bg-emerald-50 hover:border-emerald-300 hover:text-emerald-600 transition-all flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    
                    <div class="flex items-center gap-1" id="pageNumbers">
                        <!-- Page numbers will be generated by JavaScript -->
                    </div>
                    
                    <button onclick="changePage('next')" id="nextBtn" class="w-10 h-10 rounded-xl bg-white border border-gray-200 text-gray-400 hover:bg-emerald-50 hover:border-emerald-300 hover:text-emerald-600 transition-all flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Page Info -->
                <p class="text-center text-sm text-gray-400 mt-4 hidden" id="pageInfo">
                    Menampilkan <span id="showingFrom">0</span>-<span id="showingTo">0</span> dari <span id="totalItems">0</span> berita
                </p>
                <!-- No Results Message -->
                <div id="noResults" class="hidden text-center py-16">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-700 mb-2">Berita Tidak Ditemukan</h3>
                    <p class="text-slate-500 text-sm">Coba gunakan kata kunci lain untuk mencari berita.</p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3 space-y-6 md:space-y-8">
                <!-- E-Pengaduan Widget -->
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl md:rounded-[2rem] shadow-xl p-6 md:p-8 text-center text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/20 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-teal-500/20 rounded-full blur-3xl"></div>
                    
                    <h3 class="text-lg md:text-xl font-black mb-2 relative z-10">Punya Informasi Penting?</h3>
                    <p class="text-slate-300 text-xs md:text-sm mb-4 md:mb-6 relative z-10">Laporkan dugaan pelanggaran atau sampaikan aspirasi Anda melalui E-Pengaduan.</p>
                    <a href="{{ route('layanan.pengaduan') }}" class="inline-flex items-center gap-2 px-5 md:px-6 py-2.5 md:py-3 bg-emerald-500 hover:bg-emerald-400 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-emerald-500/30 relative z-10">
                        Buat Laporan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <!-- Popular News -->
                <div class="bg-white rounded-2xl md:rounded-[2rem] shadow-xl p-5 md:p-6 border border-slate-100">
                    <h3 class="text-base md:text-lg font-black text-slate-800 mb-4 md:mb-6 uppercase tracking-wider flex items-center gap-2">
                        <span class="w-1 h-5 md:h-6 bg-emerald-500 rounded-full"></span>
                        Berita Populer
                    </h3>
                    <div class="space-y-3 md:space-y-4">
                        @foreach(collect($posts)->take(5) as $item)
                         <x-news-sidebar-item 
                            :image="$item['image']"
                            :title="$item['title']"
                            :date="$item['date']"
                            :category="$item['category']"
                        />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@push('scripts')
<script src="{{ asset('js/berita-search.js') }}"></script>
@endpush
@endsection

