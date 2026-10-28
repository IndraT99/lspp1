<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors with eager-loaded schemes for 24 hours to reduce DB load
        // Expected impact: Eliminates 2 queries per request on this high-traffic page
        $asesors = \Illuminate\Support\Facades\Cache::remember('asesors.active', 86400, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
