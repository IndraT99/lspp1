<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Cache active asesors with their schemes to reduce database queries on public page
        // Performance impact: Avoids repeated DB query and eager-loading on high-traffic page
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors_with_schemes', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
