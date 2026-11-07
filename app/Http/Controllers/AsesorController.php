<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache the list of active asesors for 1 hour to reduce database queries on this public page.
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors_with_scheme', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
