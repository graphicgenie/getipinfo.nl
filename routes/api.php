<?php

use App\Http\Controllers\GeoIPController;
use App\Http\Controllers\IPController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('throttle:ips')->get('ip', IPController::class);

Route::middleware('auth:sanctum')->get('geoip/{ip?}', GeoIPController::class);
