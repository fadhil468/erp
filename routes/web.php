<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\BahanBakuController;
use App\Models\bahanbaku;

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