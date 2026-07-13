<?php
namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache schemes and galleries for the homepage to reduce DB queries on the most visited page
        $schemes = \Illuminate\Support\Facades\Cache::rememberForever('home_schemes', function () {
            return Scheme::where('is_active', true)->take(6)->get();
        });
        $galleries = \Illuminate\Support\Facades\Cache::rememberForever('home_galleries', function () {
            return \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();
        });

        return view('home', compact('schemes', 'galleries'));
    }
}