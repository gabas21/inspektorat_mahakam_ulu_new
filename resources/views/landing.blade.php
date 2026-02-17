@extends('layouts.app')



@section('content')



<!-- Hero Section -->
<section class="relative h-[500px] md:h-[650px] overflow-hidden bg-slate-900">
    <!-- Static Background Image -->
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none opacity-60" alt="Background">
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Content Overlay -->
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-4 md:pt-8">
        <div class="relative z-10 mb-6 md:mb-12 lg:mb-20">

            <h2 class="text-xl sm:text-2xl md:text-4xl lg:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1] max-w-full">
                Membangun Mahakam Ulu <br class="hidden sm:block"> untuk semua <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-emerald-400 to-white">
                    Sejahtera & Berkeadilan
                </span>
            </h2>
        </div>
        
        <!-- Banner Carousel (Swiper) -->
        <div class="relative w-full max-w-6xl mx-auto -mt-4 md:-mt-8 lg:-mt-12 px-2 md:px-0">
             <div class="swiper banner-swiper w-full pt-4 md:pt-6 pb-8 md:pb-12">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide md:aspect-[21/9] rounded-xl md:rounded-2xl overflow-hidden cursor-pointer" onclick="openLightbox('{{ asset('images/slider1.jpg') }}', 'Banner HUT Mahakam Ulu')">
                        <img src="{{ asset('images/slider1.jpg') }}" 
                             alt="Banner HUT Mahakam Ulu" 
                             class="w-full h-auto md:h-full md:object-cover rounded-xl md:rounded-2xl block">
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide md:aspect-[21/9] rounded-xl md:rounded-2xl overflow-hidden cursor-pointer" onclick="openLightbox('{{ asset('images/slider2.png') }}', 'Banner Welcome')">
                        <img src="{{ asset('images/slider2.png') }}" 
                             alt="Banner Welcome" 
                             class="w-full h-auto md:h-full md:object-cover rounded-xl md:rounded-2xl block">
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide md:aspect-[21/9] rounded-xl md:rounded-2xl overflow-hidden cursor-pointer" onclick="openLightbox('{{ asset('images/slider3.png') }}', 'Banner Info APBD')">
                        <img src="{{ asset('images/slider3.png') }}" 
                             alt="Banner Info APBD" 
                             class="w-full h-auto md:h-full md:object-cover rounded-xl md:rounded-2xl block">
                    </div>
                    <!-- Slide 4 (Duplicate for effect) -->
                    <div class="swiper-slide md:aspect-[21/9] rounded-xl md:rounded-2xl overflow-hidden cursor-pointer" onclick="openLightbox('{{ asset('images/say_no_to_gratifikasi.png') }}', 'Banner Pengumuman')">
                        <img src="{{ asset('images/say_no_to_gratifikasi.png') }}" 
                             alt="Banner Pengumuman" 
                             class="w-full h-auto md:h-full md:object-cover rounded-xl md:rounded-2xl block">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

<!-- Image Lightbox Modal -->
<div id="imageLightbox" class="fixed inset-0 z-[200] hidden items-center justify-center p-4 md:p-8" onclick="closeLightbox(event)">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/90 backdrop-blur-sm transition-opacity duration-300"></div>
    
    <!-- Close Button -->
    <button onclick="closeLightbox(event, true)" class="absolute top-4 right-4 md:top-8 md:right-8 z-10 w-12 h-12 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-all duration-300 group">
        <svg class="w-6 h-6 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
    
    <!-- Image Container -->
    <div class="relative z-10 max-w-6xl w-full max-h-[90vh] flex flex-col items-center" onclick="event.stopPropagation()">
        <img id="lightboxImage" src="" alt="" class="max-w-full max-h-[85vh] object-contain rounded-2xl shadow-2xl transition-transform duration-500">
        <p id="lightboxCaption" class="mt-4 text-white text-lg font-bold text-center drop-shadow-md font-montserrat tracking-wide"></p>
    </div>
</div>

