<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors query with eager-loaded schemes to reduce database hits
        // Impact: Reduces DB queries by 2 (1 for asesors, 1 for schemes) on every page load
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
