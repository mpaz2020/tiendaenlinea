<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\Http\Requests\SubCategory\StoreRequest;
use App\Http\Requests\SubCategory\UpdateRequest;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('can:sub_categories.create')->only(['create', 'store']);
        // $this->middleware('can:sub_categories.index')->only(['index']);
        // $this->middleware('can:sub_categories.edit')->only(['edit', 'update']);
        // $this->middleware('can:sub_categories.show')->only(['show']);
        // $this->middleware('can:sub_categories.destroy')->only(['destroy']);
    }

    public function index()
    {
        $sub_categories = SubCategory::get();
        return view('admin.sub_category.index', compact('sub_categories'));
    }


    public function create()
    {
        return view('admin.sub_category.create');
    }


    public function store(StoreRequest $request, SubCategory $sub_category)
    {
        $sub_category->my_store($request);
        return back();
        //return redirect()->route('sub_categories.index');
    }


    public function show(SubCategory $sub_category)
    {
        //return view('admin.sub_category.show', compact('SubCategory'));
        return back();
    }


    public function edit(Category $category, SubCategory $sub_category)
    {
        return view('admin.sub_category.edit', compact('category','sub_category'));
    }

    public function update(UpdateRequest $request, Category $category, SubCategory $sub_category)
    {
        $sub_category->my_update($request);

        return redirect()->route('categories.show',$category);
    }


    public function destroy(SubCategory $sub_category)
    {
        $sub_category->delete();

        return back();
        //return redirect()->route('sub_categories.index');
    }
}