<!-- Welcome Section -->
<section class="relative bg-white py-20 lg:py-32 overflow-hidden reveal">
    <!-- Subtlest Background Pattern -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row gap-12 items-center">
            <!-- Left Side: Welcome Text (Redesigned as per screenshot) -->
            <div class="order-1 lg:order-1 w-full lg:w-[60%] relative pl-0">
                
                <div class="flex flex-col items-start">
                    
                    <h2 class="font-black text-slate-900 mb-6 font-montserrat leading-[1.15] uppercase tracking-tight">
                        <span class="text-3xl md:text-4xl lg:text-5xl">Selamat Datang</span> <br/>
                        <span class="text-3xl md:text-4xl lg:text-5xl">Website Resmi</span> <br/>
                        <span class="text-2xl md:text-3xl lg:text-4xl text-emerald-600">Inspektorat Kabupaten</span> <br/>
                        <span class="text-2xl md:text-3xl lg:text-4xl text-emerald-600">Mahakam Ulu</span>
                    </h2>
                    
                    <p class="text-lg text-gray-600 font-inter leading-relaxed mb-10 max-w-xl">
                        Mewujudkan tata kelola pemerintahan Kabupaten <span class="font-bold text-slate-800">Mahakam Ulu</span> yang bersih, transparan, dan akuntabel melalui pengawasan internal yang profesional serta berintegritas tinggi.
                    </p>

                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center gap-3 bg-white shadow-xl shadow-emerald-900/5 border border-emerald-50 p-4 rounded-2xl transition-all hover:shadow-emerald-900/10 hover:-translate-y-1">
                            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <span class="text-sm font-black text-slate-800 font-inter uppercase tracking-tight">Berintegritas</span>
                        </div>
                        <div class="flex items-center gap-3 bg-white shadow-xl shadow-emerald-900/5 border border-emerald-50 p-4 rounded-2xl transition-all hover:shadow-emerald-900/10 hover:-translate-y-1">
                            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <span class="text-sm font-black text-slate-800 font-inter uppercase tracking-tight">Akuntabel</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Photo Card -->
            <div class="order-2 lg:order-2 w-full lg:w-[35%] flex justify-center items-center py-6">
                <div class="relative w-full max-w-[240px]"> 
                    <div class="absolute inset-0 bg-emerald-100 rounded-[3rem] blur-2xl transform -rotate-6 scale-110"></div>
                    
                    <div class="bg-white p-1 rounded-[2.5rem] shadow-[0_50px_100px_-20px_rgba(0,0,0,0.08)] relative overflow-hidden group border border-emerald-50/30 mb-6">
                        <div class="aspect-[3/4] overflow-hidden rounded-[2.5rem] relative bg-slate-50">
                            <img src="{{ asset('images/kepala inspektorat.png') }}" 
                                 alt="Margono ST., M.SI" 
                                 class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">
                            
                            <div class="absolute inset-x-0 bottom-0 p-3">
                                <div class="bg-teal-950/90 backdrop-blur-xl px-4 py-3 rounded-2xl w-full shadow-2xl border border-white/10 overflow-hidden transition-all duration-300 group-hover:bg-teal-900/95">
                                    <h3 class="text-sm md:text-base font-black text-white uppercase leading-tight tracking-tight">Margono ST., M.SI</h3>
                                    <div class="w-full h-px bg-emerald-500/30 my-1.5"></div>
                                    <p class="text-emerald-400 text-[7px] md:text-[8px] font-black uppercase tracking-[0.15em] leading-relaxed">Inspektur Inspektorat<br/>Kabupaten Mahakam Ulu</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6"></div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Service Cards Section -->
<section class="bg-emerald-50/20 py-10 md:py-16 lg:py-24 reveal">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8">
            <x-service-card 
                title="LAPORAN PENGADUAN" 
                description="Laporkan Masalah Anda secara langsung kepada kami untuk penanganan yang cepat dan tepat." 
                link="{{ route('layanan.pengaduan') }}" 
                linkText="FORM PENGADUAN" 
                icon='<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>'
                wire:navigate
            />
            
            <x-service-card 
                title="CEK PENGADUAN" 
                description="Lihat status terkini dari pengaduan yang telah Anda kirimkan." 
                link="{{ route('layanan.cek-pengaduan') }}" 
                linkText="CEK STATUS" 
                icon='<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>'
                wire:navigate
            />
            
            <x-service-card 
                title="SURVEY KEPUASAN MASYARAKAT" 
                description="Bantu kami dalam meningkatkan kualitas pelayanan yang diberikan dengan mengisi survey." 
                link="{{ route('layanan.survey') }}" 
                linkText="ISI SURVEY" 
                icon='<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01m-.01 4h.01"></path></svg>'
                wire:navigate
            />
        </div>
    </div>
</section>

