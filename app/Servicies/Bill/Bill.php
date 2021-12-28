<?php
namespace App\Servicies\Bill;

use App\Models\Cart;
use App\Servicies\IBill\IBillItems;
use Illuminate\Support\Facades\Auth;

class Bill implements IBillItems {


    private $products;

    public function __construct($products) {

        $this->products = $products;
    }


    public function getProducts() {

        return $this->products;
    }


    public function getTotalPrice() {

    }




}
