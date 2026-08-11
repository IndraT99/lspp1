<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors with their schemes to reduce database queries on this public page.
        // Impact: Eliminates 2 queries (asesors and scheme relationship) per request, improving load time.
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors_with_scheme', now()->addDay(), function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
