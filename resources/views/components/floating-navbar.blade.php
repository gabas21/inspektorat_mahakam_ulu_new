<!-- Background Overlay -->
<div id="nav-overlay" class="fixed inset-0 z-[55] hidden opacity-0 transition-opacity duration-300 pointer-events-auto" onclick="closeSubmenus()"></div>

<div class="fixed bottom-4 md:bottom-10 left-1/2 -translate-x-1/2 z-[60] w-[calc(100%-2rem)] md:w-auto max-w-[95vw] md:max-w-none" id="nav-container">
    <div class="flex items-center justify-center gap-1 md:gap-2 px-2 md:px-3 py-2 md:py-2.5 rounded-[40px] md:rounded-[50px] shadow-2xl border border-white/10 transition-all duration-300 glass-nav">
        
        @php
            $currentRoute = request()->route() ? request()->route()->getName() : '';
            $currentUrl = request()->url();
            $isHome = $currentUrl === url('/') || $currentRoute === 'home' || $currentRoute === 'landing';
            $isProfile = str_starts_with($currentRoute, 'profil.');
            $isBerita = str_starts_with($currentRoute, 'berita.');
            $isPeraturan = str_starts_with($currentRoute, 'peraturan.');
            $isDokumen = str_starts_with($currentRoute, 'dokumen.');
            $isLayanan = str_starts_with($currentRoute, 'layanan.');
            $isPpid = str_starts_with($currentRoute, 'ppid.');
        @endphp
        
        <!-- 1. Beranda -->
        <a href="{{ url('/') }}" wire:navigate class="group flex items-center justify-center md:justify-start h-10 w-10 md:h-12 {{ $isHome ? 'md:w-36 bg-emerald-600' : 'md:w-12 md:hover:w-36 bg-transparent hover:bg-emerald-600' }} rounded-full transition-all duration-300 overflow-hidden relative p-1 md:p-1.5 cursor-pointer">
             <span class="flex-shrink-0 w-8 h-8 md:w-9 md:h-9 flex items-center justify-center rounded-full {{ $isHome ? 'bg-emerald-600' : 'bg-transparent group-hover:bg-emerald-600' }} transition-colors">
                <!-- Outline: Home -->
                <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isHome ? 'hidden' : 'group-hover:hidden' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <!-- Solid: Home -->
                <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isHome ? 'block' : 'hidden group-hover:block' }}" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                    <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75v4.5a.75.75 0 01-.75.75H4.875c-1.035 0-1.875-.84-1.875-1.875V13.677c.03-.027.06-.057.091-.086L12 5.432z" />
                </svg>
            </span>
            <span class="hidden md:inline text-white text-sm font-medium whitespace-nowrap {{ $isHome ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }} transition-opacity duration-300 ml-1">Beranda</span>
        </a>

        <!-- 2. Profile -->
        <div class="relative">
            <!-- Profile Sub-menu -->
            <div id="profile-submenu" class="hidden absolute bottom-full left-1/2 -translate-x-1/2 mb-3 md:mb-4 w-[200px] md:w-60 bg-teal-950/95 md:bg-teal-950/80 backdrop-blur-xl border border-white/10 rounded-2xl py-2 md:py-3 px-2 shadow-2xl transition-all duration-300 transform translate-y-4 opacity-0 scale-95 origin-bottom">
                <ul class="space-y-1">
                    @php
                        $profileMenus = [
                            ['name' => 'Visi & Misi', 'route' => 'profil.visi-misi'],
                            ['name' => 'Tujuan & Sasaran', 'route' => 'profil.tujuan-sasaran'],
                            ['name' => 'Fungsi & Tugas Pokok', 'route' => 'profil.tugas-fungsi'],
                            ['name' => 'Profil Pimpinan', 'route' => 'profil.profil-pimpinan'],
                            ['name' => 'Aparatur', 'route' => 'profil.aparatur'],
                            ['name' => 'Struktur Organisasi', 'route' => 'profil.struktur-organisasi'],
                            ['name' => 'Motto & Maklumat Pelayanan', 'route' => 'profil.motto-maklumat'],
                            ['name' => 'Penghargaan', 'route' => 'profil.penghargaan'],
                        ];
                    @endphp
                    @foreach($profileMenus as $menu)
                    <li>
                        <a href="{{ route($menu['route']) }}" wire:navigate class="block px-4 py-2 text-xs font-bold text-white/80 hover:text-white hover:bg-emerald-600/30 rounded-lg transition-all">
                            {{ $menu['name'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <button onclick="toggleProfileMenu(event)" id="btn-profile" class="group flex items-center justify-center md:justify-start h-10 w-10 md:h-12 {{ $isProfile ? 'md:w-32 bg-emerald-600' : 'md:w-12 md:hover:w-32 bg-transparent hover:bg-emerald-600' }} active-nav-expanded rounded-full transition-all duration-300 overflow-hidden relative p-1 md:p-1.5 cursor-pointer outline-none">
                <span class="flex-shrink-0 w-8 h-8 md:w-9 md:h-9 flex items-center justify-center rounded-full {{ $isProfile ? 'bg-emerald-600' : 'bg-transparent group-hover:bg-emerald-600' }} transition-colors">
                    <!-- Outline: User -->
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isProfile ? 'hidden' : 'group-hover:hidden' }} btn-icon-outline" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <!-- Solid: User -->
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isProfile ? 'block' : 'hidden group-hover:block' }} btn-icon-solid" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="hidden md:inline text-white text-sm font-medium whitespace-nowrap {{ $isProfile ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }} transition-opacity duration-300 ml-1">Profile</span>
            </button>
        </div>

        <!-- 3. Info & Berita -->
        <div class="relative">
            <!-- Berita Sub-menu -->
            <div id="berita-submenu" class="hidden absolute bottom-full left-1/2 -translate-x-1/2 mb-3 md:mb-4 w-[200px] md:w-60 bg-teal-950/95 md:bg-teal-950/80 backdrop-blur-xl border border-white/10 rounded-2xl py-2 md:py-3 px-2 shadow-2xl transition-all duration-300 transform translate-y-4 opacity-0 scale-95 origin-bottom">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('berita.index') }}" wire:navigate class="block px-4 py-2 text-xs font-bold text-white/80 hover:text-white hover:bg-emerald-600/30 rounded-lg transition-all">
                            Berita
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('berita.informasi-lainnya') }}" wire:navigate class="block px-4 py-2 text-xs font-bold text-white/80 hover:text-white hover:bg-emerald-600/30 rounded-lg transition-all">
                            Informasi Lainnya
                        </a>
                    </li>
                </ul>
            </div>
            <button onclick="toggleBeritaMenu(event)" id="btn-berita" class="group flex items-center justify-center md:justify-start h-10 w-10 md:h-12 {{ $isBerita ? 'md:w-36 bg-emerald-600' : 'md:w-12 md:hover:w-36 bg-transparent hover:bg-emerald-600' }} rounded-full transition-all duration-300 overflow-hidden relative p-1 md:p-1.5 cursor-pointer outline-none">
                <span class="flex-shrink-0 w-8 h-8 md:w-9 md:h-9 flex items-center justify-center rounded-full {{ $isBerita ? 'bg-emerald-600' : 'bg-transparent group-hover:bg-emerald-600' }} transition-colors">
                    <!-- Outline: Newspaper -->
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isBerita ? 'hidden' : 'group-hover:hidden' }} btn-icon-outline" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                    <!-- Solid: Newspaper (Detailed) -->
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isBerita ? 'block' : 'hidden group-hover:block' }} btn-icon-solid" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4.5 3.75a.75.75 0 0 0-.75.75v14.25a.75.75 0 0 0 .75.75h15a.75.75 0 0 0 .75-.75V4.5a.75.75 0 0 0-.75-.75H4.5Zm.75 1.5h13.5v12.75H5.25V5.25Zm1.5 1.5v3h3v-3h-3Zm4.5 0v1.5h6v-1.5h-6Zm0 3v1.5h6v-1.5h-6Zm-4.5 3v1.5h10.5v-1.5H6.75Zm0 3v1.5h10.5v-1.5H6.75Z" />
                    </svg>
                </span>
                <span class="hidden md:inline text-white text-sm font-medium whitespace-nowrap {{ $isBerita ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }} transition-opacity duration-300 ml-1">Info & Berita</span>
            </button>
        </div>

        <!-- 4. Peraturan/Regulasi -->
        <div class="relative">
            <!-- Peraturan Sub-menu -->
            <div id="peraturan-submenu" class="hidden absolute bottom-full left-1/2 -translate-x-1/2 mb-3 md:mb-4 w-[200px] md:w-60 bg-teal-950/95 md:bg-teal-950/80 backdrop-blur-xl border border-white/10 rounded-2xl py-2 md:py-3 px-2 shadow-2xl transition-all duration-300 transform translate-y-4 opacity-0 scale-95 origin-bottom">
                <ul class="space-y-1">
                    @php
                        $peraturanMenus = [
                            ['name' => 'Undang-Undang', 'route' => 'peraturan.undang-undang'],
                            ['name' => 'Peraturan Menteri', 'route' => 'peraturan.peraturan-menteri'],
                            ['name' => 'Peraturan Daerah', 'route' => 'peraturan.peraturan-daerah'],
                            ['name' => 'Peraturan Bupati', 'route' => 'peraturan.peraturan-bupati'],
                            ['name' => 'SK Bupati', 'route' => 'peraturan.sk-bupati'],
                            ['name' => 'SK Inspektur', 'route' => 'peraturan.sk-inspektur'],
                            ['name' => 'Lain-Lain', 'route' => 'peraturan.lain-lain'],
                        ];
                    @endphp
                    @foreach($peraturanMenus as $menu)
                    <li>
                        <a href="{{ route($menu['route']) }}" wire:navigate class="block px-4 py-2 text-xs font-bold text-white/80 hover:text-white hover:bg-emerald-600/30 rounded-lg transition-all">
                            {{ $menu['name'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <button onclick="togglePeraturanMenu(event)" id="btn-peraturan" class="group flex items-center justify-center md:justify-start h-10 w-10 md:h-12 {{ $isPeraturan ? 'md:w-48 bg-emerald-600' : 'md:w-12 md:hover:w-48 bg-transparent hover:bg-emerald-600' }} rounded-full transition-all duration-300 overflow-hidden relative p-1 md:p-1.5 cursor-pointer outline-none">
                <span class="flex-shrink-0 w-8 h-8 md:w-9 md:h-9 flex items-center justify-center rounded-full {{ $isPeraturan ? 'bg-emerald-600' : 'bg-transparent group-hover:bg-emerald-600' }} transition-colors">
                    <!-- Outline: ShieldCheck -->
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isPeraturan ? 'hidden' : 'group-hover:hidden' }} btn-icon-outline" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751A11.959 11.959 0 0012 2.714z" />
                    </svg>
                    <!-- Solid: ShieldCheck -->
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isPeraturan ? 'block' : 'hidden group-hover:block' }} btn-icon-solid" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 1.5a.75.75 0 0 1 .75.75c0 .351.042.693.12 1.021.369 1.558 1.41 2.847 2.803 3.593a.75.75 0 0 1 .377.652v3.234c0 5.02-3.328 9.38-8.204 10.743a.75.75 0 0 1-.392 0C3.328 20.13 0 15.77 0 10.75V7.516a.75.75 0 0 1 .377-.652c1.393-.746 2.434-2.035 2.803-3.593.078-.328.12-.67.12-1.021a.75.75 0 0 1 .75-.75h7.95Zm.53 10.03a.75.75 0 1 0-1.06-1.06L9 12.94l-1.47-1.47a.75.75 0 0 0-1.06 1.06L8.44 14l-1.47 1.47a.75.75 0 1 0 1.06 1.06L9 15.06l1.47 1.47a.75.75 0 1 0 1.06-1.06L10.56 14l1.47-1.47Z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="hidden md:inline text-white text-sm font-medium whitespace-nowrap {{ $isPeraturan ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }} transition-opacity duration-300 ml-1">Peraturan</span>
            </button>
        </div>

        <!-- 5. Dokumen -->
        <div class="relative">
            <!-- Dokumen Sub-menu -->
            <div id="dokumen-submenu" class="hidden absolute bottom-full left-1/2 -translate-x-1/2 mb-3 md:mb-4 w-[200px] md:w-60 bg-teal-950/95 md:bg-teal-950/80 backdrop-blur-xl border border-white/10 rounded-2xl py-2 md:py-3 px-2 shadow-2xl transition-all duration-300 transform translate-y-4 opacity-0 scale-95 origin-bottom">
                <ul class="space-y-1">
                    @php
                        $dokumenMenus = [
                            ['name' => 'SAKIP', 'route' => 'dokumen.sakip'],
                            ['name' => 'SPIP', 'route' => 'dokumen.spip'],
                            ['name' => 'Gratifikasi', 'route' => 'dokumen.gratifikasi'],
                            ['name' => 'LHKPN', 'route' => 'dokumen.lhkpn'],
                            ['name' => 'Kapabilitas APIP', 'route' => 'dokumen.kapabilitas-apip'],
                            ['name' => 'Piagam Audit', 'route' => 'dokumen.piagam-audit'],
                            ['name' => 'Standar Pelayanan', 'route' => 'dokumen.standar-pelayanan'],
                            ['name' => 'Laporan Keuangan', 'route' => 'dokumen.laporan-keuangan'],
                        ];
                    @endphp
                    @foreach($dokumenMenus as $menu)
                    <li>
                        <a href="{{ route($menu['route']) }}" wire:navigate class="block px-4 py-2 text-xs font-bold text-white/80 hover:text-white hover:bg-emerald-600/30 rounded-lg transition-all">
                            {{ $menu['name'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <button onclick="toggleDokumenMenu(event)" id="btn-dokumen" class="group flex items-center justify-center md:justify-start h-10 w-10 md:h-12 {{ $isDokumen ? 'md:w-36 bg-emerald-600' : 'md:w-12 md:hover:w-36 bg-transparent hover:bg-emerald-600' }} rounded-full transition-all duration-300 overflow-hidden relative p-1 md:p-1.5 cursor-pointer outline-none">
                <span class="flex-shrink-0 w-8 h-8 md:w-9 md:h-9 flex items-center justify-center rounded-full {{ $isDokumen ? 'bg-emerald-600' : 'bg-transparent group-hover:bg-emerald-600' }} transition-colors">
                    <!-- Outline: DocumentText -->
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isDokumen ? 'hidden' : 'group-hover:hidden' }} btn-icon-outline" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <!-- Solid: DocumentText -->
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isDokumen ? 'block' : 'hidden group-hover:block' }} btn-icon-solid" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V11.25a9 9 0 00-9-9H5.625zM12.971 7.5H10.5a.75.75 0 01-.75-.75V5.357c0-.284.114-.543.29-.72l.001-.001.002-.002.002-.002.005-.005.01-.01.026-.025.074-.067A33.27 33.27 0 0112.97 7.5zm.75 1.5v-4.5c0-.05.002-.099.006-.148A.75.75 0 0113.84 5h3.414l-4.529 4.5h.001zM10.5 13.5a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zm0 3a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="hidden md:inline text-white text-sm font-medium whitespace-nowrap {{ $isDokumen ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }} transition-opacity duration-300 ml-1">Dokumen</span>
            </button>
        </div>

        <!-- 6. Layanan -->
        <div class="relative">
            <!-- Layanan Sub-menu -->
            <div id="layanan-submenu" class="hidden absolute bottom-full left-1/2 -translate-x-1/2 mb-3 md:mb-4 w-[200px] md:w-60 bg-teal-950/95 md:bg-teal-950/80 backdrop-blur-xl border border-white/10 rounded-2xl py-2 md:py-3 px-2 shadow-2xl transition-all duration-300 transform translate-y-4 opacity-0 scale-95 origin-bottom">
                <ul class="space-y-1">
                    @php
                        $layananMenus = [
                            ['name' => 'Tentang WBS', 'route' => 'layanan.wbs'],
                            ['name' => 'Lapor Pengaduan', 'route' => 'layanan.pengaduan'],
                            ['name' => 'Cek Pengaduan', 'route' => 'layanan.cek-pengaduan'],
                        ];
                    @endphp
                    @foreach($layananMenus as $item)
                    <li>
                        <a href="{{ route($item['route']) }}" wire:navigate class="block px-4 py-2 text-xs font-bold text-white/80 hover:text-white hover:bg-emerald-600/30 rounded-lg transition-all">
                            {{ $item['name'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <button onclick="toggleLayananMenu(event)" id="btn-layanan" class="group flex items-center justify-center md:justify-start h-10 w-10 md:h-12 {{ $isLayanan ? 'md:w-32 bg-emerald-600' : 'md:w-12 md:hover:w-32 bg-transparent hover:bg-emerald-600' }} rounded-full transition-all duration-300 overflow-hidden relative p-1 md:p-1.5 cursor-pointer outline-none">
                <span class="flex-shrink-0 w-8 h-8 md:w-9 md:h-9 flex items-center justify-center rounded-full {{ $isLayanan ? 'bg-emerald-600' : 'bg-transparent group-hover:bg-emerald-600' }} transition-colors">
                    <!-- Outline: Support Agent (Final Refinement) -->
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isLayanan ? 'hidden' : 'group-hover:hidden' }} btn-icon-outline" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /> <!-- Head -->
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.501 20.118a7.5 7.5 0 0114.998 0" /> <!-- Shoulders -->
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.5 12V9a6.5 6.5 0 00-13 0v3m13 0a1.5 1.5 0 01-1.5 1.5h-1M5.5 12a1.5 1.5 0 001.5 1.5h1" /> <!-- Headset -->
                        <path d="M4 11h2v4H4M18 11h2v4h-2" stroke-linecap="round" stroke-linejoin="round" /> <!-- Earcups -->
                        <path d="M18 12c0 4-2 6-6 6" stroke-linecap="round" stroke-linejoin="round" /> <!-- Mic -->
                    </svg>
                    <!-- Solid: Support Agent (Final Refinement - Matches Screenshot) -->
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white {{ $isLayanan ? 'block' : 'hidden group-hover:block' }} btn-icon-solid" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 10c-4.418 0-8 3.582-8 8v1a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-1c0-4.418-3.582-8-8-8z" /> <!-- Person -->
                        <path d="M12 1a8 8 0 0 0-8 8v3h1a1 1 0 0 0 1-1V9a6 6 0 0 1 12 0v2a1 1 0 0 0 1 1h1V9a8 8 0 0 0-8-8z" /> <!-- Headset Band -->
                        <path d="M3 10h3v5H3v-5zm15 0h3v5h-3v-5z" /> <!-- Earcups -->
                        <path d="M21 12.5a.5.5 0 0 1 .5.5v1.5a2.5 2.5 0 0 1-2.5 2.5h-2.5a.5.5 0 0 1 0-1h2.5a1.5 1.5 0 0 0 1.5-1.5V13a.5.5 0 0 1 .5-.5z" /> <!-- Mic -->
                    </svg>
                </span>
                <span class="hidden md:inline text-white text-sm font-medium whitespace-nowrap {{ $isLayanan ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }} transition-opacity duration-300 ml-1">Layanan</span>
            </button>
        </div>

        <!-- Separator -->
        <div class="hidden md:block w-px h-8 bg-white/20 mx-1"></div>

        <!-- 7. PPID -->
        <div class="relative px-2">
            <!-- PPID Sub-menu -->
            <div id="ppid-submenu" class="hidden absolute bottom-full left-1/2 -translate-x-1/2 mb-3 md:mb-4 w-[200px] md:w-60 bg-teal-950/95 md:bg-teal-950/80 backdrop-blur-xl border border-white/10 rounded-2xl py-2 md:py-3 px-2 shadow-2xl transition-all duration-300 transform translate-y-4 opacity-0 scale-95 origin-bottom">
                <ul class="space-y-1">
                    @php
                        $ppidMenus = [
                            ['name' => 'Tentang PPID', 'route' => 'ppid.tentang'],
                            ['name' => 'Informasi Berkala', 'route' => 'ppid.berkala'],
                            ['name' => 'Informasi Serta Merta', 'route' => 'ppid.serta-merta'],
                            ['name' => 'Informasi Dikecualikan', 'route' => 'ppid.dikecualikan'],
                            ['name' => 'Informasi Setiap Saat', 'route' => 'ppid.setiap-saat'],
                        ];
                    @endphp
                    @foreach($ppidMenus as $item)
                    <li>
                        <a href="{{ route($item['route']) }}" wire:navigate class="block px-4 py-2 text-xs font-bold text-white/80 hover:text-white hover:bg-emerald-600/30 rounded-lg transition-all">
                            {{ $item['name'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <button onclick="togglePpidMenu(event)" id="btn-ppid" class="flex items-center gap-1 md:gap-2 px-2 md:px-3 py-1 md:py-1.5 rounded-full border border-white/20 bg-white/5 hover:bg-emerald-600 hover:border-emerald-500 transition-all duration-300 cursor-pointer outline-none">
                <img src="https://placehold.co/24x24/white/transparent?text=P" alt="PPID" class="w-4 h-4 md:w-5 md:h-5 rounded-full bg-white/10">
                <span class="text-white text-[10px] md:text-xs font-bold tracking-wider">PPID</span>
            </button>
        </div>

    </div>
</div>

<style>
/* Stay expanded when button has the 'active' class */
#btn-profile.active-state, #btn-dokumen.active-state, #btn-peraturan.active-state, #btn-berita.active-state, #btn-layanan.active-state, #btn-ppid.active-state {
    background-color: var(--color-emerald-600, #059669) !important;
}
#btn-profile.active-state {
    width: 8rem !important; /* matches hover:w-32 */
}
#btn-dokumen.active-state {
    width: 9rem !important; /* matches hover:w-36 */
}
#btn-peraturan.active-state {
    width: 12rem !important; /* matches hover:w-48 */
}
#btn-berita.active-state {
    width: 8rem !important; /* matches hover:w-32 */
}
#btn-layanan.active-state {
    width: 8rem !important; /* matches hover:w-32 */
}
#btn-profile.active-state .btn-icon-outline, #btn-dokumen.active-state .btn-icon-outline, #btn-peraturan.active-state .btn-icon-outline, #btn-berita.active-state .btn-icon-outline, #btn-layanan.active-state .btn-icon-outline {
    display: none !important;
}
#btn-profile.active-state .btn-icon-solid, #btn-dokumen.active-state .btn-icon-solid, #btn-peraturan.active-state .btn-icon-solid, #btn-berita.active-state .btn-icon-solid, #btn-layanan.active-state .btn-icon-solid {
    display: block !important;
}
#btn-profile.active-state span:last-child, #btn-dokumen.active-state span:last-child, #btn-peraturan.active-state span:last-child, #btn-berita.active-state span:last-child, #btn-layanan.active-state span:last-child {
    opacity: 1 !important;
}
</style>

