<?php

namespace App\Http\Controllers;


class PaymentTestController extends Controller
{
    public function form() {
        return view("payment.test-form");
    }
    // 測標
    public function transportTestForm() {
        return view("transport.test-form-test");
    }

    public function transportForm() {
        return view("transport.test-form");
    }
}
