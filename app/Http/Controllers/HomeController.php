<?php
namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache schemes and galleries on homepage to prevent repeated DB queries
        $schemes = cache()->remember('home_schemes', 3600, function () {
            return Scheme::where('is_active', true)->take(6)->get();
        });

        $galleries = cache()->remember('home_galleries', 3600, function () {
            return \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();
        });

        return view('home', compact('schemes', 'galleries'));
    }
}