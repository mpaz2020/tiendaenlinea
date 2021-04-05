<?php

namespace App\Http\Controllers;

use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function get_subcategories(Request $request)
    {
       if ($request->ajax()) {
           $sub_categories=SubCategory::where('category_id',$request->category_id)->get();
           return response()->json($sub_categories);
       }
    }
    public function get_products_by_subcategory(Request $request)
    {
       if ($request->ajax()) {
           //$products=Product::where('sub_category_id',$request->sub_category_id)->get();
           //return response()->json($products);
           return datatables()->of(Product::where('sub_category_id', $request->sub_category_id)->get())
           ->addColumn('btn','admin.category._action')
           ->rawColumns(['btn'])
           ->toJson();
       }
    }
}
