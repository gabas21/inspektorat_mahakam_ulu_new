@extends('layouts.app')

@section('title', 'Status Pengaduan - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/80"></div>
    
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pt-16">
        <div class="relative z-10">
            <span class="inline-block px-3 py-1 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 text-emerald-400 text-[10px] md:text-xs font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                Status Laporan
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                Detail <span class="text-emerald-400">Pengaduan</span>
            </h2>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="relative bg-white py-16 lg:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-3xl mx-auto">
            
            <!-- Kode Laporan Header -->
            <div class="bg-slate-900 rounded-2xl p-6 mb-8 text-center">
                <p class="text-xs text-white/60 uppercase tracking-widest mb-2">Kode Laporan</p>
                <p class="text-3xl font-black text-emerald-400 font-mono tracking-wider">{{ $pengaduan->kode_laporan }}</p>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 p-8 md:p-12">
                
                <!-- Status Badge -->
                <div class="text-center mb-8">
                    <span class="inline-block px-6 py-3 rounded-full text-sm font-black uppercase tracking-wider
                        @if($pengaduan->status == 'pending') bg-yellow-100 text-yellow-700
                        @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-700
                        @elseif($pengaduan->status == 'selesai') bg-emerald-100 text-emerald-700
                        @else bg-red-100 text-red-700
                        @endif">
                        Status: {{ ucfirst($pengaduan->status) }}
                    </span>
                </div>

                <!-- Data Pelapor -->
                <div class="mb-8">
                    <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider mb-4 pb-2 border-b border-gray-100">Data Pelapor</h4>
                    <div class="grid md:grid-cols-2 gap-4 text-sm">
                        <div class="flex justify-between py-2 border-b border-gray-50">
                            <span class="text-slate-500">Nama:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->nama }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-50">
                            <span class="text-slate-500">NIK:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->nik }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-50">
                            <span class="text-slate-500">Email:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->email }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-50">
                            <span class="text-slate-500">Telepon:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->telepon }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-50">
                            <span class="text-slate-500">Pekerjaan:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->pekerjaan }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-50">
                            <span class="text-slate-500">Unit Kerja:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->unit_kerja }}</span>
                        </div>
                        <div class="md:col-span-2 py-2 border-b border-gray-50">
                            <span class="text-slate-500 block mb-1">Alamat:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->alamat }}</span>
                        </div>
                    </div>
                </div>

                <!-- Detail Permasalahan -->
                <div class="mb-8">
                    <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider mb-4 pb-2 border-b border-gray-100">Detail Permasalahan</h4>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between py-2 border-b border-gray-50">
                            <span class="text-slate-500">Kategori:</span>
                            <span class="font-bold text-slate-900 capitalize">{{ $pengaduan->kategori }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-50">
                            <span class="text-slate-500">Tanggal Kejadian:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->tanggal_kejadian->format('d F Y') }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-50">
                            <span class="text-slate-500">Topik:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->topik }}</span>
                        </div>
                        <div class="py-2 border-b border-gray-50">
                            <span class="text-slate-500 block mb-2">Kronologis:</span>
                            <p class="text-slate-900 bg-slate-50 rounded-xl p-4">{{ $pengaduan->kronologis }}</p>
                        </div>
                    </div>
                </div>

                <!-- Dokumen Pendukung -->
                <div class="mb-8">
                    <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider mb-4 pb-2 border-b border-gray-100">Dokumen Pendukung</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <!-- File Identitas -->
                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">File Identitas (KTP/SIM)</p>
                                    @if($pengaduan->file_identitas)
                                        <p class="text-sm font-bold text-slate-900 truncate">{{ basename($pengaduan->file_identitas) }}</p>
                                    @else
                                        <p class="text-sm text-slate-400 italic">Tidak ada file</p>
                                    @endif
                                </div>
                                @if($pengaduan->file_identitas)
                                <div class="flex gap-2 flex-shrink-0">
                                    <a href="{{ asset('storage/' . $pengaduan->file_identitas) }}" target="_blank" class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center text-white hover:bg-blue-600 transition-colors" title="Lihat">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="{{ asset('storage/' . $pengaduan->file_identitas) }}" download target="_blank" class="w-10 h-10 bg-slate-200 rounded-xl flex items-center justify-center text-slate-600 hover:bg-slate-300 transition-colors" title="Download">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- File Bukti Pendukung -->
                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Bukti Pendukung</p>
                                    @if($pengaduan->file_bukti)
                                        <p class="text-sm font-bold text-slate-900 truncate">{{ basename($pengaduan->file_bukti) }}</p>
                                    @else
                                        <p class="text-sm text-slate-400 italic">Tidak ada file</p>
                                    @endif
                                </div>
                                @if($pengaduan->file_bukti)
                                <div class="flex gap-2 flex-shrink-0">
                                    <a href="{{ asset('storage/' . $pengaduan->file_bukti) }}" target="_blank" class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center text-white hover:bg-emerald-600 transition-colors" title="Lihat">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="{{ asset('storage/' . $pengaduan->file_bukti) }}" download target="_blank" class="w-10 h-10 bg-slate-200 rounded-xl flex items-center justify-center text-slate-600 hover:bg-slate-300 transition-colors" title="Download">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Info -->
                <div class="bg-slate-50 rounded-2xl p-6">
                    <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider mb-4">Informasi Waktu</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Laporan Dibuat:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->created_at->format('d F Y, H:i') }} WIB</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Terakhir Diperbarui:</span>
                            <span class="font-bold text-slate-900">{{ $pengaduan->updated_at->format('d F Y, H:i') }} WIB</span>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('layanan.cek-pengaduan') }}" class="flex-1 py-4 bg-slate-100 text-slate-700 font-black uppercase tracking-widest rounded-xl hover:bg-slate-200 transition-all text-center">
                        Cek Laporan Lain
                    </a>
                    <a href="{{ route('home') }}" class="flex-1 py-4 bg-emerald-600 text-white font-black uppercase tracking-widest rounded-xl hover:bg-emerald-700 transition-all text-center">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


@endsection
