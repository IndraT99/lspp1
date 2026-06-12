<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ BOLT: Cache asesor data with eager-loaded schemes to reduce database queries. Expected impact: Eliminates DB queries per page load for rarely changing data.
        $asesors = \Illuminate\Support\Facades\Cache::remember('public_asesors', 3600, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
