@props(['name', 'desc', 'logo', 'link' => '#'])

<div class="external-link-card relative bg-white rounded-2xl md:rounded-[2rem] border border-gray-100 p-4 md:p-6 w-full h-full min-h-[250px] md:min-h-[300px] flex-shrink-0 transition-all duration-500 hover:-translate-y-4 hover:shadow-[0_30px_60px_-15px_rgba(16,185,129,0.15)] cursor-pointer group overflow-hidden">
    <!-- Subtle Gradient Background on Hover (Light Emerald instead of dark) -->
    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-all duration-700 bg-gradient-to-br from-emerald-50 to-white"></div>
    
    <!-- Decorative background elements -->
    <div class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-50 rounded-full group-hover:bg-emerald-100/50 transition-colors duration-500"></div>
    
    <div class="relative z-10 h-full flex flex-col uppercase">
        <!-- Logo Container -->
        <div class="bg-gray-50 group-hover:bg-white rounded-2xl p-4 mb-4 flex items-center justify-center h-20 transition-all duration-500 border border-gray-100 group-hover:border-emerald-100 group-hover:shadow-inner">
            <img src="{{ $logo }}" 
                 alt="{{ $name }}" 
                 class="max-h-16 w-auto object-contain transition-all duration-700 group-hover:scale-125">
        </div>

        <div class="px-1 text-center">
            <h3 class="text-lg text-slate-900 font-black font-montserrat mb-2 transition-colors duration-500 tracking-tight leading-none group-hover:text-emerald-700">
                {{ $name }}
            </h3>
            <p class="text-gray-500 text-[10px] font-medium leading-relaxed mb-4 line-clamp-2 transition-colors duration-500 font-inter group-hover:text-slate-600">
                {{ $desc }}
            </p>
        </div>

        <a href="{{ $link }}" class="mt-auto inline-flex items-center justify-center gap-2 px-4 py-2 bg-emerald-50 text-emerald-700 group-hover:bg-emerald-600 group-hover:text-white rounded-xl text-[10px] font-black uppercase tracking-widest transition-all duration-300">
            Selengkapnya
            <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
        </a>
    </div>
</div>
