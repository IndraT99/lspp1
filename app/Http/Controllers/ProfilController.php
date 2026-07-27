<?php

namespace App\Http\Controllers;

class ProfilController extends Controller
{
    public function visiMisi()
    {
        return view('profil.visi-misi');
    }

    public function fungsiTujuan()
    {
        return view('profil.fungsi-tujuan');
    }
}
