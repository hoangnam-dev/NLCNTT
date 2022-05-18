<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\CheckOutController;
use App\Http\Controllers\Client\LocationController;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\OrderController;
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

Route::get('/test', function() {
    return view('client.test');
});
Route::get('/', [HomeController::class, 'index'])->name('client.home');

Route::prefix('/product')->group(function () {
    Route::get('/{masp}', [ProductController::class, 'index'])->name('client.product-detail');
    Route::post('/comment', [ProductController::class, 'comment'])->middleware('checkuserlogin')->name('client.product-detail.comment');
});

Route::prefix('/news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('client.news');
    Route::get('/detail/{news}', [NewsController::class, 'detail'])->name('client.news-detail');
});

Route::prefix('/categories')->group(function () {
    Route::get('/',[CategoryController::class, 'index'])->name('client.category');
    Route::get('/{danh_muc}',[CategoryController::class, 'listProductsByCategory'])->name('client.productsbycategory');
    Route::get('/loc-theo-gia',[CategoryController::class, 'sortPrice'])->name('client.category.sort-price');
    
});


Route::middleware('checkuserlogin')->prefix('/cart')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('client.cart');
    Route::post('/add-cart', [CartController::class, 'addToCart'])->name('client.cart.addToCart');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('client.cart.updateCart');
    Route::delete('/delete-cart', [CartController::class, 'destroy'])->name('client.cart.delCart');
    // Route::get('/delete-cart-item', [CartController::class, 'deleteItem'])->name('client.cart.delItem');
    Route::post('/delete-cart-item', [CartController::class, 'deleteItem'])->name('client.cart.delItem');
});

Route::middleware('checkuserlogin')->prefix('/check-out')->group(function() {
    Route::get('/', [CheckOutController::class, 'checkOut'])->name('client.checkout');
    Route::post('/', [CheckOutController::class, 'order']);
    // Route::post('/order', [CheckOutController::class, 'order'])->name('client.checkout.default-pay');
    // Route::get('/pay-momo/{orderID}', [CheckOutController::class, 'momoPayment'])->name('client.checkout.momo-payment');
    Route::post('/pay-momo', [CheckOutController::class, 'momoPayment'])->name('client.checkout.momo-payment');
    Route::post('/momo-pay', [CheckOutController::class, 'payMoMo'])->name('client.checkout.momo');
});

Route::prefix('/user')->group(function() {
    Route::get('/login', [UserController::class, 'loginForm'])->name('client.user.login');
    Route::post('/login', [UserController::class, 'handleLogin']);
    Route::get('/register', [UserController::class, 'registerForm'])->name('client.user.register');
    Route::post('/register', [UserController::class, 'handleRegister']);
    Route::middleware('checkuserlogin')->group(function() {
        Route::get('/logout', [UserController::class, 'logout'])->name('client.user.logout');
        Route::get('/profile', [UserController::class, 'profile'])->name('client.user.profile');
        Route::post('/profile', [UserController::class, 'update']);
        Route::post('/add-address', [UserController::class, 'addAddress'])->name('client.user.add-address');
        Route::get('/get-location', [UserController::class, 'getLocation'])->name('client.getlocation');
        Route::get('/get-location', [UserController::class, 'getLocation'])->name('client.getlocation');
        Route::get('/order', [OrderController::class, 'index'])->name('client.user.order');
        Route::get('/show-orderdetail/{id}', [OrderController::class, 'showOrderDetail'])->name('client.user.order-detail');
        Route::get('/order-status', [OrderController::class, 'orderByStatus'])->name('client.user.order-status');
        Route::get('/order-destroy', [OrderController::class, 'destroy'])->name('client.user.order-destroy');
    });
});

Route::get('/search', [SearchController::class, 'index'])->name('client.search');

