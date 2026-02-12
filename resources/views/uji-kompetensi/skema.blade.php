@extends('layouts.app')

@section('title', 'Skema Sertifikasi - LSP-P1 SMKN 2 Karanganyar')

@section('content')
    <!-- Header -->
    <div class="bg-primary pt-24 pb-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-bold text-4xl md:text-5xl text-white mb-4">
                SKEMA SERTIFIKASI
            </h1>
            <p class="text-blue-100 font-medium max-w-2xl mx-auto text-lg">
                Daftar skema sertifikasi yang kompeten dan sesuai dengan standar industri.
            </p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 pb-24 relative z-20">
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="p-5 font-bold text-slate-900 text-sm uppercase tracking-wide w-16 text-center">No
                            </th>
                            <th class="p-5 font-bold text-slate-900 text-sm uppercase tracking-wide w-48">Kode Skema</th>
                            <th class="p-5 font-bold text-slate-900 text-sm uppercase tracking-wide">Nama Skema</th>
                            <th class="p-5 font-bold text-slate-900 text-sm uppercase tracking-wide w-32 text-center">Unit
                            </th>
                            <th class="p-5 font-bold text-slate-900 text-sm uppercase tracking-wide w-48">Jenis</th>
                            <th class="p-5 font-bold text-slate-900 text-sm uppercase tracking-wide w-32 text-center">
                                Dokumen</th>
                            <th class="p-5 font-bold text-slate-900 text-sm uppercase tracking-wide w-32 text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($schemes as $scheme)
                            <tr class="hover:bg-blue-50/50 transition-colors">
                                <td class="p-5 text-center text-slate-600">{{ $loop->iteration }}</td>
                                <td class="p-5 text-primary font-mono font-medium text-sm">{{ $scheme->code }}</td>
                                <td class="p-5">
                                    <h3 class="font-bold text-slate-900">{{ $scheme->name }}</h3>
                                    <p class="text-xs text-slate-500 mt-1 line-clamp-1">{{ $scheme->description }}</p>
                                </td>
                                <td class="p-5 text-center text-slate-600 font-medium">{{ $scheme->unit_count ?? '-' }}</td>
                                <td class="p-5 text-slate-600">{{ $scheme->packaging_type ?? '-' }}</td>
                                <td class="p-5 text-center">
                                    @if($scheme->document_path)
                                        <a href="{{ asset('storage/' . $scheme->document_path) }}" target="_blank"
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 hover:scale-105 transition-all"
                                            title="Download PDF">
                                            <span class="material-icons text-lg">description</span>
                                        </a>
                                    @else
                                        <span class="text-slate-400 text-xs text-center block">-</span>
                                    @endif
                                </td>
                                <td class="p-5 text-center">
                                    <a href="{{ route('registrasi.index', ['scheme_id' => $scheme->id]) }}"
                                        class="inline-flex items-center justify-center px-4 py-2 bg-primary text-white text-sm font-bold rounded-lg shadow-sm hover:bg-primary-dark hover:-translate-y-0.5 transition-all">
                                        Daftar
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-12 text-center text-slate-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <span class="material-icons text-slate-300 text-4xl mb-2">folder_off</span>
                                        <p>Belum ada skema sertifikasi yang tersedia.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection