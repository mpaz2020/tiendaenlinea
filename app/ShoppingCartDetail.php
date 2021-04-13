<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetail extends Model
{

    protected $fillable = [
        'shopping_cart_id',
        'product_id',
        'quantity',
        //'price',
    ];

    // public function shopping_cart()
    // {
    //     return $this->belongsTo(ShoppingCart::class);
    // }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function total(){

        return $this->quantity * $this->price;
    }
}
