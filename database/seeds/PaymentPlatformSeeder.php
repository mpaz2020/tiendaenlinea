<?php

use App\PaymentPlatform;
use Illuminate\Database\Seeder;

class PaymentPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPlatform::create([
            'name'=>'Paypal',
            'image'=>'image/payment-platforms/paypal.jpg'
        ]);
        PaymentPlatform::create([
            'name'=>'Stripe',
            'image'=>'image/payment-platforms/stripe.jpg'
        ]);
        PaymentPlatform::create([
            'name'=>'MercadoPago',
            'image'=>'image/payment-platforms/mercadopago.jpg'
        ]);
        PaymentPlatform::create([
            'name'=>'PayU',
            'image'=>'image/payment-platforms/payu.jpg'
        ]);
    }
}
