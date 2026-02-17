@extends('layouts.app')

@section('title', $news['title'] . ' - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section -->
<section class="relative h-[200px] overflow-hidden">
    <!-- Image -->
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none opacity-100" 
         alt="Background">
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
    
    <!-- Content - Centered -->
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-12">
        <div class="relative z-10 reveal active">
            <span class="inline-block px-4 py-1.5 bg-emerald-500/20 backdrop-blur-md border border-emerald-400/30 text-emerald-300 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase shadow-lg">
                Indeks Berita
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_10px_10px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-none">
                {{ $news['category'] }}
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-slate-50 py-16 lg:py-24">
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <!-- Article Header (Above Card) -->
                <div class="mb-8">
                    <span class="inline-block px-4 py-1.5 bg-emerald-100 text-emerald-700 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.2em] uppercase">
                        {{ $news['category'] }}
                    </span>
                    <h1 class="text-3xl md:text-4xl font-black text-slate-900 font-montserrat tracking-tight leading-[1.2] mb-4">
                        {{ $news['title'] }}
                    </h1>
                    <div class="flex items-center gap-6 text-slate-500 text-sm font-medium">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $news['date'] }}
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            {{ $news['author'] }}
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] shadow-xl p-8 md:p-12 border border-slate-100">
                    
                    <!-- NEW: Breadcrumbs for better navigation -->
                    <nav class="flex mb-8 text-sm font-medium text-slate-500" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="{{ route('home') }}" class="inline-flex items-center hover:text-emerald-600 transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                    Beranda
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-slate-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="{{ route('berita.index') }}" class="ml-1 text-sm font-medium hover:text-emerald-600 md:ml-2 transition-colors">Berita</a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-slate-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2 line-clamp-1 max-w-[200px]">{{ $news['title'] }}</span>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    <!-- Featured Image inside content -->
                    <div class="rounded-2xl overflow-hidden mb-10 shadow-lg border border-slate-100">
                        <img src="{{ $news['image'] }}" alt="{{ $news['title'] }}" class="w-full h-auto object-cover transform hover:scale-[1.02] transition-transform duration-700">
                    </div>

                    <!-- Article Body -->
                    <article class="prose prose-lg prose-slate max-w-none prose-headings:font-black prose-headings:font-montserrat prose-headings:text-slate-900 prose-p:text-slate-700 prose-p:leading-loose prose-a:text-emerald-600 hover:prose-a:text-emerald-500 prose-li:text-slate-700">
                        {!! $news['content'] !!}
                    </article>

                    <!-- Share Section -->
                    <div class="mt-12 pt-8 border-t border-slate-100 flex items-center justify-between">
                        <span class="font-bold text-slate-900 uppercase tracking-wider text-sm">Bagikan Berita:</span>
                        <div class="flex gap-3">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($news['title']) }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-black hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($news['title'] . ' ' . url()->current()) }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-green-500 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.149-.174.198-.297.298-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.262.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3 space-y-8">
                 <!-- Back to News -->
                <!-- Back to News (Redesigned) -->
                <a href="{{ route('berita.index') }}" class="group relative overflow-hidden flex items-center justify-between p-6 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                    <div class="relative z-10 flex flex-col text-white">
                        <span class="text-[10px] uppercase font-black tracking-widest opacity-80 mb-1">Navigasi</span>
                        <h4 class="font-black text-lg uppercase tracking-wider">Kembali ke Berita</h4>
                    </div>
                    
                    <div class="relative z-10 w-12 h-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/30 group-hover:scale-110 group-hover:bg-white group-hover:text-emerald-600 transition-all duration-300">
                        <svg class="w-6 h-6 text-white group-hover:text-emerald-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </div>
                    
                    <!-- Decorative Background -->
                    <div class="absolute -right-4 -bottom-4 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-all"></div>
                </a>

                <!-- Related News -->
                <div class="bg-white rounded-[2rem] shadow-xl p-6 border border-slate-100">
                    <h3 class="text-lg font-black text-slate-800 mb-6 uppercase tracking-wider flex items-center gap-2">
                        <span class="w-1 h-6 bg-emerald-500 rounded-full"></span>
                        Berita Lainnya
                    </h3>
                    <div class="space-y-4">
                        @foreach($relatedNews as $item)
                        <x-news-sidebar-item 
                            :image="$item['image']"
                            :title="$item['title']"
                            :date="$item['date']"
                            :category="$item['category']"
                        />
                        @endforeach
                    </div>
                </div>

                <!-- Categories Placeholder -->
                 <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-[2rem] shadow-xl p-8 text-center text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/20 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-teal-500/20 rounded-full blur-3xl"></div>
                    
                    <h3 class="text-xl font-black mb-2 relative z-10">Punya Informasi Penting?</h3>
                    <p class="text-slate-300 text-sm mb-6 relative z-10">Laporkan dugaan pelanggaran atau sampaikan aspirasi Anda melalui E-Pengaduan.</p>
                    <a href="{{ route('layanan.pengaduan') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-500 hover:bg-emerald-400 text-white font-bold rounded-xl transition-all shadow-lg shadow-emerald-500/30 relative z-10">
                        Buat Laporan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>



@endsection

