<?php
use App\Http\Controllers\KartuController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/', [KartuController::class, 'index']);
Route::post('/kartu/with-model', [KartuController::class, 'insertWithModel']);
Route::get('/kartu/form', [KartuController::class, 'formInsert']);
Route::get('/kartu/find', [KartuController::class, 'find'])->name('kartu.find');
Route::get('/kartu/{id}', [KartuController::class, 'getById']);

Route::post('/order/with-model', [OrderController::class, 'insertWithModel']);
Route::get('/order/form', [OrderController::class, 'formInsert']);
Route::get('/order/print/{idkartu}/{id}', [OrderController::class, 'cetak_pdf']);
Route::get('/order/{id}', [OrderController::class, 'getById']);
Route::get('/order/form/{kartu_id?}', [OrderController::class, 'formInsert'])->name('order.form');
