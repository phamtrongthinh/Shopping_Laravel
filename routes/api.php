<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// routes/api.php
use App\Http\Controllers\Api\AddressController;

Route::get('/provinces', [AddressController::class, 'getProvinces']);
Route::get('/districts/{provinceId}', [AddressController::class, 'getDistricts']);
Route::get('/wards/{districtId}', [AddressController::class, 'getWards']);
