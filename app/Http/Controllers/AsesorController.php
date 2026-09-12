<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Performance Optimization
        // Cache active asesors with their eagerly loaded schemes for 24 hours.
        // This prevents repetitive database queries and N+1 query overhead.
        // Cache is invalidated via model events (saved/deleted) on Asesor and Scheme.
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors', 60 * 60 * 24, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
