<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TipController;
use Illuminate\Support\Facades\Route;

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

Route::get('/brands', [BrandController::class, 'index']);
Route::get('/tips', [TipController::class, 'index']);
Route::post('/users', [Controller::class, 'store']);
