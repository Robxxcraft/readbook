<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PetugasBukuController;
use App\Http\Controllers\PetugasRakController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:anggota,petugas');

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/{slug}', [BukuController::class, 'detail']);

Route::get('/rak', [RakController::class, 'index']);
Route::get('/rak/{slug}', [RakController::class, 'bukuDiRak']);

Route::get('/pencarian', [PencarianController::class, 'index']);

Route::get('/tag/{slug}', [TagController::class, 'index']);

Route::group(['middleware' => 'guest'], function(){
    Route::get('/masuk', [AuthController::class, 'masukForm'])->name('login');
    Route::post('/masuk', [AuthController::class, 'masuk'])->name('masuk');
    Route::get('/daftar', [AuthController::class, 'daftarAnggotaForm']);
    Route::post('/daftar', [AuthController::class, 'daftarAnggota'])->name('daftar');
});
Route::group(['middleware' => 'auth:anggota'], function(){
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    Route::post('/pengembalian/{id}', [PengembalianController::class, 'kembalikan']);
    Route::get('/pengembalian', [PengembalianController::class, 'index']);
    Route::get('/buku/{slug}/pinjam', [PeminjamanController::class, 'pinjamView']);
    Route::post('/buku/{slug}/pinjam', [PeminjamanController::class, 'pinjam']);
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::group(['middleware' => 'auth:petugas', 'prefix' => 'petugas'], function () {
    Route::get('/dashboard', [PetugasController::class, 'dashboard']);

    Route::get('/buku', [PetugasBukuController::class, 'index']);
    Route::get('/buku/tambah', [PetugasBukuController::class, 'createForm']);
    Route::post('/buku/tambah', [PetugasBukuController::class, 'create']);
    Route::get('/buku/ubah/{id}', [PetugasBukuController::class, 'editForm']);
    Route::post('/buku/ubah/{id}', [PetugasBukuController::class, 'update']);
    Route::get('/buku/hapus/{id}', [PetugasBukuController::class, 'destroy']);
    
    Route::get('/rak', [PetugasRakController::class, 'index']);
    Route::get('/rak/tambah', [PetugasRakController::class, 'createForm']);
    Route::post('/rak/tambah', [PetugasRakController::class, 'create']);
    Route::get('/rak/ubah/{id}', [PetugasRakController::class, 'editForm']);
    Route::post('/rak/ubah/{id}', [PetugasRakController::class, 'update']);
    Route::delete('/rak/hapus/{id}', [PetugasRakController::class, 'destroy']);
    
    Route::get('/peminjaman', [PetugasPeminjamanController::class, 'index']);
    Route::delete('/peminjaman/hapus/{id}', [PetugasPeminjamanController::class, 'destroy']);

    Route::get('/pengembalian', [PetugasPengembalianController::class, 'index']);
    Route::delete('/peminjaman/hapus/{id}', [PetugasPengembalianController::class, 'destroy']);

    Route::get('/data', [PetugasController::class, 'index']);
    Route::get('/data/tambah', [PetugasController::class, 'createForm']);
    Route::post('/data/tambah', [PetugasController::class, 'create']);
    Route::get('/data/ubah/{id}', [PetugasController::class, 'editForm']);
    Route::post('/data/ubah/{id}', [PetugasController::class, 'update']);
    Route::delete('/data/hapus/{id}', [PetugasController::class, 'destroy']);

    Route::get('/tags', [PetugasTagController::class, 'index']);
    Route::delete('/tag/hapus/{id}', [PetugasTagController::class, 'destroy']);
});