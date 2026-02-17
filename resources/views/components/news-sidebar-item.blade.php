@props(['category', 'title', 'date', 'views' => 0])

<a href="{{ route('berita.show', Str::slug($title)) }}" class="block border-b border-gray-200 pb-3 hover:bg-emerald-50 px-2 py-2 rounded-lg cursor-pointer transition-all duration-300 hover:translate-x-1 hover:shadow-sm group">
    <h4 class="text-slate-900 font-semibold text-sm mb-2 line-clamp-2 font-inter leading-snug group-hover:text-emerald-600 transition-colors">{{ $title }}</h4>
    <div class="flex items-center gap-3 flex-wrap">
        <span class="inline-block bg-emerald-100 px-2.5 py-0.5 rounded text-[10px] font-bold text-emerald-700 uppercase tracking-wider group-hover:bg-emerald-200 transition-colors">{{ $category }}</span>
        <div class="flex items-center gap-3 text-gray-500 text-[11px] font-medium group-hover:text-emerald-500 transition-colors">
            <div class="flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ $date }}</span>
            </div>
            @if(isset($views))
                <div class="flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span>{{ number_format($views) }}</span>
                </div>
            @endif
        </div>
    </div>
</a>
