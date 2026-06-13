<?php
namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Cache the schemes for the homepage to improve load performance
        $schemes = Cache::remember('home_schemes', 60 * 24, function () {
            return Scheme::where('is_active', true)->take(6)->get();
        });

        // Cache the galleries for the homepage to improve load performance
        $galleries = Cache::remember('home_galleries', 60 * 24, function () {
            return \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();
        });

        return view('home', compact('schemes', 'galleries'));
    }
}