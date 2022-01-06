<?php
namespace App\Servicies\Payment\Ecpay;

use App\Servicies\Payment\EcPay\Payment;
use App\Servicies\Payment\EcPay\Transport;
use App\Servicies\Payment\EcPay\TransportTest;
use App\Servicies\Payment\PaymentFactory;


class EcpayFactory extends PaymentFactory {


    public function __construct() {


    }

    public function createPayment(String $method) {

        switch ($method) {
            case 'credit-card':
            case 'web-atm':
            case 'atm':
            case 'store-barcode':
            case 'store-code':
                return new Payment;
            case 'black-cat': //黑貓 (尺寸不一與出貨量大)
            case 'dazong-package': // 大宗 (商品送到物流中心&出貨量大)
            case 'dazong-package-exchange': // 退貨
            case 'store-store': // 店到店 (商品至超商出貨量小)
            case 'big-bird': //大嘴鳥 (尺寸不一&出貨量大)

                return new Transport;
            case 'test': // 測標
                return new TransportTest;
            default:
                throw new \Exception('eee');
        }
    }







}
