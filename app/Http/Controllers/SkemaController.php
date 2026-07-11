<?php

namespace App\Http\Controllers;

class SkemaController extends Controller
{
    public function index()
    {
        $schemes = \App\Models\Scheme::where('is_active', true)->get();

        return view('uji-kompetensi.skema', compact('schemes'));
    }
}
