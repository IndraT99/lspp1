<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ BOLT OPTIMIZATION: Cache active asesors and eager-loaded schemes for 1 hour.
        // This eliminates 2 database queries (Asesor + Scheme) per request on a public-facing page,
        // improving response time and reducing database load.
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors_with_scheme', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
