<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{


    public function home(Request $request)
    {
        $products = Product::get();
        $categories = Category::getTree();

        return view('index', compact('products', 'categories'));
    }

    public function categroyProducts(Request $request){
        DB::enableQueryLog();
        /*
        $products = DB::table("products")
        ->whereIn("id", function($query) use ($request){
            $query->from("category_product")
            ->select("product_id")
            ->where("category_id", "=", $request->route('category'));
        })
        ->get();
*/
        $products = Product::whereHas('categories', function($q)  {
            $q->whereIn('category_id', [2]);
        })->get();
        dd($products);
        //dd(DB::getQueryLog());

    }

    /**
    * 取得當前的 query string
    * @return string
    * @date   2017-09-08T10:32:43+0800
    */
    public static function getQueryString()
    {
        $queryLog  = DB::getQueryLog();


        $lastQuery = end($queryLog);
        $stringSql = $lastQuery['query'];

        // 取代所有問號
        $stringSql = preg_replace("/\?/", "'?'", $stringSql);

        // query 重組
        foreach( $lastQuery['bindings'] as $arg ) {
        $stringSql = preg_replace("/\?/", $arg, $stringSql, 1);
        }

        return $stringSql;
    }

}
