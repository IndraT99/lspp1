<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'LSP-P1 SMK Negeri 2 Karanganyar')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logosmk.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-display bg-background-light text-slate-800 antialiased selection:bg-primary selection:text-white">
    <!-- Navigation -->
    <nav
        class="sticky top-0 z-50 w-full bg-white/80 backdrop-blur-md border-b border-slate-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div
                        class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center shadow-lg shadow-primary/30 p-1">
                        <img src="{{ asset('assets/logosmk.png') }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <span class="font-bold text-xl tracking-tight text-slate-900">LSP-P1<span class="">.</span><span
                            class="text-primary">SMKN2KRA</span></span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex space-x-8 items-center text-sm font-medium">
                    <a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'text-primary' : 'text-slate-600 hover:text-primary' }} transition-colors">Beranda</a>

                    <!-- Profil Dropdown -->
                    <div class="relative group">
                        <button
                            class="flex items-center gap-1 {{ request()->is('profil*') ? 'text-primary' : 'text-slate-600 hover:text-primary' }} transition-colors">
                            Profil <span class="material-icons text-sm">expand_more</span>
                        </button>
                        <div
                            class="absolute top-full left-0 w-48 bg-white border border-slate-100 shadow-xl shadow-primary/5 rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-left z-50 mt-2 p-1">
                            <a href="{{ route('profil.visi-misi') }}"
                                class="block px-4 py-2.5 rounded-lg hover:bg-primary/5 hover:text-primary text-slate-600 transition-colors">Visi
                                & Misi</a>
                            <a href="{{ route('profil.fungsi-tujuan') }}"
                                class="block px-4 py-2.5 rounded-lg hover:bg-primary/5 hover:text-primary text-slate-600 transition-colors">Fungsi
                                & Tujuan</a>
                        </div>
                    </div>

                    <!-- Uji Kompetensi Dropdown -->
                    <div class="relative group">
                        <button
                            class="flex items-center gap-1 {{ request()->is('uji-kompetensi*') ? 'text-primary' : 'text-slate-600 hover:text-primary' }} transition-colors">
                            Uji Kompetensi <span class="material-icons text-sm">expand_more</span>
                        </button>
                        <div
                            class="absolute top-full left-0 w-56 bg-white border border-slate-100 shadow-xl shadow-primary/5 rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-left z-50 mt-2 p-1">
                            <a href="{{ route('uji-kompetensi.skema') }}"
                                class="block px-4 py-2.5 rounded-lg hover:bg-primary/5 hover:text-primary text-slate-600 transition-colors">Skema
                                Sertifikasi</a>
                            <a href="{{ route('uji-kompetensi.tempat-uji') }}"
                                class="block px-4 py-2.5 rounded-lg hover:bg-primary/5 hover:text-primary text-slate-600 transition-colors">Tempat
                                Uji</a>
                            <a href="{{ route('uji-kompetensi.asesor') }}"
                                class="block px-4 py-2.5 rounded-lg hover:bg-primary/5 hover:text-primary text-slate-600 transition-colors">Asesor</a>
                        </div>
                    </div>

                    <!-- Media Informasi Dropdown -->
                    <div class="relative group">
                        <button
                            class="flex items-center gap-1 {{ request()->is('media*') ? 'text-primary' : 'text-slate-600 hover:text-primary' }} transition-colors">
                            Media Informasi <span class="material-icons text-sm">expand_more</span>
                        </button>
                        <div
                            class="absolute top-full left-0 w-48 bg-white border border-slate-100 shadow-xl shadow-primary/5 rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-left z-50 mt-2 p-1">
                            <a href="{{ route('media.galeri') }}"
                                class="block px-4 py-2.5 rounded-lg hover:bg-primary/5 hover:text-primary text-slate-600 transition-colors">Galeri
                                Foto</a>
                            <a href="{{ route('media.dokumentasi') }}"
                                class="block px-4 py-2.5 rounded-lg hover:bg-primary/5 hover:text-primary text-slate-600 transition-colors">Dokumentasi</a>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="hidden lg:flex items-center gap-3">
                    @auth
                        <a href="{{ route('admin.dashboard') }}"
                            class="inline-flex items-center justify-center px-6 py-2.5 border border-transparent text-sm font-semibold rounded-lg shadow-sm text-white bg-primary hover:bg-primary-dark transition-all duration-200 shadow-primary/30">
                            Dashboard
                        </a>
                        <button type="button" onclick="openLogoutModal()"
                            class="inline-flex items-center justify-center px-4 py-2.5 border border-slate-200 text-sm font-semibold rounded-lg text-slate-600 hover:text-red-600 hover:bg-red-50 transition-all duration-200">
                            <span class="material-icons">logout</span>
                        </button>
                    @else
                        <a href="{{ route('registrasi.index') }}"
                            class="inline-flex items-center justify-center px-6 py-2.5 border border-primary text-sm font-semibold rounded-lg text-primary hover:bg-primary hover:text-white transition-all duration-200">
                            Daftar
                        </a>
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center justify-center px-6 py-2.5 border border-transparent text-sm font-semibold rounded-lg shadow-sm text-white bg-primary hover:bg-primary-dark transition-all duration-200 shadow-primary/30">
                            Login
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center">
                    <button id="mobile-menu-button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-slate-600 hover:text-primary focus:outline-none transition-colors">
                        <span class="material-icons">menu</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden lg:hidden bg-white border-t border-slate-100 absolute w-full left-0 top-20 shadow-xl transition-all duration-300 ease-in-out opacity-0 -translate-y-2 pointer-events-none">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="{{ route('home') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-blue-50 text-primary' : 'text-slate-600 hover:text-primary hover:bg-slate-50' }}">Beranda</a>

                <!-- Mobile Profil Dropdown -->
                <div class="space-y-1">
                    <button onclick="toggleMobileSubmenu('mobile-profil-submenu')"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-md text-base font-medium {{ request()->is('profil*') ? 'text-primary bg-blue-50' : 'text-slate-600 hover:text-primary hover:bg-slate-50' }}">
                        <span>Profil</span>
                        <span class="material-icons text-sm transition-transform"
                            style="{{ request()->is('profil*') ? 'transform: rotate(180deg);' : '' }}"
                            id="mobile-profil-arrow">expand_more</span>
                    </button>
                    <div id="mobile-profil-submenu"
                        class="{{ request()->is('profil*') ? '' : 'hidden' }} pl-4 space-y-1">
                        <a href="{{ route('profil.visi-misi') }}"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->routeIs('profil.visi-misi') ? 'text-primary font-semibold' : 'text-slate-500 hover:text-primary' }}">Visi
                            & Misi</a>
                        <a href="{{ route('profil.fungsi-tujuan') }}"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->routeIs('profil.fungsi-tujuan') ? 'text-primary font-semibold' : 'text-slate-500 hover:text-primary' }}">Fungsi
                            &
                            Tujuan</a>
                    </div>
                </div>

                <!-- Mobile Uji Kompetensi Dropdown -->
                <div class="space-y-1">
                    <button onclick="toggleMobileSubmenu('mobile-ujikom-submenu')"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-md text-base font-medium {{ request()->is('uji-kompetensi*') ? 'text-primary bg-blue-50' : 'text-slate-600 hover:text-primary hover:bg-slate-50' }}">
                        <span>Uji Kompetensi</span>
                        <span class="material-icons text-sm transition-transform"
                            style="{{ request()->is('uji-kompetensi*') ? 'transform: rotate(180deg);' : '' }}"
                            id="mobile-ujikom-arrow">expand_more</span>
                    </button>
                    <div id="mobile-ujikom-submenu"
                        class="{{ request()->is('uji-kompetensi*') ? '' : 'hidden' }} pl-4 space-y-1">
                        <a href="{{ route('uji-kompetensi.skema') }}"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->routeIs('uji-kompetensi.skema') ? 'text-primary font-semibold' : 'text-slate-500 hover:text-primary' }}">Skema
                            Sertifikasi</a>
                        <a href="{{ route('uji-kompetensi.tempat-uji') }}"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->routeIs('uji-kompetensi.tempat-uji') ? 'text-primary font-semibold' : 'text-slate-500 hover:text-primary' }}">Tempat
                            Uji</a>
                        <a href="{{ route('uji-kompetensi.asesor') }}"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->routeIs('uji-kompetensi.asesor') ? 'text-primary font-semibold' : 'text-slate-500 hover:text-primary' }}">Asesor</a>
                    </div>
                </div>

                <!-- Mobile Media Dropdown -->
                <div class="space-y-1">
                    <button onclick="toggleMobileSubmenu('mobile-media-submenu')"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-md text-base font-medium {{ request()->is('media*') ? 'text-primary bg-blue-50' : 'text-slate-600 hover:text-primary hover:bg-slate-50' }}">
                        <span>Media Informasi</span>
                        <span class="material-icons text-sm transition-transform"
                            style="{{ request()->is('media*') ? 'transform: rotate(180deg);' : '' }}"
                            id="mobile-media-arrow">expand_more</span>
                    </button>
                    <div id="mobile-media-submenu" class="{{ request()->is('media*') ? '' : 'hidden' }} pl-4 space-y-1">
                        <a href="{{ route('media.galeri') }}"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->routeIs('media.galeri') ? 'text-primary font-semibold' : 'text-slate-500 hover:text-primary' }}">Galeri
                            Foto</a>
                        <a href="{{ route('media.dokumentasi') }}"
                            class="block px-3 py-2 rounded-md text-sm {{ request()->routeIs('media.dokumentasi') ? 'text-primary font-semibold' : 'text-slate-500 hover:text-primary' }}">Dokumentasi</a>
                    </div>
                </div>

                <!-- Mobile CTA -->
                <div class="pt-4 mt-4 border-t border-slate-100 flex flex-col gap-2">
                    @auth
                        <a href="{{ route('admin.dashboard') }}"
                            class="block w-full text-center px-4 py-2 border border-transparent text-sm font-bold rounded-lg text-white bg-primary hover:bg-primary-dark">
                            Dashboard
                        </a>
                        <button onclick="openLogoutModal()"
                            class="block w-full text-center px-4 py-2 border border-slate-200 text-sm font-bold rounded-lg text-slate-600 hover:text-red-600 hover:bg-red-50">
                            Logout
                        </button>
                    @else
                        <a href="{{ route('registrasi.index') }}"
                            class="block w-full text-center px-4 py-2 border border-primary text-sm font-bold rounded-lg text-primary hover:bg-primary hover:text-white transition-colors">
                            Daftar
                        </a>
                        <a href="{{ route('login') }}"
                            class="block w-full text-center px-4 py-2 border border-transparent text-sm font-bold rounded-lg text-white bg-primary hover:bg-primary-dark">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.contains('hidden');

                if (isHidden) {
                    // Show menu
                    mobileMenu.classList.remove('hidden');
                    // Small delay to allow display:block to apply before transition
                    setTimeout(() => {
                        mobileMenu.classList.remove('opacity-0', '-translate-y-2', 'pointer-events-none');
                        mobileMenu.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
                    }, 10);
                } else {
                    // Hide menu
                    mobileMenu.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
                    mobileMenu.classList.add('opacity-0', '-translate-y-2', 'pointer-events-none');

                    // Wait for transition to finish
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300);
                }
            });
        }

        function toggleMobileSubmenu(submenuId) {
            const submenu = document.getElementById(submenuId);
            const arrow = document.getElementById(submenuId.replace('submenu', 'arrow'));

            if (submenu) {
                if (submenu.classList.contains('hidden')) {
                    submenu.classList.remove('hidden');
                    if (arrow) arrow.style.transform = 'rotate(180deg)';
                } else {
                    submenu.classList.add('hidden');
                    if (arrow) arrow.style.transform = 'rotate(0deg)';
                }
            }
    }
    </script>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Brand Info -->
                <div class="space-y-4">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center p-1">
                            <img src="{{ asset('assets/logosmk.png') }}" alt="Logo"
                                class="w-full h-full object-contain">
                        </div>
                        <span class="font-bold text-xl text-slate-900">LSP-P1<span class="text-primary">.</span></span>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Lembaga Sertifikasi Profesi Pihak Pertama (LSP-P1) SMK Negeri 2 Karanganyar. Menjamin mutu
                        kompetensi lulusan.
                    </p>
                    <div class="flex space-x-4 pt-2">
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-primary hover:text-white transition-colors">
                            <span class="material-icons text-sm">facebook</span>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-primary hover:text-white transition-colors">
                            <span class="material-icons text-sm">language</span>
                        </a>
                    </div>
                </div>

                <!-- Links 1 -->
                <div>
                    <h5 class="text-slate-900 font-bold mb-6">Navigasi</h5>
                    <ul class="space-y-3 text-sm text-slate-600">
                        <li><a class="hover:text-primary transition-colors" href="{{ route('home') }}">Beranda</a></li>
                        <li><a class="hover:text-primary transition-colors"
                                href="{{ route('profil.visi-misi') }}">Profil</a></li>
                        <li><a class="hover:text-primary transition-colors"
                                href="{{ route('uji-kompetensi.skema') }}">Skema Sertifikasi</a></li>
                        <li><a class="hover:text-primary transition-colors" href="{{ route('media.galeri') }}">Galeri
                                Foto</a></li>
                    </ul>
                </div>

                <!-- Links 2 -->
                <div>
                    <h5 class="text-slate-900 font-bold mb-6">Informasi</h5>
                    <ul class="space-y-3 text-sm text-slate-600">
                        <li><a class="hover:text-primary transition-colors"
                                href="{{ route('uji-kompetensi.tempat-uji') }}">Tempat Uji</a></li>
                        <li><a class="hover:text-primary transition-colors"
                                href="{{ route('uji-kompetensi.asesor') }}">Asesor Kompetensi</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h5 class="text-slate-900 font-bold mb-6">Hubungi Kami</h5>
                    <ul class="space-y-4 text-sm text-slate-600">
                        <li class="flex items-center gap-3">
                            <span class="material-icons text-primary text-lg">location_on</span>
                            <span>Jl. Yos Sudarso, Jengglong, Bejen, Karanganyar, Jawa Tengah</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-icons text-primary text-lg">phone</span>
                            <span>0271 494549-494335-6498171</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-icons text-primary text-lg">email</span>
                            <span>smkn2kra@yahoo.co.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="border-t border-slate-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-slate-500">
                <p>© {{ date('Y') }} LSP-P1 SMK Negeri 2 Karanganyar. All rights reserved.</p>

            </div>
        </div>
    </footer>

    <!-- Logout Modal -->
    <div id="logoutModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop">
        </div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    id="modalPanel">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-red-50 sm:mx-0 sm:h-10 sm:w-10">
                                <span class="material-icons text-red-600">logout</span>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-lg font-bold leading-6 text-slate-900" id="modal-title">Konfirmasi
                                    Logout</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-slate-500">Apakah Anda yakin ingin keluar dari aplikasi? Sesi
                                        Anda akan diakhiri.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-slate-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" onclick="document.getElementById('logoutForm').submit()"
                            class="inline-flex w-full justify-center rounded-xl bg-red-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto transition-colors">Keluar</button>
                        <button type="button" onclick="closeLogoutModal()"
                            class="mt-3 inline-flex w-full justify-center rounded-xl bg-white px-4 py-2.5 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50 sm:mt-0 sm:w-auto transition-colors">Batal</button>
                    </div>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const logoutModal = document.getElementById('logoutModal');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modalPanel = document.getElementById('modalPanel');

        function openLogoutModal() {
            logoutModal.classList.remove('hidden');
            setTimeout(() => {
                modalBackdrop.classList.remove('opacity-0');
                modalPanel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
                modalPanel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
            }, 10);
        }

        function closeLogoutModal() {
            modalBackdrop.classList.add('opacity-0');
            modalPanel.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
            modalPanel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');

            setTimeout(() => {
                logoutModal.classList.add('hidden');
            }, 300);
    }
    </script>
</body>

</html>