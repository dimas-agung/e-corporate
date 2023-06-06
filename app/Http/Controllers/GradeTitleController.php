<?php

namespace App\Http\Controllers;

use App\Models\GradeTitle;
use Illuminate\Http\Request;

class GradeTitleController extends Controller
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
        // return $leader;

        return response()->view('pages.master.grade_title', [
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
            'grade_title_code' => ['required'],
            'grade_title_name' => ['required'],
            'description' => ['sometimes', 'nullable'],

        ]);
        $grade_title = GradeTitle::create($validated);

        return redirect('grade_title')->with('success', 'Data Grade Title berhasil disimpan!');
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
    public function update(Request $request, GradeTitle $grade_title)
    {
        //
        $validated = $request->validate([
            'grade_title_code' => ['required'],
            'grade_title_name' => ['required'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $grade_title = $grade_title->update($validated);
        return redirect('grade_title')->with('success', 'Data GradeTitle has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradeTitle $employee)
    {
        //
        $employee->delete();
        return redirect('grade_title')->with('success', 'Data Product has been deleted!');
    }
    //
    public function dataGradeTitle(Request $request)
    {
        if ($request->input('grade_title_code') != null) {
            $grade_title = GradeTitle::where('grade_title_code', $request->input('grade_title_code'))->orderBy('grade_title_name')->first();
        } else {
            $grade_title = GradeTitle::orderBy('grade_title_name')->get();
        }
        return response()
            ->json($grade_title);
    }
}
