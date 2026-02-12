@extends('layouts.admin')

@section('title', 'Tambah Dokumentasi Aplikasi')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-black font-display text-slate-900 uppercase">Tambah Dokumentasi</h1>
        <a href="{{ route('admin.documentations.index') }}"
            class="text-slate-600 font-bold hover:text-primary transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">arrow_back</span>
            Kembali
        </a>
    </div>

    <div class="bg-white border-2 border-border-strong rounded-lg shadow-neo p-6 max-w-2xl">
        <form action="{{ route('admin.documentations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-bold text-slate-700 mb-2">Judul Dokumentasi</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent font-medium text-slate-900">
                @error('title')
                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-bold text-slate-700 mb-2">Konten / Langkah-langkah</label>
                <textarea name="content" id="content" rows="6" required
                    class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent font-medium text-slate-900">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs text-slate-500 mt-1">Gunakan HTML dasar untuk formatting (misal: &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt;).</p>
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-bold text-slate-700 mb-2">Gambar / Icon (Opsional)</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent font-medium text-slate-900 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-primary hover:file:bg-blue-100">
                @error('image')
                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Is Active -->
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                    class="w-5 h-5 text-primary border-2 border-border-strong rounded focus:ring-primary">
                <label for="is_active" class="text-sm font-bold text-slate-700">Tampilkan di Halaman</label>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-primary text-white font-black uppercase py-3 rounded shadow-neo hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none transition-all tracking-wider">
                    Simpan Dokumentasi
                </button>
            </div>
        </form>
    </div>
@endsection
