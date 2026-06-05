<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asesor;
use App\Models\Scheme;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        $asesors = Asesor::with('scheme')->paginate(10);
        return view('admin.asesors.index', compact('asesors'));
    }

    public function create()
    {
        $schemes = Scheme::where('is_active', true)->get();
        return view('admin.asesors.create', compact('schemes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'reg_number' => 'required|unique:asesors,reg_number',
            'scheme_id' => 'nullable|exists:schemes,id',
        ]);

        Asesor::create($request->all());

        // Clear cached asesors when a new one is added
        \Illuminate\Support\Facades\Cache::forget('active_asesors_with_schemes');

        return redirect()->route('admin.asesors.index')->with('success', 'Asesor berhasil ditambahkan.');
    }

    public function edit(Asesor $asesor)
    {
        $schemes = Scheme::where('is_active', true)->get();
        return view('admin.asesors.edit', compact('asesor', 'schemes'));
    }

    public function update(Request $request, Asesor $asesor)
    {
        $request->validate([
            'name' => 'required',
            'reg_number' => 'required|unique:asesors,reg_number,' . $asesor->id,
            'scheme_id' => 'nullable|exists:schemes,id',
        ]);

        $asesor->update($request->all());

        // Clear cached asesors when updated
        \Illuminate\Support\Facades\Cache::forget('active_asesors_with_schemes');

        return redirect()->route('admin.asesors.index')->with('success', 'Asesor berhasil diperbarui.');
    }

    public function destroy(Asesor $asesor)
    {
        $asesor->delete();

        // Clear cached asesors when deleted
        \Illuminate\Support\Facades\Cache::forget('active_asesors_with_schemes');

        return redirect()->route('admin.asesors.index')->with('success', 'Asesor berhasil dihapus.');
    }
}
