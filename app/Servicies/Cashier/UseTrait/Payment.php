<?php
namespace App\Servicies\Cashier\UseTrait;

trait Payment
{
    public function withPayment($type, $options = []) {
        return $this;
    }

    public function paymentPay() {

        echo '@@@@@@@@@@';

    }



}
