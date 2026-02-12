<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documentation;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentations = Documentation::latest()->get();
        return view('admin.documentations.index', compact('documentations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.documentations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('documentations', 'public');
        }

        Documentation::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_path' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.documentations.index')->with('success', 'Dokumentasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Documentation $documentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documentation $documentation)
    {
        return view('admin.documentations.edit', compact('documentation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documentation $documentation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($documentation->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($documentation->image_path);
            }
            $data['image_path'] = $request->file('image')->store('documentations', 'public');
        }

        $documentation->update($data);

        return redirect()->route('admin.documentations.index')->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documentation $documentation)
    {
        if ($documentation->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($documentation->image_path);
        }
        $documentation->delete();

        return redirect()->route('admin.documentations.index')->with('success', 'Dokumentasi berhasil dihapus.');
    }
}
