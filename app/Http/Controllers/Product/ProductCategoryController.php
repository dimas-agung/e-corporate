<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    //
    private $title = 'ProductCategory';
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_category = ProductCategory::get();
        return 123;

        return response()->view('pages.product.product_category.index', [
            'title' => $this->title,
            'product_category' => $product_category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 123;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_category_code' => ['required'],
            'product_category_name' => ['required'],
            'product_category_parent_code' => ['sometimes', 'nullable'],
            'product_category_type_code' => ['required'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $product_category = ProductCategory::create($validated);

        return redirect('product/product_category')->with('success', 'Data Seksi berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $product_category)
    {
        //
        $validated = $request->validate([
            'product_category_name' => ['required'],
            'product_category_type_code' => ['required'],
            'product_category_parent_code' => ['sometimes', 'nullable'],
            'description' => ['sometimes', 'nullable'],
        ]);
        // return $product_category;
        // return 123;
        // $product_category = ProductCategory::latest()->first();
        $product_category = $product_category->update($validated);
        // return redirect('product/product_category')->with('success', 'Data ProductCategory has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $product_category)
    {

        $product_category->delete();
        return redirect('product/product_category')->with('success', 'Data ProductCategory has been deleted!');
    }
    //
    public function dataProductCategory(Request $request)
    {
        // return 123;
        if ($request->input('product_category_code') != null) {
            $product_category = ProductCategory::where('product_category_code', $request->input('product_category_code'))->orderBy('product_category_name')->get();
        } else {
            $product_category = ProductCategory::orderBy('product_category_name')->get();
        }
        return $product_category;
    }
}