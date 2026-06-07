<?php
namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache queries to improve homepage performance
        $schemes = \Illuminate\Support\Facades\Cache::remember('home_schemes', 86400, function () {
            return Scheme::where('is_active', true)->take(6)->get();
        });

        $galleries = \Illuminate\Support\Facades\Cache::remember('home_galleries', 86400, function () {
            return \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();
        });

        return view('home', compact('schemes', 'galleries'));
    }
}