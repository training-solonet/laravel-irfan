<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barangController;
use App\Http\Controllers\penjualanController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\keranjangController;
use App\Http\Controllers\detail_penjualanController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/barang', [barangController::class, 'show']);
Route::get('/pelanggan', [PelangganController::class, 'show']);
Route::get('/penjualan', [penjualanController::class, 'show']);
Route::get( '/keranjang', [keranjangController::class, 'show']);
Route::get('/detail_penjualan', [detail_penjualanController::class, 'show']);



Route::resource('barang', barangController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('penjualan', penjualanController::class);
Route::resource('keranjang', keranjangController::class);
Route::get('/penjualan/{id}', [PenjualanController::class, 'detail'])->name('detail_penjualan');


Route::put('/barang/{id}', [barangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{barang}', [barangController::class, 'destroy'])->name('barang.destroy');


