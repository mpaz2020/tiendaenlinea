<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
    protected $fillable = [
        'shipping_status',
        'payment_status',
        'user_id',
        'order_date',
        //'code',
        'subtotal',
        'tax',
        //'total',
    ];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subtotal()
    {
        $total = 0;
        foreach ($this->order_details() as $key => $order_detail) {
            $total += $order_detail->total();
        }
        return $total;
    }

    public function total_tax(){
        return $this->subtotal()*$this->tax;
    }

    public function total(){
        return $this->subtotal()+ $this->total_tax();
    }

    public static function my_store()
    {

        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();

        $order = self::create([
            'shipping_status' => 'PENDING',
            'payment_status' => 'PAID',
            'user_id' => auth()->user()->id,
            'order_date' => Carbon::now(),
            'subtotal' => $shopping_cart->total_price(),
            'tax' => 0.18,
        ]);
        foreach ($shopping_cart->shopping_cart_details as $key => $shopping_cart_detail) {
            $results[]=array("product_id"=>$shopping_cart_detail->product_id[$key], "quantity"=>$shopping_cart_detail->quantity[$key],"price"=>$shopping_cart_detail->price[$key]);
        }
        $order->order_details()->createMany($results);
    }
}
