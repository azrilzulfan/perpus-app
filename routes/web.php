<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PinjamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route untuk Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'jumlah'])->name('dashboard');

//Route untuk Data Buku
Route::get('/buku', [BukuController::class, 'bukutampil'])->name('buku');
Route::post('/buku/tambah',[BukuController::class, 'bukutambah'])->name('buku');
Route::get('/buku/hapus/{id_buku}',[BukuController::class, 'bukuhapus'])->name('buku');
Route::put('/buku/edit/{id_buku}', [BukuController::class, 'bukuedit'])->name('buku');

//Route untuk Data Anggota
Route::get('/anggota', [AnggotaController::class, 'anggotatampil'])->name('anggota');
Route::post('/anggota/tambah',[AnggotaController::class, 'anggotatambah'])->name('anggota');
Route::get('/anggota/hapus/{id_anggota}',[AnggotaController::class, 'anggotahapus'])->name('anggota');
Route::put('/anggota/edit/{id_anggota}', [AnggotaController::class, 'anggotaedit'])->name('anggota');

//Route untuk Data Petugas
Route::get('/petugas', [PetugasController::class, 'petugastampil'])->name('petugas');
Route::post('/petugas/tambah',[PetugasController::class, 'petugastambah'])->name('petugas');
Route::get('/petugas/hapus/{id_petugas}',[PetugasController::class, 'petugashapus'])->name('petugas');
Route::put('/petugas/edit/{id_petugas}', [PetugasController::class, 'petugasedit'])->name('petugas');

//Route untuk Data Pinjam
Route::get('/pinjam', [PinjamController::class, 'pinjamtampil'])->name('pinjam');
Route::post('/pinjam/tambah',[PinjamController::class, 'pinjamtambah'])->name('pinjam');
Route::get('/pinjam/hapus/{id_pinjam}',[PinjamController::class, 'pinjamhapus'])->name('pinjam');
Route::put('/pinjam/edit/{id_pinjam}', [PinjamController::class, 'pinjamedit'])->name('pinjam');


require __DIR__.'/auth.php';
