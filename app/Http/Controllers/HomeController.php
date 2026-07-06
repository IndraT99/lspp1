<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache home page schemes to prevent repeated DB queries on most visited page
        $schemes = Cache::rememberForever('home_schemes', function () {
            return Scheme::where('is_active', true)->take(6)->get();
        });

        // ⚡ Bolt: Cache home page galleries to prevent repeated DB queries
        $galleries = Cache::rememberForever('home_galleries', function () {
            return \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();
        });

        return view('home', compact('schemes', 'galleries'));
    }
}
