<?php

namespace Tests\Unit;

use App\Servicies\Payment\Ecpay\EcpayFactory;
use App\Servicies\Payment\IPay;
use App\Servicies\Payment\PaymentFactory;
use Tests\TestCase;

class PaymentFactoryTest extends TestCase
{

    protected $paymentMethods = [
        'credit-card',
    ];

    public function getShop()
    {
        return [
            [new EcpayFactory()]
        ];
    }


    /**
     * @dataProvider getShop
     */
    public function test_create(PaymentFactory $factory)
    {
        foreach ($this->paymentMethods as $paymentMethod) {
            $payment = $factory->create($paymentMethod);
            $this->assertInstanceOf(IPay::class, $payment);
        }

    }
}
