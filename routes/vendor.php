<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\VendorHomeController;
use App\Http\Controllers\Vendor\VendorProductController;

Route::prefix('vendor')->group(function () {
    Route::get('/login', [VendorHomeController::class, 'vendorsignin'])->name('vendor-login');
    Route::post('/login', [VendorHomeController::class, 'vendorlogin'])->name('login-post');
    Route::get('/logout', [VendorHomeController::class, 'vendorlogout'])->name('vendorlogout');


    Route::group(['middleware' => 'auth:vendor'], function () {
        Route::get('vendor/dashboard', [VendorHomeController::class, 'vendordashboard'])->name('vendordashboard');
        Route::get('/vendorprofile', [VendorHomeController::class, 'vendorprofile'])->name('dashboard.vendorprofile');
        Route::post('/vendorprofile', [VendorHomeController::class, 'vendorprofile_post']);
        Route::post('/vendor-update-password', [VendorHomeController::class, 'vendorchangepassword'])->name('vendor-update-password');


         // Product //
         Route::get('vendor/product/index', [VendorProductController::class, 'vendorindex'])->name('vendor-product-index');
         Route::get('vendor/product/create', [VendorProductController::class, 'vendorcreate'])->name('vendor-product-create');
         Route::post('vendor/product/store', [VendorProductController::class, 'vendorstore'])->name('vendor-product-store');
         Route::get('vendor/product/edit/{id}', [VendorProductController::class, 'vendoredit'])->name('vendor-product-edit');
         Route::get('vendor/product/destroy/{id}', [VendorProductController::class, 'vendordestroy'])->name('vendor-product-destroy');
         Route::post('vendor/product/update/{id}', [VendorProductController::class, 'vendorupdate'])->name('vendor-product-update');
         Route::get('/get-products-by-category/{category_id}', [VendorProductController::class, 'getProductsByCategory'])->name('get-products-by-category');


    });
});
