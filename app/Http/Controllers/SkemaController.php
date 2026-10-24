<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class SkemaController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Optimization: Cache schemes to prevent unnecessary DB queries
        // Expected impact: Reduces database queries on index page to 0 after first load
        $schemes = Cache::rememberForever('active_schemes', function () {
            return \App\Models\Scheme::where('is_active', true)->get();
        });

        return view('uji-kompetensi.skema', compact('schemes'));
    }
}
