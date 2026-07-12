<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        $schemes = \App\Models\Scheme::getActiveSchemes();
        return view('uji-kompetensi.skema', compact('schemes'));
    }
}
