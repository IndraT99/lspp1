<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class AsesorController extends Controller
{
    public function index()
    {
        // Cache the list of active assessors and their schemes to improve performance
        $asesors = Cache::rememberForever('active_asesors_with_schemes', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
