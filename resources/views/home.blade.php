@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-white overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img alt="LSP-P1 SMKN 2 Karanganyar" class="w-full h-full object-cover opacity-90"
                src="{{ asset('assets/bg-1.webp') }}" />
            <div class="absolute inset-0 bg-gradient-to-r from-background-light via-background-light/80 to-transparent">
            </div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-40">
            <div class="sm:max-w-xl lg:max-w-2xl">
                <div
                    class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold uppercase tracking-wide mb-6">
                    <span class="w-2 h-2 bg-primary rounded-full mr-2"></span>
                    Lembaga Sertifikasi Profesi P1
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-slate-900 leading-tight mb-6">
                    Menjamin Mutu <span class="text-primary relative inline-block">
                        Kompetensi
                        <svg class="absolute w-full h-3 -bottom-1 left-0 text-primary opacity-20" preserveAspectRatio="none"
                            viewBox="0 0 100 10">
                            <path d="M0 5 Q 50 10 100 5" fill="none" stroke="currentColor" stroke-width="8"></path>
                        </svg>
                    </span> Lulusan
                </h1>
                <p class="mt-4 text-lg text-slate-600 leading-relaxed mb-8 max-w-lg">
                    LSP-P1 SMK Negeri 2 Karanganyar berkomitmen mencetak tenaga kerja profesional yang kompeten dan diakui
                    secara nasional.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-semibold rounded-xl text-white bg-primary hover:bg-primary-dark transition-all duration-200 shadow-lg shadow-primary/30 transform hover:-translate-y-0.5"
                        href="{{ route('uji-kompetensi.skema') }}">
                        Lihat Skema
                        <span class="material-icons ml-2 text-sm">arrow_forward</span>
                    </a>
                    <a class="inline-flex items-center justify-center px-8 py-4 border border-slate-200 text-base font-semibold rounded-xl text-slate-700 bg-white hover:bg-slate-50 transition-all duration-200"
                        href="#keunggulan">
                        <span class="material-icons mr-2 text-primary">info</span>
                        Informasi LSP
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Keunggulan Kami Section -->
    <section id="keunggulan" class="py-24 bg-background-light relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-primary font-semibold tracking-wide uppercase text-sm mb-3">Mengapa Sertifikasi?</h2>
                <h3 class="text-3xl font-bold text-slate-900 sm:text-4xl">Keunggulan LSP-P1</h3>
                <p class="mt-4 text-slate-600">
                    Sertifikasi kompetensi memberikan nilai tambah bagi lulusan untuk bersaing di dunia kerja.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div
                    class="group relative rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden h-[300px] flex flex-col justify-end">
                    <div class="absolute inset-0 z-0">
                        <img src="{{ asset('assets/ic1.webp') }}" alt="Dasar Hukum"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity">
                        </div>
                    </div>
                    <div
                        class="relative z-10 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                        <h4 class="text-2xl font-bold text-white mb-3">Dasar Hukum Kuat</h4>
                        <div class="w-12 h-1 bg-primary rounded mb-4"></div>
                        <p class="text-slate-200 leading-relaxed font-medium">
                            Dilandasi PP RI No. 31 Th 2006 dan UU No. 13 Th 2003 tentang Ketenagakerjaan.
                        </p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div
                    class="group relative rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden h-[300px] flex flex-col justify-end">
                    <div class="absolute inset-0 z-0">
                        <img src="{{ asset('assets/ic2.webp') }}" alt="Nilai Tawar"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity">
                        </div>
                    </div>
                    <div
                        class="relative z-10 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                        <h4 class="text-2xl font-bold text-white mb-3">Nilai Tawar Tinggi</h4>
                        <div class="w-12 h-1 bg-primary rounded mb-4"></div>
                        <p class="text-slate-200 leading-relaxed font-medium">
                            Pemegang sertifikat memiliki bukti kompetensi resmi yang diakui industri nasional & ASEAN.
                        </p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div
                    class="group relative rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden h-[300px] flex flex-col justify-end">
                    <div class="absolute inset-0 z-0">
                        <img src="{{ asset('assets/ic3.webp') }}" alt="Keuntungan Industri"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity">
                        </div>
                    </div>
                    <div
                        class="relative z-10 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                        <h4 class="text-2xl font-bold text-white mb-3">Keuntungan Industri</h4>
                        <div class="w-12 h-1 bg-primary rounded mb-4"></div>
                        <p class="text-slate-200 leading-relaxed font-medium">
                            Membantu industri dalam rekrutmen berbasis kompetensi demi meningkatkan produktivitas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-primary relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-white/20">
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">10+</div>
                    <div class="text-blue-100 font-medium">Skema Sertifikasi</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">20+</div>
                    <div class="text-blue-100 font-medium">Asesor Kompetensi</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">1k+</div>
                    <div class="text-blue-100 font-medium">Sertifikat Terbit</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2">100%</div>
                    <div class="text-blue-100 font-medium">Kompeten</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div>
                    <h2 class="text-primary font-semibold tracking-wide uppercase text-sm mb-3">Galeri Foto</h2>
                    <h3 class="text-3xl font-bold text-slate-900">Dokumentasi Kegiatan</h3>
                </div>
                <a class="group inline-flex items-center text-primary font-semibold hover:text-primary-dark transition-colors"
                    href="{{ route('media.galeri') }}">
                    Lihat Semua Foto
                    <span
                        class="material-icons ml-1 text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>

            @if($galleries->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($galleries as $gallery)
                        <article
                            class="flex flex-col bg-background-light rounded-2xl overflow-hidden hover:shadow-lg transition-shadow duration-300 border border-slate-100 h-full">
                            <div class="h-64 relative overflow-hidden group">
                                <img alt="{{ $gallery->title }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    src="{{ asset('storage/' . $gallery->image_path) }}"
                                    onerror="this.src='https://via.placeholder.com/400x300?text=No+Image'" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                            </div>
                            <div class="flex-1 p-6 flex flex-col">
                                <div class="text-slate-500 text-sm mb-3 flex items-center gap-2">
                                    <span class="material-icons text-base">event</span>
                                    {{ $gallery->event_date ? $gallery->event_date->format('d M Y') : '-' }}
                                </div>
                                <h4 class="text-xl font-bold text-slate-900 mb-2 leading-snug hover:text-primary transition-colors">
                                    {{ $gallery->title }}
                                </h4>
                                <p class="text-slate-600 text-sm line-clamp-2 mb-4">
                                    {{ $gallery->description }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <!-- Fallback/Empty State -->
                <div class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                        <span class="material-icons text-slate-400 text-3xl">collections</span>
                    </div>
                    <h3 class="text-lg font-medium text-slate-900">Belum ada foto galeri</h3>
                    <p class="text-slate-500 mt-2">Dokumentasi kegiatan akan segera ditambahkan.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Call to Action Banner -->
    <section class="py-16 mx-4 sm:mx-8">
        <div class="max-w-7xl mx-auto bg-primary rounded-3xl overflow-hidden relative shadow-2xl shadow-primary/20">
            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-64 h-64 bg-black opacity-10 rounded-full blur-3xl"></div>
            <div
                class="relative z-10 px-8 py-16 md:px-16 text-center md:text-left flex flex-col md:flex-row items-center justify-between gap-8">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Sudah Siap Uji Kompetensi?</h2>
                    <p class="text-blue-100 text-lg max-w-xl">
                        Pastikan data diri Anda sudah lengkap dan benar. Login untuk mengakses jadwal dan informasi asesmen.
                    </p>
                </div>
                <div class="flex-shrink-0">
                    @auth
                        <a class="inline-flex items-center justify-center px-8 py-4 bg-white text-primary font-bold rounded-xl shadow-lg hover:bg-gray-50 transition-colors duration-200"
                            href="{{ route('admin.dashboard') }}">
                            Akses Dashboard
                            <span class="material-icons ml-2">arrow_forward</span>
                        </a>
                    @else
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">

                            <a class="inline-flex items-center justify-center px-8 py-4 border-2 border-white text-white font-bold rounded-xl hover:bg-white/10 transition-colors duration-200"
                                href="{{ route('registrasi.index') }}">
                                Daftar Sekarang
                                <span class="material-icons ml-2">person_add</span>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection