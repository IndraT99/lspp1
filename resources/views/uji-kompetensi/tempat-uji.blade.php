@extends('layouts.app')

@section('title', 'Tempat Uji Kompetensi - LSP-P1 SMKN 2 Karanganyar')

@section('content')
    <!-- Header -->
    <div class="bg-primary pt-24 pb-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-bold text-4xl md:text-5xl text-white mb-4">
                TEMPAT UJI KOMPETENSI
            </h1>
            <p class="text-blue-100 font-medium max-w-2xl mx-auto text-lg">
                Fasilitas dan lokasi pelaksanaan uji kompetensi yang terstandarisasi.
            </p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 pb-24 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($tempatUjis as $tuk)
                <div
                    class="bg-white rounded-2xl p-6 shadow-xl shadow-slate-200/50 hover:-translate-y-1 transition-transform duration-300 flex gap-6 items-start group">
                    <div
                        class="hidden sm:flex size-16 shrink-0 rounded-2xl bg-green-50 text-green-600 items-center justify-center group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                        <span class="material-icons text-3xl">location_on</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $tuk->name }}</h3>
                        <div class="flex items-start gap-2 text-slate-600 mb-3 text-sm">
                            <span class="material-icons text-base mt-0.5 shrink-0">map</span>
                            <span class="leading-relaxed">{{ $tuk->address }}</span>
                        </div>
                        @if($tuk->capacity)
                            <div
                                class="inline-flex items-center gap-2 text-primary font-medium text-sm bg-blue-50 px-3 py-1 rounded-full">
                                <span class="material-icons text-sm">group</span>
                                <span>Kapasitas: {{ $tuk->capacity }} Peserta</span>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center">
                    <div class="inline-flex justify-center items-center w-20 h-20 bg-slate-100 rounded-full mb-6">
                        <span class="material-icons text-slate-300 text-5xl">location_off</span>
                    </div>
                    <p class="text-slate-500 font-medium text-lg">Belum ada data tempat uji kompetensi.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection