<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategoryType;
use Illuminate\Http\Request;

class ProductCategoryTypeController extends Controller
{
    //
    private $title = 'ProductCategoryType';
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productcategorytype = ProductCategoryType::get();
        // return $productcategorytype;
        // return 123;
        // $productcategorytypes = ProductCategoryType::orderBy('productcategorytype_name')->get();
        return response()->view('pages.product.product_category_type.index', [
            'title' => $this->title,
            'productcategorytype' => $productcategorytype
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
            'product_category_type_code' => ['required'],
            'product_category_type_name' => ['required'],
            'product_category_type_parent_code' => ['sometimes', 'nullable'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $productcategorytype = ProductCategoryType::create($validated);

        return redirect('product/product_category_type')->with('success', 'Data Seksi berhasil disimpan!');
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
    public function update(Request $request, ProductCategoryType $productcategorytype)
    {
        //
        $validated = $request->validate([
            // 'product_category_type_name' => ['required'],
            // 'product_category_type_parent_code' => ['sometimes', 'nullable'],
            'description' => ['sometimes', 'nullable'],
        ]);
        return $productcategorytype;
        // return 123;
        // $productcategorytype = ProductCategoryType::latest()->first();
        $productcategorytype = $productcategorytype->update($validated);
        // return redirect('product/product_category_type')->with('success', 'Data ProductCategoryType has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategoryType $productcategorytype)
    {
        // ProductCategoryType::where('id', 2)->delete();
        // $productcategorytype1 = ProductCategoryType::latest()->first();
        $productcategorytype->delete();
        return redirect('product/product_category_type')->with('success', 'Data ProductCategoryType has been deleted!');
    }
    //
    public function dataProductCategoryType(Request $request)
    {
        // return 123;
        if ($request->input('product_category_type_code') != null) {
            $productcategorytype = ProductCategoryType::where('product_category_type_code', $request->input('product_category_type_code'))->orderBy('product_category_type_name')->get();
        } else {
            $productcategorytype = ProductCategoryType::orderBy('product_category_type_name')->get();
        }
        return $productcategorytype;
    }
}
