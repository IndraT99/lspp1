<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache eager-loaded asesors to avoid repeated heavy queries and N+1 overhead
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
