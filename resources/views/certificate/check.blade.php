@extends('layouts.app')

@section('title', 'Cek Sertifikat - LSP-P1 SMKN 2 Karanganyar')

@section('content')
    <div class="min-h-screen bg-slate-50 py-20 relative overflow-hidden">
        <!-- Background Elements -->
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-96 h-96 bg-purple-100 rounded-full blur-3xl opacity-50 translate-y-1/2 -translate-x-1/2">
        </div>

        <div class="container relative mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
            <div class="text-center mb-12">
                <h1 class="font-display font-black text-4xl md:text-5xl text-slate-900 uppercase tracking-tight mb-4">
                    Cek Validitas <br class="md:hidden" /> <span class="text-primary">Sertifikat</span>
                </h1>
                <p class="text-slate-600 font-medium text-lg">
                    Pastikan keaslian sertifikat kompetensi yang diterbitkan oleh LSP-P1 SMK Negeri 2 Karanganyar.
                </p>
            </div>

            <!-- Search Form -->
            <div class="bg-white rounded-xl border-3 border-border-strong p-8 shadow-neo mb-12 relative z-10">
                <h2 class="font-display font-bold text-xl text-slate-900 mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">search</span>
                    Formulir Verifikasi
                </h2>

                <form action="{{ route('certificate.verify') }}" method="POST" class="flex flex-col gap-6">
                    @csrf
                    <div>
                        <label for="certificate_number"
                            class="block text-sm font-bold text-slate-900 uppercase tracking-wide mb-2">Nomor
                            Sertifikat</label>
                        <div class="relative">
                            <input type="text" name="certificate_number" id="certificate_number"
                                class="w-full bg-slate-50 border-2 border-slate-300 rounded p-4 pl-12 font-medium text-slate-900 placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-0 transition-colors"
                                placeholder="Contoh: LSP-P1/2026/0001"
                                value="{{ old('certificate_number', $search_query ?? '') }}" required>
                            <span
                                class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">badge</span>
                        </div>
                        @error('certificate_number')
                            <p class="mt-2 text-sm text-red-600 font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">error</span> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full h-14 bg-slate-900 text-white font-bold uppercase tracking-wider rounded border-2 border-slate-900 hover:bg-primary hover:border-primary transition-all shadow-neo-sm hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">verified_user</span>
                        Verifikasi Sekarang
                    </button>
                </form>
            </div>

            <!-- Result Section -->
            @if(isset($search_performed))
                @if($result)
                    <!-- Valid Result -->
                    <div
                        class="bg-green-50 rounded-xl border-3 border-border-strong p-8 shadow-neo animate-fade-in relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-4 opacity-10">
                            <span class="material-symbols-outlined text-9xl text-green-600">verified</span>
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-6">
                                <div
                                    class="size-16 bg-green-100 border-2 border-border-strong rounded-full flex items-center justify-center text-green-600 shadow-sm">
                                    <span class="material-symbols-outlined text-3xl">check_circle</span>
                                </div>
                                <div>
                                    <h3 class="font-display font-black text-2xl text-slate-900 uppercase">Sertifikat Valid</h3>
                                    <p class="text-green-700 font-bold text-sm uppercase tracking-wider">Terverifikasi di Database
                                        Kami</p>
                                </div>
                            </div>

                            <div class="grid gap-4 bg-white/50 rounded-lg border-2 border-green-200 p-6">
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                                    <span class="text-sm font-bold text-slate-500 uppercase">Nama Pemegang</span>
                                    <span
                                        class="col-span-2 font-display font-bold text-lg text-slate-900">{{ $result->user->name }}</span>
                                </div>
                                <div class="h-px bg-green-200"></div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                                    <span class="text-sm font-bold text-slate-500 uppercase">Nomor Sertifikat</span>
                                    <span
                                        class="col-span-2 font-mono font-bold text-slate-700">{{ $result->certificate_number }}</span>
                                </div>
                                <div class="h-px bg-green-200"></div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                                    <span class="text-sm font-bold text-slate-500 uppercase">Skema Sertifikasi</span>
                                    <span class="col-span-2 font-medium text-slate-900">{{ $result->scheme->name }}</span>
                                </div>
                                <div class="h-px bg-green-200"></div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                                    <span class="text-sm font-bold text-slate-500 uppercase">Tanggal Terbit</span>
                                    <span
                                        class="col-span-2 font-medium text-slate-900">{{ \Carbon\Carbon::parse($result->issue_date)->format('d F Y') }}</span>
                                </div>
                                <div class="h-px bg-green-200"></div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                                    <span class="text-sm font-bold text-slate-500 uppercase">Status</span>
                                    <span class="col-span-2 inline-flex">
                                        <span
                                            class="px-3 py-1 bg-green-100 text-green-800 text-xs font-black uppercase tracking-wider rounded border border-green-200">
                                            Kompeten
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="mt-6 text-center">
                                <p class="text-xs text-slate-500 font-medium">
                                    Data ini dihasilkan secara otomatis dari sistem LSP-P1 SMK Negeri 2 Karanganyar. <br> Apabila
                                    terdapat ketidaksesuaian, silakan hubungi kami.
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Invalid Result -->
                    <div class="bg-red-50 rounded-xl border-3 border-border-strong p-8 shadow-neo animate-fade-in">
                        <div class="flex items-start gap-4">
                            <div
                                class="size-12 bg-red-100 border-2 border-border-strong rounded flex items-center justify-center text-red-600 flex-shrink-0">
                                <span class="material-symbols-outlined text-2xl">warning</span>
                            </div>
                            <div>
                                <h3 class="font-display font-black text-xl text-slate-900 mb-2">Sertifikat Tidak Ditemukan</h3>
                                <p class="text-slate-600 font-medium mb-4">
                                    Maaf, nomor sertifikat <strong
                                        class="text-slate-900 bg-red-100 px-1 rounded">{{ $search_query }}</strong> tidak terdaftar
                                    dalam database kami atau data yang Anda masukkan salah.
                                </p>
                                <div class="bg-white p-4 rounded border-2 border-red-100 text-sm text-slate-500">
                                    <p class="font-bold text-slate-700 mb-1">Saran Perbaikan:</p>
                                    <ul class="list-disc list-inside space-y-1">
                                        <li>Periksa kembali penulisan nomor sertifikat.</li>
                                        <li>Pastikan menggunakan format yang benar (cth: LSP-P1/...).</li>
                                        <li>Hubungi admin jika Anda yakin sertifikat tersebut valid.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection