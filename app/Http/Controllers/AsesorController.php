<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // Optimization: Cache active asesors with eager-loaded schemes to prevent frequent DB hits
        $asesors = \Illuminate\Support\Facades\Cache::remember('asesors.active', 86400, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
