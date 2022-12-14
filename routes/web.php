<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\BomController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\MadController;
use App\Http\Controllers\RfqController;
use App\Http\Controllers\Konfirmasi_OrderController;
use App\Http\Controllers\OrderPembelianController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\QuatationController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AccountingController;

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

//Dashboard
Route::get('/',[AdminController::class,'index'])->name('Admin');

//Barang
Route::resource('/barang',BarangController::class);

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
Route::post('/datavendor/{id}/tambahstok',[VendorController::class,'tambahstok'])->name('datavendor.stok');

//Mad
Route::resource('/mad',MadController::class);

//RFQ
Route::resource('/rfq',RfqController::class);
Route::post('/rfq/ayax',[RfqController::class,'ayax'])->name('rfq.ayax');
Route::post('/rfq/ayax1',[RfqController::class,'ayax1'])->name('rfq.ayax1');
Route::post('/rfq/ayax2',[RfqController::class,'ayax2'])->name('rfq.ayax2');
Route::post('/rfq/ayax3',[RfqController::class,'ayax3'])->name('rfq.ayax3');
Route::post('/rfq/ayax4',[RfqController::class,'ayax4'])->name('rfq.ayax4');

//Konfirmasi
Route::resource('konfirmasi',Konfirmasi_OrderController::class);
Route::get('/konfirmasi/{id}/konfirmasi/{kode_rfq}', [Konfirmasi_OrderController::class, 'confirm'])->name('konfirmasi.confirm'); //konfirmasi order

//PO
Route::resource('po',OrderPembelianController::class);
Route::get('po/{id}/receive',[OrderPembelianController::class,'receive'])->name('po.receive');
Route::get('po/{id}/paid',[OrderPembelianController::class,'paid'])->name('po.paid');

//Customer
Route::resource('customer',CustomerController::class);

// Kasir-Penjualan / Sale
Route::resource('/sale',SaleController::class);
Route::post('/sale/ajax',[SaleController::class,'ajax'])->name('sale.ajax');
Route::post('/sale/ajax1',[SaleController::class,'ajax1'])->name('sale.ajax1');
Route::post('/sale/ajax2',[SaleController::class,'ajax2'])->name('sale.ajax2');
Route::post('/sale/ajax3',[SaleController::class,'ajax3'])->name('sale.ajax3');
Route::post('/sale/ajax4',[SaleController::class,'ajax4'])->name('sale.ajax4');
Route::post('/sale/ajax5',[SaleController::class,'ajax5'])->name('sale.ajax5');
Route::post('/sale/ajax6',[SaleController::class,'ajax6'])->name('sale.ajax6');

//Quatation
Route::resource('quatation',QuatationController::class);
Route::get('quatation/{id}/proses',[QuatationController::class,'proses'])->name('quatation.proses');

//Invoice
Route::resource('invoice',InvoiceController::class);
Route::get('invoice/{id}/paid',[InvoiceController::class,'paid'])->name('invoice.paid');
Route::get('invoice/{id}/proses',[InvoiceController::class,'proses'])->name('invoice.proses');

//accounting
Route::resource('accounting',AccountingController::class);
Route::get('/cetak_pdf', [AccountingController::class, 'cetak_pdf']);

Route::get('/pengeluaran',[AccountingController::class,'pengeluaran'])->name('accounting.pengeluaran');
Route::get('/cetak_pengeluaran', [AccountingController::class, 'cetak_pengeluaran'])->name('accounting.cetak_pengeluaran');