<?php

namespace App\Http\Controllers\Web;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart()
    {
        if (Auth::user()) {
            $cart_counter = Cart::where('user_id', Auth::user()->id)->count('id');
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            $subtotal_cart = [];
        } else {
            $cart_counter = Cart::where('session_id', Session::getId())->count('id');
            $carts = Cart::where('session_id', Session::getId())->get();
            $subtotal_cart = [];
        }
        return view('frontend.cart', compact('carts', 'subtotal_cart'));
    }
}
