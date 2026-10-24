<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Optimization: Cache assessors to prevent unnecessary DB queries
        // Expected impact: Reduces N+1 database queries on index page to 0 after first load
        $asesors = Cache::rememberForever('active_asesors', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
