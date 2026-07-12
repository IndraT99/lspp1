<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        $asesors = \App\Models\Asesor::getActiveAsesors();
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
