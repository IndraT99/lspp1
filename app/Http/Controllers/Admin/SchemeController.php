<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scheme;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    public function index()
    {
        $schemes = Scheme::paginate(10);
        return view('admin.schemes.index', compact('schemes'));
    }

    public function create()
    {
        return view('admin.schemes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:schemes,code',
            'name' => 'required',
            'description' => 'required',
            'unit_count' => 'nullable|integer',
            'packaging_type' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf|max:2048',
            'registration_link' => 'nullable|url',
        ]);

        $data = $request->except('document');

        if ($request->hasFile('document')) {
            $data['document_path'] = $request->file('document')->store('schemes', 'public');
        }

        Scheme::create($data);

        return redirect()->route('admin.schemes.index')->with('success', 'Skema berhasil ditambahkan.');
    }

    public function edit(Scheme $scheme)
    {
        return view('admin.schemes.edit', compact('scheme'));
    }

    public function update(Request $request, Scheme $scheme)
    {
        $request->validate([
            'code' => 'required|unique:schemes,code,' . $scheme->id,
            'name' => 'required',
            'description' => 'required',
            'unit_count' => 'nullable|integer',
            'packaging_type' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf|max:2048',
            'registration_link' => 'nullable|url',
        ]);

        $data = $request->except('document');

        if ($request->hasFile('document')) {
            if ($scheme->document_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($scheme->document_path);
            }
            $data['document_path'] = $request->file('document')->store('schemes', 'public');
        }

        $scheme->update($data);

        return redirect()->route('admin.schemes.index')->with('success', 'Skema berhasil diperbarui.');
    }

    public function destroy(Scheme $scheme)
    {
        if ($scheme->document_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($scheme->document_path);
        }
        $scheme->delete();
        return redirect()->route('admin.schemes.index')->with('success', 'Skema berhasil dihapus.');
    }
}
