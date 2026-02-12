<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - LSP-P1 SMK Negeri 2 Karanganyar</title>
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

    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="flex justify-center mb-6 gap-4">
                <img src="{{ asset('assets/logosmk.png') }}" alt="Logo SMKN 2 Karanganyar" class="h-20 w-auto">
                <img src="{{ asset('assets/logobnsp.png') }}" alt="Logo BNSP" class="h-20 w-auto">
            </div>
            <h2 class="mt-6 text-center text-3xl font-black font-display text-slate-900 uppercase">
                Login
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-neo border-2 border-border-strong sm:rounded-lg sm:px-10">
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-bold text-slate-700">Email Address</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="appearance-none block w-full px-3 py-2 border-2 border-border-strong rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm font-medium">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-bold text-slate-700">Password</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="appearance-none block w-full px-3 py-2 border-2 border-border-strong rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm font-medium">
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4">
                            <div class="flex">
                                <div class="ml-3">
                                    <p class="text-sm text-red-700 font-bold">
                                        {{ $errors->first() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('home') }}"
                            class="w-full flex justify-center py-3 px-4 border-2 border-slate-200 rounded-md shadow-neo text-sm font-bold text-slate-700 bg-white hover:bg-slate-50 hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none transition-all uppercase tracking-wider items-center gap-2">
                            <span class="material-symbols-outlined text-sm">arrow_back</span>
                            Kembali
                        </a>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border-2 border-border-strong rounded-md shadow-neo text-sm font-black text-white bg-primary hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-neo-hover transition-all uppercase tracking-wider">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>