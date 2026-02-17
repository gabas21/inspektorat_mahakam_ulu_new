<footer class="bg-gradient-to-br from-teal-900 via-teal-950 to-emerald-950 py-8 md:py-10 text-white relative overflow-hidden font-inter">
    <!-- Subtle Background Pattern -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(circle, rgba(16, 185, 129, 0.4) 1px, transparent 1px); background-size: 24px 24px;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-12 gap-6 mb-6">
            <!-- Column 1: Brand & Contact (3 cols) -->
            <div class="col-span-2 md:col-span-12 lg:col-span-3">
                <!-- Logo & Title -->
                <div class="flex items-center gap-3 mb-4 md:mb-6">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/logo_mahulu.png') }}" 
                             alt="Logo Mahakam Ulu" 
                             class="w-10 h-10 md:w-12 md:h-12 object-contain">
                        <img src="{{ asset('images/logo-96-96.jpeg') }}" 
                             alt="Logo Inspektorat" 
                             class="w-10 h-10 md:w-12 md:h-12 rounded-full border-2 border-emerald-500/30 object-cover">
                    </div>
                    <div class="flex flex-col">
                        <h3 class="font-black text-sm md:text-base leading-none font-montserrat uppercase tracking-tight text-white">Inspektorat</h3>
                        <p class="text-[10px] md:text-xs tracking-wide text-emerald-300 font-bold uppercase mt-0.5">Kabupaten Mahakam Ulu</p>
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div class="space-y-2 md:space-y-3 text-xs md:text-sm text-white">
                    <a href="https://maps.google.com/?q=Jl.+Gunung+Belawai+Gang+Dambil+RT.+VII,+Ujoh+Bilang+Kec.+Long+Bagun,+Kabupaten+Mahakam+Ulu,+Kalimantan+Timur+75767" target="_blank" class="flex items-start gap-2 group hover:text-emerald-300 transition-all duration-300">
                        <svg class="w-4 h-4 text-emerald-400 mt-1 flex-shrink-0 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="leading-relaxed">Jl. Gunung Belawai Gang Dambil RT. VII, Ujoh Bilang Kec. Long Bagun, Kabupaten Mahakam Ulu, Kalimantan Timur 75767</span>
                    </a>
                    <a href="tel:05454041287" class="flex items-center gap-2 group hover:text-emerald-300 transition-all duration-300">
                        <svg class="w-4 h-4 text-emerald-400 flex-shrink-0 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>0545-4041-287</span>
                    </a>
                    <a href="mailto:inspektoratmahulu29@gmail.com" class="flex items-center gap-2 group hover:text-emerald-300 transition-all duration-300">
                        <svg class="w-4 h-4 text-emerald-400 flex-shrink-0 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>inspektoratmahulu29@gmail.com</span>
                    </a>
                    <a href="https://www.instagram.com/inspektorat.mahulu/" target="_blank" class="flex items-center gap-2 group hover:text-emerald-300 transition-all duration-300">
                        <svg class="w-4 h-4 text-emerald-400 flex-shrink-0 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.069-4.85.069-3.204 0-3.584-.012-4.849-.069-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        <span>@inspektorat.mahulu</span>
                    </a>
                    <a href="https://www.facebook.com/inspektorat.mahulu/" target="_blank" class="flex items-center gap-2 group hover:text-emerald-300 transition-all duration-300">
                        <svg class="w-4 h-4 text-emerald-400 flex-shrink-0 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                        </svg>
                        <span>Inspektorat Kabupaten Mahakam Ulu</span>
                    </a>
                </div>
            </div>
            
            <!-- Column 2: Link Terkait (2 cols) -->
            <div class="col-span-1 md:col-span-6 lg:col-span-2">
                <div class="mb-3 md:mb-6">
                    <h4 class="text-emerald-300 font-black font-montserrat uppercase tracking-widest text-[10px] md:text-sm inline-block">LINK TERKAIT</h4>
                    <div class="h-0.5 md:h-1 w-8 md:w-10 bg-emerald-500 mt-1 md:mt-2 rounded-full shadow-lg shadow-emerald-500/50"></div>
                </div>
                <ul class="space-y-2 md:space-y-3 text-[10px] md:text-sm text-white">
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://www.kemendagri.go.id/" target="_blank">KEMENDAGRI</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://www.kpk.go.id/id/" target="_blank">KPK RI</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://www.bpk.go.id/" target="_blank">BPK RI</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://www.bpkp.go.id/" target="_blank">BPKP</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://www.kaltimprov.go.id/" target="_blank">PEMPROV KALTIM</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://prokopim.mahakamulukab.go.id/" target="_blank">PEMKAB MAHULU</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://inspektorat.kaltimprov.go.id/" target="_blank">INSPEKTORAT PROV</a>
                    </li>
                </ul>
            </div>
            
            <!-- Column 3: Inspektorat Kota (2 cols) -->
            <div class="col-span-1 md:col-span-6 lg:col-span-2">
                <div class="mb-3 md:mb-6">
                    <h4 class="text-emerald-300 font-black font-montserrat uppercase tracking-widest text-[10px] md:text-sm inline-block">INSPEKTORAT KOTA</h4>
                    <div class="h-0.5 md:h-1 w-8 md:w-10 bg-emerald-500 mt-1 md:mt-2 rounded-full shadow-lg shadow-emerald-500/50"></div>
                </div>
                <ul class="space-y-2 md:space-y-3 text-[10px] md:text-sm text-white">
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://inspektorat.balikpapan.go.id/" target="_blank">Balikpapan</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://inspektorat.bontangkota.go.id/" target="_blank">Bontang</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://inspektorat.samarindakota.go.id/" target="_blank">Samarinda</a>
                    </li>
                </ul>
            </div>
            
            <!-- Column 4: Inspektorat Kabupaten (2 cols) -->
            <div class="col-span-1 md:col-span-6 lg:col-span-2">
                <div class="mb-3 md:mb-6">
                    <h4 class="text-emerald-300 font-black font-montserrat uppercase tracking-widest text-[10px] md:text-sm inline-block">INSPEKTORAT KAB</h4>
                    <div class="h-0.5 md:h-1 w-8 md:w-10 bg-emerald-500 mt-1 md:mt-2 rounded-full shadow-lg shadow-emerald-500/50"></div>
                </div>
                <ul class="space-y-2 md:space-y-3 text-[10px] md:text-sm text-white">
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://inspektorat.kutaibaratkab.go.id/" target="_blank">Kutai Barat</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://inspektorat.kukarkab.go.id/" target="_blank">Kutai Kartanegara</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://inspektorat.kutaitimurkab.go.id/" target="_blank">Kutai Timur</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://inspektorat.beraukab.go.id/" target="_blank">Berau</a>
                    </li>
                    <li class="flex items-center gap-2 group cursor-pointer hover:text-emerald-300 transition-all duration-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/50 group-hover:bg-emerald-400"></span>
                        <a href="https://inspektorat.paserkab.go.id/" target="_blank">Paser</a>
                    </li>
                </ul>
            </div>
            
            <!-- Column 5: Statistik Pengunjung (3 cols) -->
            <div class="col-span-1 md:col-span-12 lg:col-span-3">
                <div class="mb-3 md:mb-6">
                    <h4 class="text-emerald-300 font-black font-montserrat uppercase tracking-widest text-[10px] md:text-sm inline-block">STATISTIK</h4>
                    <div class="h-0.5 md:h-1 w-8 md:w-10 bg-emerald-500 mt-1 md:mt-2 rounded-full shadow-lg shadow-emerald-500/50"></div>
                </div>
                <div class="bg-white/5 backdrop-blur-md border border-emerald-500/20 rounded-lg md:rounded-2xl p-2 md:p-6 shadow-2xl">
                    <div class="space-y-1.5 md:space-y-4 text-[10px] md:text-sm font-medium">
                        <div class="flex justify-between items-center border-b border-emerald-500/10 pb-1 md:pb-2">
                            <span class="text-white uppercase text-[7px] md:text-[10px] tracking-wider md:tracking-widest">Hari Ini</span>
                            <span class="font-black text-emerald-300 text-[10px] md:text-lg">1,371</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-emerald-500/10 pb-1 md:pb-2.5">
                            <span class="text-white uppercase text-[7px] md:text-[10px] tracking-wider md:tracking-widest">Kemarin</span>
                            <span class="font-black text-emerald-300 text-[10px] md:text-lg">3,193</span>
                        </div>
                        <div class="flex justify-between items-center border-b border-emerald-500/10 pb-1 md:pb-2.5">
                            <span class="text-white uppercase text-[7px] md:text-[10px] tracking-wider md:tracking-widest">Bulan Ini</span>
                            <span class="font-black text-emerald-400 text-[10px] md:text-lg font-montserrat">763,012</span>
                        </div>
                        <div class="flex justify-between items-center pt-1 md:pt-2">
                            <span class="text-white font-black uppercase text-[8px] md:text-xs">Total Hits</span>
                            <span class="font-black text-white text-xs md:text-xl bg-emerald-600/30 px-1.5 md:px-3 py-0.5 md:py-1 rounded md:rounded-lg border border-emerald-500/30">763,617</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="border-t border-emerald-500/20 pt-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <!-- Developer Info (Left) -->
                <a href="https://www.akkreatif.com/" target="_blank" class="flex items-center gap-3 group hover:opacity-80 transition-opacity">
                    <div class="relative">
                        <img src="{{ asset('images/logo_ak.png') }}" 
                             alt="Logo AK Kreatif" 
                             class="w-10 h-10 object-contain group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[9px] text-white uppercase tracking-[0.2em] leading-none mb-1">About Developer</span>
                        <span class="text-xs font-black text-emerald-300 tracking-widest uppercase">AK KREATIF</span>
                    </div>
                </a>

                <!-- Copyright (Right) -->
                <div class="text-[10px] text-white uppercase tracking-widest font-medium">
                    &copy; {{ date('Y') }} Inspektorat Mahakam Ulu. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
