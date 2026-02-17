@extends('layouts.app')

@section('title', 'Cek Pengaduan - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Success Popup Modal -->
@if(session('success'))
<div id="successModal" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white rounded-3xl p-8 max-w-md mx-4 text-center shadow-2xl transform animate-bounce-in">
        <!-- Success Icon -->
        <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        
        <h3 class="text-2xl font-black text-slate-900 font-montserrat uppercase mb-3">Laporan Diterima!</h3>
        <p class="text-slate-500 mb-6">{{ session('success') }}</p>
        
        <button onclick="closeModal()" class="w-full py-4 bg-emerald-600 text-white font-black uppercase tracking-widest rounded-xl hover:bg-emerald-700 transition-all">
            Lihat Status Laporan
        </button>
    </div>
</div>
@endif

<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-16">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                Tracking System
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                Cek Status <span class="text-emerald-400">Pengaduan</span>
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-xl mx-auto">
            
            <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 p-8 md:p-12 text-center">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>

                <h3 class="text-2xl font-black text-slate-900 font-montserrat uppercase mb-2">Lacak Laporan</h3>
                <p class="text-slate-500 mb-8">Masukkan Kode Laporan yang Anda dapatkan saat mengirim laporan untuk melihat progres tindak lanjut.</p>

                @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-600 text-sm font-medium">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('layanan.cek-pengaduan.check') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="relative">
                        <input type="text" name="kode_laporan" value="{{ request('kode') ?? '' }}" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-full text-center text-lg font-bold tracking-wider placeholder:text-sm placeholder:font-normal focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all" placeholder="Contoh: PGD-ABCD1234">
                    </div>

                    <button type="submit" class="w-full py-4 bg-emerald-600 text-white font-black uppercase tracking-widest rounded-full hover:bg-emerald-700 hover:shadow-lg hover:shadow-emerald-500/30 transition-all transform hover:-translate-y-1">
                        Lacak Sekarang
                    </button>
                </form>

                <div class="mt-8 pt-8 border-t border-gray-100">
                    <p class="text-xs text-slate-400 font-medium mb-4">Lupa kode laporan? Silakan hubungi admin melalui kontak WhatsApp kami.</p>
                    
                    <!-- Tombol Daftar Pengaduan -->
                    <a href="{{ route('layanan.daftar-pengaduan') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-full hover:bg-emerald-100 transition-all text-sm font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Lihat Semua Pengaduan
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>



@push('scripts')
<script>
    function closeModal() {
        document.getElementById('successModal').style.display = 'none';
    }
    
    // Auto close modal after 5 seconds
    @if(session('success'))
    setTimeout(() => {
        const modal = document.getElementById('successModal');
        if (modal) modal.style.display = 'none';
    }, 5000);
    @endif
</script>
<style>
    @keyframes bounce-in {
        0% { transform: scale(0.5); opacity: 0; }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); opacity: 1; }
    }
    .animate-bounce-in {
        animation: bounce-in 0.5s ease-out forwards;
    }
</style>
@endpush
@endsection
