<?php

namespace App\Providers;

use App\Servicies\Cashier\Cashier;
use App\Servicies\Shop\Cart;
use App\Servicies\Shop\ICart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(ICart::class, Cart::class);
        $this->app->singleton('cart', function ($app) {

            return new Cart;
        });

        $this->app->singleton('cashier', function ($app) {

            return new Cashier;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }
}
