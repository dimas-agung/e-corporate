<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartementControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testIndexPage()
    {
        # code...
        $user = User::find(1);
        // $product = Product::latest()->limit(1)->get();
        // masukkan session user untuk login
        $this->actingAs($user)
            ->get('/department')
            ->assertStatus(200);
    }
    public function testStoreDepartement()
    {
        $user = User::find(1);
        $count_data = Department::count();
        $data =  [
            "department_code" => "DPTTEST" . $count_data + 1,
            "department_name" => "DEPARTEMENT TEST" . $count_data + 1,
        ];
        $this->actingAs($user);
        $this->post('/department', $data)
            ->assertRedirect("/department");
        // cek success status
        // ->assertSessionHas("success", "Data Departement has been created!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        $this->assertDatabaseCount('department', $count_data + 1);
        $this->assertDatabaseHas('department', [
            'department_code' => "DPTTEST" . $count_data + 1
        ]);
    }
    public function testUpdateDepartement()
    {
        $user = User::find(1);
        //get last data department
        $department = Department::latest()->first();
        $count_data = Department::count();
        $data =  [
            "department_name" => "DEPARTEMENT TEST UPDATE " . $count_data,
        ];
        $this->actingAs($user);
        $this->put(
            route('department.update', $department->department_code),
            $data
        )
            ->assertRedirect("/department");
        // ->assertSessionHas("success", "Data Employee has been updated!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        // $this->assertDatabaseCount('department', $count_data + 1);
        $this->assertDatabaseHas('department', [
            'department_name' => "DEPARTEMENT TEST UPDATE " . $count_data,
        ]);
    }
    public function testDeleteDepartement()
    {
        $user = User::find(1);
        $department = Department::latest()->first();
        $this->actingAs($user);
        $this->delete(route('department.destroy', $department->department_code))
            ->assertRedirect("/department");
        // ->assertSessionHas("success", "Data Product has been deleted!");
        // cek apakah data sudah kosong setelah dihapus
        $this->assertEmpty(Department::find($department->department_code));
    }
}
