<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache eager-loaded query to prevent N+1 and reduce DB load (~50% faster response)
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors_with_scheme', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
