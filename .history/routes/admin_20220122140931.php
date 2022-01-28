<?php
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\PromotionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('/admin')->group(function() {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'handleLogin']);
    Route::get('/danh-sach-nv', [AdminController::class, 'index'])->name('admin.users');
    Route::get('/them-nhan-vien',[AdminController::class, 'create'])->name('admin.users.admin-create');
    Route::put('/them-nhan-vien',[AdminController::class, 'store']);
    Route::get('/sua-nhan-vien',[AdminController::class, 'edit'])->name('admin.users.admin-edit');
    Route::put('/sua-nhan-vien',[AdminController::class, 'update']);
    Route::delete('/xoa-nhan-vien',[AdminController::class, 'destroy'])->name('admin.users.admin-delete');
    
    // Products
    Route::prefix('/products')->group(function() {
        Route::get('/', [ProductsController::class, 'index'])->name('admin.products');
        Route::get('/them-san-pham', [ProductsController::class, 'create'])->name('admin.products.product-create');
        Route::post('/them-san-pham', [ProductsController::class, 'store']);
        Route::get('/sua-san-pham', [ProductsController::class, 'edit'])->name('admin.products.product-edit');
        Route::put('/sua-san-pham', [ProductsController::class, 'update']);
        Route::delete('/xoa-san-pham', [ProductsController::class, 'destroy'])->name('admin.products.product-delete');
        Route::put('/sua-trang-thai-sp', [ProductsController::class, 'status'])->name('admin.products.product-status');
        Route::get('/xoa-hinh-sp', [ProductsController::class, 'deleteImage'])->name('admin.products.image-delete');
    });

    // Categories
    Route::prefix('/categories')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('/them-danh-muc', [CategoryController::class, 'create'])->name('admin.categories.category-create');
        Route::post('/them-danh-muc', [CategoryController::class, 'store']);
        Route::get('/sua-danh-muc', [CategoryController::class, 'edit'])->name('admin.categories.category-edit');
        Route::put('/sua-danh-muc', [CategoryController::class, 'update']);
        Route::delete('/xoa-danh-muc', [CategoryController::class, 'destroy'])->name('admin.categories.category-delete');
    });

    // Brands
    Route::prefix('/brands')->group(function() {
        Route::get('/', [BrandsController::class, 'index'])->name('admin.brands');
        Route::get('/them-hang-sx', [BrandsController::class, 'create'])->name('admin.brands.brand-create');
        Route::post('/them-hang-sx', [BrandsController::class, 'store']);
        Route::get('/sua-hang-sx', [BrandsController::class, 'edit'])->name('admin.brands.brand-edit');
        Route::put('/sua-hang-sx', [BrandsController::class, 'update']);
        Route::delete('/xoa-hang-sx', [BrandsController::class, 'destroy'])->name('admin.brands.brand-delete');
    });

    // Promotions
    Route::prefix('/promotions')->group(function() {
        Route::get('/', [PromotionController::class, 'index'])->name('admin.promotions');
        Route::get('/them-khuyen-mai', [PromotionController::class, 'create'])->name('admin.promotions.promotion-create');
        Route::post('/them-khuyen-mai', [PromotionController::class, 'store']);
        Route::get('/sua-khuyen-mai', [PromotionController::class, 'edit'])->name('admin.promotions.promotion-edit');
        Route::put('/sua-khuyen-mai', [PromotionController::class, 'update']);
        Route::delete('/xoa-khuyen-mai', [PromotionController::class, 'destroy'])->name('admin.promotions.promotion-delete');
    });

    // Customers
    Route::prefix('/customers')->group(function() {
        Route::get('/', [CustomersController::class, 'index'])->name('admin.customers');
        Route::get('/them-khach-hang', [CustomersController::class, 'create'])->name('admin.customers.customer-create');
        Route::post('/them-khach-hang', [CustomersController::class, 'store']);
        Route::get('/sua-khach-hang', [CustomersController::class, 'edit'])->name('admin.customers.customer-edit');
        Route::put('/sua-khach-hang', [CustomersController::class, 'update']);
        Route::delete('/xoa-khach-hang', [CustomersController::class, 'destroy'])->name('admin.customers.customer-delete');
    });

});
