<?php

namespace App\Http\Controllers;

use App\Models\Scheme;

class RegistrationController extends Controller
{
    public function index()
    {
        $schemes = Scheme::where('is_active', true)->get();

        return view('registrasi.index', compact('schemes'));
    }
}
