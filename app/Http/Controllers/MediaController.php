<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function galeri()
    {
        // Performance optimization: Replaced unbounded ->get() with ->paginate()
        // Prevents O(N) memory exhaustion as gallery data grows indefinitely.
        $galleries = \App\Models\Gallery::where('is_active', true)->orderBy('event_date', 'desc')->paginate(12);
        return view('media.galeri', compact('galleries'));
    }

    public function dokumentasi()
    {
        // Performance optimization: Replaced unbounded ->get() with ->paginate()
        // Reduces payload size and database load times for the documentation page.
        $documentations = \App\Models\Documentation::where('is_active', true)->latest()->paginate(10);
        return view('media.dokumentasi', compact('documentations'));
    }
}
