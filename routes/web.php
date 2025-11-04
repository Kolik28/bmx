<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TollController;
use App\Http\Controllers\AboutController;

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// USER VIEW

Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'store'])->name('store');

Route::get('/signout', [LoginController::class, 'signout']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/toll', [TollController::class, 'index'])->name('toll');
Route::get('/toll_dp', [TollController::class, 'indexdp'])->name('toll_dp');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/detail/{id}', [ProductController::class, 'show'])->name('product.detail');

Route::get('/about', [AboutController::class, 'index'])->name('about');