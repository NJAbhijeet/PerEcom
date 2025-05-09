<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\VendorController;

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminHomeController::class, 'signin'])->name('admin-login');
    Route::post('/login', [AdminHomeController::class, 'login'])->name('login-post');
    Route::get('/logout', [AdminHomeController::class, 'logout'])->name('logout');


    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/dashboard', [AdminHomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/adminprofile', [AdminHomeController::class, 'adminprofile'])->name('dashboard.adminprofile');
        Route::post('/adminprofile', [AdminHomeController::class, 'adminprofile_post']);
        Route::post('/admin-update-password', [AdminHomeController::class, 'adminchangepassword'])->name('admin-update-password');


        // Category //
        Route::get('category/index', [CategoryController::class, 'index'])->name('category-index');
        Route::get('category/create', [CategoryController::class, 'create'])->name('category-create');
        Route::post('category/store', [CategoryController::class, 'store'])->name('category-store');
        Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
        Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category-destroy');
        Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category-update');


          // Units //
          Route::get('unit/index', [UnitController::class, 'index'])->name('unit-index');
          Route::get('unit/create', [UnitController::class, 'create'])->name('unit-create');
          Route::post('unit/store', [UnitController::class, 'store'])->name('unit-store');
          Route::get('unit/edit/{id}', [UnitController::class, 'edit'])->name('unit-edit');
          Route::get('unit/destroy/{id}', [UnitController::class, 'destroy'])->name('unit-destroy');
          Route::post('unit/update/{id}', [UnitController::class, 'update'])->name('unit-update');



          // Product //
          Route::get('product/index', [ProductController::class, 'index'])->name('product-index');
          Route::get('product/create', [ProductController::class, 'create'])->name('product-create');
          Route::post('product/store', [ProductController::class, 'store'])->name('product-store');
          Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product-edit');
          Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product-destroy');
          Route::post('product/update/{id}', [ProductController::class, 'update'])->name('product-update');
          Route::get('product/deleteSingleImage/{id}', [ProductController::class, 'deleteSingleImage'])->name('deleteSingleImage');


        //Vendor
        Route::get('/admin/vendors', [VendorController::class, 'showVendors'])->name('admin.vendors');
        Route::post('/vendor/{id}/approve', [VendorController::class, 'approve'])->name('vendor.approve');
        Route::post('/vendor/{id}/reject', [VendorController::class, 'reject'])->name('vendor.reject');
        
        

    });
});
