<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{


    public function home(Request $request)
    {
        $products = Product::get();
        return view('index', compact('products'));
    }
}
