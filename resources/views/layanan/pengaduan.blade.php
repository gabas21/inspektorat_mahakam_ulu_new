@extends('layouts.app')

@section('title', 'Laporan Pengaduan - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-16">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                E-Services
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                Form <span class="text-emerald-400">Pengaduan</span>
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        
        <!-- Form Card -->
        <div class="max-w-[1200px] mx-auto bg-white rounded-[2.5rem] border border-gray-100 shadow-2xl p-8 md:p-12 relative overflow-hidden">
            
            <!-- Header Section (Simplified) -->
            <div class="flex flex-col md:flex-row items-center justify-between mb-10 gap-6">
                <!-- Branding -->
                <div class="flex items-center gap-3 md:gap-5">
                    <div class="w-12 h-12 md:w-16 md:h-16 bg-emerald-50 rounded-xl md:rounded-2xl flex items-center justify-center border border-emerald-100 shadow-sm">
                        <img src="{{ asset('images/logo_mahulu.png') }}" alt="Logo" class="w-8 h-8 md:w-10 md:h-10 object-contain">
                    </div>
                    <div>
                        <span class="block text-emerald-600 text-[10px] md:text-xs font-black tracking-[0.2em] md:tracking-[0.3em] uppercase mb-1">E-Services</span>
                        <h1 class="text-xl md:text-2xl font-black text-slate-800 font-montserrat uppercase leading-none tracking-tight">Formulir Pengaduan</h1>
                    </div>
                </div>
                
                <!-- Info Badge -->
                <div class="hidden md:flex items-center gap-3 px-5 py-2.5 bg-emerald-50 border border-emerald-200 rounded-full">
                    <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                    <span class="text-emerald-700 text-xs font-bold uppercase tracking-wider">Kerahasiaan Terjamin</span>
                </div>
            </div>

            <form action="{{ route('layanan.pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-16">
                    
                    <!-- LEFT COLUMN: Identitas Pelapor -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold text-xs md:text-sm">1</span>
                            <h3 class="text-base md:text-lg font-black text-slate-800 uppercase tracking-wider">Identitas Pelapor</h3>
                        </div>

                        <!-- Kategori -->
                        <div class="group">
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Kategori Laporan</label>
                            <div class="relative">
                                <select name="kategori" class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-slate-700 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 transition-all appearance-none cursor-pointer">
                                    <option value="" disabled selected>Pilih Kategori...</option>
                                    <option value="korupsi">Dugaan Korupsi</option>
                                    <option value="pungli">Pungutan Liar</option>
                                    <option value="gratifikasi">Gratifikasi / Suap</option>
                                    <option value="disiplin">Pelanggaran Disiplin</option>
                                    <option value="layanan">Pelayanan Publik Buruk</option>
                                </select>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5">
                            <!-- Nama -->
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                <input type="text" name="nama" class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-slate-700 placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 transition-all" placeholder="Nama Anda">
                            </div>
                            <!-- NIK -->
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">NIK / Identitas</label>
                                <input type="text" name="nik" class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-slate-700 placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 transition-all" placeholder="16 Digit NIK">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5">
                            <!-- Email -->
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Email</label>
                                <input type="email" name="email" class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-slate-700 placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 transition-all" placeholder="email@contoh.com">
                            </div>
                            <!-- Telepon -->
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">No. Telepon/WA</label>
                                <input type="tel" name="telepon" class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-slate-700 placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 transition-all" placeholder="08...">
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Alamat Lengkap</label>
                            <textarea name="alamat" rows="2" class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-slate-700 placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 transition-all resize-none" placeholder="Alamat domisili saat ini"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5">
                             <!-- Pekerjaan -->
                             <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-slate-700 placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 transition-all">
                            </div>
                            <!-- Unit Kerja -->
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Unit Kerja</label>
                                <input type="text" name="unit_kerja" class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-slate-700 placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 transition-all">
                            </div>
                        </div>

                         <!-- Upload Identitas -->
                         <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">File Identitas (KTP/SIM)</label>
                            <label class="flex items-center gap-4 px-5 py-3 bg-gray-50 border border-gray-200 border-dashed rounded-2xl cursor-pointer hover:bg-emerald-50 hover:border-emerald-300 transition-all group">
                                <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-600 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-slate-700 group-hover:text-emerald-600 transition-colors" id="label-identitas">Upload Kartu Identitas</p>
                                    <p class="text-[10px] text-slate-500 uppercase tracking-wider">Max 2MB (JPG/PDF)</p>
                                </div>
                                <input type="file" name="identitas" class="hidden" onchange="updateFileLabel(this, 'label-identitas')">
                            </label>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN: Detail Laporan -->
                    <div class="space-y-6">
                         <div class="flex items-center gap-3 mb-2">
                            <span class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold text-xs md:text-sm">2</span>
                            <h3 class="text-base md:text-lg font-black text-slate-800 uppercase tracking-wider">Detail Laporan</h3>
                        </div>

                        <!-- Topik -->
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Topik / Judul Laporan</label>
                            <input type="text" name="topik" class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-slate-700 placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 transition-all" placeholder="Pokok Permasalahan">
                        </div>

                        <!-- Kronologis -->
                        <div class="flex-1">
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Kronologis Kejadian</label>
                            <textarea name="kronologis" rows="6" class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-slate-700 placeholder-slate-400 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 transition-all resize-none" placeholder="Ceritakan detail kejadian secara lengkap..."></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5">
                            <!-- Tanggal -->
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Tanggal Kejadian</label>
                                <input type="date" name="tanggal" class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-slate-700 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-500/20 transition-all">
                            </div>
                            
                            <!-- Data Pendukung (Button Style) -->
                            <div>
                                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">Bukti Pendukung</label>
                                <label class="flex items-center justify-center gap-3 px-5 py-3.5 bg-gray-50 border border-gray-200 border-dashed rounded-2xl cursor-pointer hover:bg-emerald-50 hover:border-emerald-300 transition-all group h-[52px]">
                                    <svg class="w-5 h-5 text-slate-400 group-hover:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                    <span class="text-xs font-bold text-slate-500 group-hover:text-slate-700 transition-colors truncate max-w-[150px]" id="label-bukti">Upload File</span>
                                    <input type="file" name="data_pendukung" class="hidden" onchange="updateFileLabel(this, 'label-bukti')">
                                </label>
                            </div>
                        </div>

                         <!-- Submit Button -->
                         <div class="pt-4">
                            <button type="submit" class="w-full group relative py-3 md:py-4 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl md:rounded-2xl font-black uppercase tracking-widest text-white text-sm md:text-base shadow-lg shadow-emerald-500/30 overflow-hidden transition-all hover:scale-[1.02] hover:shadow-emerald-500/50">
                                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                                <span class="relative flex items-center justify-center gap-3">
                                    Kirim Laporan Pengaduan
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </span>
                            </button>
                        </div>

                    </div>
                </div>
            </form>
            


        </div>
    </div>
</section>



@push('scripts')
<script>
    function updateFileLabel(input, labelId) {
        const label = document.getElementById(labelId);
        if (input.files && input.files[0]) {
            label.textContent = input.files[0].name;
            label.classList.add('text-emerald-600');
        } else {
            label.textContent = labelId === 'label-identitas' ? 'Upload Kartu Identitas' : 'Upload File';
            label.classList.remove('text-emerald-600');
        }
    }
</script>
@endpush
@endsection
