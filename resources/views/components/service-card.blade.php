@props(['title', 'description', 'link', 'linkText', 'icon'])

<div class="ripple-effect group h-full flex flex-col bg-white rounded-2xl md:rounded-3xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.1)] border border-emerald-50 p-5 md:p-8 hover:shadow-2xl hover:shadow-emerald-900/20 transition-all duration-500 transform hover:-translate-y-3 hover:bg-gradient-to-br hover:from-teal-900 hover:to-emerald-950 relative overflow-hidden">
    <!-- Top Decorative Line -->
    <div class="absolute top-0 left-0 w-full h-1 md:h-1.5 bg-emerald-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
    
    <!-- Icon Container -->
    <div class="mb-4 md:mb-6">
        <div class="w-12 h-12 md:w-16 md:h-16 bg-emerald-50 rounded-xl md:rounded-2xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-400/20 group-hover:text-emerald-400 transition-all duration-500 [&>svg]:w-6 [&>svg]:h-6 md:[&>svg]:w-8 md:[&>svg]:h-8">
            {!! $icon !!}
        </div>
    </div>

    <div class="mb-auto">
        <h3 class="text-base md:text-xl font-black text-slate-900 group-hover:text-white mb-2 md:mb-4 font-montserrat transition-colors duration-300 uppercase tracking-wide leading-tight">{{ $title }}</h3>
        <p class="text-xs md:text-sm text-gray-500 group-hover:text-emerald-100/80 font-inter transition-colors duration-300 leading-relaxed">{{ $description }}</p>
    </div>

    <div class="mt-5 md:mt-8">
        <a href="{{ $link }}" class="w-full inline-flex items-center justify-between px-4 md:px-6 py-3 md:py-4 bg-emerald-50 group-hover:bg-emerald-500 rounded-xl md:rounded-2xl text-emerald-700 group-hover:text-emerald-950 font-black font-inter transition-all duration-500 group-hover:shadow-[0_10px_20px_-5px_rgba(16,185,129,0.4)]">
            <span class="text-xs md:text-sm tracking-tighter">{{ $linkText }}</span>
            <svg class="w-4 h-4 md:w-5 md:h-5 transition-transform duration-500 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </a>
    </div>
</div>
