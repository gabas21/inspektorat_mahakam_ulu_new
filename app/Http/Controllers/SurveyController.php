<?php

namespace App\Http\Controllers;

use App\Models\SurveyKepuasan;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        return view('layanan.survey');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'usia' => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'jenis_layanan' => 'required|string',
            'q1_prosedur' => 'required|integer|between:1,4',
            'q2_persyaratan' => 'required|integer|between:1,4',
            'q3_waktu' => 'required|integer|between:1,4',
            'q4_biaya' => 'required|integer|between:1,4',
            'q5_produk' => 'required|integer|between:1,4',
            'q6_kompetensi' => 'required|integer|between:1,4',
            'q7_perilaku' => 'required|integer|between:1,4',
            'q8_penanganan' => 'required|integer|between:1,4',
            'q9_sarana' => 'required|integer|between:1,4',
            'saran' => 'nullable|string',
        ]);

        SurveyKepuasan::create($validated);

        return redirect()->route('layanan.survey')->with('success', 'Terima kasih! Survey Anda telah berhasil dikirim.');
    }
}
