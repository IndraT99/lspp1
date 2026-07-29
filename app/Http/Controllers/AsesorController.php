<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // Bolt: Cache public assessor list to reduce database queries. The cache is invalidated on Asesor or Scheme changes.
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('asesors.active', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
