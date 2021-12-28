<?php
namespace App\Servicies\Customer;

Interface ICustomerCheckout {

    public function getProducts();

    public function useCoupons();

    public function usePayment($paymentType);

    public function checkout();
}
