<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Cache active assessors and their eager-loaded schemes for 24 hours
        // Avoids repetitive DB queries on the public-facing assessor list
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors', 86400, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
