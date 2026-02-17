@props(['image', 'category', 'title', 'date', 'author' => 'Inspektorat Daerah', 'slideIndex', 'totalSlides', 'views' => 0])

<div class="relative w-full flex-shrink-0 group overflow-hidden rounded-2xl md:rounded-[2.5rem] bg-slate-900 shadow-2xl transition-all duration-500 hover:shadow-emerald-500/30 hover:scale-[1.01]">
    <!-- Image Wrapper with Enhanced Zoom -->
    <div class="block w-full h-[400px] md:h-[543px] overflow-hidden">
        <img src="{{ $image }}" 
             alt="{{ $title }}" 
             class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110 opacity-80 group-hover:opacity-100">
        <!-- Overlay Gradient for better text readability -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
    </div>
    
    <!-- Content Area (Refined Glassmorphism) -->
    <div class="absolute bottom-3 md:bottom-4 left-3 md:left-4 right-3 md:right-4 bg-white/10 backdrop-blur-xl border border-white/20 p-4 md:p-8 rounded-xl md:rounded-[2rem] transition-all duration-500 group-hover:bg-white/15 group-hover:translate-y-[-5px] z-20 pointer-events-none">
        <div class="block">
            <h3 class="text-lg md:text-2xl font-black text-white mb-2 md:mb-4 font-montserrat leading-tight line-clamp-2 tracking-tight transition-colors duration-300">
                {{ $title }}
            </h3>
        </div>
        
        <div class="flex flex-wrap items-center gap-2 md:gap-4 text-white/70 text-[10px] md:text-[11px] mb-4 md:mb-6 font-medium">
             <span class="inline-block bg-emerald-500/20 border border-emerald-400/30 px-2 md:px-3 py-0.5 rounded-full text-[9px] md:text-[10px] text-emerald-300 uppercase font-black tracking-widest">{{ $category }}</span>
            <div class="flex items-center gap-1 md:gap-2">
                <svg class="w-3 h-3 md:w-4 md:h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span>{{ $date }}</span>
            </div>
            @if(isset($views))
                <div class="flex items-center gap-1 md:gap-2 border-l border-white/10 pl-2 md:pl-4">
                     <svg class="w-3 h-3 md:w-4 md:h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span>{{ number_format($views) }}</span>
                </div>
            @endif
            <div class="hidden md:flex items-center gap-2 border-l border-white/10 pl-4">
                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span>{{ $author }}</span>
            </div>
        </div>
        
        <div class="flex justify-between items-center pointer-events-auto gap-2">
            <span class="px-4 md:px-6 py-2 md:py-2.5 bg-white text-slate-950 rounded-lg md:rounded-xl text-[10px] md:text-xs font-black uppercase tracking-wider md:tracking-widest hover:bg-white hover:shadow-xl transition-all duration-300 transform active:scale-95 inline-block text-center shadow-lg">
                Baca Selengkapnya
            </span>
            
            <!-- Navigation UI (Kept functional but refined) -->
            <div class="flex items-center gap-1 md:gap-3 bg-black/40 backdrop-blur-md rounded-full px-2 md:px-4 py-1 md:py-1.5 border border-white/10 z-30 relative">
                <button class="btn-prev-news w-6 h-6 md:w-8 md:h-8 flex items-center justify-center rounded-full text-white/60 hover:text-white hover:bg-white/10 transition-all cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <span class="text-white text-[10px] font-black uppercase tracking-tighter">
                    <span class="text-emerald-400 news-current-index">{{ $slideIndex }}</span> 
                    <span class="text-white/40 mx-1">/</span> 
                    {{ $totalSlides }}
                </span>
                <button class="btn-next-news w-6 h-6 md:w-8 md:h-8 flex items-center justify-center rounded-full text-white/60 hover:text-white hover:bg-white/10 transition-all cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Full Card Link Overlay -->
    <a href="{{ route('berita.show', Str::slug($title)) }}" class="absolute inset-0 z-10" aria-label="{{ $title }}"></a>
</div>

