<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function galeri()
    {
        // Performance optimization: Replaced get() with paginate(12) to prevent memory
        // exhaustion on unbounded user-generated gallery content.
        $galleries = \App\Models\Gallery::where('is_active', true)->orderBy('event_date', 'desc')->paginate(12);
        return view('media.galeri', compact('galleries'));
    }

    public function dokumentasi()
    {
        // Performance optimization: Replaced get() with paginate(10) to reduce peak
        // memory usage when loading documentation entries.
        $documentations = \App\Models\Documentation::where('is_active', true)->latest()->paginate(10);
        return view('media.dokumentasi', compact('documentations'));
    }
}
