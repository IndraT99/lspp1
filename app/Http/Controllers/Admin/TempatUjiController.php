<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TempatUji;
use Illuminate\Http\Request;

class TempatUjiController extends Controller
{
    public function index()
    {
        $tempatUjis = TempatUji::paginate(10);
        return view('admin.tempat-uji.index', compact('tempatUjis'));
    }

    public function create()
    {
        return view('admin.tempat-uji.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'capacity' => 'nullable|integer',
        ]);

        TempatUji::create($request->all());

        return redirect()->route('admin.tempat-uji.index')->with('success', 'Tempat Uji berhasil ditambahkan.');
    }

    public function edit(TempatUji $tempatUji)
    {
        return view('admin.tempat-uji.edit', compact('tempatUji'));
    }

    public function update(Request $request, TempatUji $tempatUji)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'capacity' => 'nullable|integer',
        ]);

        $tempatUji->update($request->all());

        return redirect()->route('admin.tempat-uji.index')->with('success', 'Tempat Uji berhasil diperbarui.');
    }

    public function destroy(TempatUji $tempatUji)
    {
        $tempatUji->delete();
        return redirect()->route('admin.tempat-uji.index')->with('success', 'Tempat Uji berhasil dihapus.');
    }
}