<script>
function toggleProfileMenu(event) {
    event.stopPropagation();
    const submenu = document.getElementById('profile-submenu');
    const isHidden = submenu.classList.contains('hidden');

    if (isHidden) {
        openSubmenu('profile-submenu', 'btn-profile');
    } else {
        closeSubmenus();
    }
}

function toggleDokumenMenu(event) {
    event.stopPropagation();
    const submenu = document.getElementById('dokumen-submenu');
    const isHidden = submenu.classList.contains('hidden');

    if (isHidden) {
        openSubmenu('dokumen-submenu', 'btn-dokumen');
    } else {
        closeSubmenus();
    }
}

function togglePeraturanMenu(event) {
    event.stopPropagation();
    const submenu = document.getElementById('peraturan-submenu');
    const isHidden = submenu.classList.contains('hidden');

    if (isHidden) {
        openSubmenu('peraturan-submenu', 'btn-peraturan');
    } else {
        closeSubmenus();
    }
}

function toggleBeritaMenu(event) {
    event.stopPropagation();
    const submenu = document.getElementById('berita-submenu');
    const isHidden = submenu.classList.contains('hidden');

    if (isHidden) {
        openSubmenu('berita-submenu', 'btn-berita');
    } else {
        closeSubmenus();
    }
}

function toggleLayananMenu(event) {
    event.stopPropagation();
    const submenu = document.getElementById('layanan-submenu');
    const isHidden = submenu.classList.contains('hidden');

    if (isHidden) {
        openSubmenu('layanan-submenu', 'btn-layanan');
    } else {
        closeSubmenus();
    }
}

