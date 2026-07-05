<?php

namespace App\Http\Controllers;

class MediaController extends Controller
{
    public function galeri()
    {
        // Performance optimization: Cache frequent public-facing queries to reduce database load.
        $galleries = \Illuminate\Support\Facades\Cache::rememberForever('active_galleries', function () {
            return \App\Models\Gallery::where('is_active', true)->orderBy('event_date', 'desc')->get();
        });

        return view('media.galeri', compact('galleries'));
    }

    public function dokumentasi()
    {
        // Performance optimization: Cache frequent public-facing queries to reduce database load.
        $documentations = \Illuminate\Support\Facades\Cache::rememberForever('active_documentations', function () {
            return \App\Models\Documentation::where('is_active', true)->latest()->get();
        });

        return view('media.dokumentasi', compact('documentations'));
    }
}
