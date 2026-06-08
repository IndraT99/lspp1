<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Performance Optimization: Cache active asesors with eager-loaded schemes for 1 hour to reduce repeated database queries.
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors_with_schemes', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
