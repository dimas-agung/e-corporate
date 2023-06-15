<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\EmployeePostRequest as EmployeeEmployeePostRequest;
use App\Http\Requests\Employee\EmployeeUpdateRequest;
use App\Http\Requests\EmployeePostRequest;
use App\Models\Bank;
use App\Models\Department;
use App\Models\Employee;
use App\Models\GradeTitle;
use App\Models\MaritalStatus;
use App\Models\Section;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
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
        //
        $religions = [
            'Islam',
            'Kristen',
            'Budha',
            'Hindu',
        ];
        $grade_title_leader = [
            'GDT001',
            'GDT002',
            'GDT003',
            'GDT004'
        ];
        $maritals_status = MaritalStatus::orderBy('marital_status_name')->get();
        $grade_titles = GradeTitle::orderBy('grade_title_name')->get();
        $departments = Department::orderBy('department_name')->get();
        $sections = Section::orderBy('section_name')->get();
        $banks = Bank::orderBy('bank_name')->get();
        $leader = Employee::whereIn('grade_title_code', $grade_title_leader)->get();
        // return $leader;
        return response()->view('pages.master.employee', [
            'maritals_status' => $maritals_status,
            'departments' => $departments,
            'sections' => $sections,
            'religions' => $religions,
            'banks' => $banks,
            'grade_titles' => $grade_titles,
            'leader' => $leader,
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
    public function store(EmployeeEmployeePostRequest $request)
    {
        $employee = Employee::create($request->validated());
        // return response()
        //     ->json($employee);
        return redirect('employee')->with('success', 'Data Karyawan berhasil disimpan!');
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
    public function update(Request $request, Employee $employee)
    {
        //
        // return $employee;
        $employee->update([
            'employee_name' => $request->input('employee_name'),
            'nik' => $request->input('nik'),
            'department_code' => $request->input('department_code'),
            'section_code' => $request->input('section_code'),
            'birth_date' => $request->input('birth_date'),
            'birth_place' => $request->input('birth_place'),
            'phone_number' => $request->input('phone_number'),
            'phone_number_2' => $request->input('phone_number_2'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'religion' => $request->input('religion'),
            'grade_title_code' => $request->input('grade_title_code'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'address' => $request->input('address'),
            'address_2' => $request->input('address_2'),
            'direct_leader_code' => $request->input('direct_leader_code'),
            'status_job' => $request->input('status_job'),
            'job_title' => $request->input('job_title'),
            'marital_status_code' => $request->input('marital_status_code'),
            'bank_code' => $request->input('bank_code'),
            'rekening_number' => $request->input('rekening_number'),
            'description' => $request->input('description'),
        ]);

        return redirect('employee')->with('success', 'Data Karyawan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect('employee')->with('success', 'Data Product has been deleted!');
    }

    public function dataEmployee(Request $request)
    {
        // return 123;
        if ($request->input('employee_code') != null) {
            $employees = Employee::where('employee_code', $request->input('employee_code'))->with(['department', 'section', 'bank', 'gradeTitle'])->orderBy('employee_code')->first();
        } else {
            $employees = Employee::with(['department', 'section', 'bank', 'gradeTitle'])->orderBy('employee_code')->get();
        }
        return response()
            ->json($employees);
    }
}
