<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Facades\Cashier;
use App\Models\User;


class CashierTest extends TestCase
{

    public function setUp():void
    {
        parent::setUp();

        $user = User::first();

        $this->actingAs($user);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_getDiscountProducts()
    {
        $products = Cashier::getDiscountProducts();

        $this->assertTrue($products->contains('id', $products->first()->id));
    }
}
