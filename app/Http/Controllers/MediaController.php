<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function galeri()
    {
        // Performance optimization: Use pagination instead of get() to prevent memory exhaustion on large datasets
        $galleries = \App\Models\Gallery::where('is_active', true)->orderBy('event_date', 'desc')->paginate(12);
        return view('media.galeri', compact('galleries'));
    }

    public function dokumentasi()
    {
        // Performance optimization: Use pagination instead of get() to prevent memory exhaustion on large datasets
        $documentations = \App\Models\Documentation::where('is_active', true)->latest()->paginate(10);
        return view('media.dokumentasi', compact('documentations'));
    }
}
