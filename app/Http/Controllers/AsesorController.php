<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors with their schemes to avoid DB queries on every request
        // Impact: Reduces DB queries for this route from 2 to 0 (cache hit)
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors_with_schemes', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
