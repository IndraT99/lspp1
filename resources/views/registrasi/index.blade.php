@extends('layouts.app')

@section('title', 'Pendaftaran Sertifikasi - LSP-P1 SMKN 2 Karanganyar')

@section('content')
    <!-- Header -->
    <div class="bg-primary pt-24 pb-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-bold text-4xl md:text-5xl text-white mb-4">
                PENDAFTARAN SERTIFIKASI
            </h1>
            <p class="text-blue-100 font-medium max-w-2xl mx-auto text-lg">
                Silakan pilih skema sertifikasi untuk melanjutkan pendaftaran.
            </p>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 pb-24 relative z-20">
        <div class="max-w-2xl mx-auto bg-white rounded-2xl p-8 shadow-xl shadow-slate-200/50">
            <div class="mb-8 text-center">
                <div class="inline-flex size-16 rounded-xl bg-blue-50 text-primary items-center justify-center mb-4">
                    <span class="material-icons text-3xl">how_to_reg</span>
                </div>
                <h2 class="text-2xl font-bold text-slate-900">Pilih Skema Sertifikasi</h2>
                <p class="text-slate-500 mt-2">Pilih skema yang sesuai dengan jurusan atau kompetensi Anda.</p>
            </div>

            <div class="space-y-6">
                <div>
                    <label for="scheme_id" class="block text-sm font-bold text-slate-700 mb-2">Skema Sertifikasi</label>
                    <select id="scheme_id" name="scheme_id"
                        class="w-full px-4 py-3 border-2 border-border-strong rounded-xl focus:outline-none focus:border-primary bg-white appearance-none cursor-pointer"
                        onchange="showRegistrationLink(this)">
                        <option value="">-- Pilih Skema --</option>
                        @foreach($schemes as $scheme)
                            <option value="{{ $scheme->id }}" data-link="{{ $scheme->registration_link }}"
                                {{ request('scheme_id') == $scheme->id ? 'selected' : '' }}>
                                {{ $scheme->code }} - {{ $scheme->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div id="link-container" class="hidden text-center pt-4 border-t border-slate-100 mt-6 animate-fade-in">
                    <p class="text-slate-600 mb-4 font-medium">Klik tombol di bawah untuk mengisi formulir pendaftaran:</p>
                    <a id="registration-btn" href="#" target="_blank"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white font-bold rounded-xl shadow-lg shadow-primary/30 hover:bg-primary-dark hover:-translate-y-1 transition-all w-full sm:w-auto">
                        <span class="material-icons">assignment</span>
                        Isi Formulir Pendaftaran Google Form
                    </a>
                    <p class="text-xs text-slate-500 mt-4">Anda akan diarahkan ke Google Form.</p>
                </div>

                <div id="no-link-message" class="hidden text-center pt-4 border-t border-slate-100 mt-6 animate-fade-in">
                    <div class="bg-yellow-50 text-yellow-800 p-4 rounded-xl border border-yellow-200">
                        <p class="font-bold flex items-center justify-center gap-2">
                            <span class="material-icons">info</span>
                            Link Pendaftaran Belum Tersedia
                        </p>
                        <p class="text-sm mt-1">Mohon hubungi admin LSP untuk informasi lebih lanjut.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showRegistrationLink(select) {
            const selectedOption = select.options[select.selectedIndex];
            const link = selectedOption.getAttribute('data-link');
            const linkContainer = document.getElementById('link-container');
            const noLinkMessage = document.getElementById('no-link-message');
            const btn = document.getElementById('registration-btn');

            if (select.value === "") {
                linkContainer.classList.add('hidden');
                noLinkMessage.classList.add('hidden');
                return;
            }

            if (link) {
                btn.href = link;
                linkContainer.classList.remove('hidden');
                noLinkMessage.classList.add('hidden');
            } else {
                linkContainer.classList.add('hidden');
                noLinkMessage.classList.remove('hidden');
            }
        }

        // Trigger on load if value is selected
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('scheme_id');
            if(select.value) {
                showRegistrationLink(select);
            }
        });
    </script>
@endsection