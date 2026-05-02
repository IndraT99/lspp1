<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function galeri()
    {
        // ⚡ Bolt Performance Optimization: Replace ->get() with ->paginate()
        // Prevents memory exhaustion and speeds up rendering when galleries dataset grows large.
        $galleries = \App\Models\Gallery::where('is_active', true)->orderBy('event_date', 'desc')->paginate(12);
        return view('media.galeri', compact('galleries'));
    }

    public function dokumentasi()
    {
        // ⚡ Bolt Performance Optimization: Replace ->get() with ->paginate()
        // Prevents memory exhaustion and speeds up rendering when documentation dataset grows large.
        $documentations = \App\Models\Documentation::where('is_active', true)->latest()->paginate(12);
        return view('media.dokumentasi', compact('documentations'));
    }
}
