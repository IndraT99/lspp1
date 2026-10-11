<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // Cache the frequently accessed Asesor data with their schemes to reduce database load
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors_with_schemes', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
