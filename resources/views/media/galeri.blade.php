@extends('layouts.app')

@section('title', 'Galeri Foto - LSP-P1 SMKN 2 Karanganyar')

@section('content')
    <!-- Header -->
    <div class="bg-primary pt-24 pb-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-bold text-4xl md:text-5xl text-white mb-4">
                GALERI FOTO
            </h1>
            <p class="text-blue-100 font-medium max-w-2xl mx-auto text-lg">
                Dokumentasi kegiatan sertifikasi dan uji kompetensi di LSP-P1 SMKN 2 Karanganyar.
            </p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 pb-24 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($galleries as $gallery)
                <div
                    class="bg-white rounded-2xl p-3 shadow-xl shadow-slate-200/50 hover:-translate-y-1 transition-transform duration-300 group cursor-pointer">
                    <div class="relative aspect-[4/3] rounded-xl overflow-hidden mb-4">
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            onerror="this.src='https://via.placeholder.com/400x300?text=No+Image'">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="px-2 pb-2">
                        <div class="flex items-center gap-2 text-primary font-bold text-xs uppercase tracking-wider mb-2">
                            <span class="material-icons text-sm">event</span>
                            {{ $gallery->event_date ? $gallery->event_date->format('d M Y') : '-' }}
                        </div>
                        <h3
                            class="font-bold text-slate-900 text-lg leading-snug mb-2 group-hover:text-primary transition-colors">
                            {{ $gallery->title }}
                        </h3>
                        @if($gallery->description)
                            <p class="text-slate-600 text-sm line-clamp-2 leading-relaxed">
                                {{ $gallery->description }}
                            </p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center">
                    <div class="inline-flex justify-center items-center w-20 h-20 bg-slate-100 rounded-full mb-6">
                        <span class="material-icons text-slate-300 text-5xl">collections</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Belum ada foto galeri</h3>
                    <p class="text-slate-500">Dokumentasi kegiatan akan segera ditambahkan.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection