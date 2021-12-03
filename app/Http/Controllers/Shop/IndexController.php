<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{


    public function home(Request $request)
    {
        $products = Product::get();


        return view('index', compact('products'));
    }


}
