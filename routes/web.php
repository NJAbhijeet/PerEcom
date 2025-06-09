<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\AdminHomeController;


//DYNAMIC PART

Route::get('/', [AdminHomeController::class, 'index'])->name('index');

Route::get('/about', [AdminHomeController::class, 'about'])->name('about');

Route::get('/privacy', [AdminHomeController::class, 'privacy'])->name('privacy');

Route::get('/terms', [AdminHomeController::class, 'terms'])->name('terms');

Route::get('/testimonial', [AdminHomeController::class, 'testimonial'])->name('testimonial');

Route::get('/contacts', [AdminHomeController::class, 'contacts'])->name('contacts');

Route::get('/return', [AdminHomeController::class, 'return'])->name('return');

Route::get('/blog', [AdminHomeController::class, 'blog'])->name('blog');


Route::get('/faq', [AdminHomeController::class, 'faq'])->name('faq');


Route::get('/login', [AdminHomeController::class, 'login'])->name('login');
Route::post('/login', [AdminHomeController::class, 'login_post']);

Route::get('/register', [AdminHomeController::class, 'register'])->name('register');
Route::post('/register/post', [AdminHomeController::class, 'register_post'])->name('customerregister');

Route::post('/register', [AdminHomeController::class, 'vendorregister'])->name('vendorregister');




Route::get('/forget-password', [AdminHomeController::class, 'forget_password'])->name('forget_password');




//ECOMMERCE PART

Route::get('/shop', [AdminHomeController::class, 'shop'])->name('shop');
Route::get('/shop-detail/{slug}', [AdminHomeController::class, 'shopdetail'])->name('shopdetail');
Route::post('/review', [AdminHomeController::class, 'review'])->name('reviewstore');
Route::get('/productbycategory/{slug}', [AdminHomeController::class, 'productbycategory'])->name('product-by-category');

Route::get('/testimonials', [AdminHomeController::class, 'testimonials'])->name('testimonials');

// Add To Cart //
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::post('product-add-to-cart', [CartController::class, 'addToCart_firstprice'])->name('product-add-to-cart');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/myaccount', [AdminHomeController::class, 'myaccount'])->name('myaccount');


       Route::post('/change-password', [AdminHomeController::class, 'changepassword'])->name('changepassword');

    Route::get('/cart', [AdminHomeController::class, 'cart'])->name('cart');

    Route::get('/wishlist', [AdminHomeController::class, 'wishlist'])->name('wishlist');



    Route::get('/checkout', [AdminHomeController::class, 'checkout'])->name('checkout');
});
