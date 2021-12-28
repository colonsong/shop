<?php

namespace Tests\Feature;

use App\Facades\Cart;
use App\Facades\Cashier;
use App\Models\Product;
use App\Servicies\Customer\Customer;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_pay()
    {
        /**
        *
            // WHAT 消費者有多樣商品在購物籃上，要進行商品付款，
            // WHY 確認付款金額是否正確，執行訂單儲存、優惠券儲存、發票等後續事情
            // WHERE 收銀員櫃檯上，網路就是購物車頁面上
            // WHEN 當消費者把購物車提交給收銀員手上時
            // WHO 收銀員、消費者
            // how 收銀員把商品都逐一掃瞄，判斷是否有優惠，或著有其他優惠票據或當時有進行活動，進行優惠折抵
            //

            // class 消費者  購物車  商品  金額  訂單 優惠券 發票 收銀員  優惠碼 活動
            // 購物車 getProducts
            // 消費者 checkout
            // Cachier setProducts setConpons setEvent   getBillItems

            // user getCart
            // user getBillItems


            // 設計模式
            // event
            // order state  V
                // factory checkoutedOrder, cancelOrder
                //
                // orderInterface checkoutedOrder  cancelOrder
            event

            // 折扣 責任練模式
            //  星期一五折 星期二兩折

            // 優惠物件 一筆一筆product set進去 他會對整個目前訂單優惠做折抵
            // 優惠物件裡要涵蓋所有event, coupons設定 所以有可能是責任練模式 判斷到優惠為止 但
            // 個個優惠又有優先順序，有可能是日期順序，有可能是折抵順序，有可能分商品類型
            // 單這些順序基本上是從DB存近來所以DB撈出來可以決定順序再寫入

            //oupons->create([
            'duration' => 'repeating',
            'amount_off' => 500,
            'duration_in_months' => 3,
            'currency' => 'USD',
        ]);

        taxRates->create([
            'display_name' => 'VAT',
            'description' => 'VAT Belgium',
            'jurisdiction' => 'BE',
            'percentage' => 21,
            'inclusive' => false,
        ]);

            //
            // Cachier->
            // setCouponType, code
            // withCoupon(type code , type id) factory 只給你coupon id , code
            // setEventModel(Event::class) // 只想知道那些EVENT 放進去PRODUCT 出來折抵多少
            // withPaymentType(  'VISA' , $option = ['callback_url']) 只想給你paymentType, 跟該payment option 會來就要是結帳完成
            // getBill(); 只想知道原本商品，折扣後商品 總金額 付款資訊



         */
        Cart::shouldReceive('getProducts')
        ->once()
        ->andReturn( Product::factory()->count(10)->make());

        $couponId = $request->input('coupon_id');

        // 從購物車拿出來
        $products = Cart::getProducts();

        // 負責計算綜合優惠
        $discountProducts = Cashier::withPayment($request->paymentType, $paymentOptions = [])
        ->withCoupons()
        ->getDiscountProducts();

        // set order

        // factory method
        //Payment::withPayment('ezPay')->usePaymentType('VISA')->paymentPay($options = []);


    }
}
