<header class="bg-white/95 backdrop-blur-md fixed top-0 left-0 right-0 z-50 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <!-- Left: Brand Logo -->
            <a href="{{ url('/') }}" wire:navigate class="flex items-center gap-4 group cursor-pointer">
                <div class="flex items-center gap-2">
                    <img src="https://inspektorat.mahakamulukab.go.id/assets/logo_mahulu.png" alt="Logo Mahakam Ulu" class="h-10 md:h-11 w-auto object-contain drop-shadow-sm transition-transform group-hover:scale-105">
                    <img src="https://inspektorat.mahakamulukab.go.id/assets/logo-96-96.jpeg" alt="Logo Inspektorat" class="h-10 md:h-11 w-auto object-contain rounded-full border border-slate-100 shadow-sm transition-transform group-hover:scale-105">
                </div>
                <div class="flex flex-col">
                    <h1 class="text-sm md:text-lg text-slate-900 font-montserrat font-black leading-tight uppercase tracking-tight">
                        Inspektorat
                    </h1>
                    <p class="text-[10px] md:text-xs text-emerald-600 font-bold uppercase tracking-widest leading-none">
                        Kabupaten Mahakam Ulu
                    </p>
                </div>
            </a>

            <!-- Right: Partner Logos -->
            <div class="flex items-center gap-4 md:gap-8">
                <div class="flex items-center gap-4 md:gap-6">
                    <!-- Inspektorat Mengawal Image -->
                    <img src="https://inspektorat.mahakamulukab.go.id/assets/inspektorat_mengawal.png" alt="Inspektorat Mengawal" class="hidden md:block h-10 w-auto object-contain opacity-90 hover:opacity-100 transition-opacity">
                    
                    <!-- Divider -->
                    <div class="hidden md:block w-px h-8 bg-slate-200"></div>

                    <!-- ASN BerAKHLAK Logo -->
                    <img src="https://inspektorat.mahakamulukab.go.id/assets/inspektorat_berakhlak.png" alt="ASN BerAKHLAK" class="h-10 w-auto object-contain">
                </div>
            </div>
        </div>
    </div>
</header>




