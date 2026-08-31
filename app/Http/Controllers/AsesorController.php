<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Cache active asesors with eager-loaded schemes to prevent N+1 and repeated queries
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('active_asesors', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
