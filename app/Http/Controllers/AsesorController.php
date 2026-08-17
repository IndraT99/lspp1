<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors and their eager-loaded schemes
        // Avoids repeated DB queries for this relatively static data
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('asesors_active', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
