<?php

use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MenuController;
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

Route::get('/', [LoginController::class, 'index']);

Route::prefix('admin')->name('admin.')->group(function () {
    // Trang login    
    Route::get('users/login', [LoginController::class, 'index'])->name('login');
    Route::post('users/login/store', [LoginController::class, 'store'])->name('login.store');
    Route::get('users/logout', function () {
        Auth::logout();
        return 'Bạn đã đăng xuất!';
    })->name('logout');
});


Route::middleware('auth')->group(function () {
    // Trang chủ  admin
    Route::get('admin', [MainController::class, 'index'])->name('admin');
    Route::get('admin/main', [MainController::class, 'index'])->name('admin.main');

    // Quản lý menu
    Route::prefix('admin/menu')->name('admin.menu.')->group(function () {
        Route::get('', [MenuController::class, 'index']);
        Route::get('index', [MenuController::class, 'index'])->name('index');
        Route::get('create', [MenuController::class, 'create'])->name('create');
        Route::post('create', [MenuController::class, 'store'])->name('store');
        Route::get('edit/{id}', [MenuController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [MenuController::class, 'update'])->name('update');
        Route::get('delete/{id}', [MenuController::class, 'delete'])->name('delete');
    });
});
