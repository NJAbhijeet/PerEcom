<?php

namespace App\Http\Controllers\Web;

use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\VendorProducts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminHomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 'active') ->inRandomOrder()->take(4)->get();
        $categoryIds = $categories->pluck('id'); 
        $products = Product::whereIn('category_id', $categoryIds)->get();     
        return view('frontend.index', compact('categories', 'products'));        
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

    public function vendorregister(Request $request)
    {
        // dd($request->all());

        $vendors = new Vendor();
        $vendors->name = $request->name;
        $vendors->email = $request->email;
        $vendors->phone = $request->phone;
        $vendors->gst = $request->gst;
        $vendors->password = Hash::make($request->password);
        $vendors->passwordhint = $request->password;

        if ($vendors->save()) {
            return back()->with('flash_success', 'Registered as a vendor');
        } else {
            return back()->with('flash_error', 'Registration failed');
        }
    }

  



    public function shop()
    {
        $categories = Category::where('status', 'active')->get();
        $categoryIds = $categories->pluck('id'); 
        $products = Product::whereIn('category_id', $categoryIds)->get();
        return view('frontend.shop', compact('categories', 'products'));
        
    }

    public function shopdetail($slug)    
    {
        $product = Product::where('slug', $slug)->first();
        $vendorProducts = VendorProducts::where('product_id', $product->id)
        ->where('status', 'Active')
        ->get();
        return view('frontend.shop-detail', compact('product', 'vendorProducts'));
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
