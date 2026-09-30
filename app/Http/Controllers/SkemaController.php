<?php

namespace App\Http\Controllers;

class SkemaController extends Controller
{
    public function index()
    {
        $schemes = \App\Models\Scheme::getActiveSchemes();

        return view('uji-kompetensi.skema', compact('schemes'));
    }
}
