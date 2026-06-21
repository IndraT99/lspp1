<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // Optimization: Cache expensive eager-loaded asesors query
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
