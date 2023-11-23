<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PelaporanMasukController;
use App\Http\Controllers\TambahPelaporanController;

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



Auth::routes();
Route::middleware('auth')->group(function () {
    Route::group(['middleware'  => 'CheckRole:admin,user'], function () {
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('/barang', BarangController::class);
        Route::resource('/kategori', KategoriController::class);
        Route::resource('/merk', MerkController::class);
        Route::resource('/lokasi', LokasiController::class);
    });

    Route::group(['middleware'  => 'CheckRole:admin'], function () {
        Route::get('/pelaporan-masuk', [PelaporanMasukController::class, 'index']);
        Route::get('/pelaporan-masuk/detail/{id}', [PelaporanMasukController::class, 'detail']);
    });

    Route::group(['middleware'  => 'CheckRole:user'], function () {
        Route::get('/tambah-pelaporan', [TambahPelaporanController::class, 'index']);
        Route::get('/get-data-barang', [TambahPelaporanController::class, 'getDataBarang']);
        Route::post('/tambah-pelaporan', [TambahPelaporanController::class, 'store']);
    });
});
