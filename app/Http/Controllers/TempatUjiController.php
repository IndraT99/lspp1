<?php

namespace App\Http\Controllers;

class TempatUjiController extends Controller
{
    public function index()
    {
        // Performance optimization: Cache frequent public-facing queries to reduce database load.
        $tempatUjis = \Illuminate\Support\Facades\Cache::rememberForever('active_tempat_ujis', function () {
            return \App\Models\TempatUji::where('is_active', true)->get();
        });

        return view('uji-kompetensi.tempat-uji', compact('tempatUjis'));
    }
}
