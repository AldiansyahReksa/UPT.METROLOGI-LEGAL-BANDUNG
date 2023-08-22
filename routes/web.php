<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\KartuOrderController;
use App\Http\Controllers\PengujianController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [KartuController::class, 'index']);

    Route::get('/index', [KartuController::class, 'index'])->name('index');

    Route::get('/kartu/form', [KartuController::class, 'formInsert']);
    Route::post('/kartu/with-model', [KartuController::class, 'insertWithModel']);
    Route::get('/kartu/find', [KartuController::class, 'find'])->name('kartu.find');
    Route::get('/kartu/{id}', [KartuController::class, 'getById']);

    Route::get('/kartuorder/form/{kartu_id?}', [KartuOrderController::class, 'formInsert'])->name('kartuorder.form');
    Route::post('/kartuorder/with-model', [KartuOrderController::class, 'insertWithModel']);
    Route::get('/kartuorder/{kartu_id}/{kartuorder_id}', [KartuOrderController::class, 'getById']);

    Route::get('/order/form', [OrderController::class, 'formInsert']);
    Route::post('/order/with-model', [OrderController::class, 'insertWithModel']);
    Route::get('/order/print/{idkartu}/{id}', [OrderController::class, 'cetak_pdf']);
    Route::get('/order/{id}', [OrderController::class, 'getById']);
    Route::get('/order/form/{kartu_id}/{kartuorder_id}', [OrderController::class, 'formInsert'])->name('order.form');

    Route::get('/pengujian', [PengujianController::class, 'index']);
    Route::get('/pengujian/{kartu_id}/{kartuorder_id}', [PengujianController::class, 'getById']);


// Auth Routes

Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register/actionregister', [RegisterController::class, 'actionregister']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

