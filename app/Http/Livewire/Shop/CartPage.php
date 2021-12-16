<?php

namespace App\Http\Livewire\Shop;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartPage extends Component
{
    public $cart;

    public function render()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        if (!$cart) {

            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }
        $this->cart = $cart;
        return view('livewire.shop.cart-page');
    }
}
