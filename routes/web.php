<?php

use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
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

// Login routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('users/login', [LoginController::class, 'index']);
    Route::post('users/login/store', [LoginController::class, 'store'])->name('login.store');
    Route::get('main', [MainController::class, 'index'])->name('main');
});


// Main route  
Route::get('main', [MainController::class, 'index'])->name('main');
