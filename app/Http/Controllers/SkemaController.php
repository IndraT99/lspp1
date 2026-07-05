<?php

namespace App\Http\Controllers;

class SkemaController extends Controller
{
    public function index()
    {
        // Performance optimization: Cache frequent public-facing queries to reduce database load.
        $schemes = \Illuminate\Support\Facades\Cache::rememberForever('active_schemes', function () {
            return \App\Models\Scheme::where('is_active', true)->get();
        });

        return view('uji-kompetensi.skema', compact('schemes'));
    }
}
