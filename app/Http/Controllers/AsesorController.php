<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Optimization: Cache eager-loaded Assessor data
        // Impact: Reduces DB queries from 2 (Asesor + Scheme) to 0 for subsequent requests.
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('asesors_active_with_schemes', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
