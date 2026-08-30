<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ BOLT OPTIMIZATION: Cache the active asesors and eager-loaded schemes for 24h
        // Expected Impact: Eliminates 2 database queries per request to the public asesors route.
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors', 60 * 60 * 24, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
