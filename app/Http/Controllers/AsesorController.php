<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // Bolt Optimization: Cache the active asesors with their schemes to reduce database queries
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('asesors.active', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
