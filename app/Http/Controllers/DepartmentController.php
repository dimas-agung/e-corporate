<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
        return response()->view('pages.master.department', [
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
            'department_code' => ['required'],
            'department_name' => ['required'],
        ]);
        $department = Department::create($validated);

        return redirect('department')->with('success', 'Data Seksi berhasil disimpan!');
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
    public function update(Request $request, Department $department)
    {
        //
        $validated = $request->validate([
            'department_code' => ['required'],
            'department_name' => ['required'],
        ]);
        $department = $department->update($validated);
        return redirect('department')->with('success', 'Data Department has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $employee)
    {
        //
        $employee->delete();
        return redirect('employee')->with('success', 'Data Department has been deleted!');
    }
    //
    public function dataDepartment(Request $request)
    {
        // return 123;
        if ($request->input('department_code') != null) {
            $department = Department::where('department_code', $request->input('department_code'))->orderBy('department_name')->get();
        } else {
            $department = Department::with(['department'])->orderBy('department_name')->get();
        }
        return response()
            ->json($department);
    }
}
