<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        // Optimization: Cache active schemes to reduce DB load for frequently accessed public pages.
        $schemes = \Illuminate\Support\Facades\Cache::rememberForever('active_schemes', function () {
            return \App\Models\Scheme::where('is_active', true)->get();
        });
        return view('uji-kompetensi.skema', compact('schemes'));
    }
}
