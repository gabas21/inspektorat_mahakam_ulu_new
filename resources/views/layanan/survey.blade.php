@extends('layouts.app')

@section('title', 'E-SKM - Survey Kepuasan Masyarakat - Inspektorat Kabupaten Mahakam Ulu')

@section('content')
<!-- Success Popup Modal -->
@if(session('success'))
<div id="successModal" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white rounded-3xl p-8 max-w-md mx-4 text-center shadow-2xl transform animate-bounce-in">
        <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h3 class="text-2xl font-black text-slate-900 font-montserrat uppercase mb-3">Terima Kasih!</h3>
        <p class="text-slate-500 mb-6">{{ session('success') }}</p>
        <button onclick="document.getElementById('successModal').style.display='none'" class="w-full py-4 bg-emerald-600 text-white font-black uppercase tracking-widest rounded-xl hover:bg-emerald-700 transition-all">
            Tutup
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
                Layanan Masyarakat
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white px-2 drop-shadow-[0_4px_12px_rgba(0,0,0,0.5)] font-montserrat uppercase tracking-tight leading-[1.1]">
                E-SKM <span class="text-emerald-400">Inspektorat</span>
            </h2>
            <p class="text-white/60 mt-4 max-w-lg mx-auto">Survey Kepuasan Masyarakat - Kabupaten Mahakam Ulu</p>
        </div>
    </div>
</section>

