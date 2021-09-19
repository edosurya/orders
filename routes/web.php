<?php

use App\Http\Controllers\OrderController;
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

Route::get('/', [OrderController::class, 'index'])->name('home');
Route::post('/', [OrderController::class, 'store'])->name('add');
Route::get('/search', [OrderController::class, 'search'])->name('search');
