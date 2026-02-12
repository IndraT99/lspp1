@extends('layouts.admin')

@section('title', 'Kelola Galeri Foto')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-black font-display text-slate-900 uppercase">Galeri Foto</h1>
        <a href="{{ route('admin.galleries.create') }}"
            class="px-4 py-2 bg-primary text-white font-bold rounded shadow-neo hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span>
            Tambah Foto
        </a>
    </div>

    <div class="bg-white border-2 border-border-strong rounded-lg shadow-neo overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-b-2 border-border-strong">
                <tr>
                    <th class="p-4 text-sm font-bold text-slate-500 uppercase tracking-wide w-32">Gambar</th>
                    <th class="p-4 text-sm font-bold text-slate-500 uppercase tracking-wide">Judul</th>
                    <th class="p-4 text-sm font-bold text-slate-500 uppercase tracking-wide">Tanggal</th>
                    <th class="p-4 text-sm font-bold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="p-4 text-sm font-bold text-slate-500 uppercase tracking-wide text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border-strong">
                @forelse($galleries as $gallery)
                    <tr class="hover:bg-blue-50/50 transition-colors">
                        <td class="p-4">
                            <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}"
                                class="h-16 w-24 object-cover rounded border border-border-strong">
                        </td>
                        <td class="p-4 font-bold text-slate-900">{{ $gallery->title }}</td>
                        <td class="p-4 font-medium text-slate-600">{{ $gallery->event_date->format('d M Y') }}</td>
                        <td class="p-4">
                            @if($gallery->is_active)
                                <span class="px-2 py-1 bg-green-100 text-green-700 font-bold text-xs rounded uppercase">Aktif</span>
                            @else
                                <span class="px-2 py-1 bg-red-100 text-red-700 font-bold text-xs rounded uppercase">Non-Aktif</span>
                            @endif
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('admin.galleries.edit', $gallery) }}"
                                class="inline-flex items-center justify-center size-8 bg-yellow-100 text-yellow-700 rounded border border-yellow-200 hover:bg-yellow-200">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </a>
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center justify-center size-8 bg-red-100 text-red-700 rounded border border-red-200 hover:bg-red-200">
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-slate-500 font-medium">Belum ada data galeri.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection