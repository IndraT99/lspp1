<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        $schemes = \App\Models\Scheme::where('is_active', true)->get();
        return view('uji-kompetensi.skema', compact('schemes'));
    }
}
