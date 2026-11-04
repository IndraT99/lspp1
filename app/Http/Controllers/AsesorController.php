<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Cache active asesors with their schemes to eliminate database queries on this public page
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('asesors.active.with_scheme', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
