<?php

namespace App\Http\Controllers\Payment\EcPay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;
use Ecpay\Sdk\Response\VerifiedArrayResponse;

use Ecpay\Sdk\Response\ArrayResponse;

class EcPayController extends Controller
{

    public function __construct() {


    }

    public function callback(Request $request) {
        Log::info('request', ['request' => $request]);
        echo '1|OK';

        /**
         *   'CustomField1' => null
  'CustomField2' => null
  'CustomField3' => null
  'CustomField4' => null
  'MerchantID' => string '2000132' (length=7)
  'MerchantTradeNo' => string 'Test1641140610' (length=14)
  'PaymentDate' => string '2022/01/03 00:24:32' (length=19)
  'PaymentType' => string 'Credit_CreditCard' (length=17)
  'PaymentTypeChargeFee' => string '5' (length=1)
  'RtnCode' => string '1' (length=1)
  'RtnMsg' => string 'Succeeded' (length=9)
  'SimulatePaid' => string '0' (length=1)
  'StoreID' => null
  'TradeAmt' => string '100' (length=3)
  'TradeDate' => string '2022/01/03 00:23:31' (length=19)
  'TradeNo' => string '2201030023312558' (length=16)
  'CheckMacValue' => string '3812BBFC32317061B9D59FAE0AEFC458D5DC6399D76D56D9F0FEA39C0B1B881C' (length=64)
         */
    }

    public function transportCreateCallback(Request $request) {
        Log::info('request', ['request' => $request]);
        try {
            $factory = new Factory([
                'hashKey' => '5294y06JbISpM5x9',
                'hashIv' => 'v77hoKGq4kWxNNIS',
                'hashMethod' => 'md5',
            ]);
            $checkoutResponse = $factory->create(VerifiedArrayResponse::class);

            var_dump($checkoutResponse->get($_POST));
        } catch (RtnException $e) {
            echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
        }

    }

    public function transportTestCallback(Request $request) {
        Log::info('request', ['request' => $request]);
        try {
            $factory = new Factory([
                'hashKey' => '5294y06JbISpM5x9',
                'hashIv' => 'v77hoKGq4kWxNNIS',
                'hashMethod' => 'md5',
            ]);
            $checkoutResponse = $factory->create(VerifiedArrayResponse::class);

            var_dump($checkoutResponse->get($_POST));
        } catch (RtnException $e) {
            echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
        }

        /**
         * C:\wamp64\www\shop\app\Http\Controllers\Payment\EcPay\EcPayController.php:55:
array (size=18)
  'AllPayLogisticsID' => string '1837205' (length=7)
  'BookingNote' => string '' (length=0)
  'CheckMacValue' => string '4ABD3CE26A99D286968779A602B37A48' (length=32)
  'CVSPaymentNo' => string '' (length=0)
  'CVSValidationNo' => string '' (length=0)
  'GoodsAmount' => string '1' (length=1)
  'LogisticsSubType' => string 'FAMI' (length=4)
  'LogisticsType' => string 'CVS' (length=3)
  'MerchantID' => string '2000132' (length=7)
  'MerchantTradeNo' => string '20220104223903906' (length=17)
  'ReceiverAddress' => string '' (length=0)
  'ReceiverCellPhone' => string '0912345678' (length=10)
  'ReceiverEmail' => string 'ReceiverTestMail@testmail.com.tw' (length=32)
  'ReceiverName' => string '測試收件人' (length=15)
  'ReceiverPhone' => string '0212345678' (length=10)
  'RtnCode' => string '300' (length=3)
  'RtnMsg' => string '訂單處理中(已收到訂單資料)' (length=38)
  'UpdateStatusDate' => string '2022/01/04 22:39:03' (length=19)
         */
    }


    public function transportMapCallback(Request $request) {
        Log::info('request', ['request' => $request]);
        try {
            $factory = new Factory();
            $response = $factory->create(ArrayResponse::class);

            var_dump($response->get($_POST));
        } catch (RtnException $e) {
            echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
        }

        /**
         * C:\wamp64\www\shop\app\Http\Controllers\Payment\EcPay\EcPayController.php:93:
array (size=9)
  'CVSAddress' => string '台北市中正區中山南路７號１樓' (length=42)
  'CVSOutSide' => string '' (length=0)
  'CVSStoreID' => string '006598' (length=6)
  'CVSStoreName' => string '台醫店' (length=9)
  'CVSTelephone' => string '02-24326001' (length=11)
  'ExtraData' => string '' (length=0)
  'LogisticsSubType' => string 'FAMI' (length=4)
  'MerchantID' => string '2000132' (length=7)
  'MerchantTradeNo' => string 'Test1641308866' (length=14)
         */
    }

}
