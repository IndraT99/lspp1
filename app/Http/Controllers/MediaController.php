<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function galeri()
    {
        // Bolt: Use paginate() instead of get() to prevent memory exhaustion on growing datasets
        $galleries = \App\Models\Gallery::where('is_active', true)->orderBy('event_date', 'desc')->paginate(12);
        return view('media.galeri', compact('galleries'));
    }

    public function dokumentasi()
    {
        // Bolt: Use paginate() instead of get() to prevent memory exhaustion on growing datasets
        $documentations = \App\Models\Documentation::where('is_active', true)->latest()->paginate(12);
        return view('media.dokumentasi', compact('documentations'));
    }
}