<!-- Timeline Alur Pengaduan Section -->
<section class="relative bg-white py-20 lg:py-28 overflow-hidden reveal">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16 md:mb-24">
            <span class="inline-block px-4 py-1.5 bg-emerald-100 text-emerald-700 text-[10px] font-black rounded-full mb-4 tracking-[0.2em] uppercase">Panduan Layanan</span>
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 font-montserrat tracking-tighter uppercase leading-none">
                Alur <span class="text-emerald-600">Pengaduan</span>
            </h2>
            <p class="text-slate-500 mt-4 max-w-xl mx-auto text-sm md:text-base font-medium">Proses pengaduan yang transparan dan akuntabel</p>
        </div>
        
        <div class="max-w-6xl mx-auto">
            <!-- Timeline Container -->
            <div class="relative">
                <!-- Connecting Line (Desktop) -->
                <div class="hidden md:block absolute top-12 left-0 w-full h-0.5 bg-gray-100 -z-10"></div>
                <div class="hidden md:block absolute top-12 left-0 w-3/4 h-0.5 bg-gradient-to-r from-emerald-500/0 via-emerald-500/20 to-emerald-500/0 -z-10"></div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 md:gap-8">
                    <!-- Step 1 -->
                    <div class="group relative flex flex-col items-center text-center">
                        <div class="w-24 h-24 rounded-3xl bg-white border border-gray-100 shadow-[0_20px_40px_-10px_rgba(0,0,0,0.08)] flex items-center justify-center mb-8 group-hover:-translate-y-2 transition-transform duration-500 relative z-10">
                            <span class="absolute -top-3 -right-3 w-8 h-8 rounded-xl bg-slate-900 text-white flex items-center justify-center font-black text-xs shadow-lg">01</span>
                            <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-800 uppercase tracking-tight mb-2">Buat Laporan</h3>
                        <p class="text-slate-500 text-sm leading-relaxed max-w-[200px]">Isi formulir pengaduan secara lengkap melalui website</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="group relative flex flex-col items-center text-center">
                        <div class="w-24 h-24 rounded-3xl bg-white border border-gray-100 shadow-[0_20px_40px_-10px_rgba(0,0,0,0.08)] flex items-center justify-center mb-8 group-hover:-translate-y-2 transition-transform duration-500 relative z-10">
                            <span class="absolute -top-3 -right-3 w-8 h-8 rounded-xl bg-white border border-gray-200 text-slate-400 flex items-center justify-center font-black text-xs shadow-lg group-hover:bg-emerald-500 group-hover:text-white group-hover:border-emerald-500 transition-colors">02</span>
                            <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-800 uppercase tracking-tight mb-2">Verifikasi</h3>
                        <p class="text-slate-500 text-sm leading-relaxed max-w-[200px]">Pemeriksaan kelengkapan administrasi & substansi</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="group relative flex flex-col items-center text-center">
                        <div class="w-24 h-24 rounded-3xl bg-white border border-gray-100 shadow-[0_20px_40px_-10px_rgba(0,0,0,0.08)] flex items-center justify-center mb-8 group-hover:-translate-y-2 transition-transform duration-500 relative z-10">
                            <span class="absolute -top-3 -right-3 w-8 h-8 rounded-xl bg-white border border-gray-200 text-slate-400 flex items-center justify-center font-black text-xs shadow-lg group-hover:bg-emerald-500 group-hover:text-white group-hover:border-emerald-500 transition-colors">03</span>
                            <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-800 uppercase tracking-tight mb-2">Tindak Lanjut</h3>
                        <p class="text-slate-500 text-sm leading-relaxed max-w-[200px]">Proses pemeriksaan & investigasi oleh auditor</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="group relative flex flex-col items-center text-center">
                        <div class="w-24 h-24 rounded-3xl bg-white border border-gray-100 shadow-[0_20px_40px_-10px_rgba(0,0,0,0.08)] flex items-center justify-center mb-8 group-hover:-translate-y-2 transition-transform duration-500 relative z-10">
                            <span class="absolute -top-3 -right-3 w-8 h-8 rounded-xl bg-white border border-gray-200 text-slate-400 flex items-center justify-center font-black text-xs shadow-lg group-hover:bg-emerald-500 group-hover:text-white group-hover:border-emerald-500 transition-colors">04</span>
                            <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-800 uppercase tracking-tight mb-2">Selesai</h3>
                        <p class="text-slate-500 text-sm leading-relaxed max-w-[200px]">Pelapor menerima informasi hasil tindak lanjut</p>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center mt-16 md:mt-20">
                <a href="{{ route('layanan.pengaduan') }}" wire:navigate class="group inline-flex items-center gap-4 px-8 py-4 bg-emerald-600 text-white rounded-2xl font-bold tracking-wide hover:bg-emerald-700 transition-all shadow-[0_10px_20px_-5px_rgba(16,185,129,0.3)] hover:shadow-[0_15px_30px_-5px_rgba(16,185,129,0.4)] hover:-translate-y-1">
                    <span>Mulai Buat Laporan</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- News/Activities Section -->
