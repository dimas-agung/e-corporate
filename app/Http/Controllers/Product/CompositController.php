<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Composit;
use App\Models\CompositItem;
use App\Services\CompositService;
use App\Services\UomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompositController extends Controller
{
    //
    private $title = 'Composit';
    private UomService $compositService;
    public function __construct(UomService $compositService)
    {
        $this->middleware('auth');
        $this->compositService = $compositService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('pages.product.composit.index', [
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
            'composit_code' => ['required'],
            'composit_name' => ['required'],
            'unit_code' => ['required'],
            'description' => ['sometimes', 'nullable'],
            'composit_code_items' => 'required|array',
            // 'composit_item_desc' => 'required|array',
            'to_composit_code_items' => 'required|array',
            // 'to_composit_item_desc' => 'required|array',
            'value_items' => 'required|array',
        ]);
        DB::beginTransaction();
        $composit = Composit::create([
            'composit_code' => $request->input('composit_code'),
            'composit_name' => $request->input('composit_name'),
            'unit_code' => $request->input('unit_code'),
            'description' => $request->input('composit_name'),
        ]);
        // get input composit items
        $composit_code_items = $request->input('composit_code_items');
        // $composit_item_desc = $request->input('composit_code_item_desc');
        $to_composit_code_items = $request->input('to_composit_code_items');
        $value_items = $request->input('value_items');
        // $to_composit_item_desc = $request->input('to_composit_item_desc');

        $dataInsertCompositItems = [];
        foreach ($composit_code_items as $key => $value) {
            $dataInsertCompositItems[] = [
                'composit_code' => $composit_code_items[$key],
                // 'composit_desc' => $composit_item_desc[$key],
                'to_composit_code' => $to_composit_code_items[$key],
                'item_number' => $key,
                'value' => $value_items[$key],
                // 'to_composit_desc' => $to_composit_item_desc[$key],
            ];
        }
        $compositItem = CompositItem::insert($dataInsertCompositItems);
        DB::commit();

        return redirect('product/composit')->with('success', 'Data Composit berhasil disimpan!');
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
    public function update(Request $request, Composit $composit)
    {
        //
        $validated = $request->validate([
            'composit_code' => ['required'],
            'composit_name' => ['required'],
            'unit_code' => ['required'],
            'description' => ['sometimes', 'nullable'],
            'composit_code_items' => 'required|array',

            'to_composit_code_items' => 'required|array',
            'value_items' => 'required|array'
        ]);

        DB::beginTransaction();
        $composit->update([
            'composit_name' => $request->input('composit_name'),
            'unit_code' => $request->input('unit_code'),
            'description' => $request->input('composit_name'),
        ]);
        // var_dump($composit);
        // return;

        $composit_code_items = $request->input('composit_code_items');
        $to_composit_code_items = $request->input('to_composit_code_items');
        $value_items = $request->input('value_items');

        $dataInsertCompositItems = [];
        foreach ($composit_code_items as $key => $value) {
            $dataInsertCompositItems[] = [
                'composit_code' => $composit_code_items[$key],
                'to_composit_code' => $to_composit_code_items[$key],
                'item_number' => $key,
                'value' => $value_items[$key],
            ];
        }
        $data = [
            [
                'composit_code' => 'Krt24',
                'composit_desc' => 'Karton 24',
                'to_composit_code' => 'Krt24',
                'to_composit_desc' => 'Karton 24',
                'item_number' => '0',
                'value' => '1',

            ],
            [
                'composit_code' => 'Krt24',
                'composit_desc' => 'Karton 24',
                'to_composit_code' => 'Pcs',
                'to_composit_desc' => 'Pieces',
                'item_number' => '1',
                'value' => '24',
            ],
        ];
        // var_dump($data);
        // return;
        CompositItem::where('composit_code', $request->input('composit_code'))->delete();
        $compositItem = CompositItem::insert($dataInsertCompositItems);

        DB::commit();

        return redirect('product/composit')->with('success', 'Data Composit has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Composit $composit)
    {
        //
        $composit->delete();
        return redirect('composit')->with('success', 'Data Composit has been deleted!');
    }

    function isUniqueCompositCode(Request $request)
    {
        return $this->compositService->isExistCompositCode($request->input('composit_code'));
    }
    //
    public function dataComposit(Request $request)
    {
        // return 123;
        if ($request->input('composit_code') != null) {
            $composit = Composit::where('composit_code', $request->input('composit_code'))->orderBy('composit_name')->first();
        } else {
            $composit = Composit::orderBy('composit_name')->get();
        }
        return response()
            ->json($composit);
    }
    public function dataCompositItems(Request $request)
    {
        // return 123;
        if ($request->input('composit_code') != null) {
            $composit = CompositItem::where('composit_code', $request->input('composit_code'))->orderBy('item_number')->get();
        } else {
            $composit = CompositItem::orderBy('composit_name')->get();
        }
        return response()
            ->json($composit);
    }
}
