<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[App\Http\Controllers\AuthController::class,'index']);
Route::post('/login',[App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::get('/dashboard',[App\Http\Controllers\DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/product/{id}',[App\Http\Controllers\DashboardController::class,'detail'])->name('detail');
Route::get('/cart',[App\Http\Controllers\DashboardController::class,'cart'])->name('cart');
Route::post('/cart',[App\Http\Controllers\DashboardController::class,'AddToCart'])->name('AddToCart');
Route::get('/cart/{id}',[App\Http\Controllers\DashboardController::class,'detail'])->name('detail');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
