<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Facades\Cashier;
use App\Models\BuyProduct;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $couponId = $request->input('coupon_id');

        // 從購物車拿出來
        $products = Cart::getProducts();

        // 負責計算綜合優惠
        $discountProducts = Cashier::withPayment($request->paymentType, $paymentOptions = [])
        ->withCoupons()
        ->getDiscountProducts();

        // set order
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->total_price = Cashier::getTotalPrice();
        $order->save();

        $buyProducts = $products->map(function($item, $key) use($order) {

            return new BuyProduct([
                'order_id' => $order->id,
                'name'     => ($item->name ? : 'aa'),
                'pic'      => $item->pic,
                'content'  => $item->content,
                'qty'      => $item->pivot->qty,
                'price'   => $item->price,
            ]);
        });

        $order->buyProducts()->saveMany($buyProducts->all());



        // factory method
        //Payment::withPayment('ezPay')->usePaymentType('VISA')->checkout($options = []);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
