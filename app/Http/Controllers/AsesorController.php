<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Optimization: Cache active assessors with their schemes
        // Expected impact: Eliminates 1 query with eager loading on the public assessor page
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
