<?php
namespace App\Servicies\Shop;


use App\Models\Cart as ModelsCart;
use Illuminate\Support\Facades\Auth;

class Cart implements ICart {


    public function __construct() {


    }


    public function getProducts() {

        $cart = ModelsCart::where('user_id', Auth::user()->id)->firstOrFail();

        return  $cart->products()->get();
    }


}
