@extends('layouts.app')

@section('title', 'Dokumentasi Aplikasi - LSP-P1 SMKN 2 Karanganyar')

@section('content')
    <!-- Header -->
    <div class="bg-primary pt-24 pb-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-bold text-4xl md:text-5xl text-white mb-4">
                DOKUMENTASI APLIKASI
            </h1>
            <p class="text-blue-100 font-medium max-w-2xl mx-auto text-lg">
                Panduan penggunaan sistem informasi sertifikasi LSP-P1 SMKN 2 Karanganyar.
            </p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 pb-24 relative z-20">
        <div class="max-w-4xl mx-auto space-y-8">
            @forelse($documentations as $documentation)
                <div class="bg-white rounded-2xl p-8 shadow-xl shadow-slate-200/50">
                    <div class="flex items-start md:items-center gap-4 mb-6">
                        <div
                            class="flex-shrink-0 size-12 rounded-xl bg-blue-50 text-primary flex items-center justify-center font-bold text-lg">
                            {{ $loop->iteration }}
                        </div>
                        <h2 class="font-bold text-2xl text-slate-900">{{ $documentation->title }}</h2>
                    </div>

                    @if($documentation->image_path)
                        <div class="mb-6 rounded-xl overflow-hidden shadow-sm bg-slate-50 border border-slate-100">
                            <img src="{{ asset('storage/' . $documentation->image_path) }}" alt="{{ $documentation->title }}"
                                class="w-full h-auto object-cover max-h-96" onerror="this.style.display='none'">
                        </div>
                    @endif

                    <div class="prose prose-slate prose-lg max-w-none text-slate-600">
                        {!! $documentation->content !!}
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-2xl p-12 shadow-xl shadow-slate-200/50 text-center">
                    <div class="inline-flex justify-center items-center w-20 h-20 bg-slate-100 rounded-full mb-6">
                        <span class="material-icons text-slate-300 text-5xl">article</span>
                    </div>
                    <p class="text-slate-500 font-medium text-lg">Belum ada dokumentasi aplikasi.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection