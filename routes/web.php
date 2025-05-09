<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AccountController as FrontendAccountController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\MainController as FrontendMainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OrderController;
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



//-----------------------Trang login-------------------
Route::get('/login', [FrontendAccountController::class, 'showLoginForm'])->name('show_login');
Route::post('/login', [FrontendAccountController::class, 'login'])->name('login'); // Đăng nhập
Route::get('/register', [FrontendAccountController::class, 'showRegisterForm'])->name('show_register');
Route::post('/register', [FrontendAccountController::class, 'register'])->name('register'); // Đăng ký
Route::post('/logout', [FrontendAccountController::class, 'logout'])->name('logout');
Route::get('/sua-ho-so', [FrontendAccountController::class, 'edit'])->name('profile.edit');
Route::put('/sua-ho-so', [FrontendAccountController::class, 'update'])->name('profile.update');


//-----------------------Trang về chúng tôi-------------------
Route::get('/ve-chung-toi', [FrontendMainController::class, 'about'])->name('about');

//-----------------------Trang lien he-------------------
Route::get('/lien-he', [ContactController::class, 'showForm'])->name('contact');
Route::post('/lien-he2', [ContactController::class, 'store'])->name('contact.store');
Route::post('/lien-he', [ContactController::class, 'storeAjax'])->name('contact.storeAjax');



//-----------------------Trang chủ-------------------
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tim-kiem', [HomeController::class, 'search'])->name('search');
Route::get('/san-pham-{gender}', [HomeController::class, 'gender'])->name('home.gender');






//------------------------Trang danh sách sản phẩm-------------------
Route::get('/san-pham', [ProductController::class, 'index'])->name('product');



//------------------------Trang chi tiết sản phẩm-------------------
Route::get('/san-pham/{id}', [ProductController::class, 'show'])->name('product.detail');
Route::get('/get-sizes-by-color', [ProductController::class, 'getSizesByColor'])->name('getSizesByColor');
Route::get('/get-image-by-color', [ProductController::class, 'getImagesByColor'])->name('getImageByColor');
Route::get('/get-price', [ProductController::class, 'getPrice']);



//------------------------Trang yeu thich sản phẩm-------------------
Route::post('/like-product', [LikeController::class, 'store'])->name('product.like');
Route::get('/user/likes/count', [LikeController::class, 'count'])->name('likes.count');
Route::get('yeu-thich', [HomeController::class, 'favorites2'])->name('favorites.index2');


//------------------------Trang giỏ hàng-------------------
Route::middleware('auth')->group(function () {
    // Giỏ hàng
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');
    Route::get('/gio-hang', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
});
 // Địa chỉ
 Route::get('/get-districts/{province_id}', [AddressController::class, 'getDistricts']);
 Route::get('/get-wards/{district_id}', [AddressController::class, 'getWards']);


//------------------------Trang đơn hàng-------------------
Route::middleware('auth')->group(function () {
    Route::post('/dat-hang', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/don-hang', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/don-hang/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/don-hang/yeu-cau-huy', [OrderController::class, 'cancelRequest'])->name('orders.cancelRequest');

});


Route::get('/tao-phieu-nhap', function () {
    return view('admin.product_receipts.add');
})->name('create_product_receipt');
Route::get('/tao-phieu-xuat', function () {
    return view('admin.product_receipts.add');
})->name('create_product_receipt');


require __DIR__ . '/admin.php';
