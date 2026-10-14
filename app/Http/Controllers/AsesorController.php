<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Performance Optimization:
        // Cache the active asesors along with their schemes for 24 hours.
        // This avoids frequent database queries and joins on every page load,
        // reducing response time significantly.
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors', 86400, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
