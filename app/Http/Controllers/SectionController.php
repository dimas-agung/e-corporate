<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
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
        $departments = Department::orderBy('department_name')->get();
        return response()->view('pages.master.section', [
            'title' => $this->title,
            'departments' => $departments

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
            'section_code' => ['required'],
            'section_name' => ['required'],
            'department_code' => ['required'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $section = Section::create($validated);

        return redirect('section')->with('success', 'Data Seksi berhasil disimpan!');
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
    public function update(Request $request, Section $section)
    {
        //
        $validated = $request->validate([
            // 'section_code' => ['required'],
            'section_name' => ['required'],
            'department_code' => ['required'],
            'description' => ['sometimes', 'nullable'],
        ]);
        $section = $section->update($validated);
        return redirect('section')->with('success', 'Data Section has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
        $section->delete();
        return redirect('section')->with('success', 'Data Product has been deleted!');
    }
    //
    public function dataSection(Request $request)
    {
        // return 123;
        if ($request->input('department_code') != null) {
            $section = Section::where('department_code', $request->input('department_code'))->with(['department'])->orderBy('section_name')->get();
        } else if ($request->input('section_code') != null) {
            $section = Section::where('section_code', $request->input('section_code'))->with(['department'])->orderBy('section_name')->first();
        } else {
            $section = Section::with(['department'])->orderBy('section_name')->get();
        }
        return response()
            ->json($section);
    }
}
