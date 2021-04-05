<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function welcome() {
        return view('welcome');
    }
    public function shop_grid() {

        $products=Product::get_active_products()->paginate(12);

        return view('web.shop-grid', compact('products'));
    }

    public function product_details(Product $product) {

        return view('web.product-details',compact('product'));
    }

    public function my_account() {
        return view('web.my-account');
    }

    public function login_register() {
        return view('web.login-register');
    }

    public function contact_us() {
        return view('web.contact-us');
    }

    public function cart() {
        return view('web.cart');
    }

    public function blog() {
        return view('web.blog');
    }

    public function blog_details () {
        return view('web.blog-details');
    }

    public function about_us() {
        return view('web.about-us');
    }

    public function checkout() {
        return view('web.checkout');
    }
}
