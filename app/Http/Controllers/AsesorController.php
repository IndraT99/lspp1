<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Optimization: Cache the active asesors and their schemes forever (invalidated on model save/delete).
        // Expected Impact: Reduces database queries to 0 for this frequently accessed public page.
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('asesors.active', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
