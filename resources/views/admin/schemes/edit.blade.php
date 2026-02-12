@extends('layouts.admin')

@section('title', 'Edit Skema - Admin LSP')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.schemes.index') }}"
            class="text-slate-500 font-bold hover:text-primary flex items-center gap-1 w-fit">
            <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
        </a>
    </div>

    <div class="bg-white border-2 border-border-strong rounded-lg shadow-neo p-8 max-w-2xl">
        <h1 class="text-2xl font-black font-display text-slate-900 uppercase mb-6">Edit Skema</h1>

        <form action="{{ route('admin.schemes.update', $scheme) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Kode Skema</label>
                <input type="text" name="code" value="{{ old('code', $scheme->code) }}"
                    class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:border-primary font-mono"
                    required>
                @error('code') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Nama Skema</label>
                <input type="text" name="name" value="{{ old('name', $scheme->name) }}"
                    class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:border-primary"
                    required>
                @error('name') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4"
                    class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:border-primary"
                    required>{{ old('description', $scheme->description) }}</textarea>
                @error('description') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Jumlah Unit</label>
                    <input type="number" name="unit_count" value="{{ old('unit_count', $scheme->unit_count) }}"
                        class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:border-primary"
                        placeholder="Ex: 10">
                    @error('unit_count') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Jenis Kemasan</label>
                    <input type="text" name="packaging_type" value="{{ old('packaging_type', $scheme->packaging_type) }}"
                        class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:border-primary"
                        placeholder="Ex: KKNI Level II">
                    @error('packaging_type') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Dokumen Skema (PDF)</label>
                @if($scheme->document_path)
                    <div class="mb-2 flex items-center gap-2 text-sm text-slate-600">
                        <span class="material-symbols-outlined text-green-600">description</span>
                        <a href="{{ asset('storage/' . $scheme->document_path) }}" target="_blank"
                            class="hover:underline font-medium text-primary">Lihat Dokumen Saat Ini</a>
                    </div>
                @endif
                <input type="file" name="document" accept="application/pdf"
                    class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:border-primary file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-primary hover:file:bg-blue-100">
                <p class="text-xs text-slate-500 mt-1">Upload dokumen baru untuk mengganti yang lama.</p>
                @error('document') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Link Pendaftaran (Google Form)</label>
                <input type="url" name="registration_link"
                    value="{{ old('registration_link', $scheme->registration_link) }}"
                    class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:border-primary"
                    placeholder="https://forms.google.com/...">
                <p class="text-xs text-slate-500 mt-1">Masukkan URL Google Form atau link pendaftaran lainnya.</p>
                @error('registration_link') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" id="is_active"
                    class="size-5 rounded border-2 border-border-strong text-primary focus:ring-primary" {{ $scheme->is_active ? 'checked' : '' }}>
                <label for="is_active" class="font-bold text-slate-700 cursor-pointer">Status Aktif</label>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-primary text-white font-bold rounded shadow-neo hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none transition-all w-full md:w-auto">
                    Update Skema
                </button>
            </div>
        </form>
    </div>
@endsection