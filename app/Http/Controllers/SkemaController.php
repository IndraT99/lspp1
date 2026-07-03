<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active schemes to reduce database load
        $schemes = \Illuminate\Support\Facades\Cache::rememberForever('active_schemes', function () {
            return \App\Models\Scheme::where('is_active', true)->get();
        });
        return view('uji-kompetensi.skema', compact('schemes'));
    }
}
