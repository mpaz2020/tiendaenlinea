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
        return view('web.my-account');
    }

    public function checkout() {
        $paymentsPlatforms=PaymentPlatform::all();
        return view('web.checkout',compact('paymentsPlatforms'));
    }

}
