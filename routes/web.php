<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\KendaraanController as Kendaraan;
use App\Http\Controllers\CustomerController as Customer;
use App\Http\Controllers\OrderController as Order;
use App\Http\Controllers\CustOrderController as CustOrder;

Route::get('/', function () {
    return view('home');
})->name('home');


// KENDARAAN
Route::get('/kendaraan', [Kendaraan::class, 'kendaraan'])->name('kendaraan');
Route::post('/kendaraan_store', [Kendaraan::class, 'kendaraan_store'])->name('kendaraan_store');
Route::put('/kendaraan_update', [Kendaraan::class, 'kendaraan_update'])->name('kendaraan_update');
Route::delete('/kendaraan_delete/{id}', [Kendaraan::class, 'kendaraan_delete'])->name('kendaraan_delete');

//CUSTOMER
Route::get('/customer', [Customer::class, 'customer'])->name('customer');
Route::post('/customer_store', [Customer::class, 'customer_store'])->name('customer_store');
Route::put('/customer_update', [Customer::class, 'customer_update'])->name('customer_update');
Route::delete('/customer_delete/{id}', [Customer::class, 'customer_delete'])->name('customer_delete');

//ORDER
Route::get('/order', [Order::class, 'order'])->name('order');
Route::post('/order_store', [Order::class, 'order_store'])->name('order_store');
Route::put('/order_update', [Order::class, 'order_update'])->name('order_update');
Route::delete('/order_delete/{id}', [Order::class, 'order_delete'])->name('order_delete');
