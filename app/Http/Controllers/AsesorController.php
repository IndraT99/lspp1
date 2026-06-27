<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // Cache eager-loaded Asesors for 24 hours to reduce DB queries on public page
        $asesors = \Illuminate\Support\Facades\Cache::remember('asesors.active', 86400, function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
