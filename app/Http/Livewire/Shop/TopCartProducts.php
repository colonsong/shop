<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TopCartProducts extends Component
{
    public $cart;

    protected $listeners = ['addProduct'];

    public function mount() {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        if (!$cart) {
            Log::debug('! cart');
            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }
        $this->cart = $cart;

    }

    public function render()
    {
        return view('livewire.shop.top-cart-products');
    }

    public function addProduct($productId) {
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        if (!$cart) {
            Log::debug('! cart');
            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }
        Log::debug($cart);
        $cart->products()->attach($productId, ['qty' => 2]);
        $cartProduct = new CartProduct;
        // $cartProduct->product_id = $productId;
        // $cartProduct->cart_id = $cart->id;
        // $cartProduct->save();

       // Log::debug([$cart->products()]);
       // Log::debug(Cart::where('user_id', Auth::user()->id)->first()->products()->get());
        $this->cart = $cart;
    }
}
