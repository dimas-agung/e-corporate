<?php

namespace Tests\Feature;

use App\Models\ProductCategoryType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCategoryTypeControllerTest extends TestCase
{

    public function testIndexPage()
    {
        # code...
        $user = User::find(1);
        // $product = Product::latest()->limit(1)->get();
        // masukkan session user untuk login
        $this->actingAs($user)
            ->get('/product/product_category_type')
            ->assertStatus(200);
    }
    public function testStoreProductCategoryType()
    {
        $user = User::find(1);
        $productcategorytype = ProductCategoryType::latest()->first();
        $count_data = ProductCategoryType::count();
        $data =  [
            "product_category_type_code" => "DPTTEST" . $count_data + 1,
            "product_category_type_name" => "PRODUCTCATEGORYTYPE TEST" . $count_data + 1,
            "product_category_type_parent_code" => $productcategorytype->product_category_type_parent_code,
            'description' => 'TEST'
        ];
        $this->actingAs($user);
        $this->post('/product/product_category_type', $data)
            ->assertRedirect("/product/product_category_type");
        // cek success status
        // ->assertSessionHas("success", "Data ProductCategoryType has been created!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        $this->assertDatabaseCount('product_category_type', $count_data + 1);
        $this->assertDatabaseHas('product_category_type', [
            'product_category_type_code' => "DPTTEST" . $count_data + 1
        ]);
    }
    public function testUpdateProductCategoryType()
    {
        $user = User::find(1);
        //get last data productcategorytype
        $productcategorytype = ProductCategoryType::latest()->first();
        $count_data = ProductCategoryType::count();
        $data =  [
            "product_category_type_name" => "PRODUCTCATEGORYTYPE TEST UPDATE " . $count_data,
            'description' => 'TEST UPDATE'
        ];
        $this->actingAs($user);
        $this->put(
            route('product_category_type.update', $productcategorytype->product_category_type_code),
            $data
        );
        // ->assertRedirect("/product/product_category_type");
        // ->assertSessionHas("success", "Data Employee has been updated!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        // $this->assertDatabaseCount('productcategorytype', $count_data + 1);
        $this->assertDatabaseHas('product_category_type', [
            'product_category_type_name' => "PRODUCTCATEGORYTYPE TEST UPDATE " . $count_data,
        ]);
    }
    public function testDeleteProductCategoryType()
    {
        $user = User::find(1);
        $productcategorytype = ProductCategoryType::latest()->first();
        $this->actingAs($user);
        $this->delete(route('product_category_type.destroy', $productcategorytype->product_category_type_code))
            ->assertRedirect("/product/product_category_type");
        // ->assertSessionHas("success", "Data Product has been deleted!");
        // cek apakah data sudah kosong setelah dihapus
        $this->assertEmpty(ProductCategoryType::find($productcategorytype->product_category_type_code));
    }
    public function testGetDataProductCategoryType()
    {
        $user = User::find(1);
        $productcategorytype = ProductCategoryType::latest()->first();
        $count_data = ProductCategoryType::count();
        $this->actingAs($user);
        $response =  $this->get(route('product_category_type.data'));

        $this->assertCount($count_data, $response->json());
        // $this->assertEmpty(ProductCategoryType::find($productcategorytype->productcategorytype_code));
    }
    public function testGetDataProductCategoryTypeByCodeExist()
    {
        $user = User::find(1);
        $productcategorytype = ProductCategoryType::latest()->first();
        $datakey = ["product_category_type_code" => $productcategorytype->product_category_type_code];
        $count_data = ProductCategoryType::count();
        $this->actingAs($user);
        $response =  $this->get('product/api/product_category_type/data?product_category_type_code=' . $productcategorytype->product_category_type_code);
        $this->assertCount(1, $response->json());
        // $this->assertEmpty(ProductCategoryType::find($productcategorytype->productcategorytype_code));
    }
    public function testGetDataProductCategoryTypeByCodeNotExist()
    {
        $user = User::find(1);

        $productcategorytype_code =  'FAIL';
        $count_data = ProductCategoryType::count();
        $this->actingAs($user);
        $response =  $this->get('product/api/product_category_type/data?product_category_type_code=' . $productcategorytype_code);
        $this->assertCount(0, $response->json());
        // $this->assertEmpty($response);
    }
}
