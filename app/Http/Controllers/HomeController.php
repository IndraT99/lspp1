<?php
namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // ⚡ BOLT OPTIMIZATION: Cache database queries on the high-traffic homepage
        // Caching these queries for 10 minutes (600 seconds) significantly reduces
        // database load and response time, as the homepage is frequently visited
        // and these records (active schemes and latest galleries) change rarely.
        $schemes = Cache::remember('home_active_schemes', 600, function () {
            return Scheme::where('is_active', true)->take(6)->get();
        });

        $galleries = Cache::remember('home_active_galleries', 600, function () {
            return \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();
        });

        return view('home', compact('schemes', 'galleries'));
    }
}
