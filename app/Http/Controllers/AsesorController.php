<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        $asesors = \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
