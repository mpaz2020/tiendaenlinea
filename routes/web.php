<?php

use App\Product;
use Illuminate\Support\Facades\Route;


//==========================================rutas del cliente==========================================
Route::post('/payments/pay', 'PaymentController@pay')->name('web.pay');

Route::get('shop_grid', 'WebController@shop_grid')->name('web.shop_grid');
//Route::get('product_details', 'WebController@product_details')->name('web.product_details');

Route::get('login_register', 'WebController@login_register')->name('web.login_register');
Route::get('contact_us', 'WebController@contact_us')->name('web.contact_us');
//Route::get('cart', 'WebController@cart')->name('web.cart');
Route::get('blog', 'WebController@blog')->name('web.blog');
Route::get('blog_details', 'WebController@blog_details')->name('web.blog_details');
Route::get('about_us', 'WebController@about_us')->name('web.about_us');


Route::get('my_account', 'MyAccountController@my_account')->name('web.my_account');
Route::get('checkout', 'MyAccountController@checkout')->name('web.checkout');


Route::get('/', 'WebController@welcome')->name('web.welcome');


Route::resource('shopping_cart_detail', 'ShoppingCartDetailController')->only(['update'])->names('shopping_cart_detail');

Route::get('shopping_cart_detail/{shopping_cart_detail}/destroy', 'ShoppingCartDetailController@destroy')->name('shopping_cart_detail.destroy');

Route::post('add_to_shopping_cart/{product}/store', 'ShoppingCartDetailController@store')->name('shopping_cart_detail.store');

Route::get('add_to_shopping_cart/{product}/store', 'ShoppingCartDetailController@store_a_product')->name('store_a_product');

Route::get('product/{product}', 'WebController@product_details')->name('web.product_details');

Route::get('my_shoping_cart', 'WebController@cart')->name('web.cart');

Route::post('shopping_cart/update', 'ShoppingCartController@update')->name('shopping_cart.update');

//==========================================fin========================================================

Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');

Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');

Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::get('change_status/products/{product}', 'ProductController@change_status')->name('products.change.status');

Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('products', 'ProductController')->names('products');
Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('purchases', 'PurchaseController')->except(['edit','update','destroy'])->names('purchases');
Route::resource('sales', 'SaleController')->except(['edit','update','destroy'])->names('sales');


Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');

Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');

Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

Route::resource('printers', 'PrinterController')->only(['index','update'])->names('printers');

Route::resource('business', 'BusinessController')->only(['index','update'])->names('business');

Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('purchases.upload');

Route::get('sales/upload/{sale}', 'SaleController@upload')->name('purchases.upload');

Route::get('products/upload/{id}/image', 'ProductController@upload_image')->name('products.upload');

Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('purchases.change.status');

Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('sales.change.status');



Route::resource('users', 'UserController')->names('users');

Route::resource('roles', 'RoleController')->except(['create','store','destroy'])->names('roles');

Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');

Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');

Route::get('get_subcategories', 'AjaxController@get_subcategories')->name('get_subcategories');

Route::get('get_products_by_subcategory', 'AjaxController@get_products_by_subcategory')->name('get_products_by_subcategory');

Route::resource('sub_categories', 'SubCategoryController')->except(['edit','update','show'])->names('sub_categories');

Route::get('category/{category}/sub_category/{sub_category}/edit', 'SubCategoryController@edit')->name('sub_categories.edit');

Route::put('category/{category}/sub_category/{sub_category}/update', 'SubCategoryController@update')->name('sub_categories.update');


Route::resource('tags','TagController')->except('show')->names('tags');

Route::get('/prueba', function () {
    return view('prueba');
});



Route::get('/barcode', function () {
    $products=Product::get();
    return view('admin.product.barcode',compact('products'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
