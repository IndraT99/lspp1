<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors with their schemes to reduce database queries.
        // Performance impact: Reduces 2 DB queries (asesors and schemes) to 0 queries on cache hit.
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors_with_schemes', 86400, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
