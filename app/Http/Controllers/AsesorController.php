<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors list to reduce database queries on this public-facing route
        // Impact: Eliminates N+1 queries by caching the eager-loaded relationship.
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
