<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyKepuasan extends Model
{
    use HasFactory;

    protected $table = 'survey_kepuasans';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'usia',
        'pendidikan',
        'pekerjaan',
        'jenis_layanan',
        'q1_prosedur',
        'q2_persyaratan',
        'q3_waktu',
        'q4_biaya',
        'q5_produk',
        'q6_kompetensi',
        'q7_perilaku',
        'q8_penanganan',
        'q9_sarana',
        'saran',
    ];
}
