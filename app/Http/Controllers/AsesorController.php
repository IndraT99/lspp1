<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors and eager-load schemes to prevent redundant DB queries
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
