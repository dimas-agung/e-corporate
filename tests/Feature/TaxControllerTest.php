<?php

namespace Tests\Feature;

use App\Models\Tax;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TaxControllerTest extends TestCase
{

    public function testIndexPage()
    {
        # code...
        $user = User::find(1);
        // $product = Product::latest()->limit(1)->get();
        // masukkan session user untuk login
        $this->actingAs($user)
            ->get('/product/tax')
            ->assertStatus(200);
    }
    public function testStoreTax()
    {
        $user = User::find(1);
        $count_data = Tax::count();
        $data =  [
            "tax_code" => "DPTTEST" . $count_data + 1,
            "tax_name" => "TAX TEST" . $count_data + 1,
            "value" =>  "0.11",
            "valid_start_at" =>  "2023-01-01",
            "valid_end_at" =>  "2090-01-01",
        ];
        $this->actingAs($user);
        $this->post('/product/tax', $data)
            ->assertRedirect("/product/tax");
        // cek success status
        // ->assertSessionHas("success", "Data Tax has been created!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        $this->assertDatabaseCount('tax', $count_data + 1);
        $this->assertDatabaseHas('tax', [
            'tax_code' => "DPTTEST" . $count_data + 1
        ]);
    }
    public function testUpdateTax()
    {
        $user = User::find(1);
        //get last data tax
        $tax = Tax::latest()->first();
        $count_data = Tax::count();
        $data =  [
            "tax_name" => "TAX TEST UPDATE " . $count_data,
            // "tax_name" => "TAX TEST" . $count_data + 1,
            "value" =>  "0.11",
            "valid_start_at" =>  "2024-01-01",
            "valid_end_at" =>  "2091-01-01",
        ];
        $this->actingAs($user);
        $this->put(
            route('tax.update', $tax->tax_code),
            $data
        )
            ->assertRedirect("/product/tax");
        // ->assertSessionHas("success", "Data Employee has been updated!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        // $this->assertDatabaseCount('tax', $count_data + 1);
        $this->assertDatabaseHas('tax', [
            'tax_name' => "TAX TEST UPDATE " . $count_data,
        ]);
    }
    public function testDeleteTax()
    {
        $user = User::find(1);
        $tax = Tax::latest()->first();
        $this->actingAs($user);
        $this->delete(route('tax.destroy', $tax->tax_code))
            ->assertRedirect("/product/tax");
        // ->assertSessionHas("success", "Data Product has been deleted!");
        // cek apakah data sudah kosong setelah dihapus
        $this->assertEmpty(Tax::find($tax->tax_code));
    }
    public function testGetDataTax()
    {
        $user = User::find(1);
        $tax = Tax::latest()->first();
        $count_data = Tax::count();
        $this->actingAs($user);
        $response =  $this->get(route('tax.data_tax'));

        $this->assertCount($count_data, $response->json());
        // $this->assertEmpty(Tax::find($tax->tax_code));
    }
    public function testGetDataTaxByCodeExist()
    {
        $user = User::find(1);
        $tax = Tax::latest()->first();
        $tax1 = Tax::latest()->first();
        $datakey = ["tax_code" => $tax->tax_code];
        $count_data = Tax::count();
        $this->actingAs($user);
        $response =  $this->get('product/api/data_tax?tax_code=' . $tax->tax_code);
        $this->assertCount(1, $response->json());
        // $this->assertEmpty(Tax::find($tax->tax_code));
    }
    public function testGetDataTaxByCodeNotExist()
    {
        $user = User::find(1);

        $tax_code =  'FAIL';
        $count_data = Tax::count();
        $this->actingAs($user);
        $response =  $this->get('product/api/data_tax?tax_code=' . $tax_code);
        $this->assertCount(0, $response->json());
        // $this->assertEmpty($response);
    }
}
