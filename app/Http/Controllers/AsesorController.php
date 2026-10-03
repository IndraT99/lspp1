<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Cache expensive database call that includes eager-loaded 'scheme' relation
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
