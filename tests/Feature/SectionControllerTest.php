<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Section;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SectionControllerTest extends TestCase
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
            ->get('/section')
            ->assertStatus(200);
    }
    public function testStoreSection()
    {
        $user = User::find(1);
        $departement = Department::first();
        $count_data = Section::count();
        $data =  [
            "section_code" => "SECTEST" . $count_data + 1,
            "section_name" => "SECTION TEST" . $count_data + 1,
            "department_code" => $departement->department_code,
        ];
        $this->actingAs($user);
        $this->post('/section', $data)
            ->assertRedirect("/section");
        // cek success status
        // ->assertSessionHas("success", "Data Section has been created!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        $this->assertDatabaseCount('section', $count_data + 1);
        $this->assertDatabaseHas('section', [
            'section_code' => "SECTEST" . $count_data + 1
        ]);
    }
    public function testUpdateSection()
    {
        $user = User::find(1);
        //get last data section
        $section = Section::latest()->first();
        $departement = Department::first();
        $count_data = Section::count();
        $data =  [
            "section_name" => "SECTION TEST UPDATE " . $count_data,
            "department_code" => $departement->department_code,
        ];
        $this->actingAs($user);
        $this->put(
            route('section.update', $section->section_code),
            $data
        )
            ->assertRedirect("/section");
        // ->assertSessionHas("success", "Data Employee has been updated!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        // $this->assertDatabaseCount('section', $count_data + 1);
        $this->assertDatabaseHas('section', [
            'section_name' => "SECTION TEST UPDATE " . $count_data,
        ]);
    }
    public function testDeleteSection()
    {
        $user = User::find(1);
        $section = Section::latest()->first();
        $this->actingAs($user);
        $this->delete(route('section.destroy', $section->section_code))
            ->assertRedirect("/section");
        // ->assertSessionHas("success", "Data Product has been deleted!");
        // cek apakah data sudah kosong setelah dihapus
        $this->assertEmpty(Section::find($section->section_code));
    }
}
