@extends('layouts.app')

@section('title', 'Fungsi & Tujuan - LSP-P1 SMKN 2 Karanganyar')

@section('content')
    <!-- Header -->
    <div class="bg-primary pt-24 pb-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-bold text-4xl md:text-5xl text-white mb-4">
                FUNGSI & TUJUAN
            </h1>
            <p class="text-blue-100 font-medium max-w-2xl mx-auto text-lg">
                Peran strategis kami dalam menjamin mutu pendidikan vokasi.
            </p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 pb-24 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Fungsi -->
            <div class="bg-white rounded-2xl p-8 shadow-xl shadow-slate-200/50">
                <div class="inline-flex size-14 rounded-xl bg-orange-50 text-orange-600 items-center justify-center mb-6">
                    <span class="material-icons text-3xl">settings</span>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Fungsi</h2>
                <ul class="space-y-4 text-slate-600">
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Sebagai sertifikator yang menyelenggarakan sertifikasi kompetensi.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Sebagai pengembang standar kompetensi dan skema sertifikasi.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Sebagai penjamin mutu pendidikan dan pelatihan vokasi.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Sebagai rujukan profesionalisme bagi industri dan dunia kerja.</span>
                    </li>
                </ul>
            </div>

            <!-- Tujuan -->
            <div class="bg-white rounded-2xl p-8 shadow-xl shadow-slate-200/50">
                <div class="inline-flex size-14 rounded-xl bg-purple-50 text-purple-600 items-center justify-center mb-6">
                    <span class="material-icons text-3xl">flag</span>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Tujuan</h2>
                <ul class="space-y-4 text-slate-600">
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Menghasilkan tenaga kerja yang kompeten dan tersertifikasi sesuai standar nasional
                            (SKKNI).</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Meningkatkan daya saing lulusan SMK Negeri 2 Karanganyar di pasar kerja global.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Memberikan pengakuan kompetensi yang objektif dan transparan.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Mendukung pengembangan kurikulum berbasis kompetensi yang selaras dengan industri.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection