<?php


use Illuminate\Routing\Router;
use App\Admin\Controllers\CategoriesController;
use App\Admin\Controllers\ProductController;
Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    //$router->resource('products', ProductController::class);
   // $router->resource('categories', CategoriesController::class);
    //$router->resource('category-products', CategoryProductController::class);
});
