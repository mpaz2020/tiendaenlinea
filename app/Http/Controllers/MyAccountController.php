<?php

namespace App\Http\Controllers;

use App\PaymentPlatform;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('client_auth');
    }

    public function my_account() {
        return view('web.my_account');
    }

    public function checkout() {
        $paymentsPlatforms=PaymentPlatform::all();
        return view('web.checkout',compact('paymentsPlatforms'));
    }

    public function orders() {

        $orders=auth()->user()->orders;

        return view('web.orders', compact('orders'));
    }

    public function account_info() {

        $user=auth()->user();

        return view('web.account_info', compact('user'));
    }


}
