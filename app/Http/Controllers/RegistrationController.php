<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $schemes = Scheme::getActiveSchemes();
        return view('registrasi.index', compact('schemes'));
    }
}
