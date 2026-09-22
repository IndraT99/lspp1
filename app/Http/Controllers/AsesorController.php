<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Caching frequently accessed asesors list with eager loaded schemes
        // to eliminate repetitive database queries on the public route.
        $asesors = Cache::rememberForever('active_asesors_with_schemes', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
