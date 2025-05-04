<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Models\Contact;
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


Route::get('/admin', [LoginController::class, 'index']);


Route::prefix('admin')->name('admin.')->group(function () {
    // Trang login    
    Route::get('users/login', [LoginController::class, 'index'])->name('login');
    Route::post('users/login/store', [LoginController::class, 'store'])->name('login.store');
    Route::get('users/logout', function () {
        Auth::logout();
        return redirect()->route('admin.login');
    })->name('logout');
});

Route::middleware(['auth', 'role'])->group(function () {
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
        Route::put('update/{id}', [AccountController::class, 'update'])->name('update');
        Route::delete('delete/{id}',  [AccountController::class, 'delete'])->name('delete');
    });

    // Quản lý danh mục
    Route::prefix('admin/categorys')->name('admin.categorys.')->group(function () {
        Route::get('', [CategoryController::class, 'index']);
        Route::get('index', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('create', [CategoryController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });

    // Quản lý sản phẩm
    Route::prefix('admin/products')->name('admin.products.')->group(function () {
        Route::get('', [ProductController::class, 'index']);
        Route::get('index', [ProductController::class, 'index'])->name('index');
        Route::get('add', [ProductController::class, 'add'])->name('add');
        Route::post('create', [ProductController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('delete');
    });

    // Quản lý màu sắc sản phẩm
    Route::prefix('admin/products/colors')->name('admin.products.colors.')->group(function () {
        Route::get('', [ColorController::class, 'index']);
        Route::get('index', [ColorController::class, 'index'])->name('index');
        Route::get('add', [ColorController::class, 'add'])->name('add');
        Route::post('create', [ColorController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ColorController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [ColorController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [ColorController::class, 'delete'])->name('delete');
    });

    // Quản lý chi tiết sản phẩm   

    Route::prefix('admin/products/{product}/details')->group(function () {
        Route::get('/', [ProductDetailController::class, 'index'])->name('admin.product_details.index');
        Route::get('/create', [ProductDetailController::class, 'create'])->name('admin.product_details.create');
        Route::post('/', [ProductDetailController::class, 'store'])->name('admin.product_details.store');
        Route::get('/{detail}/edit', [ProductDetailController::class, 'edit'])->name('admin.product_details.edit');
        Route::put('/{detail}', [ProductDetailController::class, 'update'])->name('admin.product_details.update');
        Route::delete('/{detail}', [ProductDetailController::class, 'destroy'])->name('admin.product_details.destroy');
    });

    // Quản lý liên hệ

    Route::prefix('admin/contacts')->group(function () {
        Route::get('/index', [ContactController::class, 'index'])->name('admin.contacts.index');
        Route::post('update-status/{id}', [ContactController::class, 'updateStatus']);
        Route::delete('/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.delete');
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        // Route danh sách đơn hàng
        Route::get('/orders', [OrderController::class, 'Admin_index'])->name('orders.index');
        // Route xem chi tiết đơn hàng
        Route::get('/orders/{id}', [OrderController::class, 'Admin_show'])->name('orders.show');
        Route::get('/orders/{id}/edit', [OrderController::class, 'Admin_edit'])->name('orders.edit');
        // Route cập nhật trạng thái đơn hàng
        Route::put('/orders/{id}/status', [OrderController::class, 'Admin_updateStatus'])->name('orders.updateStatus');
        Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

    });

    Route::prefix('admin')->group(function () {
        Route::get('/statistics/revenue', [StatisticsController::class, 'revenue'])->name('admin.statistics.revenue');
        Route::get('/statistics/products', [StatisticsController::class, 'topProducts'])->name('admin.statistics.products');
    });
    
});
