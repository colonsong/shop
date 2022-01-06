<?php
namespace App\Servicies\Payment;


Abstract class PaymentFactory {


    public function __construct() {
    }


    abstract function createPayment(String $paymentMethod);

    public function create($paymentMethod) : IPay{
        return $this->createPayment($paymentMethod);
    }

}
