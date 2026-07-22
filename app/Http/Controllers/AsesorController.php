<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Optimization: Cache the active assessors list with their related scheme
        // Reduces N+1 DB queries on the Assessor page to 0 when cached
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('asesors_active_with_scheme', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
