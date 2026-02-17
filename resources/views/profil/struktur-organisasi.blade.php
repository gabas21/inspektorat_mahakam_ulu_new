@extends('layouts.app')

@section('title', 'Struktur Organisasi - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Full Page Hero with Struktur Organisasi -->
<section class="relative min-h-screen overflow-hidden flex items-center">
    <!-- Background Image with Parallax Effect -->
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none scale-110" alt="Background">
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-teal-950/90 via-slate-900/80 to-emerald-950/90"></div>
    
    <!-- Decorative Blur Elements -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-emerald-500/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-teal-400/10 rounded-full blur-[120px]"></div>
    <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-emerald-600/5 rounded-full blur-[80px]"></div>
    
    <!-- Subtle Dot Pattern -->
    <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 40px 40px;"></div>
    
    <div class="container mx-auto px-6 relative z-10 py-16">
        <!-- Page Title -->
        <div class="text-center mb-12 reveal">
            <span class="inline-block px-5 py-2 bg-emerald-500/20 backdrop-blur-md border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-6 tracking-[0.3em] uppercase shadow-lg shadow-emerald-500/10">
                Profil Inspektorat
            </span>
            <h2 class="text-4xl md:text-6xl font-black text-white px-2 font-montserrat uppercase tracking-tight leading-[1.1] mb-4">
                Struktur <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">Organisasi</span>
            </h2>
            <p class="text-white/60 text-sm md:text-base font-inter max-w-xl mx-auto">
                Bagan struktur organisasi Inspektorat Kabupaten Mahakam Ulu
            </p>
        </div>

        <!-- Premium Card for Image -->
        <div class="reveal max-w-5xl mx-auto" style="animation-delay: 0.2s;">
            <div class="relative group">
                <!-- Outer Glow -->
                <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500/20 via-teal-500/20 to-emerald-500/20 rounded-[2.5rem] blur-xl opacity-50 group-hover:opacity-75 transition-opacity duration-500"></div>
                
                <!-- Main Card -->
                <div class="relative bg-white/10 backdrop-blur-xl rounded-[2rem] p-4 md:p-6 border border-white/20 hover:border-emerald-400/40 transition-all duration-500 shadow-2xl shadow-black/20 overflow-hidden">
                    <!-- Inner Glow Effects -->
                    <div class="absolute -top-32 -right-32 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute -bottom-32 -left-32 w-64 h-64 bg-teal-500/10 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    
                    <!-- Image Container with Multiple Shadows -->
                    <div class="relative rounded-2xl overflow-hidden bg-white p-3 md:p-4 shadow-inner">
                        <!-- Top Accent Bar -->
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-32 h-1 bg-gradient-to-r from-transparent via-emerald-500 to-transparent rounded-full"></div>
                        
                        <img src="{{ asset('images/struktur_organisasi.png') }}" 
                             alt="Struktur Organisasi Inspektorat Kabupaten Mahakam Ulu" 
                             class="w-full h-auto rounded-xl"
                             loading="lazy">
                    </div>
                    
                    <!-- Caption -->
                    <div class="mt-6 text-center">
                        <div class="inline-flex items-center gap-3">
                            <div class="w-8 h-0.5 bg-gradient-to-r from-transparent to-emerald-400/50 rounded-full"></div>
                            <p class="text-sm text-white/70 font-inter font-medium">
                                Struktur Organisasi Inspektorat Kabupaten Mahakam Ulu
                            </p>
                            <div class="w-8 h-0.5 bg-gradient-to-l from-transparent to-emerald-400/50 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Decorative Bottom Element -->
        <div class="flex justify-center mt-12 reveal" style="animation-delay: 0.4s;">
            <div class="flex items-center gap-2 text-white/30 text-xs font-inter">
                <div class="w-12 h-px bg-gradient-to-r from-transparent to-white/30"></div>
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div class="w-12 h-px bg-gradient-to-l from-transparent to-white/30"></div>
            </div>
        </div>
    </div>
</section>




@endsection
