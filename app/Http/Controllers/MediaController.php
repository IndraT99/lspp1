<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function galeri()
    {
        $galleries = \App\Models\Gallery::where('is_active', true)->orderBy('event_date', 'desc')->get();
        return view('media.galeri', compact('galleries'));
    }

    public function dokumentasi()
    {
        $documentations = \App\Models\Documentation::where('is_active', true)->latest()->get();
        return view('media.dokumentasi', compact('documentations'));
    }
}
