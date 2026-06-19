<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache eager-loaded query to avoid hitting DB and N+1 on every page load
        $asesors = \Illuminate\Support\Facades\Cache::remember('active_asesors_with_schemes', 86400, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
