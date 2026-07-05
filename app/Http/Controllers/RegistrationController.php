<?php

namespace App\Http\Controllers;

use App\Models\Scheme;

class RegistrationController extends Controller
{
    public function index()
    {
        // Performance optimization: Cache frequent public-facing queries to reduce database load.
        $schemes = \Illuminate\Support\Facades\Cache::rememberForever('active_schemes', function () {
            return Scheme::where('is_active', true)->get();
        });

        return view('registrasi.index', compact('schemes'));
    }
}
