<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
 
Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function () {
 
	Route::get('/', [OrderController::class, 'index'])->name('home');
	Route::post('/', [OrderController::class, 'store'])->name('add')->middleware('administrator');
	Route::put('/edit/{id}', [OrderController::class, 'update'])->name('edit')->middleware('administrator');
	Route::get('/search', [OrderController::class, 'search'])->name('search');
	Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit.view')->middleware('administrator');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
 
});


