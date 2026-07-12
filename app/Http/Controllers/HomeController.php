<?php
namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $schemes = Scheme::getActiveSchemes()->take(6);
        $galleries = \App\Models\Gallery::where('is_active', true)->latest('event_date')->take(6)->get();

        return view('home', compact('schemes', 'galleries'));
    }
}