<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::all();

        return view('admin.order.index', compact('orders'));
    }

    public function show(Order $order){

        return view('admin.order.show', compact('order'));
    }
}
