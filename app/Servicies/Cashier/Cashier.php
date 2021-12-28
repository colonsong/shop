<?php
namespace App\Servicies\Cashier;

use App\Facades\Cart;
use App\Servicies\Cashier\UseTrait\Payment;
use App\Servicies\Cashier\UseTrait\Coupons;
use App\Servicies\Cashier\UseTrait\Products;
use App\Servicies\Shop\ICart;
use Illuminate\Database\Eloquent\Collection;

class Cashier {

    use Payment;
    use Coupons;
    use Products;

    public function __construct() {

    }




    public function getBill() {
        $products = Cart::getProducts();
        collect(Cart::getProducts())->map(function ($product, $key) {
            var_dump($product->name);
        });
    }


    public function getDiscountProducts() {
         return  Cart::getProducts();
    }

}
