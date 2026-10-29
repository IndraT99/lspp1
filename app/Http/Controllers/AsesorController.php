<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // 💡 What: Cache the query fetching all active asesors with their schemes.
        // 🎯 Why: This data is frequently accessed but rarely updated.
        // 📊 Impact: Eliminates database query on every page load.
        // 🔬 Measurement: Observe query reduction in telescope for this route.
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors_with_scheme', 86400, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
