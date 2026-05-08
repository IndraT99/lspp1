<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function galeri()
    {
        $galleries = \App\Models\Gallery::where('is_active', true)->orderBy('event_date', 'desc')->paginate(9);
        return view('media.galeri', compact('galleries'));
    }

    public function dokumentasi()
    {
        $documentations = \App\Models\Documentation::where('is_active', true)->latest()->paginate(10);
        return view('media.dokumentasi', compact('documentations'));
    }
}
