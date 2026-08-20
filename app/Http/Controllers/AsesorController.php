<?php

namespace App\Http\Controllers;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Optimization: Cache the active asesors list with eager-loaded schemes
        // 💡 What: Cache the query results forever.
        // 🎯 Why: This is a frequently accessed public page where data changes infrequently.
        // 📊 Impact: Eliminates database queries for this endpoint, reducing latency and DB load.
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
