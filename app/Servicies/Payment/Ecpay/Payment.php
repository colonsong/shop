<?php
namespace App\Servicies\Payment\EcPay;

use App\Servicies\Payment\IPay;
use Illuminate\Support\Facades\Auth;
use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;
use Ecpay\Sdk\Exceptions\RtnException;
use Illuminate\Support\Facades\Log;


class Payment implements IPay{


    public function __construct() {


    }

    /**
     * redirect params https://www.ecpay.com.tw/CascadeFAQ/CascadeFAQ_Qa?nID=3044
     */
    public function pay($options = []) {
        try {
            $factory = new Factory([
                'hashKey' => '5294y06JbISpM5x9',
                'hashIv' => 'v77hoKGq4kWxNNIS',
            ]);
            $autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

            $input = [
                'MerchantID' => '2000132',
                'MerchantTradeNo' => 'Test' . time(),
                'MerchantTradeDate' => date('Y/m/d H:i:s'),
                'PaymentType' => 'aio',
                'TotalAmount' => 100,
                'TradeDesc' => UrlService::ecpayUrlEncode('交易描述範例'),
                'ItemName' => '範例商品一批 100 TWD x 1',
                'ReturnURL' => 'https://45db-123-193-180-242.ngrok.io/payment/ecpay/receive',
                'OrderResultURL' => 'https://45db-123-193-180-242.ngrok.io/payment/ecpay/receive',
                'ClientRedirectURL' => 'https://45db-123-193-180-242.ngrok.io/payment/ecpay/receive',
                'ChoosePayment' => 'ALL',
                'EncryptType' => 1,
            ];
            $action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

            echo $autoSubmitFormService->generate($input, $action);
        } catch (RtnException $e) {
            echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
        }
    }






}