<section class="bg-white py-24 reveal">
    <div class="container mx-auto px-4">
        <!-- Section Title -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div>
                <span class="inline-block px-4 py-1.5 bg-emerald-100 text-emerald-700 text-[10px] font-black rounded-full mb-4 tracking-[0.2em] uppercase">INFORMASI TERKINI</span>
                <h2 class="text-4xl font-black text-slate-900 font-montserrat tracking-tighter uppercase leading-none">
                    BERITA <span class="text-emerald-600">INSPEKTORAT</span>
                </h2>
            </div>
            <a href="{{ route('berita.index') }}" wire:navigate class="group flex items-center gap-3 text-emerald-600 font-black text-sm tracking-widest uppercase hover:text-emerald-700 transition-colors">
                Lihat Semua Berita
                <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
            </a>
        </div>

        <div class="grid lg:grid-cols-12 gap-6">
            <!-- Main News Carousel (5 Cols) -->
            <div class="col-span-12 lg:col-span-5">
                <div class="h-full bg-white rounded-[2.5rem] p-4 shadow-xl border border-gray-100 flex flex-col">
                    <div class="flex items-center gap-3 mb-4 px-2">
                        <div class="w-1.5 h-6 bg-emerald-500 rounded-full"></div>
                        <h3 class="text-sm font-black text-slate-900 uppercase tracking-tighter leading-none">Sorotan Utama</h3>
                    </div>
                    <div id="newsCarousel" class="flex-1 relative rounded-[2rem] overflow-hidden group">
                        <div class="carousel-news flex h-full transition-transform duration-700 ease-out">
                            @php $carouselItems = array_slice($newsItems, 0, 5); @endphp
                            @foreach($carouselItems as $index => $item)
                                <x-news-card 
                                    :image="$item['image']"
                                    :category="$item['category']"
                                    :title="$item['title']"
                                    :date="$item['date']"
                                    :slideIndex="$index + 1"
                                    :totalSlides="count($carouselItems)"
                                    :views="$item['views'] ?? 0"
                                />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- News List Sidebar (4 Cols) -->
            <div class="col-span-12 lg:col-span-4 bg-white p-6 rounded-[2.5rem] shadow-xl border border-gray-100 flex flex-col">
                <!-- Tab Navigation -->
                <div class="mb-6 relative border-b border-gray-200">
                    <div class="flex gap-6 pb-3">
                        <button id="tab-terbaru" onclick="switchNewsTab('terbaru')" class="text-slate-900 font-black text-xs tracking-widest transition-all duration-300 cursor-pointer hover:text-emerald-600">TERBARU</button>
                        <button id="tab-terpopuler" onclick="switchNewsTab('terpopuler')" class="text-gray-400 font-black text-xs tracking-widest transition-all duration-300 cursor-pointer hover:text-emerald-600">TERPOPULER</button>
                    </div>
                    <!-- Sliding Underline Indicator -->
                    <div id="tab-indicator" class="absolute bottom-[-1px] left-0 h-[3px] bg-emerald-600 transition-all duration-500 ease-in-out"></div>
                </div>
                
                <!-- News Items -->
                <div class="relative flex-1 max-h-[480px] overflow-y-auto pr-2 scrollbar-hide">
                    <!-- Terbaru List (Shows Item 6-10) -->
                    <div id="list-terbaru" class="space-y-4 transition-all duration-500 opacity-100">
                        @php $sidebarItems = array_slice($newsItems, 5, 5); @endphp
                        @foreach($sidebarItems as $item)
                            <x-news-sidebar-item 
                                :category="$item['category']" 
                                :title="$item['title']" 
                                :date="$item['date']" 
                                :views="$item['views'] ?? 0"
                            />
                        @endforeach
                    </div>

                    <!-- Terpopuler List -->
                    <div id="list-terpopuler" class="space-y-4 hidden transition-all duration-500 opacity-0">
                        @foreach($popularNewsItems as $item)
                            <x-news-sidebar-item 
                                :category="$item['category']" 
                                :title="$item['title']" 
                                :date="$item['date']" 
                                :views="$item['views'] ?? 0"
                            />
                        @endforeach
                    </div>
                </div>
                
                <!-- View All Button -->
                <div class="mt-6">
                    <a href="{{ route('berita.index') }}" wire:navigate class="w-full py-4 bg-white border border-emerald-100 shadow-sm rounded-2xl text-emerald-700 text-xs font-black tracking-widest uppercase hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition-all duration-300 flex items-center justify-center gap-2">
                        Lihat Semua Posting
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- GPR Model Widget (3 Cols) -->
            <div class="col-span-12 lg:col-span-3">
                 <div class="h-full bg-white rounded-[2.5rem] p-6 shadow-xl border border-gray-100 flex flex-col">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm border border-gray-100 overflow-hidden p-1">
                            <img src="{{ asset('images/logokomdigi.png') }}" 
                                 alt="Logo KOMDIGI" 
                                 class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h3 class="text-sm font-black text-slate-900 uppercase tracking-tighter leading-none">GPR KOMDIGI INDONESIA</h3>
                            <p class="text-[10px] text-gray-500 font-medium tracking-wide">Update Berita Nasional</p>
                        </div>
                    </div>
                    <div class="flex-1 w-full h-full overflow-hidden rounded-xl bg-gray-50 relative p-2">
                        <!-- 
                            NOTE: Jika widget tidak muncul (DNS Error), itu masalah dari server Kominfo/Komdigi.
                            URL resmi saat ini masih: https://widget.kominfo.go.id/gpr-widget-kominfo.min.js
                        -->
                        <script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js" async></script>
                        <div id="gpr-kominfo-widget-container" class="w-full h-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- External Links / Apps Section -->
