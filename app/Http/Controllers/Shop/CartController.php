<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        if (!$cart) {

            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }
        $this->cart = $cart;

        return view('cart-page', compact('cart'));
    }



}