// Route::prefix('/admin')->group(function() {
//     Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
//     Route::post('/login', [LoginController::class, 'handleLogin']);
//     Route::get('/danh-sach-nv', [AdminController::class, 'index'])->name('admin.users');
//     Route::get('/them-nhan-vien',[AdminController::class, 'create'])->name('admin.users.admin-create');
//     Route::put('/them-nhan-vien',[AdminController::class, 'store']);
//     Route::get('/sua-nhan-vien',[AdminController::class, 'edit'])->name('admin.users.admin-edit');
//     Route::put('/sua-nhan-vien',[AdminController::class, 'update']);
//     Route::delete('/xoa-nhan-vien',[AdminController::class, 'destroy'])->name('admin.users.admin-delete');
    
//     // Products
//     Route::prefix('/products')->group(function() {
//         Route::get('/', [ProductsController::class, 'index'])->name('admin.products');
//         Route::get('/them-san-pham', [ProductsController::class, 'create'])->name('admin.products.product-create');
//         Route::post('/them-san-pham', [ProductsController::class, 'store']);
//         Route::get('/sua-san-pham', [ProductsController::class, 'edit'])->name('admin.products.product-edit');
//         Route::put('/sua-san-pham', [ProductsController::class, 'update']);
//         Route::delete('/xoa-san-pham', [ProductsController::class, 'destroy'])->name('admin.products.product-delete');
//         Route::put('/sua-trang-thai-sp', [ProductsController::class, 'status'])->name('admin.products.product-status');
//         Route::get('/xoa-hinh-sp', [ProductsController::class, 'deleteImage'])->name('admin.products.image-delete');
//     });

//     // Categories
//     Route::prefix('/categories')->group(function() {
//         Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
//         Route::get('/them-danh-muc', [CategoryController::class, 'create'])->name('admin.categories.category-create');
//         Route::post('/them-danh-muc', [CategoryController::class, 'store']);
//         Route::get('/sua-danh-muc', [CategoryController::class, 'edit'])->name('admin.categories.category-edit');
//         Route::put('/sua-danh-muc', [CategoryController::class, 'update']);
//         Route::delete('/xoa-danh-muc', [CategoryController::class, 'destroy'])->name('admin.categories.category-delete');
//     });

//     // Brands
//     Route::prefix('/brands')->group(function() {
//         Route::get('/', [BrandsController::class, 'index'])->name('admin.brands');
//         Route::get('/them-hang-sx', [BrandsController::class, 'create'])->name('admin.brands.brand-create');
//         Route::post('/them-hang-sx', [BrandsController::class, 'store']);
//         Route::get('/sua-hang-sx', [BrandsController::class, 'edit'])->name('admin.brands.brand-edit');
//         Route::put('/sua-hang-sx', [BrandsController::class, 'update']);
//         Route::delete('/xoa-hang-sx', [BrandsController::class, 'destroy'])->name('admin.brands.brand-delete');
//     });

//     // Promotions
//     Route::prefix('/promotions')->group(function() {
//         Route::get('/', [PromotionController::class, 'index'])->name('admin.promotions');
//         Route::get('/them-khuyen-mai', [PromotionController::class, 'create'])->name('admin.promotions.promotion-create');
//         Route::post('/them-khuyen-mai', [PromotionController::class, 'store']);
//         Route::get('/sua-khuyen-mai', [PromotionController::class, 'edit'])->name('admin.promotions.promotion-edit');
//         Route::put('/sua-khuyen-mai', [PromotionController::class, 'update']);
//         Route::delete('/xoa-khuyen-mai', [PromotionController::class, 'destroy'])->name('admin.promotions.promotion-delete');
//     });

//     // Customers
//     Route::prefix('/customers')->group(function() {
//         Route::get('/', [CustomersController::class, 'index'])->name('admin.customers');
//         Route::get('/them-khach-hang', [CustomersController::class, 'create'])->name('admin.customers.customer-create');
//         Route::post('/them-khach-hang', [CustomersController::class, 'store']);
//         Route::get('/sua-khach-hang', [CustomersController::class, 'edit'])->name('admin.customers.customer-edit');
//         Route::put('/sua-khach-hang', [CustomersController::class, 'update']);
//         Route::delete('/xoa-khach-hang', [CustomersController::class, 'destroy'])->name('admin.customers.customer-delete');
//     });

// });


Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
->name('ckfinder_browser');