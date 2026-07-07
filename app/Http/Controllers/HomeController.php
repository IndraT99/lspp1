<?php
namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Optimization: Reuse the active_schemes cache and filter in memory to avoid redundant DB queries.
        $schemes = \Illuminate\Support\Facades\Cache::rememberForever('active_schemes', function () {
            return Scheme::where('is_active', true)->get();
        })->take(6);

        $galleries = \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();

        return view('home', compact('schemes', 'galleries'));
    }
}