<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'payment/ecpay/receive',
        'ecpay/transport/receive',
        'ecpay/transport/map/receive',
        'ecpay/transport/express/create',
        'ecpay/transport/test/receive',
    ];
}
