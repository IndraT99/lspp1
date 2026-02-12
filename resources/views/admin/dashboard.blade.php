@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="text-3xl font-black font-display text-slate-900 mb-8 uppercase">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg border-2 border-border-strong p-6 shadow-neo">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-bold text-slate-500 uppercase tracking-wide">Total Skema</h2>
                    <p class="text-4xl font-black text-slate-900 mt-2">{{ \App\Models\Scheme::count() }}</p>
                </div>
                <div class="size-12 rounded bg-blue-100 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-2xl">fact_check</span>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-lg border-2 border-border-strong p-6 shadow-neo">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-bold text-slate-500 uppercase tracking-wide">Total Tempat Uji</h2>
                    <p class="text-4xl font-black text-slate-900 mt-2">{{ \App\Models\TempatUji::count() }}</p>
                </div>
                <div class="size-12 rounded bg-green-100 flex items-center justify-center text-green-600">
                    <span class="material-symbols-outlined text-2xl">location_on</span>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-lg border-2 border-border-strong p-6 shadow-neo">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-bold text-slate-500 uppercase tracking-wide">Total Asesor</h2>
                    <p class="text-4xl font-black text-slate-900 mt-2">{{ \App\Models\Asesor::count() }}</p>
                </div>
                <div class="size-12 rounded bg-purple-100 flex items-center justify-center text-purple-600">
                    <span class="material-symbols-outlined text-2xl">group</span>
                </div>
            </div>
        </div>
    </div>
@endsection