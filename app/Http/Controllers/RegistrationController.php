<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        // Optimization: Cache active schemes to reduce DB load.
        $schemes = \Illuminate\Support\Facades\Cache::rememberForever('active_schemes', function () {
            return Scheme::where('is_active', true)->get();
        });
        return view('registrasi.index', compact('schemes'));
    }
}
