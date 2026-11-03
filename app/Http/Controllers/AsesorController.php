<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache eager-loaded asesors for 1 hour to prevent redundant N+1 DB queries and improve response time.
        $asesors = \Illuminate\Support\Facades\Cache::remember('asesors.active', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
