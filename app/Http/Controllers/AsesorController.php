<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache the public asesor list to reduce database queries on this frequently accessed page
        $asesors = \Illuminate\Support\Facades\Cache::remember('asesors_public_list', 86400, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
