<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active assessors and their schemes to prevent expensive repeated database hits on a public route.
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors_with_scheme', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
