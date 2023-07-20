<?php

namespace Tests\Feature;

use App\Models\PrincipleClass;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrincipleClassControllerTest extends TestCase
{
    public function testIndexPage()
    {
        # code...
        $user = User::find(1);
        // $product = Product::latest()->limit(1)->get();
        // masukkan session user untuk login
        $this->actingAs($user)
            ->get('/product/principle_class')
            ->assertStatus(200);
    }
    public function testStorePrincipleClass()
    {
        $user = User::find(1);
        $count_data = PrincipleClass::count();
        $data =  [
            "principle_class_code" => "ARTEST" . $count_data + 1,
            "principle_class_name" => "PRINCIPLE TEST" . $count_data + 1,
            "description" =>  "TEST"
        ];
        $this->actingAs($user);
        $this->post('/product/principle_class', $data)
            ->assertRedirect("/product/principle_class");
        // cek success status
        // ->assertSessionHas("success", "Data PrincipleClass has been created!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        $this->assertDatabaseCount('principle_class', $count_data + 1);
        $this->assertDatabaseHas('principle_class', [
            'principle_class_code' => "ARTEST" . $count_data + 1
        ]);
    }
    public function testUpdatePrincipleClass()
    {
        $user = User::find(1);
        //get last data principle_class
        $principle_class = PrincipleClass::latest()->first();
        $count_data = PrincipleClass::count();
        $data =  [
            "principle_class_name" => "Principle TEST UPDATE " . $count_data,
            "description" => 'TEST UPDATE'
           
        ];
        $this->actingAs($user);
        $this->put(
            route('principle_class.update', $principle_class->principle_class_code),
            $data
        )
            ->assertRedirect("/product/principle_class");
        // ->assertSessionHas("success", "Data Employee has been updated!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        // $this->assertDatabaseCount('principle_class', $count_data + 1);
        $this->assertDatabaseHas('principle_class', [
            'principle_class_name' => "PRINCIPLE TEST UPDATE " . $count_data,
        ]);
    }
    public function testDeletePrincipleClass()
    {
        $user = User::find(1);
        $principle_class = PrincipleClass::latest()->first();
        $this->actingAs($user);
        $this->delete(route('principle_class.destroy', $principle_class->principle_class_code))
            ->assertRedirect("/product/principle_class");
        // ->assertSessionHas("success", "Data Product has been deleted!");
        // cek apakah data sudah kosong setelah dihapus
        $this->assertEmpty(PrincipleClass::find($principle_class->principle_class_code));
    }
    public function testGetDataPrincipleClass()
    {
        $user = User::find(1);
        $principle_class = PrincipleClass::latest()->first();
        $count_data = PrincipleClass::count();
        $this->actingAs($user);
        $response =  $this->get(route('principle_class.data_principle_class'));

        $this->assertCount($count_data, $response->json());
        // $this->assertEmpty(PrincipleClass::find($principle_class->principle_class_code));
    }
    public function testGetDataPrincipleClassByCodeExist()
    {
        $user = User::find(1);
        $principle_class = PrincipleClass::latest()->first();
        $principle_class1 = PrincipleClass::latest()->first();
        $datakey = ["principle_class_code" => $principle_class->principle_class_code];
        $count_data = PrincipleClass::count();
        $this->actingAs($user);
        $response =  $this->get('product/api/principle_class/data?principle_class_code=' . $principle_class->principle_class_code);
        $this->assertCount(1, $response->json());
        // $this->assertEmpty(PrincipleClass::find($principle_class->principle_class_code));
    }
    public function testGetDataPrincipleClassByCodeNotExist()
    {
        $user = User::find(1);

        $principle_class_code =  'FAIL';
        $count_data = PrincipleClass::count();
        $this->actingAs($user);
        $response =  $this->get('product/api/principle_class/data?principle_class_code=' . $principle_class_code);
        $this->assertCount(0, $response->json());
        // $this->assertEmpty($response);
    }
}
