<?php

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

Route::get('/', [App\Http\Controllers\LproductController::class, 'produk']);

Route::get('/search', [ App\Http\Controllers\SearchController::class,'search']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('products/{id}', [ App\Http\Controllers\DetailController::class,'show']);

Route::post('order/{id}', [App\Http\Controllers\DetailController::class, 'order']);

Route::get('check-out', [App\Http\Controllers\DetailController::class, 'check_out']);

Route::delete('check-out/{id}', [App\Http\Controllers\DetailController::class, 'delete']);

Route::get('konfirmasi-check-out', [App\Http\Controllers\DetailController::class, 'konfirmasi']);

Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index']);

Route::post('profile', [App\Http\Controllers\ProfileController::class, 'update']);

Route::get('history',[App\Http\Controllers\HistoryController::class, 'index']);

Route::get('history/{id}',[App\Http\Controllers\HistoryController::class, 'detail']);

Auth::routes();