<?php

namespace App\Http\Controllers;

class SkemaController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active schemes query to reduce database hits
        // Impact: Reduces DB queries by 1 on every page load
        $schemes = \Illuminate\Support\Facades\Cache::remember('active_schemes', 3600, function () {
            return \App\Models\Scheme::where('is_active', true)->get();
        });

        return view('uji-kompetensi.skema', compact('schemes'));
    }
}
