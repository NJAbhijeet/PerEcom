<?php

namespace App\Http\Controllers\Web;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function cart()
    {
        if (Auth::check()) {
            $carts = Cart::where(function ($query) {
                $query->where('session_id', Session::getId())
                    ->orWhere('user_id', Auth::id());
            })->get();
        } else {
            $carts = Cart::where('session_id', Session::getId())->get();
        }

        return view('frontend.cart', compact('carts'));
    }


    public function addToCart(Request $request)
    {
        // dd($request->all());
        // Retrieve the selected product
        $product = Product::find($request->product_id);

        // Check if the product already exists in the cart
        $cart = Cart::where('session_id', Session::getId())
            ->where('product_id', $request->product_id)
            ->first();


        if ($cart) {
            // If exists, increment the quantity
            $cart->quantity += 1;
        } else {
            // Otherwise, create a new cart item
            $cart = new Cart;
            $cart->session_id = Session::getId();
            $cart->user_id = Auth::check() ? Auth::user()->id : null;
            $cart->product_id = $product->id;
            $cart->sp = $request->sp; // take from request
            $cart->quantity = 1;
        }

        $cart->save();

        return response()->json(['success' => true, 'cart' => $cart]);
    }

   public function deleteCartQuantity(Request $request, $id, $session_id)
    {
        $cart = Cart::where('session_id', $session_id)->where('id', $id)->first();
        if ($cart) {
            $cart->delete();
            return back()->with('flash_success', 'Cart Updated');
        } else {
            abort(404);
        }
    }
}