<!-- Dashboard Section -->
<section class="relative bg-white py-16 lg:py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        
        @php
            $totalSurvey = \App\Models\SurveyKepuasan::count();
            $avgScore = 0;
            if($totalSurvey > 0) {
                $surveys = \App\Models\SurveyKepuasan::all();
                $totalPoints = 0;
                foreach($surveys as $s) {
                    $totalPoints += ($s->q1_prosedur + $s->q2_persyaratan + $s->q3_waktu + $s->q4_biaya + $s->q5_produk + $s->q6_kompetensi + $s->q7_perilaku + $s->q8_penanganan + $s->q9_sarana) / 9;
                }
                $avgScore = $totalPoints / $totalSurvey;
                $nilaiIKM = ($avgScore * 25);
            } else {
                $nilaiIKM = 0;
            }
            
            if($nilaiIKM >= 88.31) { $mutu = 'A'; $kinerja = 'Sangat Baik'; $mutuColor = 'bg-emerald-500'; }
            elseif($nilaiIKM >= 76.61) { $mutu = 'B'; $kinerja = 'Baik'; $mutuColor = 'bg-blue-500'; }
            elseif($nilaiIKM >= 65.00) { $mutu = 'C'; $kinerja = 'Kurang Baik'; $mutuColor = 'bg-yellow-500'; }
            elseif($nilaiIKM >= 25.00) { $mutu = 'D'; $kinerja = 'Tidak Baik'; $mutuColor = 'bg-orange-500'; }
            else { $mutu = 'E'; $kinerja = 'Sangat Tidak Baik'; $mutuColor = 'bg-red-500'; }
        @endphp

        <!-- Dashboard Grid -->
        <div class="grid lg:grid-cols-12 gap-8">
            
            <!-- Left Panel - Nilai IKM -->
            <div class="lg:col-span-3 space-y-6">
                <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Nilai IKM</p>
                    
                    <div class="bg-gradient-to-br from-emerald-50 to-white rounded-2xl p-6 text-center border border-emerald-100 mb-6">
                        <p class="text-5xl md:text-6xl font-black text-emerald-600 font-montserrat">{{ number_format($nilaiIKM, 2) }}</p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-slate-50 rounded-xl p-4 text-center">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Kualitas</p>
                            <p class="text-sm font-black text-emerald-600 uppercase">{{ $kinerja }}</p>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-4 text-center">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Mutu</p>
                            <p class="text-3xl font-black text-emerald-600">{{ $mutu }}</p>
                        </div>
                    </div>
                    
                    <a href="#surveyForm" class="block mt-6 w-full py-4 bg-emerald-600 text-white text-center font-black uppercase tracking-widest rounded-xl hover:bg-emerald-700 hover:shadow-lg hover:shadow-emerald-500/30 transition-all text-sm">
                        Mulai Survei
                    </a>
                </div>
                
                <!-- Total Responden -->
                <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 text-center">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Total Responden</p>
                    <p class="text-5xl font-black text-emerald-600 font-montserrat">{{ $totalSurvey }}</p>
                </div>
            </div>

            <!-- Center Panel - Table -->
            <div class="lg:col-span-6">
                <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 h-full">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-black rounded-full tracking-[0.2em] uppercase">Data Survey</span>
                            <h3 class="text-xl font-black text-slate-900 font-montserrat uppercase mt-2">Unsur Pelayanan</h3>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b-2 border-emerald-200">
                                    <th class="py-3 px-3 text-left font-bold text-slate-700">No</th>
                                    <th class="py-3 px-3 text-left font-bold text-slate-700">Unsur Pelayanan</th>
                                    <th class="py-3 px-3 text-center font-bold text-slate-700">Nilai</th>
                                    <th class="py-3 px-3 text-center font-bold text-slate-700">Mutu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $unsurList = [
                                    ['Persyaratan', 'q1_prosedur'],
                                    ['Prosedur Pelayanan', 'q2_persyaratan'],
                                    ['Waktu Pelaksana', 'q3_waktu'],
                                    ['Biaya / Tarif', 'q4_biaya'],
                                    ['Produk Layanan', 'q5_produk'],
                                    ['Kompetensi Pelaksana', 'q6_kompetensi'],
                                    ['Perilaku Pelaksana', 'q7_perilaku'],
                                    ['Sarana dan Prasarana', 'q8_penanganan'],
                                    ['Penanganan Pengaduan', 'q9_sarana'],
                                ];
                                @endphp
                                @foreach($unsurList as $i => $unsur)
                                @php
                                    $nilaiUnsur = $totalSurvey > 0 ? \App\Models\SurveyKepuasan::avg($unsur[1]) ?? 0 : 0;
                                    $nilaiKonversi = $nilaiUnsur * 25;
                                    if($nilaiKonversi >= 88.31) { $mutuUnsur = 'A'; $colorUnsur = 'bg-emerald-500'; }
                                    elseif($nilaiKonversi >= 76.61) { $mutuUnsur = 'B'; $colorUnsur = 'bg-blue-500'; }
                                    elseif($nilaiKonversi >= 65.00) { $mutuUnsur = 'C'; $colorUnsur = 'bg-yellow-500'; }
                                    elseif($nilaiKonversi >= 25.00) { $mutuUnsur = 'D'; $colorUnsur = 'bg-orange-500'; }
                                    else { $mutuUnsur = 'E'; $colorUnsur = 'bg-red-500'; }
                                @endphp
                                <tr class="border-b border-slate-100 hover:bg-emerald-50/50 transition-colors">
                                    <td class="py-3 px-3 text-emerald-600 font-bold">{{ $i + 1 }}</td>
                                    <td class="py-3 px-3 text-slate-700 font-medium">{{ $unsur[0] }}</td>
                                    <td class="py-3 px-3 text-center font-bold text-slate-800">{{ number_format($nilaiUnsur, 3) }}</td>
                                    <td class="py-3 px-3 text-center">
                                        <span class="inline-block w-8 h-8 {{ $colorUnsur }} rounded-lg font-black text-white leading-8 text-sm">{{ $mutuUnsur }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Panel - Legend -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 h-full">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Keterangan Mutu</p>
                    
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl">
                            <span class="w-10 h-10 bg-emerald-500 text-white rounded-xl font-black text-lg flex items-center justify-center">A</span>
                            <div>
                                <p class="font-bold text-slate-800 text-sm">Sangat Baik</p>
                                <p class="text-xs text-slate-400">88,31 - 100,00</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl">
                            <span class="w-10 h-10 bg-blue-500 text-white rounded-xl font-black text-lg flex items-center justify-center">B</span>
                            <div>
                                <p class="font-bold text-slate-800 text-sm">Baik</p>
                                <p class="text-xs text-slate-400">76,61 - 88,30</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl">
                            <span class="w-10 h-10 bg-yellow-500 text-white rounded-xl font-black text-lg flex items-center justify-center">C</span>
                            <div>
                                <p class="font-bold text-slate-800 text-sm">Kurang Baik</p>
                                <p class="text-xs text-slate-400">65,00 - 76,60</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl">
                            <span class="w-10 h-10 bg-orange-500 text-white rounded-xl font-black text-lg flex items-center justify-center">D</span>
                            <div>
                                <p class="font-bold text-slate-800 text-sm">Tidak Baik</p>
                                <p class="text-xs text-slate-400">25,00 - 64,99</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl">
                            <span class="w-10 h-10 bg-red-500 text-white rounded-xl font-black text-lg flex items-center justify-center">E</span>
                            <div>
                                <p class="font-bold text-slate-800 text-sm">Sangat Tidak Baik</p>
                                <p class="text-xs text-slate-400">0,00 - 24,99</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Survey Form Section -->
<section id="surveyForm" class="relative py-16 lg:py-20 overflow-hidden">
    <img src="{{ asset('images/background.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none" alt="Background">
    <div class="absolute inset-0 bg-teal-950/90"></div>
    
    <!-- Decorative Elements -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-emerald-500/10 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-teal-400/10 rounded-full blur-[120px]"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto">
            
            <!-- Section Title -->
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1.5 bg-emerald-500/20 backdrop-blur-md border border-emerald-400/30 text-emerald-400 text-[10px] font-black rounded-full mb-4 tracking-[0.3em] uppercase">
                    Form Survey
                </span>
                <h2 class="text-3xl md:text-4xl font-black text-white font-montserrat uppercase tracking-tight">
                    Isi Survey <span class="text-emerald-400">Kepuasan</span>
                </h2>
                <p class="text-white/60 mt-4 max-w-xl mx-auto">
                    Berikan penilaian Anda untuk membantu kami meningkatkan kualitas pelayanan
                </p>
            </div>
            
            <!-- Form Card -->
            <div class="bg-white/10 backdrop-blur-xl rounded-[2rem] p-8 md:p-10 border border-white/20">
                <form action="{{ route('layanan.survey.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Data Responden -->
                    <div>
                        <h4 class="text-sm font-black text-emerald-400 uppercase tracking-wider mb-4">Data Responden (Opsional)</h4>
                        <div class="grid md:grid-cols-3 gap-4">
                            <input type="text" name="nama" placeholder="Nama" class="px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:outline-none focus:border-emerald-400 transition-all">
                            <select name="jenis_kelamin" class="px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white focus:outline-none focus:border-emerald-400 transition-all">
                                <option value="" class="bg-slate-800">Jenis Kelamin</option>
                                <option value="laki-laki" class="bg-slate-800">Laki-laki</option>
                                <option value="perempuan" class="bg-slate-800">Perempuan</option>
                            </select>
                            <select name="usia" class="px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white focus:outline-none focus:border-emerald-400 transition-all">
                                <option value="" class="bg-slate-800">Usia</option>
                                <option value="< 20" class="bg-slate-800">< 20 tahun</option>
                                <option value="20-30" class="bg-slate-800">20 - 30 tahun</option>
                                <option value="31-40" class="bg-slate-800">31 - 40 tahun</option>
                                <option value="41-50" class="bg-slate-800">41 - 50 tahun</option>
                                <option value="> 50" class="bg-slate-800">> 50 tahun</option>
                            </select>
                        </div>
                    </div>

                    <!-- Jenis Layanan -->
                    <div>
                        <label class="block text-sm font-bold text-emerald-400 uppercase tracking-wider mb-2">Jenis Layanan <span class="text-red-400">*</span></label>
                        <select name="jenis_layanan" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white focus:outline-none focus:border-emerald-400 transition-all">
                            <option value="" disabled selected class="bg-slate-800">Pilih Layanan...</option>
                            <option value="Konsultasi Pengawasan" class="bg-slate-800">Konsultasi Pengawasan</option>
                            <option value="Layanan Pengaduan" class="bg-slate-800">Layanan Pengaduan</option>
                            <option value="Layanan Informasi Publik" class="bg-slate-800">Layanan Informasi Publik</option>
                            <option value="Lainnya" class="bg-slate-800">Lainnya</option>
                        </select>
                    </div>

                    <!-- Pertanyaan Survey -->
                    <div>
                        <h4 class="text-sm font-black text-emerald-400 uppercase tracking-wider mb-6">Penilaian Pelayanan</h4>
                        
                        @php
                        $questions = [
                            'q1_prosedur' => 'Persyaratan',
                            'q2_persyaratan' => 'Prosedur Pelayanan',
                            'q3_waktu' => 'Waktu Pelaksana',
                            'q4_biaya' => 'Biaya / Tarif',
                            'q5_produk' => 'Produk Layanan',
                            'q6_kompetensi' => 'Kompetensi Pelaksana',
                            'q7_perilaku' => 'Perilaku Pelaksana',
                            'q8_penanganan' => 'Sarana dan Prasarana',
                            'q9_sarana' => 'Penanganan Pengaduan',
                        ];
                        @endphp

                        <div class="space-y-4">
                            @foreach($questions as $name => $question)
                            <div class="bg-white/5 backdrop-blur rounded-xl p-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <span class="font-medium text-white">{{ $loop->iteration }}. {{ $question }}</span>
                                <div class="flex flex-wrap gap-2">
                                    @foreach([1 => 'Tidak Baik', 2 => 'Kurang Baik', 3 => 'Baik', 4 => 'Sangat Baik'] as $value => $label)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="{{ $name }}" value="{{ $value }}" required class="peer sr-only">
                                        <div class="px-3 py-2 bg-white/10 border border-white/20 rounded-lg text-xs font-medium text-white/70 transition-all peer-checked:bg-emerald-500 peer-checked:border-emerald-400 peer-checked:text-white hover:border-emerald-400/50">
                                            {{ $label }}
                                        </div>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Saran -->
                    <div>
                        <label class="block text-sm font-bold text-emerald-400 uppercase tracking-wider mb-2">Kritik & Saran</label>
                        <textarea name="saran" rows="3" placeholder="Masukkan kritik dan saran Anda..." class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:outline-none focus:border-emerald-400 transition-all"></textarea>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="w-full py-4 bg-emerald-600 text-white font-black uppercase tracking-widest rounded-xl hover:bg-emerald-700 hover:shadow-lg hover:shadow-emerald-500/30 transition-all transform hover:-translate-y-1">
                        Kirim Survey
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>



@push('scripts')
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
