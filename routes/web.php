<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
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
        return redirect()->route('admin.login');
    })->name('logout');
});


Route::middleware('auth')->group(function () {
    // Trang chủ  admin
    Route::get('admin', [MainController::class, 'index'])->name('admin');
    Route::get('admin/main', [MainController::class, 'index'])->name('admin.main');

    // Quản lý tài khoản
    Route::prefix('admin/account')->name('admin.account.')->group(function () {
        Route::get('',  [AccountController::class, 'listusser']);
        Route::get('listusser', [AccountController::class, 'listusser'])->name('listusser');
        Route::get('create',  [AccountController::class, 'create'])->name('create');
        Route::post('create',  [AccountController::class, 'store'])->name('store');
        Route::get('edit/{id}',  [AccountController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [AccountController::class, 'update'])->name('update');
        Route::get('delete/{id}',  [AccountController::class, 'delete'])->name('delete');
    });

    // Quản lý danh mục
    Route::prefix('admin/categorys')->name('admin.categorys.')->group(function () {
        Route::get('', [CategoryController::class, 'index']);
        Route::get('index', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('create', [CategoryController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });
});
