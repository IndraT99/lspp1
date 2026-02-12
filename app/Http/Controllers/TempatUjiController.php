<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempatUjiController extends Controller
{
    public function index()
    {
        $tempatUjis = \App\Models\TempatUji::where('is_active', true)->get();
        return view('uji-kompetensi.tempat-uji', compact('tempatUjis'));
    }
}
