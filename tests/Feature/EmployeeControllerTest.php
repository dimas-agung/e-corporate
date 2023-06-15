<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testStoreEmployee()
    {
        $user = User::find(1);
        $count_data = Employee::count();
        $data =  [
            "employee_code" => "EMPTEST" . $count_data,
            "employee_name" => "JOKOWI",
            "nik" => '110' . $count_data,
            "department_code" => "DEPT002",
            "section_code" => "SECT004",
            "birth_date" => "1899-08-10",
            "birth_place" => "Surabaya",
            "phone_number" => '123',
            "phone_number_2" => '',
            "email" => "superuser@gmail.com",
            "gender" => "Laki - laki",
            "grade_title_code" => "GDT001",
            "religion" => "Islam",
            "start_date" => "12\/31\/1899",
            "end_date" => "12\/31\/1899",
            "address" => "Mojokerto",
            "address_2" => "Kab. Mojokerto",
            "direct_leader_code" => "EMP0000",
            "status_job" => "Tetap",
            "marital_status_code" => "MRTL002",
            "bank_code" => "BANK001",
            "rekening_number" => '123'
        ];
        $this->actingAs($user);
        $this->post('/employee', $data)
            ->assertRedirect("/employee");
        // ->assertSessionHas("success", "Data Employee has been created!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        $this->assertDatabaseCount('employee', $count_data + 1);
        $this->assertDatabaseHas('employee', [
            'employee_code' => "EMPTEST" . $count_data
        ]);
    }
    public function testUpdateEmployee()
    {
        $user = User::find(1);
        //get last data employee
        $employee = Employee::latest()->first();
        $count_data = Employee::count();
        $data =  [
            "employee_name" => "JOKOWI 11",
            "nik" => '0111111',
            "department_code" => "DEPT002",
            "section_code" => "SECT004",
            "birth_date" => "1899-08-10",
            "birth_place" => "Surabaya",
            "phone_number" => '123',
            "phone_number_2" => '',
            "email" => "superuser@gmail.com",
            "gender" => "Laki - laki",
            "grade_title_code" => "GDT001",
            "religion" => "Islam",
            "start_date" => "12\/31\/1899",
            "end_date" => "12\/31\/1899",
            "address" => "Mojokerto",
            "address_2" => "Kab. Mojokerto",
            "direct_leader_code" => "EMP0000",
            "status_job" => "Tetap",
            "marital_status_code" => "MRTL002",
            "bank_code" => "BANK001",
            "rekening_number" => '123'
        ];
        $this->actingAs($user);
        $this->put(
            route('employee.update', $employee->employee_code),
            $data
        )
            ->assertRedirect("/employee");
        // ->assertSessionHas("success", "Data Karyawan has been updated!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        // $this->assertDatabaseCount('employee', $count_data + 1);
        $this->assertDatabaseHas('employee', [
            'employee_name' => "JOKOWI 11"
        ]);
    }
}