function togglePpidMenu(event) {
    event.stopPropagation();
    const submenu = document.getElementById('ppid-submenu');
    const isHidden = submenu.classList.contains('hidden');

    if (isHidden) {
        openSubmenu('ppid-submenu', 'btn-ppid');
    } else {
        closeSubmenus();
    }
}

function openSubmenu(menuId, btnId) {
    closeSubmenus(); // Close others first (immediately)
    
    const submenu = document.getElementById(menuId);
    const overlay = document.getElementById('nav-overlay');
    const btn = document.getElementById(btnId);

    submenu.classList.remove('hidden');
    overlay.classList.remove('hidden');
    btn.classList.add('active-state');
    
    setTimeout(() => {
        submenu.classList.remove('translate-y-4', 'opacity-0', 'scale-95');
        overlay.classList.remove('opacity-0');
    }, 10);
}

function closeSubmenus() {
    const submenus = ['profile-submenu', 'dokumen-submenu', 'peraturan-submenu', 'berita-submenu', 'layanan-submenu', 'ppid-submenu'];
    const buttons = ['btn-profile', 'btn-dokumen', 'btn-peraturan', 'btn-berita', 'btn-layanan', 'btn-ppid'];
    const overlay = document.getElementById('nav-overlay');

    submenus.forEach(id => {
        const el = document.getElementById(id);
        if (el && !el.classList.contains('hidden')) {
            el.classList.add('translate-y-4', 'opacity-0', 'scale-95');
            el.dataset.closing = "true";
            setTimeout(() => {
                if (el.dataset.closing === "true") {
                    el.classList.add('hidden');
                    delete el.dataset.closing;
                }
            }, 300);
        }
    });

    buttons.forEach(id => {
        const btn = document.getElementById(id);
        if (btn) btn.classList.remove('active-state');
    });

    overlay.classList.add('opacity-0');
    setTimeout(() => {
        const anyOpen = submenus.some(id => !document.getElementById(id).classList.contains('hidden') && !document.getElementById(id).dataset.closing);
        if (!anyOpen) overlay.classList.add('hidden');
    }, 300);
}

// Close on escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeSubmenus();
});
</script>
