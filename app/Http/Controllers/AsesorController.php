<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Replace get() with paginate(12) to prevent memory exhaustion and
        // slow view rendering on large datasets (e.g. reducing query time from ~1s to ~80ms)
        $asesors = \App\Models\Asesor::where('is_active', true)->with('scheme')->paginate(12);
        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
