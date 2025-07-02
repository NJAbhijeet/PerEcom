<?php

namespace App\Http\Controllers\Web;

use App\Models\Cart;
use App\Models\User;
use App\Models\Review;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\VendorProducts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminHomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 'active')->inRandomOrder()->take(4)->get();
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
        $users = Auth::user();
        return view('frontend.myaccount', compact('users'));
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function login_post(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            // Authentication passed
            $intended_url = Session::get("url.intended");
            session()->put('url.intended', null);

            if (!empty($intended_url) && strpos($intended_url, 'admin') === false) {
                return redirect($intended_url);
            } else {
                return redirect()->route('index');
            }
        } else {
            // Authentication failed
            return back()->with('flash_error', 'Invalid Credentials');
        }
    }


    public function changepassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ]);

        // dd($request->all());
        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect']);
        }
        $user->password = Hash::make($request->new_password);
        $user->passwordhint = $request->new_password;
        $user->save();
        return back()->with('flash_success', 'Your password has been changed.');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function register_post(Request $request)
    {
        // dd($request->all());       
        $registers = new User;
        $registers->first_name = $request->first_name;
        $registers->last_name = $request->last_name;
        $registers->email = $request->email;
        $registers->phone = $request->phone;
        $registers->gender = $request->gender;
        $registers->password = Hash::make($request->password);
        $registers->passwordhint = $request->password;
        $registers->save();
        // Mail::send('frontend.mail.register',  [
        //     'first_name' => $request->first_name,  'last_name' => $request->last_name, 'email' => $request->email, 'phone' => $request->phone, 'passwordhint' => $registers->passwordhint,
        //     'messagess' => $request->message
        // ], function ($message) use ($request) {
        //     // $message->from($request->email);
        //     $message->subject('USER REGISTERATION');
        //     $message->to($request->email);
        // });
        if ($registers->save()) {
            return redirect()->route('login')->with('flash_success', 'Thank You For Registering, Please Login');
        }
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
        $products = Product::whereIn('category_id', $categoryIds)->where('status', 'active')->paginate(10);
        return view('frontend.shop', compact('categories', 'products'));
    }

    public function shopdetail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $vendorProducts = VendorProducts::where('product_id', $product->id)
            ->where('status', 'Active')
            ->get();
        $relatedproducts = Product::where('status', 'Active')->get();
        return view('frontend.shop-detail', compact('product', 'vendorProducts', 'relatedproducts'));
    }

    public function review(Request $request)
    {
        // dd($request->all());
        $reviews = new Review;
        $reviews->product_id = $request->product_id;
        $reviews->name = $request->name;
        $reviews->email = $request->email;
        $reviews->review = $request->review;
        $reviews->message = $request->message;
        if ($reviews->save()) {
            return back()->with('flash_success', 'Sent');
        }
    }

    public function productbycategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)
            ->where('status', 'Active')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('frontend.products', compact('category', 'products'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function checkout()
    {

        $session_id = Session::getId();
        $user = Auth::user();
        if ($user) {
            $cart_counter = Cart::where('user_id', $user->id)->count('id');
            $carts = Cart::where('user_id', $user->id)->get();

            foreach ($carts as $cart) {
                $product = Product::find($cart->product->id);
            }
            $subtotal_cart = [];
            $subtotal_gst = [];
        } else {
            $cart_counter = Cart::where('session_id', Session::getId())->count('id');
            $carts = Cart::where('session_id', Session::getId())->get();
            $subtotal_cart = [];
            $subtotal_gst = [];
        }

        return view('frontend.checkout', compact('carts', 'subtotal_cart', 'subtotal_gst', 'user'));
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
