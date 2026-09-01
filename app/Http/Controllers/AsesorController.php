<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Optimization: Cache the frequently accessed and eager-loaded asesors list
        // Impact: Avoids multiple database queries on every page load for static reference data.
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
