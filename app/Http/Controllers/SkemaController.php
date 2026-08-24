<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache public scheme list to reduce database queries
        $schemes = \Illuminate\Support\Facades\Cache::remember('schemes.active', 3600, function () {
            return \App\Models\Scheme::where('is_active', true)->get();
        });
        return view('uji-kompetensi.skema', compact('schemes'));
    }
}
