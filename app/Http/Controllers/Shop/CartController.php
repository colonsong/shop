<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }



}
