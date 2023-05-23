<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee_code' => 'required|unique:employee',
            'employee_name' => 'required',
            'nik' => 'required|unique:employee',
            'department_code' => 'required',
            'section_code' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'phone_number' => 'required',
            'phone_number' => 'sometimes|nullable',
            'email' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'grade_title_code' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'address' => 'required',
            'address_2' => 'sometimes|nullable',
            'direct_leader_code' => 'required',
            'status_job' => 'required',
            'marital_status_code' => 'required',
            'bank_code' => 'required',
            'rekening_number' => 'required',
            'description' => 'sometimes|nullable',
        ];
    }
}
