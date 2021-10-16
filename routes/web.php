<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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
Route::put('/edit/{id}', [OrderController::class, 'update'])->name('edit');
Route::get('/search', [OrderController::class, 'search'])->name('search');


Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit.view');
