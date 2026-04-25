<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function galeri()
    {
        // ⚡ Bolt: Use pagination instead of get() for unbounded user-generated content to prevent memory exhaustion and slow response times.
        $galleries = \App\Models\Gallery::where('is_active', true)->orderBy('event_date', 'desc')->paginate(12);
        return view('media.galeri', compact('galleries'));
    }

    public function dokumentasi()
    {
        // ⚡ Bolt: Use pagination instead of get() for unbounded user-generated content to prevent memory exhaustion and slow response times.
        $documentations = \App\Models\Documentation::where('is_active', true)->latest()->paginate(12);
        return view('media.dokumentasi', compact('documentations'));
    }
}
