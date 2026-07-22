<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// ===== Public Routes =====
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/wisata', [PublicController::class, 'wisata'])->name('public.wisata');
Route::get('/wisata/{slug}', [PublicController::class, 'wisataDetail'])->name('public.wisata.detail');
Route::get('/umkm', [PublicController::class, 'umkm'])->name('public.umkm');
Route::get('/produk', [PublicController::class, 'produk'])->name('public.produk');
Route::get('/produk/{id}', [PublicController::class, 'produkDetail'])->name('public.produk.detail');
Route::get('/event', [PublicController::class, 'event'])->name('public.event');
Route::get('/kuliner', [PublicController::class, 'kuliner'])->name('public.kuliner');
Route::get('/kuliner/{id}', [PublicController::class, 'kulinerDetail'])->name('public.kuliner.detail');
Route::get('/penginapan', [PublicController::class, 'penginapan'])->name('public.penginapan');
Route::get('/penginapan/{id}', [PublicController::class, 'penginapanDetail'])->name('public.penginapan.detail');
Route::get('/berita', [PublicController::class, 'berita'])->name('public.berita');
Route::get('/berita/{id}', [PublicController::class, 'beritaDetail'])->name('public.berita.detail');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('public.tentang');

// ===== Auth Dashboard Redirect =====
Route::get('/dashboard', function () {
    if (auth()->user()->hasAnyRole(['Admin', 'Petugas'])) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

