<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[PageController::class,'index'])->name('home');
Route::get('/shop',[ProductController::class,'index'])->name('shop');
Route::get('/shop/{id}',[ProductController::class,'show'])->name('product');
Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::get('/add-to-cart/{id}',[CartController::class,'addToCart'])->name('add-to-cart');
Route::put('/update/{id}',[CartController::class,'updateFromCart'])->name('update-to-cart');
Route::get('delete-from-cart/{id}',[CartController::class,'deleteFromCart'])->name('delete-from-cart');

