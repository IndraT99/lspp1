<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache the asesors with eager loaded schemes to reduce database queries on this frequently accessed page
        // Impact: Reduces DB queries from 2 to 0 on subsequent page loads
        $asesors = \Illuminate\Support\Facades\Cache::remember('asesors_with_scheme', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
