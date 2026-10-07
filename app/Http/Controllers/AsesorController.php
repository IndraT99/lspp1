<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache asesors list to reduce database queries.
        // Invalidated in Asesor and Scheme model booted events.
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('asesors.public', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
