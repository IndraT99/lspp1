<?php
namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Cache schemes and galleries for 1 hour to improve home page loading time
        $schemes = Cache::remember('home.schemes', 3600, function () {
            return Scheme::where('is_active', true)->take(6)->get();
        });

        $galleries = Cache::remember('home.galleries', 3600, function () {
            return \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();
        });

        return view('home', compact('schemes', 'galleries'));
    }
}