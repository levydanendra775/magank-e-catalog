<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\KulinerController;
use App\Http\Controllers\Admin\PenginapanController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\UlasanController;

use App\Http\Controllers\Admin\LaporanController;

Route::middleware(['auth', 'role:Admin|Petugas'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Laporan Routes
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/wisata/pdf', [LaporanController::class, 'exportWisataPdf'])->name('laporan.wisata.pdf');
    Route::get('/laporan/wisata/excel', [LaporanController::class, 'exportWisataExcel'])->name('laporan.wisata.excel');
    Route::get('/laporan/umkm/pdf', [LaporanController::class, 'exportUmkmPdf'])->name('laporan.umkm.pdf');
    Route::get('/laporan/umkm/excel', [LaporanController::class, 'exportUmkmExcel'])->name('laporan.umkm.excel');
    
    Route::resource('wisata', WisataController::class);
    Route::resource('umkm', UmkmController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('event', EventController::class);
    Route::resource('kuliner', KulinerController::class);
    Route::resource('penginapan', PenginapanController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('ulasan', UlasanController::class)->only(['index', 'destroy']);
    Route::post('/ulasan/{id}/reply', [UlasanController::class, 'reply'])->name('ulasan.reply');
});
