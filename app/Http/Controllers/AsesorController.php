<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // Performance optimization: Cache the list of active asesors and their schemes forever to avoid expensive DB queries
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('public_asesors', function() {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
