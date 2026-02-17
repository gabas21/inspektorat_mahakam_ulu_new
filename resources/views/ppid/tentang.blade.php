@extends('layouts.app')

@section('title', 'Tentang PPID - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-16">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                Layanan Informasi Publik
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                Tentang <span class="text-emerald-400">PPID</span>
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto">
            
            <!-- What IS PPID -->
            <div class="bg-white rounded-[2.5rem] shadow-xl border border-gray-100 p-8 md:p-12 mb-12 reveal">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
                        <span class="text-white font-black text-lg">P</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 font-montserrat uppercase tracking-tight">Profil PPID</h3>
                        <div class="w-10 h-1 bg-emerald-500 rounded-full"></div>
                    </div>
                </div>
                <p class="text-slate-600 leading-relaxed font-medium text-lg">
                    Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah pejabat yang bertanggung jawab di bidang penyimpanan, pendokumentasian, penyediaan, dan/atau pelayanan informasi di badan publik. PPID Pembantu di Inspektorat Kabupaten Mahakam Ulu bertugas membantu PPID Utama dalam melaksanakan tugas pelayanan informasi publik.
                </p>
            </div>

            <!-- Visi Misi PPID -->
            <div class="grid md:grid-cols-2 gap-8 mb-12 reveal">
                <!-- Visi -->
                <div class="bg-slate-50 p-8 rounded-[2rem] border border-slate-100">
                    <h4 class="text-xl font-black text-emerald-600 uppercase mb-4 tracking-tight">Visi Layanan</h4>
                    <p class="text-slate-700 italic font-medium">"Terwujudnya pelayanan informasi publik yang transparan, efektif, efisien, akuntabel dan dapat dipertanggungjawabkan."</p>
                </div>
                <!-- Misi -->
                <div class="bg-slate-50 p-8 rounded-[2rem] border border-slate-100">
                    <h4 class="text-xl font-black text-emerald-600 uppercase mb-4 tracking-tight">Misi Layanan</h4>
                    <ul class="space-y-3">
                        <li class="flex gap-3 text-slate-700 text-sm">
                            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Meningkatkan pengelolaan dan pelayanan informasi yang berkualitas.
                        </li>
                        <li class="flex gap-3 text-slate-700 text-sm">
                            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Membangun dan mengembangkan sistem penyediaan dan layanan informasi.
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Maklumat Pelayanan PPID -->
             <div class="bg-emerald-900 rounded-[2.5rem] p-8 md:p-12 text-center text-white relative overflow-hidden reveal">
                <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
                <div class="relative z-10">
                    <h3 class="text-2xl font-black uppercase mb-6 tracking-widest">Maklumat Pelayanan Informasi</h3>
                    <div class="w-20 h-1 bg-emerald-400 mx-auto mb-8 rounded-full"></div>
                    <p class="text-lg font-serif italic mb-8 opacity-90 leading-relaxed">
                        "Kami berupaya memberikan Pelayanan Informasi Publik dengan sungguh-sungguh untuk dapat memenuhi permohonan informasi dengan Cepat, Tepat, Waktu, Biaya Ringan dengan cara Sederhana."
                    </p>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-emerald-400">Tim PPID Inspektorat Mahakam Ulu</p>
                </div>
            </div>

        </div>
    </div>
</section>



@endsection
