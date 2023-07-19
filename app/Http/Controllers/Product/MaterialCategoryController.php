<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\MaterialCategory;
use Illuminate\Http\Request;

class MaterialCategoryController extends Controller
{
    //
    private $title = 'Material Kategori';
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
        // return 123;
        $materialcategorys = MaterialCategory::orderBy('material_category_name')->get();
        return response()->view('pages.product.material_category.index', [
            'title' => $this->title,
            'material_categorys' => $materialcategorys
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
            'material_category_code' => ['required'],
            'material_category_name' => ['required'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $materialcategory = MaterialCategory::create($validated);

        return redirect('materialcategory')->with('success', 'Data Seksi berhasil disimpan!');
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
    public function update(Request $request, MaterialCategory $materialcategory)
    {
        //
        $validated = $request->validate([
            // 'material_category_code' => ['required'],
            'material_category_name' => ['required'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $materialcategory = $materialcategory->update($validated);
        return redirect('materialcategory')->with('success', 'Data MaterialCategory has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialCategory $materialcategory)
    {
        //
        $materialcategory->delete();
        return redirect('materialcategory')->with('success', 'Data MaterialCategory has been deleted!');
    }
}
