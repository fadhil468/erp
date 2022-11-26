<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\BomController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\MadController;

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
    return view('Admin-Page.Admin');
});
//Barang
Route::resource('/barang',BarangController::class);

//Pemesanan
Route::resource('/pemesanan',PemesananController::class);

// Bahan Baku
Route::resource('/bahanbaku',BahanBakuController::class);
Route::get('datavendor/{id}/vendor',[BahanBakuController::class,'vendor'])->name('bahanbaku.vendor');

// BOM
Route::resource('/bom',BomController::class);
Route::post('/bom/ajax',[BomController::class,'bom'])->name('bom.ajax');
Route::post('/bom/ajax1',[BomController::class,'bom1'])->name('bom.ajax1');
Route::post('/bom/ajax2',[BomController::class,'bom2'])->name('bom.ajax2');

// Kasir
Route::resource('/kasir',KasirController::class);
Route::post('/kasir/ajax',[KasirController::class,'ajax'])->name('kasir.ajax');
Route::post('/kasir/ajax1',[KasirController::class,'ajax1'])->name('kasir.ajax1');
Route::post('/kasir/ajax2',[KasirController::class,'ajax2'])->name('kasir.ajax2');
Route::post('/kasir/ajax3',[KasirController::class,'ajax3'])->name('kasir.ajax3');
Route::post('/kasir/ajax4',[KasirController::class,'ajax4'])->name('kasir.ajax4');
Route::post('/kasir/ajax5',[KasirController::class,'ajax5'])->name('kasir.ajax5');
Route::post('/kasir/ajax6',[KasirController::class,'ajax6'])->name('kasir.ajax6');

//pemesanan
Route::resource('/pemesanan',PemesananController::class);
Route::post('/pemesanan/{id}/proses',[PemesananController::class,'proses'])->name('pemesanan.proses');

// Vendor
Route::resource('datavendor',VendorController::class);
Route::post('/datavendor/{id}/tambahstok',[VendorController::class,'tambahstok'])->name('datavendro.stok');
//Mad
Route::resource('/mad',MadController::class);