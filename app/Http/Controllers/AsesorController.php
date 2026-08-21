<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors to reduce database queries on this public-facing page
        // Impact: Eliminates 2 database queries per page load for public visitors
        $asesors = Cache::rememberForever('active_asesors_with_scheme', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
