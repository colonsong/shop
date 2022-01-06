<?php

namespace App\Providers;

use App\Servicies\Payment\Ecpay\EcpayFactory;
use App\Servicies\Payment\PaymentFactory;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PaymentFactory::class, function ($app) {
            return new EcpayFactory();
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
