<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\KartuOrderController;
use App\Http\Controllers\PengujianController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('pegawai/tampil', [PegawaiController::class, 'tampilpegawai'])->name('tampilpegawai')->middleware('auth');
Route::get('pegawai/tambah', [PegawaiController::class, 'tambahpegawai'])->name('tambahpegawai')->middleware('auth');
Route::post('pegawai/simpan', [PegawaiController::class, 'simpanpegawai'])->name('simpanpegawai')->middleware('auth');
Route::get('pegawai/ubah/{id_pegawai}', [PegawaiController::class, 'ubahpegawai'])->name('ubahpegawai')->middleware('auth');
Route::post('pegawai/update', [PegawaiController::class, 'updatepegawai'])->name('updatepegawai')->middleware('auth');
Route::get('pegawai/hapus/{id_pegawai}', [PegawaiController::class, 'hapuspegawai'])->name('hapuspegawai')->middleware('auth');

Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('register', [RegisterController::class, 'register'])->name('register');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/index', [KartuController::class, 'index'])->name('index');
Route::post('/kartu/with-model', [KartuController::class, 'insertWithModel']);
Route::get('/kartu/form', [KartuController::class, 'formInsert']);
Route::get('/kartu/{id}', [KartuController::class, 'getById']);
Route::get('/kartu/delete/{id}', [KartuController::class, 'delete'])->name('kartu.delete');


Route::get('/kartuorder/form/{kartu_id?}', [KartuOrderController::class, 'formInsert'])->name('kartuorder.form');
Route::post('/kartuorder/with-model', [KartuOrderController::class, 'insertWithModel']);
// Route::get('/kartuorder/form', [KartuOrderController::class, 'formInsert']);
// Route::get('/order/print/{idkartu}/{id}', [OrderController::class, 'cetak_pdf']);
Route::get('/kartuorder/{kartu_id}/{kartuorder_id}', [KartuOrderController::class, 'getById']);
Route::get('/kartuorder/find', [KartuOrderController::class, 'find'])->name('kartuorder');

Route::post('/order/with-model', [OrderController::class, 'insertWithModel']);
Route::get('/order/form', [OrderController::class, 'formInsert']);
Route::get('/order/print/{kartu_id}/{kartuorder_id}/{order_id}', [OrderController::class, 'cetak_pdf']);
Route::get('/order/{id}', [OrderController::class, 'getById']);
Route::get('/order/form/{kartu_id}/{kartuorder_id}', [OrderController::class, 'formInsert'])->name('order.form');

Route::get('/pengujian', [PengujianController::class, 'index'])->name('pengujian');
Route::get('/pengujian/{kartu_id}/{kartuorder_id}', [PengujianController::class, 'getById']);
Route::get('/pengujian/{kartu_id}/{kartuorder_id}/{order_id}', [PengujianController::class, 'uji']);
Route::post('/pengujian/aksipengujian', [PengujianController::class, 'aksiPengujian']);

