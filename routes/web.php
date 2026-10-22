
<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\PelangganController;

Route::get('/pelanggan', [PelangganController::class, 'index'])
    ->name('pelanggan.index');

Route::get('/pelanggan/tambah', function () {
    return 'Halaman Tambah Member';
})->name('pelanggan.tambah');

Route::get('/pelanggan/{id}/edit', function ($id) {
    return 'Halaman Edit Member ID: ' . $id;
})->name('pelanggan.edit');

Route::delete('/pelanggan/{id}', function ($id) {
    return 'Fungsi hapus untuk ID: ' . $id;
})->name('pelanggan.hapus');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes-koneksi', function () {
    try {
        DB::connection()->getPdo();
        return "DB berhasil connect!"; 
    } catch (\Exception $e) {
        return 'DB gagal connect: ' . $e->getMessage();
    }
})->withoutMiddleware('web');
