<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'shipping_status',
        'payment_status',
        'user_id',
        'order_date',
        'code',
        'subtotal',
        'tax',
        'total',
    ];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
