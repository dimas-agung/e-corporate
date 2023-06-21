<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Uom;
use App\Models\UomItem;
use App\Services\UomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UomController extends Controller
{
    private $title = 'Uom';
    private UomService $uomService;
    public function __construct(UomService $uomService)
    {
        $this->middleware('auth');
        $this->uomService = $uomService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 123;
        // $uoms = Uom::orderBy('uom_name')->get();
        return response()->view('pages.product.uom.index', [
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
            'uom_code' => ['required'],
            'uom_name' => ['required'],
            'unit_code' => ['required'],
            'description' => ['sometimes', 'nullable'],
            'uom_code_items' => 'required|array',
            // 'uom_item_desc' => 'required|array',
            'to_uom_code_items' => 'required|array',
            // 'to_uom_item_desc' => 'required|array',
            'value_items' => 'required|array',
        ]);
        // DB::transaction();
        $uom = Uom::create([
            'uom_code' => $request->input('uom_code'),
            'uom_name' => $request->input('uom_name'),
            'unit_code' => $request->input('unit_code'),
            'description' => $request->input('uom_name'),
        ]);
        // get input uom items
        $uom_code_items = $request->input('uom_code_items');
        // $uom_item_desc = $request->input('uom_code_item_desc');
        $to_uom_code_items = $request->input('to_uom_code_items');
        $value_items = $request->input('value_items');
        // $to_uom_item_desc = $request->input('to_uom_item_desc');

        $dataInsertUomItems = [];
        foreach ($uom_code_items as $key => $value) {
            $dataInsertUomItems[] = [
                'uom_code' => $uom_code_items[$key],
                // 'uom_desc' => $uom_item_desc[$key],
                'to_uom_code' => $to_uom_code_items[$key],
                'item_number' => $key,
                'value' => $value_items[$key],
                // 'to_uom_desc' => $to_uom_item_desc[$key],
            ];
        }
        $uomItem = UomItem::insert($dataInsertUomItems);
        // DB::commit();

        return redirect('product/uom')->with('success', 'Data Uom berhasil disimpan!');
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
    public function update(Request $request, Uom $uom)
    {
        //
        $validated = $request->validate([
            // 'uom_code' => ['required'],
            'uom_name' => ['required'],
        ]);
        $uom = $uom->update($validated);
        return redirect('uom')->with('success', 'Data Uom has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uom $uom)
    {
        //
        $uom->delete();
        return redirect('uom')->with('success', 'Data Uom has been deleted!');
    }

    function isUniqueUomCode(Request $request)
    {
        return $this->uomService->isExistUomCode($request->input('uom_code'));
    }
    //
    public function dataUom(Request $request)
    {
        // return 123;
        if ($request->input('uom_code') != null) {
            $uom = Uom::where('uom_code', $request->input('uom_code'))->orderBy('uom_name')->first();
        } else {
            $uom = Uom::orderBy('uom_name')->get();
        }
        return response()
            ->json($uom);
    }
    public function dataUomItems(Request $request)
    {
        // return 123;
        if ($request->input('uom_code') != null) {
            $uom = UomItem::where('uom_code', $request->input('uom_code'))->orderBy('item_number')->get();
        } else {
            $uom = UomItem::orderBy('uom_name')->get();
        }
        return response()
            ->json($uom);
    }
}
