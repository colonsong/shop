<?php
namespace App\Servicies\Payment\EcPay;

use App\Servicies\Payment\IPay;
use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;

class Transport  implements IPay {


    public function __construct() {

    }

    // pay
    public function pay($options = []) {


        try {
            $factory = new Factory([
                'hashKey' => '5294y06JbISpM5x9',
                'hashIv' => 'v77hoKGq4kWxNNIS',
                'hashMethod' => 'md5',
            ]);
            $autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

            $input = [
                'MerchantID' => '2000132',
                'MerchantTradeNo' => 'Test' . time(),
                'MerchantTradeDate' => date('Y/m/d H:i:s'),
                'LogisticsType' => 'CVS',
                'LogisticsSubType' => 'FAMIC2C',
                'GoodsAmount' => 1000,
                'GoodsName' => '綠界 SDK 範例商品',
                'SenderName' => '陳大明',
                'SenderCellPhone' => '0911222333',
                'SenderZipCode' => '11560',
                'SenderAddress' => '台北市南港區三重路19-2號6樓',
                'ReceiverName' => '王小美',
                'ReceiverCellPhone' => '0933222111',
                'ReceiverZipCode' => '11560',
                'ReceiverAddress' => '台北市南港區三重路19-2號6樓',
                'Temperature' => '0001',
                'Distance' => '00',
                'Specification' => '0001',
                'ScheduledPickupTime' => '4',
                'ScheduledDeliveryTime' => '4',
                'ReceiverStoreID' => '006598',
                // 請參考 example/Logistics/Domestic/GetLogisticStatueResponse.php 範例開發
                'ServerReplyURL' => 'https://45db-123-193-180-242.ngrok.io/ecpay/transport/express/create',
                'ClientReplyURL' => 'https://45db-123-193-180-242.ngrok.io/',
            ];
            $action = 'https://logistics-stage.ecpay.com.tw/Express/Create';

            echo $autoSubmitFormService->generate($input, $action);
        } catch (RtnException $e) {
            echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
        }
    }


    // map
    public function map($options = []) {


        try {
            $factory = new Factory([
                'hashKey' => '5294y06JbISpM5x9',
                'hashIv' => 'v77hoKGq4kWxNNIS',
                'hashMethod' => 'md5',
            ]);
            $autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

            $input = [
                'MerchantID' => '2000132',
                'MerchantTradeNo' => 'Test' . time(),
                'LogisticsType' => 'CVS',
                'LogisticsSubType' => 'FAMI',
                'IsCollection' => 'N',

                // 請參考 example/Logistics/Domestic/GetMapResponse.php 範例開發
                'ServerReplyURL' => 'https://45db-123-193-180-242.ngrok.io/ecpay/transport/map/receive',
            ];
            $action = 'https://logistics-stage.ecpay.com.tw/Express/map';

            echo $autoSubmitFormService->generate($input, $action);
        } catch (RtnException $e) {
            echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
        }
    }

    //測標
    public function test($options = []) {


        try {
            $factory = new Factory([
                'hashKey' => '5294y06JbISpM5x9',
                'hashIv' => 'v77hoKGq4kWxNNIS',
                'hashMethod' => 'md5',
            ]);
            $autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

            $input = [
                'MerchantID' => '2000132',
                'LogisticsSubType' => 'FAMIC2C',

                // 請參考 example/Logistics/Domestic/GetCreateTestDataResponse.php 範例開發
                'ClientReplyURL' => 'https://45db-123-193-180-242.ngrok.io/ecpay/transport/test/receive',

            ];
            $action = 'https://logistics-stage.ecpay.com.tw/Express/CreateTestData';

            echo $autoSubmitFormService->generate($input, $action);
        } catch (RtnException $e) {
            echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
        }
    }






}
