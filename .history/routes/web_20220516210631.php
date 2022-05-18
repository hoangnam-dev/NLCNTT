<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\CheckOutController;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\PolicyController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\Client\UserController;
use Illuminate\Support\Facades\Route;

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
// Home
Route::get('/', [HomeController::class, 'index'])->name('client.home');

// Product
Route::prefix('/product')->group(function () {
    Route::get('/{masp}', [ProductController::class, 'index'])->name('client.product-detail');
    Route::post('/comment', [ProductController::class, 'comment'])->middleware('checkuserlogin')->name('client.product-detail.comment');
});

// News
Route::prefix('/news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('client.news');
    Route::get('/detail/{news}', [NewsController::class, 'detail'])->name('client.news-detail');
});

// Category
Route::prefix('/categories')->group(function () {
    Route::get('/',[CategoryController::class, 'index'])->name('client.category');
    Route::get('/{danh_muc}',[CategoryController::class, 'listProductsByCategory'])->name('client.productsbycategory');
    Route::post('/loc-theo-gia',[CategoryController::class, 'sortPrice'])->name('client.category.sort-price');
    
});

// Cart
Route::middleware('checkuserlogin')->prefix('/cart')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('client.cart');
    Route::post('/add-cart', [CartController::class, 'addToCart'])->name('client.cart.addToCart');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('client.cart.updateCart');
    Route::delete('/delete-cart', [CartController::class, 'destroy'])->name('client.cart.delCart');
    Route::post('/delete-cart-item', [CartController::class, 'deleteItem'])->name('client.cart.delItem');
});

// Checkout
Route::middleware('checkuserlogin')->prefix('/check-out')->group(function() {
    Route::get('/', [CheckOutController::class, 'checkOut'])->name('client.checkout');
    Route::post('/', [CheckOutController::class, 'order']);
    // Route::post('/pay-momo', [CheckOutController::class, 'momoPayment'])->name('client.checkout.momo-payment');
    // Route::post('/momo-pay', [CheckOutController::class, 'payMoMo'])->name('client.checkout.momo');
});

// User
Route::prefix('/user')->group(function() {
    // login
    Route::get('/login', [UserController::class, 'loginForm'])->name('client.user.login');
    Route::post('/login', [UserController::class, 'handleLogin']);
    // account verification
    Route::get('/confirm-email', [UserController::class, 'confirmEmailReset'])->name('client.user.confirm-email');
    Route::post('/confirm-email', [UserController::class, 'handleEmailReset']);
    Route::get('/confirm-verification', [UserController::class, 'verificationCode'])->name('client.user.confirm-verification');
    Route::post('/confirm-verification', [UserController::class, 'handelVerificationCode']);
    // password reset
    Route::get('/reset-password', [UserController::class, 'resetPasswordFrom'])->name('client.user.reset-password-form');
    Route::post('/reset-password', [UserController::class, 'handleResetPassword']);
    Route::post('/resend-verify-code', [UserController::class, 'resendVerifyCode'])->name('client.user.resend-verify-code');
    // register
    Route::get('/register', [UserController::class, 'registerForm'])->name('client.user.register');
    Route::post('/register', [UserController::class, 'handleRegister']);
    Route::post('/confirm-account', [UserController::class, 'confirmAccount'])->name('client.user.confirm-account');
    Route::middleware('checkuserlogin')->group(function() {
        Route::get('/logout', [UserController::class, 'logout'])->name('client.user.logout');
        // customer info
        Route::get('/profile', [UserController::class, 'profile'])->name('client.user.profile');
        Route::post('/profile', [UserController::class, 'update']);
        Route::post('/add-address', [UserController::class, 'addAddress'])->name('client.user.add-address');
        Route::get('/get-location', [UserController::class, 'getLocation'])->name('client.getlocation');
        // order management
        Route::get('/order', [OrderController::class, 'index'])->name('client.user.order');
        Route::get('/show-orderdetail/{id}', [OrderController::class, 'showOrderDetail'])->name('client.user.order-detail');
        Route::get('/order-status', [OrderController::class, 'orderByStatus'])->name('client.user.order-status');
        Route::get('/order-destroy', [OrderController::class, 'destroy'])->name('client.user.order-destroy');
    });
});

// Search
Route::get('/search', [SearchController::class, 'index'])->name('client.search');

// Policy
Route::get('/policy', [PolicyController::class, 'index'])->name('client.policy');


// Ckeditor config
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
->name('ckfinder_browser');