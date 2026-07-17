<?php

namespace App\Http\Controllers;

class SkemaController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache schemes to reduce DB hits on public page
        $schemes = \Illuminate\Support\Facades\Cache::rememberForever('active_schemes', function () {
            return \App\Models\Scheme::where('is_active', true)->get();
        });

        return view('uji-kompetensi.skema', compact('schemes'));
    }
}