<section class="bg-teal-950 py-12 md:py-24 relative overflow-hidden reveal">
    <!-- Subtle Background Accents -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-500/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-teal-500/10 rounded-full blur-[100px]"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:grid lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">
            <!-- External Links Slider -->
            <div class="lg:col-span-9">
                <div class="mb-6 md:mb-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl md:text-3xl font-black text-white font-montserrat tracking-tighter uppercase mb-2">Aplikasi & Layanan Terkait</h2>
                        <div class="w-16 md:w-20 h-1 md:h-1.5 bg-emerald-500 rounded-full"></div>
                    </div>
                    
                    <div class="flex gap-2 md:gap-3">
                        <button onclick="scrollExternalLinks(-1)" class="w-10 h-10 md:w-12 md:h-12 rounded-full border border-white/20 text-white flex items-center justify-center hover:bg-white hover:text-teal-950 transition-all duration-300">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button onclick="scrollExternalLinks(1)" class="w-10 h-10 md:w-12 md:h-12 rounded-full border border-white/20 text-white flex items-center justify-center hover:bg-white hover:text-teal-950 transition-all duration-300">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Swiper Slider for Perfect Infinite Loop -->
                <div class="w-full">
                    <div class="swiper external-links-swiper w-full overflow-hidden py-4 md:py-8">
                        <div class="swiper-wrapper">
                            @foreach($allLinks as $link)
                                <div class="swiper-slide h-auto">
                                    <x-external-link-card 
                                        :name="$link['name']" 
                                        :desc="$link['desc']" 
                                        :logo="$link['logo']" 
                                        :link="$link['link']" 
                                    />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Agenda Calendar Widget - ORDER FIRST ON MOBILE -->
            <div class="order-first lg:order-last lg:col-span-3 w-full">
                <div class="bg-white rounded-2xl md:rounded-3xl shadow-2xl overflow-hidden border border-emerald-50 flex flex-col h-full w-full max-w-md mx-auto lg:max-w-none">
                    <div class="bg-gradient-to-br from-teal-900 to-emerald-950 p-4 md:p-8">
                        <h3 class="text-base md:text-xl font-black text-white font-montserrat tracking-tight uppercase flex items-center gap-2 md:gap-3">
                            <div class="w-1.5 md:w-2 h-5 md:h-6 bg-emerald-400 rounded-full"></div>
                            Agenda
                        </h3>
                    </div>
                    
                    <div class="p-4 md:p-6 flex-1 flex flex-col">
                        <!-- Calendar Header -->
                        <div class="flex justify-between items-center mb-4 md:mb-6">
                            <button onclick="previousMonth()" class="w-7 h-7 md:w-8 md:h-8 flex items-center justify-center hover:bg-emerald-50 rounded-full text-emerald-600 transition">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <h4 id="calendarMonthYear" class="text-xs md:text-sm font-black text-slate-900 font-inter uppercase tracking-widest"></h4>
                            <button onclick="nextMonth()" class="w-7 h-7 md:w-8 md:h-8 flex items-center justify-center hover:bg-emerald-50 rounded-full text-emerald-600 transition">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Calendar Component -->
                        <div class="grid grid-cols-7 gap-0.5 md:gap-1 mb-3 md:mb-4 text-center">
                            <div class="text-[10px] md:text-xs font-black text-emerald-600 uppercase">Min</div>
                            <div class="text-[10px] md:text-xs font-black text-slate-400 uppercase">Sen</div>
                            <div class="text-[10px] md:text-xs font-black text-slate-400 uppercase">Sel</div>
                            <div class="text-[10px] md:text-xs font-black text-slate-400 uppercase">Rab</div>
                            <div class="text-[10px] md:text-xs font-black text-slate-400 uppercase">Kam</div>
                            <div class="text-[10px] md:text-xs font-black text-slate-400 uppercase">Jum</div>
                            <div class="text-[10px] md:text-xs font-black text-emerald-600 uppercase">Sab</div>
                        </div>
                        <div id="calendarDays" class="grid grid-cols-7 gap-0.5 md:gap-1 flex-1"></div>
                    </div>

                    <!-- Event Detail View -->
                    <div id="eventDisplay" class="bg-emerald-50/50 p-4 md:p-6 text-center border-t border-emerald-100 min-h-[100px] md:min-h-[140px] flex flex-col justify-center">
                        <svg class="w-8 h-8 md:w-12 md:h-12 mx-auto mb-2 md:mb-3 text-emerald-200" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 110-12 6 6 0 010 12z"/>
                        </svg>
                        <h5 class="text-[10px] md:text-xs font-black text-emerald-900 mb-1 uppercase tracking-tight tracking-tighter">Pilih Tanggal</h5>
                        <p class="text-[9px] md:text-[10px] text-emerald-700/60 font-medium">Klik pada tanggal untuk melihat agenda penting.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scroll Progress Bar -->
