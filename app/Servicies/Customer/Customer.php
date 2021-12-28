<?php
namespace App\Servicies\Customer;

use App\Facades\Cashier;
use App\Models\Cart;
use App\Servicies\Bill\Bill;
use Illuminate\Support\Facades\Auth;

class Customer implements ICustomerCheckout {

    private $paymentType;
    private $couponType;
    private $couponOptions;


    public function __construct() {


    }


    public function getProducts() {

        $cart = Cart::where('user_id', Auth::user()->user_id)->firstOrFail();

        return  $cart->products()->get();
    }


    public function useCoupons() {

    }

    public function usePayment($paymentType) {
        $this->paymentType = $paymentType;
        return $this;
    }

    public function checkout() {
        //https://shopify.dev/api/admin-rest/2021-10/resources/checkout#resource_object
        $products = $this->getProducts();
        // event loop
        // coupon discounts are

        Cashier::withThirdParty('ezpay')->Payment('visa')->createBill();


    }


}
