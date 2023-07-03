<?php

namespace Tests\Feature;

use App\Models\Uom;
use App\Models\Uom;
use App\Models\UomItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UomControllerTest extends TestCase
{
    public function testStoreUom()
    {
        $user = User::find(1);
        $count_data = Uom::count();
        $uom_last = Uom::latest()->first();
        $uom = Uom::latest()->first();
        $uom_code_items = [
            "KRT" . $count_data, "KRT" . $count_data
        ];
        $to_uom_code_items = ["KRT" . $count_data, $uom_last->uom_code];
        $value_items = [1, 2];

        $data =  [
            "uom_code" => "KRT" . $count_data,
            "uom_name" => "KARTON " . $count_data,
            "uom_code" => $uom->uom_code,
            "uom_code_items" => $uom_code_items,
            "to_uom_code_items" => $to_uom_code_items,
            "value_items" => $value_items,
        ];
        $this->actingAs($user);
        $this->post('/product/uom', $data)
            ->assertRedirect("/product/uom");
        // ->assertSessionHas("success", "Data Uom has been created!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        $this->assertDatabaseCount('uom', $count_data + 1);
        $this->assertDatabaseHas('uom', [
            'uom_code' => "KRT" . $count_data
        ]);
    }
    public function testUpdateUom()
    {
        $user = User::find(1);
        //get last data uom
        $uom = Uom::latest()->first();
        $uom_items = UomItem::where('uom_code', $uom->uom_code)->get();
        $count_data = Uom::count();
        $data =  [
            "uom_name" => "UOM TEST UPDATE " . $count_data,
        ];
        $this->actingAs($user);
        $this->put(
            route('uom.update', $uom->uom_code),
            $data
        )
            ->assertRedirect("/product/uom");
        // ->assertSessionHas("success", "Data Employee has been updated!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        // $this->assertDatabaseCount('uom', $count_data + 1);
        $this->assertDatabaseHas('uom', [
            'uom_name' => "UOM TEST UPDATE " . $count_data,
        ]);
    }
}
