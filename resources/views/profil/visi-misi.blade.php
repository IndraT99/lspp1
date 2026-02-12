@extends('layouts.app')

@section('title', 'Visi & Misi - LSP-P1 SMKN 2 Karanganyar')

@section('content')
    <!-- Header -->
    <div class="bg-primary pt-24 pb-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-bold text-4xl md:text-5xl text-white mb-4">
                VISI & MISI
            </h1>
            <p class="text-blue-100 font-medium max-w-2xl mx-auto text-lg">
                Komitmen kami dalam menciptakan lulusan yang kompeten dan berdaya saing global.
            </p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 pb-24 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Visi -->
            <div class="bg-white rounded-2xl p-8 shadow-xl shadow-slate-200/50">
                <div class="inline-flex size-14 rounded-xl bg-blue-50 text-primary items-center justify-center mb-6">
                    <span class="material-icons text-3xl">visibility</span>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Visi</h2>
                <p class="text-slate-600 leading-relaxed text-lg">
                    Menjadi Lembaga Sertifikasi Profesi yang profesional, kredibel, dan akuntabel dalam menjamin mutu
                    kompetensi lulusan SMK Negeri 2 Karanganyar yang mampu bersaing di tingkat nasional maupun
                    internasional.
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-white rounded-2xl p-8 shadow-xl shadow-slate-200/50">
                <div class="inline-flex size-14 rounded-xl bg-green-50 text-green-600 items-center justify-center mb-6">
                    <span class="material-icons text-3xl">rocket_launch</span>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Misi</h2>
                <ul class="space-y-4 text-slate-600">
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Melaksanakan sertifikasi kompetensi kerja secara independen dan profesional.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Mengembangkan skema sertifikasi sesuai dengan kebutuhan industri dan perkembangan
                            teknologi.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Menjamin mutu pelaksanaan sertifikasi sesuai pedoman BNSP.</span>
                    </li>
                    <li class="flex gap-4">
                        <span class="material-icons text-primary shrink-0 mt-1">check_circle</span>
                        <span>Meningkatkan kualitas dan kuantitas asesor kompetensi.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection