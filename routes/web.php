<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AuthController;

Route::get('/tes-koneksi', function () {
    DB::connection()->getPdo();

    return Schema::hasTable('pelanggan')
        ? 'Database dan tabel pelanggan berhasil ditemukan.'
        : 'Tabel pelanggan belum ditemukan.';
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.proses');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/pelanggan', [PelangganController::class, 'index'])
    ->name('pelanggan.index');

Route::middleware('auth')->group(function () {
    Route::get('/pelanggan/tambah', [PelangganController::class, 'create'])
        ->name('pelanggan.tambah');

    Route::post('/pelanggan', [PelangganController::class, 'store'])
        ->name('pelanggan.simpan');

    Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])
        ->name('pelanggan.edit');

    Route::put('/pelanggan/{pelanggan}', [PelangganController::class, 'update'])
        ->name('pelanggan.update');

    Route::delete('/pelanggan/{pelanggan}', [PelangganController::class, 'destroy'])
        ->name('pelanggan.hapus');
});
