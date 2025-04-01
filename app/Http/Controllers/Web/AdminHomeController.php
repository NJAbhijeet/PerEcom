<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function return()
    {
        return view('frontend.return');
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function myaccount()
    {
        return view('frontend.myaccount');
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function shop()
    {
        return view('frontend.shop');
    }

    public function shopdetail()
    {
        return view('frontend.shop-detail');
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function testimonials()
    {
        return view('frontend.testimonial');
    }

    public function contacts()
    {
        return view('frontend.contact');
    }

    public function wishlist()
    {
        return view('frontend.wishlist');
    }

    public function forget_password()
    {
        return view('frontend.forget-password');
    }


}