<div id="scroll-progress-container" class="fixed top-0 left-0 w-full h-1 bg-transparent z-[100]">
    <div id="scroll-progress-bar" class="h-full bg-emerald-500 w-0 transition-all duration-100 ease-out shadow-[0_0_10px_theme('colors.emerald.500')]"></div>
</div>

<!-- Back to Top Button -->
<button id="back-to-top" onclick="scrollToTop()" class="fixed bottom-24 right-6 z-50 bg-emerald-600 text-white p-3 rounded-full shadow-lg translate-y-20 opacity-0 transition-all duration-300 hover:bg-emerald-700 hover:shadow-emerald-500/50 hover:-translate-y-1 focus:outline-none">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>







<style>
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
/* Swiper Slide Transition Styles */
.banner-swiper .swiper-slide {
    width: 85%; /* Mobile: Fuller width for centering */
    transition: all 0.5s ease-in-out;
    opacity: 0.5;
    transform: scale(0.85);
    border-radius: 1rem;
    overflow: hidden;
}
@media (min-width: 768px) {
    .banner-swiper .swiper-slide {
        width: 60%; /* Desktop: Carousel effect */
    }
}
.banner-swiper .swiper-slide-active {
    opacity: 1;
    transform: scale(1);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    z-index: 10;
}

/* Ripple Effect (CSS-Only) */
.ripple-effect::after {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle, rgba(16, 185, 129, 0.3) 0%, transparent 70%);
    transform: scale(0);
    transition: transform 0.6s ease-out;
    pointer-events: none;
    border-radius: inherit;
}
.ripple-effect:active::after {
    transform: scale(2.5);
    transition: transform 0s;
}
.ripple-effect:active {
    transform: scale(0.98) translateY(-0.5rem);
}
.custom-scrollbar::-webkit-scrollbar {
    width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: transparent;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #10b981;
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #059669;
}
</style>

@endsection


