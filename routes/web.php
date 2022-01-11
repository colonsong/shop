<?php


use App\Http\Controllers\OrderController;
use App\Http\Controllers\Payment\EcPay\EcPayController;
use App\Http\Controllers\PaymentTestController;
use App\Http\Controllers\Shop\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\IndexController;
use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'home'])->name('home');
Route::get('/categories/{category}/products/', [IndexController::class, 'categroyProducts'])->name('category.products');


Route::post('/payment/ecpay/receive', [EcPayController::class, 'callback'])->name('payment.callback');
Route::post('/ecpay/transport/test/receive', [EcPayController::class, 'transportTestCallback']);
Route::post('/ecpay/transport/map/receive', [EcPayController::class, 'transportMapCallback']);
Route::post('/ecpay/transport/express/create', [EcPayController::class, 'transportCreateCallback']);


Route::get('/cart', [CartController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/paymentform', [PaymentTestController::class, 'form']);

// transport
Route::get('/transport-test', [PaymentTestController::class, 'transportTestForm']);
Route::get('/transport-form', [PaymentTestController::class, 'transportForm']);

Route::resource('orders', OrderController::class);
