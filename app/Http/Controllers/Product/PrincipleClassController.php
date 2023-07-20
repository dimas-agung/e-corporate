<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\PrincipleClass;
use Illuminate\Http\Request;

class PrincipleClassController extends Controller
{
    //
    private $title = 'Principle Class';
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
        $principle_class = PrincipleClass::orderBy('principle_class_name')->get();
        return 123;
        return response()->view('pages.product.principle_class.index', [
            'title' => $this->title,
            'principle_class' => $principle_class

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
            'principle_class_code' => ['required'],
            'principle_class_name' => ['required'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $principle_class = PrincipleClass::create($validated);

        return redirect('product/principle_class')->with('success', 'Data Seksi berhasil disimpan!');
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
    public function update(Request $request, PrincipleClass $principle_class)
    {
        //
        $validated = $request->validate([
            // 'principle_class_code' => ['required'],
            'principle_class_name' => ['required'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $principle_class = $principle_class->update($validated);
        return redirect('product/principle_class')->with('success', 'Data PrincipleClass has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrincipleClass $principle_class)
    {
        //
        $principle_class->delete();
        return redirect('product/principle_class')->with('success', 'Data PrincipleClass has been deleted!');
    }
    //
    public function dataPrincipleClass(Request $request)
    {
        // return 123;
        if ($request->input('principle_class_code') != null) {
            $principle_class = PrincipleClass::where('principle_class_code', $request->input('principle_class_code'))->orderBy('principle_class_name')->get();
        } else {
            $principle_class = PrincipleClass::orderBy('principle_class_name')->get();
        }
        return $principle_class;
    }
}
