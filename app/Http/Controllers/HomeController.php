<?php

namespace App\Http\Controllers;

use App\Models\Scheme;

class HomeController extends Controller
{
    public function index()
    {
        // Performance optimization: Cache frequent public-facing queries to reduce database load.
        $schemes = \Illuminate\Support\Facades\Cache::rememberForever('homepage_schemes', function () {
            return Scheme::where('is_active', true)->take(6)->get();
        });

        $galleries = \Illuminate\Support\Facades\Cache::rememberForever('homepage_galleries', function () {
            return \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();
        });

        return view('home', compact('schemes', 'galleries'));
    }
}
