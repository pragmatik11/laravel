<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Contact_controller;
use App\Http\Controllers\Homepage_controller;
use App\Http\Controllers\Shop_controller;

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



Route::get('/', [Homepage_controller::class, 'index']);
Route::get('/contact', [Contact_controller::class, 'index']);
Route::post('/contact', [Contact_controller::class, 'storeForm'])->name('contact.store');
Route::get('/shop', [Shop_controller::class, 'index'])->name('shop.store');;
//Route::post('store_customer', 'Shop_controller@addToCart');
Route::post('store_product', [Shop_controller::class, 'addToCart']);
Route::post('remove_product', [Shop_controller::class, 'remove']);
Route::patch('update-cart', [Shop_controller::class, 'update']);
//Route::delete('remove-from-cart', [Shop_controller::class, 'remove']);

