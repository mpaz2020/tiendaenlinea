<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resolvers\PaymentPlatformResolver;

class PaymentController extends Controller
{
    protected $paymentPlatformResolver;

    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        $this->middleware('client_auth');
        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }

    public function pay(Request $request)
    {
        $request->validate([
            'payment_platform' => ['required', 'exists:payment_platforms,id'],
        ]);



        $paymentPlatform = $this->paymentPlatformResolver
        ->resolveService($request->payment_platform);
        session()->put('paymentPlatformId', $request->payment_platform);

        // if ($request->user()->hasActiveSuscription()) {
        //     $request->value=round($request->value*0.9,2);
        // }

        return $paymentPlatform->handlePayment($request);
    }
}
