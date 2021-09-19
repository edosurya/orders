<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderApiController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'auth'], function () {
      Route::post('/v1/login', [AuthController::class,'login'])->name('login');
      Route::post('/v1/register', [AuthController::class, 'register']);
      Route::group(['middleware' => 'auth:api'], function() {
           Route::post('/v1/logout', [AuthController::class, 'logout']);
           Route::get('/v1/user', [AuthController::class, 'user']);
		   Route::get('/v1/', [OrderApiController::class, 'index'])->name('home');
		   Route::post('/v1/', [OrderApiController::class, 'store'])->name('add');
           Route::get('/v1/search', [OrderApiController::class, 'search'])->name('search');
    });
});


