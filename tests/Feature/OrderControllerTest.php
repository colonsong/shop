<?php

namespace Tests\Feature;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard as AuthGuard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Guard;
use Mockery;


class OrderControllerTest extends TestCase
{

     public function setUp(): void
    {
        parent::setUp();

       // $this->user = User::factory()->create();
       $this->user = User::first();

        $this->actingAs($this->user);


    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_checkout()
    {


        $res = $this->post('/api/orders/', [
            'cart_id'     => '1',
        ]);

        $res->assertStatus(200);
    }
}
