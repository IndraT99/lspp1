<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Optimization: Cache the active asesors with their schemes forever.
        // This avoids database queries on every request for this public page.
        // Cache is invalidated globally via Eloquent Model Events in Asesor and Scheme models.
        $asesors = \Illuminate\Support\Facades\Cache::rememberForever('asesors.active_with_scheme', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
