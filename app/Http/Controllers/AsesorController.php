<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache Asesors with eager-loaded Schemes to prevent unnecessary DB queries
        // Expected impact: Reduces database queries from 2 to 0 on cached hits
        $asesors = \Illuminate\Support\Facades\Cache::remember('asesors.active', 86400, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
