<?php

namespace App\Http\Controllers;

use App\Business;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $orders=Order::all();

        return view('admin.order.index', compact('orders'));
    }

    public function show(Order $order){

        $bussines=Business::firstOrFail();

        return view('admin.order.show', compact('order','bussines'));
    }

    public function orders_update(Request $request, $id){
        $order=Order::find($id);

        $order->update([
            'shipping_status'=>$request->value
        ]);

        return $request->value;
    }
}
