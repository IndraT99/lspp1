<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors with their schemes to prevent database queries on every page load.
        // Invalidated via model events in Asesor and Scheme models.
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors_with_schemes', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
