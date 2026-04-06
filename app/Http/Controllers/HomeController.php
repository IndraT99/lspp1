<?php
namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache schemes for 1 hour to reduce database queries on the most visited page
        $schemes = Cache::remember('home.schemes', 3600, function () {
            return Scheme::where('is_active', true)->take(6)->get();
        });

        // ⚡ Bolt: Cache galleries for 1 hour
        $galleries = Cache::remember('home.galleries', 3600, function () {
            return \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();
        });

        return view('home', compact('schemes', 'galleries'));
    }
}