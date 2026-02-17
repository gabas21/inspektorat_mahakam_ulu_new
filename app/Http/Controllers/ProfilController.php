<?php

namespace App\Http\Controllers;

class ProfilController extends Controller
{
    public function visiMisi()
    {
        return view('profil.visi-misi');
    }

    public function tujuanSasaran()
    {
        return view('profil.tujuan-sasaran');
    }

    public function tugasFungsi()
    {
        return view('profil.tugas-fungsi');
    }

    public function profilPimpinan()
    {
        return view('profil.profil-pimpinan');
    }

    public function aparatur()
    {
        return view('profil.aparatur');
    }

    public function strukturOrganisasi()
    {
        return view('profil.struktur-organisasi');
    }

    public function mottoMaklumat()
    {
        return view('profil.motto-maklumat');
    }

    public function penghargaan()
    {
        return view('profil.penghargaan');
    }
}
