<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors with eager-loaded schemes to improve performance
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors_with_schemes', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
