<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard - LSP-P1')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logosmk.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Lexend:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-body bg-slate-50 text-slate-900 antialiased selection:bg-primary selection:text-white">

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0 border-r-3 border-border-strong hidden md:block">
            <div class="h-16 flex items-center justify-center border-b border-slate-700">
                <span class="text-xl font-black font-display uppercase tracking-wider">LSP ADMIN</span>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded hover:bg-slate-800 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white font-bold' : 'text-slate-400' }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    Dashboard
                </a>
                <div class="pt-4 pb-2 text-xs font-bold text-slate-500 uppercase tracking-wider">Master Data</div>
                <a href="{{ route('admin.schemes.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded hover:bg-slate-800 transition-colors {{ request()->routeIs('admin.schemes.*') ? 'bg-primary text-white font-bold' : 'text-slate-400' }}">
                    <span class="material-symbols-outlined">fact_check</span>
                    Skema Sertifikasi
                </a>
                <a href="{{ route('admin.tempat-uji.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded hover:bg-slate-800 transition-colors {{ request()->routeIs('admin.tempat-uji.*') ? 'bg-primary text-white font-bold' : 'text-slate-400' }}">
                    <span class="material-symbols-outlined">location_on</span>
                    Tempat Uji
                </a>
                <a href="{{ route('admin.asesors.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded hover:bg-slate-800 transition-colors {{ request()->routeIs('admin.asesors.*') ? 'bg-primary text-white font-bold' : 'text-slate-400' }}">
                    <span class="material-symbols-outlined">group</span>
                    Asesor Kompetensi
                </a>
                <div class="pt-4 pb-2 text-xs font-bold text-slate-500 uppercase tracking-wider">Media Informasi</div>
                <a href="{{ route('admin.galleries.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded hover:bg-slate-800 transition-colors {{ request()->routeIs('admin.galleries.*') ? 'bg-primary text-white font-bold' : 'text-slate-400' }}">
                    <span class="material-symbols-outlined">perm_media</span>
                    Galeri Foto
                </a>
                <a href="{{ route('admin.documentations.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded hover:bg-slate-800 transition-colors {{ request()->routeIs('admin.documentations.*') ? 'bg-primary text-white font-bold' : 'text-slate-400' }}">
                    <span class="material-symbols-outlined">article</span>
                    Dokumentasi Aplikasi
                </a>
                <div class="pt-8 border-t border-slate-700 mt-4">
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded hover:bg-red-600 hover:text-white transition-colors text-slate-400">
                            <span class="material-symbols-outlined">logout</span>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white border-b-3 border-border-strong h-16 flex items-center justify-between px-6">
                <button class="md:hidden text-slate-500">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="flex items-center gap-4 ml-auto">
                    <span class="font-bold text-slate-700">{{ Auth::user()->name }}</span>
                    <div
                        class="size-8 rounded bg-primary flex items-center justify-center text-white font-black text-sm">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border-2 border-green-500 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Logout Modal -->
    <div id="logout-modal" class="fixed inset-0 z-50 hidden relative" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity opacity-0 ease-out duration-200"
            id="logout-backdrop"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!-- Modal Panel -->
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-neo border-2 border-slate-900 transition-[opacity,transform] ease-out duration-200 sm:my-8 sm:w-full sm:max-w-md scale-95 opacity-0"
                    id="logout-panel">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10 border-2 border-slate-900">
                                <span class="material-symbols-outlined text-red-600">logout</span>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-xl font-black leading-6 text-slate-900 font-display uppercase"
                                    id="modal-title">Konfirmasi Logout</h3>
                                <div class="mt-2">
                                    <p class="text-sm font-medium text-slate-600">Apakah Anda yakin ingin keluar dari
                                        sesi ini? Anda harus login kembali untuk mengakses halaman ini.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-slate-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t-2 border-slate-900">
                        <button type="button" id="confirm-logout"
                            class="inline-flex w-full justify-center rounded bg-red-600 px-3 py-2 text-sm font-bold text-white shadow-neo hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none transition-all sm:ml-3 sm:w-auto border-2 border-slate-900">Ya,
                            Keluar</button>
                        <button type="button" id="cancel-logout"
                            class="mt-3 inline-flex w-full justify-center rounded bg-white px-3 py-2 text-sm font-bold text-slate-900 shadow-neo hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none transition-all sm:mt-0 sm:w-auto border-2 border-slate-900 ring-1 ring-inset ring-slate-300 hover:bg-slate-50">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const logoutForm = document.getElementById('logout-form');
            const modal = document.getElementById('logout-modal');
            const backdrop = document.getElementById('logout-backdrop');
            const panel = document.getElementById('logout-panel');
            const confirmBtn = document.getElementById('confirm-logout');
            const cancelBtn = document.getElementById('cancel-logout');

            // Function to show modal
            function showModal(e) {
                e.preventDefault();
                modal.classList.remove('hidden');
                // Trigger transitions
                setTimeout(() => {
                    backdrop.classList.remove('opacity-0');
                    panel.classList.remove('scale-95', 'opacity-0');
                    panel.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            // Function to hide modal
            function closeModal() {
                backdrop.classList.add('opacity-0');
                panel.classList.remove('scale-100', 'opacity-100');
                panel.classList.add('scale-95', 'opacity-0');

                // Wait for transition to finish before hiding
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }

            if (logoutForm) {
                logoutForm.addEventListener('submit', showModal);
            }

            if (cancelBtn) {
                cancelBtn.addEventListener('click', closeModal);
            }

            if (confirmBtn) {
                confirmBtn.addEventListener('click', function () {
                    logoutForm.removeEventListener('submit', showModal);
                    logoutForm.submit();
                });
            }

            // Close when clicking outside
            modal.addEventListener('click', function (e) {
                if (e.target.closest('#logout-panel') === null && !e.target.closest('form')) {
                    // Check if it's the backdrop wrapper logic if needed, 
                    // but the wrapper is full screen. Simpler to just check if click is outside panel.
                    // However, the wrapper structure has nested divs. 
                    // Let's just use the explicit cancel button for safety or strictly check backdrop.
                }
            });
        });
    </script>
</body>

</html>