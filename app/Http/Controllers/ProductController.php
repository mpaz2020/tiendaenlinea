<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Provider;
use App\SubCategory;
use App\Tag;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('can:products.create')->only(['create', 'store']);
        // $this->middleware('can:products.index')->only(['index']);
        // $this->middleware('can:products.edit')->only(['edit', 'update']);
        // $this->middleware('can:products.show')->only(['show']);
        // $this->middleware('can:products.destroy')->only(['destroy']);
        // $this->middleware('can:products.change.status')->only(['change_status']);
    }

    public function index()
    {
        $products = Product::get();

        return view('admin.product.index', compact('products'));
    }


    public function create()


    {
        $sub_categories = SubCategory::get();
        $categories = Category::get();
        $providers = Provider::get();
        $tags = Tag::get();

        return view('admin.product.create', compact('categories', 'providers', 'tags', 'sub_categories'));
    }


    public function store(StoreRequest $request, Product $product)
    {


        $product->my_store($request);


        return redirect()->route('products.index');
    }


    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $categories = Category::get();

        $providers = Provider::get();
        $tags = Tag::get();

        return view('admin.product.edit', compact('product', 'categories', 'providers', 'tags'));
    }

    public function update(UpdateRequest $request, Product $product)
    {

        $product->my_update($request);


        return redirect()->route('products.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }

    public function change_status(Product $product)
    {
        if ($product->status === 'ACTIVE') {
            $product->update(['status' => 'DEACTIVATED']);
        } else {
            $product->update(['status' => 'ACTIVE']);
        }

        return redirect()->back();
    }

    public function get_products_by_barcode(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::where('code', $request->code)->firstOrFail();
            return response()->json($products);
        }
    }
    public function get_products_by_id(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }

    public function print_barcode()
    {
        $products = Product::get();
        $pdf = PDF::loadView('admin.product.barcode', compact('products'));
        return $pdf->download('codigos_de_barra.pdf');
    }

    public function upload_image(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $name = time() . '_' . $file->getClientOriginalName();
            $ruta = public_path() . '/image';
            $file->move($ruta, $name);
            $url = '/image/' . $name;
        }
        if ($product && $url) {
            $product->images()->create([
                'url' => $url
            ]);
        }
    }
}
