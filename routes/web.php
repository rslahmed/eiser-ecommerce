<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Admin auth
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'IsAdmin']], function(){
//home
    Route::get('/dashboard',  [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.home');
//    category
    Route::get('/category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category');
    Route::get('/category/destroy/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::post('/category/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
    Route::post('/category/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');

//Brand
    Route::get('/brand', [\App\Http\Controllers\Admin\BrandController::class, 'index'])->name('admin.brand');
    Route::post('/brand/store', [\App\Http\Controllers\Admin\BrandController::class, 'store'])->name('admin.brand.store');
    Route::post('/brand/update/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'update'])->name('admin.brand.update');
    Route::get('/brand/destroy/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'destroy'])->name('admin.brand.destroy');

//coupon
    Route::get('/coupon/', [\App\Http\Controllers\Admin\CouponController::class, 'index'])->name('admin.coupon');
    Route::post('/coupon/store/', [\App\Http\Controllers\Admin\CouponController::class, 'store'])->name('admin.coupon.store');
    Route::post('/coupon/update/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'update'])->name('admin.coupon.update');
    Route::get('/coupon/destroy/{id}', [\App\Http\Controllers\Admin\CouponController::class, 'destroy'])->name('admin.coupon.destroy');

//Subscriber
    Route::get('/subscriber/', [\App\Http\Controllers\Admin\SubscriberController::class, 'index'])->name('admin.subscriber');
    Route::get('/subscriber/destroy/{id}', [\App\Http\Controllers\Admin\SubscriberController::class, 'destroy'])->name('admin.subscriber.destroy');

//Product
    Route::get('/product', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product');
    Route::get('/product/add', [\App\Http\Controllers\Admin\ProductController::class, 'add'])->name('admin.product.add');
    Route::post('/product/store', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/show/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/product/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/update/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/product/destroy/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.product.destroy');

//    API
    Route::get('/product/remove_product_image/', [\App\Http\Controllers\Admin\ProductController::class, 'removeImage']);
});



//auth user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user/view',[\App\Http\Controllers\UserControlelr::class, 'index'])->name('user.view');
    Route::get('/user/change-password',[\App\Http\Controllers\UserControlelr::class, 'editPassword'])->name('user.changePassword');
    Route::post('/user/change-password',[\App\Http\Controllers\UserControlelr::class, 'editPassword'])->name('user.changePassword');
});


//normal user

