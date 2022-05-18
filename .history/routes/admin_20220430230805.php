<?php

use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SendMailController;
use App\Http\Controllers\Admin\SlidersController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'handleLogin']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::middleware('checkadminlogin')->group(function () {
        // Route::group(function () {
        // Dashboard
        Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');

        // Order
        Route::middleware('order_permission')->prefix('/orders')->group(function () {
            Route::get('/', [OrdersController::class, 'index'])->name('admin.orders');
            Route::get('/dh-theo-tranh-thai/{status}', [OrdersController::class, 'orderByStatus'])->name('admin.orders.status');
            Route::get('/dh-trong-thang', [OrdersController::class, 'orderInMonth'])->name('admin.orders.in-month');
            Route::get('/dh-hoan-thanh', [OrdersController::class, 'orderCompleteInMonth'])->name('admin.orders.complete-in-month');
            Route::get('/chi-tiet-dh/{madh}', [OrdersController::class, 'edit'])->name('admin.orders.detail');
            Route::put('/xu-ly-dh', [OrdersController::class, 'update'])->name('admin.orders.order-update');
            Route::delete('/huy-dh', [OrdersController::class, 'destroy'])->name('admin.orders.order-delete');
            
            // Send mail
            // Route::get('/send-mail', [SendMailController::class, 'sendMailCase2'])->name('admin.mail.send');
            Route::get('/send-mail', [SendMailController::class, 'confirmOrderMail'])->name('admin.mail.send');
        });

        // Products
        Route::middleware('product_permission')->prefix('/products')->group(function () {
            Route::get('/', [ProductsController::class, 'index'])->name('admin.products')->middleware('product_permission');
            Route::get('/them-san-pham', [ProductsController::class, 'create'])->name('admin.products.product-create');
            Route::post('/them-san-pham', [ProductsController::class, 'store']);
            Route::get('/sua-san-pham', [ProductsController::class, 'edit'])->name('admin.products.product-edit');
            Route::put('/sua-san-pham', [ProductsController::class, 'update']);
            Route::post('/sua-trang-thai-sp', [ProductsController::class, 'status'])->name('admin.products.product-status');
            Route::get('/xoa-hinh-sp', [ProductsController::class, 'deleteImage'])->name('admin.products.image-delete');

            // Comments
            Route::get('/danh-gia', [CommentsController::class, 'listComments'])->name('admin.comments');
            Route::get('/danh-gia-sp', [CommentsController::class, 'commentDetail'])->name('admin.comments.comment-detail');
            Route::post('/phan-hoi', [CommentsController::class, 'replyComment'])->name('admin.comments.reply-comment');
            Route::post('/sua-phan-hoi', [CommentsController::class, 'editReply'])->name('admin.comments.edit-reply');
            Route::post('xoa-phan-hoi', [CommentsController::class, 'destroyReply'])->name('admin.comments.destroy-reply');
            
            // Attributes
            Route::get('/danh-sach-thuoc-tinh', [AttributesController::class, 'index'])->name('admin.attributes');
            Route::get('/them-thuoc-tinh', [AttributesController::class, 'create'])->name('admin.attributes.attribute-create');
            Route::post('/them-thuoc-tinh', [AttributesController::class, 'store']);
            Route::get('/sua-thuoc-tinh', [AttributesController::class, 'edit'])->name('admin.attributes.attribute-edit');
            Route::put('/sua-thuoc-tinh', [AttributesController::class, 'update']);
            Route::delete('/xoa-thuoc-tinh', [AttributesController::class, 'destroy'])->name('admin.attributes.attribute-delete');
            Route::post('/them-gia-tri-tt', [AttributesController::class, 'storeDetail'])->name('admin.attributes.attribute-storeDetail');
            Route::get('/xoa-gia-tri-tt', [AttributesController::class, 'deleteDetail'])->name('admin.attributes.attribute-destroyDetail');
        });

        Route::middleware('admin_permission')->group(function () {
            // Categories
            Route::prefix('/categories')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
                Route::get('/them-danh-muc', [CategoryController::class, 'create'])->name('admin.categories.category-create');
                Route::post('/them-danh-muc', [CategoryController::class, 'store']);
                Route::get('/sua-danh-muc', [CategoryController::class, 'edit'])->name('admin.categories.category-edit');
                Route::put('/sua-danh-muc', [CategoryController::class, 'update']);
                Route::post('/sua-trang-thai-dm', [CategoryController::class, 'status'])->name('admin.categories.category-status');
                // Route::delete('/xoa-danh-muc', [CategoryController::class, 'destroy'])->name('admin.categories.category-delete');
            });

            // Brands
            Route::prefix('/brands')->group(function () {
                Route::get('/', [BrandsController::class, 'index'])->name('admin.brands');
                Route::get('/them-hang-sx', [BrandsController::class, 'create'])->name('admin.brands.brand-create');
                Route::post('/them-hang-sx', [BrandsController::class, 'store']);
                Route::get('/sua-hang-sx', [BrandsController::class, 'edit'])->name('admin.brands.brand-edit');
                Route::put('/sua-hang-sx', [BrandsController::class, 'update']);
                Route::delete('/xoa-hang-sx', [BrandsController::class, 'destroy'])->name('admin.brands.brand-delete');
            });

            // Promotions
            Route::prefix('/promotions')->group(function () {
                Route::get('/', [PromotionController::class, 'index'])->name('admin.promotions');
                Route::get('/them-khuyen-mai', [PromotionController::class, 'create'])->name('admin.promotions.promotion-create');
                Route::post('/them-khuyen-mai', [PromotionController::class, 'store']);
                Route::get('/sua-khuyen-mai', [PromotionController::class, 'edit'])->name('admin.promotions.promotion-edit');
                Route::put('/sua-khuyen-mai', [PromotionController::class, 'update']);
                Route::delete('/xoa-khuyen-mai', [PromotionController::class, 'destroy'])->name('admin.promotions.promotion-delete');
            });

            // Customers
            Route::prefix('/customers')->group(function () {
                Route::get('/', [CustomersController::class, 'index'])->name('admin.customers');
                Route::get('/them-khach-hang', [CustomersController::class, 'create'])->name('admin.customers.customer-create');
                Route::post('/them-khach-hang', [CustomersController::class, 'store']);
                Route::get('/sua-khach-hang', [CustomersController::class, 'edit'])->name('admin.customers.customer-edit');
                Route::put('/sua-khach-hang', [CustomersController::class, 'update']);
                Route::delete('/xoa-khach-hang', [CustomersController::class, 'destroy'])->name('admin.customers.customer-delete');
            });

            // Staffs
            Route::get('/danh-sach-nv', [AdminController::class, 'index'])->name('admin.users');
            Route::get('/them-nhan-vien', [AdminController::class, 'create'])->name('admin.users.admin-create');
            Route::post('/them-nhan-vien', [AdminController::class, 'store']);
            Route::get('/sua-nhan-vien', [AdminController::class, 'edit'])->name('admin.users.admin-edit');
            Route::put('/sua-nhan-vien', [AdminController::class, 'update']);
            Route::post('/cap-quyen', [AdminController::class, 'setRole'])->name('admin.users.admin-set-role');
            Route::delete('/xoa-nhan-vien', [AdminController::class, 'destroy'])->name('admin.users.admin-delete');

            // Roles
            Route::prefix('/roles')->group(function () {
                Route::get('/', [RolesController::class, 'index'])->name('admin.roles');
                Route::get('/them-quyen', [RolesController::class, 'create'])->name('admin.roles.role-create');
                Route::post('/them-quyen', [RolesController::class, 'store']);
                Route::get('/sua-quyen', [RolesController::class, 'edit'])->name('admin.roles.role-edit');
                Route::put('/sua-quyen', [RolesController::class, 'update']);
                Route::delete('/xoa-quyen', [RolesController::class, 'destroy'])->name('admin.roles.role-delete');
            });
        });

        // News
        Route::prefix('/news')->group(function () {
            Route::get('/', [NewsController::class, 'index'])->name('admin.news');
            Route::get('/them-tin-tuc', [NewsController::class, 'create'])->name('admin.news.news-create');
            Route::post('/them-tin-tuc', [NewsController::class, 'store']);
            Route::get('/sua-tin-tuc', [NewsController::class, 'edit'])->name('admin.news.news-edit');
            Route::post('/sua-tin-tuc', [NewsController::class, 'update']);
            Route::delete('/xoa-tin-tuc', [NewsController::class, 'destroy'])->name('admin.news.news-delete');
        });

        // Slider
        Route::get('/danh-sach-slider', [SlidersController::class, 'index'])->name('admin.sliders');
        Route::get('/them-slider', [SlidersController::class, 'create'])->name('admin.sliders.slider-create');
        Route::post('/them-slider', [SlidersController::class, 'store']);
        Route::get('/sua-slider', [SlidersController::class, 'edit'])->name('admin.sliders.slider-edit');
        Route::put('/sua-slider', [SlidersController::class, 'update']);
        Route::delete('/xoa-slider', [SlidersController::class, 'destroy'])->name('admin.sliders.slider-delete');

    });
});

// CKEditor & CKFinder
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

Route::get('/admin/test', function () {
    // return view('mail.confirm-mail');
    return view('admin.test');
});
