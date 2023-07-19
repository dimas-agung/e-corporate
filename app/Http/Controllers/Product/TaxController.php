<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    //
    private $title = 'Tax';
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
        // $taxs = Tax::orderBy('tax_name')->get();
        return response()->view('pages.product.tax.index', [
            'title' => $this->title,
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
            'tax_code' => ['required'],
            'tax_name' => ['required'],
            'value' => ['required'],
            'valid_start_at' => ['required', 'date'],
            'valid_end_at' => ['sometimes', 'date', 'nullable'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $tax = Tax::create($validated);

        return redirect('product/tax')->with('success', 'Data Seksi berhasil disimpan!');
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
    public function update(Request $request, Tax $tax)
    {
        //
        $validated = $request->validate([
            'tax_name' => ['required'],
            'value' => ['required'],
            'valid_start_at' => ['required', 'date'],
            'valid_end_at' => ['sometimes', 'date', 'nullable'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $tax = $tax->update($validated);
        return redirect('product/tax')->with('success', 'Data Tax has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        $tax->delete();
        return redirect('product/tax')->with('success', 'Data Tax has been deleted!');
    }
    //
    public function dataTax(Request $request)
    {
        // return 123;
        if ($request->input('tax_code') != null) {
            $tax = Tax::where('tax_code', $request->input('tax_code'))->orderBy('tax_name')->get();
        } else {
            $tax = Tax::orderBy('tax_name')->get();
        }
        return $tax;
    }
}
