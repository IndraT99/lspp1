<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class AsesorController extends Controller
{
    public function index()
    {
        // ⚡ Bolt: Cache active asesors and schemes to reduce database queries on this frequently accessed route.
        $asesors = Cache::rememberForever('active_asesors', function () {
            return \App\Models\Asesor::where('is_active', true)->with('scheme')->get();
        });

        return view('uji-kompetensi.asesor', compact('asesors'));
    }
}
