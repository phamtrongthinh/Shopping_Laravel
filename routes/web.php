<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AccountController as FrontendAccountController;
use App\Http\Controllers\MainController as FrontendMainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

use App\Models\Color;
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




Route::get('/login', [FrontendMainController::class, 'login'])->name('login');
Route::get('/signup', [FrontendMainController::class, 'signup'])->name('signup');
Route::get('/forget-password', [FrontendMainController::class, 'forgetpasswword'])->name('forgetpasswword');


Route::get('/ve-chung-toi', [FrontendMainController::class, 'about'])->name('about');
Route::get('/san-pham', function () {
    return view('frontend.product');
})->name('product');
Route::get('/gio-hang', function () {
    return view('frontend.cart');
})->name('cart');
Route::get('/chi-tiet', function () {
    return view('frontend.productdetail');
})->name('cart');

Route::get('/tao-phieu-nhap', function () {
    return view('admin.product_receipts.add');
})->name('create_product_receipt');
Route::get('/tao-phieu-xuat', function () {
    return view('admin.product_receipts.add');
})->name('create_product_receipt');


// HomeController
Route::get('/', [HomeController::class, 'index']) -> name('home');
Route::get('/san-pham/{id}', [HomeController::class, 'getProductDetails']);
require __DIR__ . '/admin.php';


// tai khoan 

Route::get('/login', [FrontendAccountController::class, 'showLoginForm'])->name('show_login');
Route::post('/login', [FrontendAccountController::class, 'login'])-> name('login'); // Đăng nhập
Route::get('/register', [FrontendAccountController::class, 'showRegisterForm'])->name('show_register');
Route::post('/register', [FrontendAccountController::class, 'register'])-> name('register'); // Đăng ký
Route::post('/logout', [FrontendAccountController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/sua-ho-so', [FrontendAccountController::class, 'edit'])->name('profile.edit');
    Route::put('/sua-ho-so', [FrontendAccountController::class, 'update'])->name('profile.update');
});


//-----------------------Lien he-------------------
Route::get('/lien-he', [ContactController::class, 'showForm'])->name('contact');
Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');
Route::post('/lien-he', [ContactController::class, 'storeAjax'])->name('contact.storeAjax');



