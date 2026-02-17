@extends('layouts.app')

@section('title', 'Visi & Misi - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section with Two Boxes Layout -->
<section class="relative min-h-[700px] overflow-hidden flex items-center">
    <!-- Background Image with Parallax Effect -->
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none scale-110" alt="Background">
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-teal-950/90 via-slate-900/80 to-emerald-950/90"></div>
    
    <!-- Decorative Elements -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-emerald-500/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-teal-400/10 rounded-full blur-[120px]"></div>
    
    <div class="container mx-auto px-6 relative z-10 py-32">
        <!-- Page Title -->
        <div class="text-center mb-16 reveal">
            <span class="inline-block px-5 py-2 bg-emerald-500/20 backdrop-blur-md border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-6 tracking-[0.3em] uppercase shadow-lg shadow-emerald-500/10">
                Profil Inspektorat
            </span>
            <h2 class="text-4xl md:text-6xl font-black text-white px-2 font-montserrat uppercase tracking-tight leading-[1.1] mb-4">
                Visi & <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">Misi</span>
            </h2>
            <p class="text-white/60 text-sm md:text-base font-inter max-w-xl mx-auto">
                Komitmen kami dalam mewujudkan pengawasan internal yang berkualitas
            </p>
        </div>

        <!-- Two Boxes Layout -->
        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Visi Box -->
            <div class="reveal group">
                <div class="relative bg-white/10 backdrop-blur-xl rounded-[2rem] p-8 md:p-10 border border-white/20 hover:border-emerald-400/40 transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-500/10 overflow-hidden h-full">
                    <!-- Glow Effect on Hover -->
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-emerald-500/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <h3 class="text-2xl md:text-3xl font-black text-white font-montserrat uppercase tracking-tight mb-6 text-center">
                        Visi
                    </h3>
                    
                    <div class="w-16 h-1 bg-gradient-to-r from-emerald-400 to-teal-400 rounded-full mx-auto mb-6"></div>
                    
                    <p class="text-white/90 text-base md:text-lg leading-relaxed font-inter text-center">
                        <span class="font-bold">MAHULU MELAJU :</span> "Kabupaten Mahakam Ulu Maju, Merata, Berkelanjutan"
                    </p>
                </div>
            </div>

            <!-- Misi Box -->
            <div class="reveal group" style="animation-delay: 0.2s;">
                <div class="relative bg-white/10 backdrop-blur-xl rounded-[2rem] p-8 md:p-10 border border-white/20 hover:border-emerald-400/40 transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-500/10 overflow-hidden h-full">
                    <!-- Glow Effect on Hover -->
                    <div class="absolute -top-20 -left-20 w-40 h-40 bg-teal-500/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <h3 class="text-2xl md:text-3xl font-black text-white font-montserrat uppercase tracking-tight mb-6 text-center">
                        Misi
                    </h3>
                    
                    <div class="w-16 h-1 bg-gradient-to-r from-teal-400 to-emerald-400 rounded-full mx-auto mb-6"></div>
                    
                    <p class="text-white/90 text-base md:text-lg leading-relaxed font-inter text-center">
                        Misi Inspektorat Mahakam Ulu diambil dari Misi Kabupaten Mahakam Ulu Poin Kelima: <span class="italic">"Menghadirkan Tata Kelola Pemerintahan Terbuka, Responsive, Kolaboratif, dan Berintegritas, melalui transformasi digital dan perluasan partisipasi publik".</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
