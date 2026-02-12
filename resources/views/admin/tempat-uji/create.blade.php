@extends('layouts.admin')

@section('title', 'Tambah TUK - Admin LSP')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.tempat-uji.index') }}"
            class="text-slate-500 font-bold hover:text-primary flex items-center gap-1 w-fit">
            <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
        </a>
    </div>

    <div class="bg-white border-2 border-border-strong rounded-lg shadow-neo p-8 max-w-2xl">
        <h1 class="text-2xl font-black font-display text-slate-900 uppercase mb-6">Tambah Tempat Uji</h1>

        <form action="{{ route('admin.tempat-uji.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Nama Tempat Uji</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:border-primary"
                    placeholder="Ex: Lab Komputer 1" required>
                @error('name') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Alamat</label>
                <textarea name="address" rows="3"
                    class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:border-primary"
                    required>{{ old('address') }}</textarea>
                @error('address') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Kapasitas (Orang)</label>
                <input type="number" name="capacity" value="{{ old('capacity') }}"
                    class="w-full px-3 py-2 border-2 border-border-strong rounded focus:outline-none focus:border-primary"
                    placeholder="Ex: 30">
                @error('capacity') <span class="text-red-500 text-xs font-bold">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" id="is_active"
                    class="size-5 rounded border-2 border-border-strong text-primary focus:ring-primary" checked>
                <label for="is_active" class="font-bold text-slate-700 cursor-pointer">Status Aktif</label>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-primary text-white font-bold rounded shadow-neo hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none transition-all w-full md:w-auto">
                    Simpan TUK
                </button>
            </div>
        </form>
    </div>
@endsection