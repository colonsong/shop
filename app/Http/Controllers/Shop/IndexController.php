<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class IndexController extends Controller
{


    public function home(Request $request)
    {
        $products = Product::get();
        $categories = Category::getTree();

        return view('index', compact('products', 'categories'));
    }


}
