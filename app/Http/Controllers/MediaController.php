<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function galeri()
    {
        // Performance Optimization (Bolt): Replaced get() with paginate(12)
        // to prevent OOM errors and reduce DB memory consumption as the gallery grows.
        // Expected Impact: O(1) memory usage per request rather than O(N).
        $galleries = \App\Models\Gallery::where('is_active', true)->orderBy('event_date', 'desc')->paginate(12);
        return view('media.galeri', compact('galleries'));
    }

    public function dokumentasi()
    {
        // Performance Optimization (Bolt): Replaced get() with paginate(10)
        // Expected Impact: O(1) memory usage per request rather than O(N).
        $documentations = \App\Models\Documentation::where('is_active', true)->latest()->paginate(10);
        return view('media.dokumentasi', compact('documentations'));
    }
}
