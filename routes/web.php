<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController as FrontendMainController;

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


Route::get('/lien-he', [FrontendMainController::class, 'contact'])->name('contact');
Route::get('/ve-chung-toi', [FrontendMainController::class, 'about'])->name('about');
Route::get('/san-pham', function () {
    return view('frontend.product');
})->name('product');
Route::get('/gio-hang', function () {
    return view('frontend.cart');
})->name('cart');



// HomeController
Route::get('/', [HomeController::class, 'index']);

require __DIR__ . '/admin.php';
