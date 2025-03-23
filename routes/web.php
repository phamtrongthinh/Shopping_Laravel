<?php

use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Auth;

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


Route::prefix('admin')->name('admin.')->group(function () {
    // Trang login
    Route::get('users/login', [LoginController::class, 'index'])->name('login');
    Route::post('users/login/store', [LoginController::class, 'store'])->name('login.store');
    Route::get('users/logout', function () {
        Auth::logout();
        return 'Bạn đã đăng xuất!';
    })->name('logout');
});

// Trang chủ  
Route::middleware('auth')->group(function () {
    Route::get('admin', [MainController::class, 'index'])->name('admin');
    Route::get('admin/main', [MainController::class, 'index'])->name('admin.main');
});
