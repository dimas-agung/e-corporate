<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    private $title = 'Seksi';
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
        $units = Unit::orderBy('unit_name')->get();
        return response()->view('pages.product.unit.index', [
            'title' => $this->title,
            'units' => $units

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
            'unit_code' => ['required'],
            'unit_name' => ['required'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $unit = Unit::create($validated);

        return redirect('product/unit')->with('success', 'Data Seksi berhasil disimpan!');
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
    public function update(Request $request, Unit $unit)
    {
        //
        $validated = $request->validate([
            // 'unit_code' => ['required'],
            'unit_name' => ['required'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $unit = $unit->update($validated);
        return redirect('product/unit')->with('success', 'Data Unit has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
        $unit->delete();
        return redirect('product/unit')->with('success', 'Data Unit has been deleted!');
    }
    //
    public function dataUnit(Request $request)
    {
        // return 123;
        if ($request->input('unit_code') != null) {
            $unit = Unit::where('unit_code', $request->input('unit_code'))->orderBy('unit_name')->first();
        } else {
            $unit = Unit::orderBy('unit_name')->get();
        }
        return response()
            ->json($unit);
    }
}
