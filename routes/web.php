<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CertificateController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cek-sertifikat', [CertificateController::class, 'index'])->name('certificate.check');
Route::post('/cek-sertifikat', [CertificateController::class, 'verify'])->name('certificate.verify');
Route::get('/registrasi', [App\Http\Controllers\RegistrationController::class, 'index'])->name('registrasi.index');

// Uji Kompetensi Routes
Route::prefix('uji-kompetensi')->name('uji-kompetensi.')->group(function () {
    Route::get('/skema', [App\Http\Controllers\SkemaController::class, 'index'])->name('skema');
    Route::get('/tempat-uji', [App\Http\Controllers\TempatUjiController::class, 'index'])->name('tempat-uji');
    Route::get('/asesor', [App\Http\Controllers\AsesorController::class, 'index'])->name('asesor');
});

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard & CRUD (Protected)
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::resource('schemes', App\Http\Controllers\Admin\SchemeController::class);
        Route::resource('tempat-uji', App\Http\Controllers\Admin\TempatUjiController::class)->parameters(['tempat-uji' => 'tempatUji']);
        Route::resource('asesors', App\Http\Controllers\Admin\AsesorController::class);
        Route::resource('galleries', App\Http\Controllers\Admin\GalleryController::class);
        Route::resource('documentations', App\Http\Controllers\Admin\DocumentationController::class);
    });
});

// Profil Routes
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/visi-misi', [App\Http\Controllers\ProfilController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/fungsi-tujuan', [App\Http\Controllers\ProfilController::class, 'fungsiTujuan'])->name('fungsi-tujuan');
});

// Media Informasi Routes
Route::prefix('media')->name('media.')->group(function () {
    Route::get('/galeri', [App\Http\Controllers\MediaController::class, 'galeri'])->name('galeri');
    Route::get('/dokumentasi', [App\Http\Controllers\MediaController::class, 'dokumentasi'])->name('dokumentasi');
});
