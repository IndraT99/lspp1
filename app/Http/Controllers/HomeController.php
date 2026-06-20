<?php
namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active schemes to reduce database queries on homepage
        $schemes = \Illuminate\Support\Facades\Cache::remember('home_schemes', 3600, function () {
            return Scheme::where('is_active', true)->take(6)->get();
        });
        // ⚡ Bolt: Cache latest galleries to reduce database queries on homepage
        $galleries = \Illuminate\Support\Facades\Cache::remember('home_galleries', 3600, function () {
            return \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();
        });

        return view('home', compact('schemes', 'galleries'));
    }
}