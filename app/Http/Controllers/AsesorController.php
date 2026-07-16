<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors with their schemes forever (invalidated on model events)
        // 🎯 Why: This data is queried frequently by public users but changes rarely, saving database hits
        // 📊 Impact: Eliminates 2 database queries (Asesors + Schemes) on every visit to the Asesor page
        // 🔬 Measurement: Observe DB query count in Laravel Telescope or debugbar; will be 0 on cached hits
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors_with_schemes', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
