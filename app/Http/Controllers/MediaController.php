<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function galeri()
    {
        // Optimize: Prevent memory exhaustion on unbounded gallery data
        $galleries = \App\Models\Gallery::where('is_active', true)->orderBy('event_date', 'desc')->paginate(12);
        return view('media.galeri', compact('galleries'));
    }

    public function dokumentasi()
    {
        // Optimize: Prevent memory exhaustion on unbounded documentation data
        $documentations = \App\Models\Documentation::where('is_active', true)->latest()->paginate(12);
        return view('media.dokumentasi', compact('documentations'));
    }
}
