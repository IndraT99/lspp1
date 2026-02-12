@extends('layouts.app')

@section('title', 'Asesor Kompetensi - LSP-P1 SMKN 2 Karanganyar')

@section('content')
    <!-- Header -->
    <div class="bg-primary pt-24 pb-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-bold text-4xl md:text-5xl text-white mb-4">
                ASESOR KOMPETENSI
            </h1>
            <p class="text-blue-100 font-medium max-w-2xl mx-auto text-lg">
                Tenaga profesional yang memiliki lisensi untuk melaksanakan asesmen kompetensi.
            </p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 pb-24 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($asesors as $asesor)
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl shadow-slate-200/50 hover:-translate-y-1 transition-transform duration-300 text-center group">
                    <div
                        class="mx-auto size-24 rounded-full bg-slate-100 mb-6 flex items-center justify-center group-hover:bg-primary/10 transition-colors">
                        <span
                            class="material-icons text-5xl text-slate-400 group-hover:text-primary transition-colors">person</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-1">{{ $asesor->name }}</h3>
                    <p class="text-primary font-medium text-sm mb-4">{{ $asesor->reg_number }}</p>
                    @if($asesor->scheme)
                        <div class="inline-block bg-slate-50 border border-slate-100 rounded-lg px-3 py-1.5">
                            <span class="text-xs font-semibold text-slate-600 block mb-0.5">Asesor Bidang:</span>
                            <span
                                class="text-xs font-bold text-slate-900 block truncate max-w-[200px]">{{ $asesor->scheme->name }}</span>
                        </div>
                    @endif
                </div>
            @empty
                <div class="col-span-full py-12 text-center">
                    <div class="inline-flex justify-center items-center w-20 h-20 bg-slate-100 rounded-full mb-6">
                        <span class="material-icons text-slate-300 text-5xl">person_off</span>
                    </div>
                    <p class="text-slate-500 font-medium text-lg">Belum ada data asesor kompetensi.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection