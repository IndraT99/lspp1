<?php
namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // ⚡ Bolt Optimization: Cache the home page schemes for 1 hour
        // This query runs on every visitor's home page load but the data changes rarely.
        $schemes = Cache::remember('home.schemes', now()->addHour(), function () {
            return Scheme::where('is_active', true)->take(6)->get();
        });

        // ⚡ Bolt Optimization: Cache the home page galleries for 1 hour
        // This query runs on every visitor's home page load but the data changes rarely.
        $galleries = Cache::remember('home.galleries', now()->addHour(), function () {
            return \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();
        });

        return view('home', compact('schemes', 'galleries'));
    }
}