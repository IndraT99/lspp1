<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // Cache the asesors query for 1 hour to prevent redundant DB hits
        $asesors = \Illuminate\Support\Facades\Cache::remember('asesors.active.with_scheme', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
