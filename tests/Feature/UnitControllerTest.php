<?php

namespace Tests\Feature;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitControllerTest extends TestCase
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
            ->get('/product/unit')
            ->assertStatus(200);
    }
    public function testStoreUnit()
    {
        $user = User::find(1);
        $count_data = Unit::count();
        $data =  [
            "unit_code" => "DPTTEST" . $count_data + 1,
            "unit_name" => "UNIT TEST" . $count_data + 1,
        ];
        $this->actingAs($user);
        $this->post('/product/unit', $data)
            ->assertRedirect("/product/unit");
        // cek success status
        // ->assertSessionHas("success", "Data Unit has been created!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        $this->assertDatabaseCount('unit', $count_data + 1);
        $this->assertDatabaseHas('unit', [
            'unit_code' => "DPTTEST" . $count_data + 1
        ]);
    }
    public function testUpdateUnit()
    {
        $user = User::find(1);
        //get last data unit
        $unit = Unit::latest()->first();
        $count_data = Unit::count();
        $data =  [
            "unit_name" => "UNIT TEST UPDATE " . $count_data,
        ];
        $this->actingAs($user);
        $this->put(
            route('unit.update', $unit->unit_code),
            $data
        )
            ->assertRedirect("/product/unit");
        // ->assertSessionHas("success", "Data Employee has been updated!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        // $this->assertDatabaseCount('unit', $count_data + 1);
        $this->assertDatabaseHas('unit', [
            'unit_name' => "UNIT TEST UPDATE " . $count_data,
        ]);
    }
    public function testDeleteUnit()
    {
        $user = User::find(1);
        $unit = Unit::latest()->first();
        $this->actingAs($user);
        $this->delete(route('unit.destroy', $unit->unit_code))
            ->assertRedirect("/product/unit");
        // ->assertSessionHas("success", "Data Product has been deleted!");
        // cek apakah data sudah kosong setelah dihapus
        $this->assertEmpty(Unit::find($unit->unit_code));
    }
}
