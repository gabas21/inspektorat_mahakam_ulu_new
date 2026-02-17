@extends('layouts.app')

@section('title', 'Motto & Maklumat - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Internal Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-16">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                Profil Inspektorat
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                Motto & <span class="text-emerald-400">Maklumat</span>
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto">
            <!-- Motto Section -->
            <div class="mb-24 text-center reveal">
                <span class="text-emerald-600 font-black text-xs tracking-[0.3em] uppercase mb-4 block">Motto Pelayanan</span>
                <div class="relative inline-block">
                    <svg class="absolute -top-10 -left-10 w-20 h-20 text-emerald-50 opacity-50" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"></path></svg>
                    <h3 class="text-4xl md:text-6xl font-black text-slate-900 font-montserrat uppercase leading-tight relative z-10">
                        BERPATI
                    </h3>
                    <p class="mt-4 text-gray-500 font-bold tracking-widest uppercase text-sm">"BER-Integritas, Profesional, Akuntabel, Terukur, Independen"</p>
                </div>
            </div>

            <!-- Maklumat Pelayanan -->
            <div class="reveal">
                <div class="bg-gradient-to-br from-teal-900 to-emerald-950 p-1 rounded-[3rem] shadow-2xl relative overflow-hidden group">
                     <!-- Patterns -->
                    <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
                    
                    <div class="bg-white rounded-[2.8rem] p-8 md:p-16 text-center relative z-10 border border-white/20">
                        <img src="{{ asset('images/logo-96-96.jpeg') }}" class="w-20 h-20 mx-auto mb-8 rounded-full border-4 border-emerald-50 shadow-lg" alt="">
                        
                        <h4 class="text-2xl md:text-3xl font-black text-slate-900 font-montserrat uppercase mb-6 tracking-tighter">Maklumat Pelayanan</h4>
                        
                        <div class="w-24 h-1.5 bg-emerald-600 mx-auto mb-10 rounded-full"></div>
                        
                        <div class="space-y-6 max-w-2xl mx-auto">
                            <p class="text-lg md:text-xl text-slate-700 font-serif leading-relaxed italic">
                                "Dengan ini kami segenap aparatur INSPEKTORAT Kabupaten Mahakam Ulu, menyatakan sanggup menyelenggarakan pelayanan sesuai pelayanan yang telah ditetapkan, dan apabila tidak menepati, kami siap menerima sanksi sesuai peraturan perundang-undangan yang berlaku."
                            </p>
                            
                            <div class="pt-10">
                                <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2">Tertanda,</p>
                                <p class="text-sm font-black text-slate-900 uppercase tracking-widest">Inspektur Kabupaten Mahakam Ulu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
