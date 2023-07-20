<?php

namespace Tests\Feature;

use App\Models\ProductCategory;
use App\Models\ProductCategoryType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCategoryControllerTest extends TestCase
{

    public function testIndexPage()
    {
        # code...
        $user = User::find(1);
        // $product = Product::latest()->limit(1)->get();
        // masukkan session user untuk login
        $this->actingAs($user)
            ->get('/product/product_category')
            ->assertStatus(200);
    }
    public function testStoreProductCategory()
    {
        $user = User::find(1);
        $productcategory = ProductCategory::latest()->first();
        $productcategorytype = ProductCategoryType::latest()->first();
        $count_data = ProductCategory::count();
        $data =  [
            "product_category_code" => "DPTTEST" . $count_data + 1,
            "product_category_name" => "PRODUCTCATEGORY TEST" . $count_data + 1,
            "product_category_parent_code" => $productcategory->product_category_parent_code,
            "product_category_type_code" => $productcategorytype->product_category_type_code,
            'description' => 'TEST'
        ];
        $this->actingAs($user);
        $this->post('/product/product_category', $data)
            ->assertRedirect("/product/product_category");
        // cek success status
        // ->assertSessionHas("success", "Data ProductCategory has been created!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        $this->assertDatabaseCount('product_category', $count_data + 1);
        $this->assertDatabaseHas('product_category', [
            'product_category_code' => "DPTTEST" . $count_data + 1
        ]);
    }
    public function testUpdateProductCategory()
    {
        $user = User::find(1);
        //get last data productcategory
        $productcategory = ProductCategory::latest()->first();
        $productcategorytype = ProductCategoryType::latest()->first();
        $count_data = ProductCategory::count();
        $data =  [
            "product_category_name" => "PRODUCTCATEGORY TEST UPDATE " . $count_data,
            "product_category_type_code" => $productcategorytype->product_category_type_code,
            'description' => 'TEST UPDATE'
        ];
        $this->actingAs($user);
        $this->put(
            route('product_category.update', $productcategory->product_category_code),
            $data
        );
        // ->assertRedirect("/product/product_category");
        // ->assertSessionHas("success", "Data Employee has been updated!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        // $this->assertDatabaseCount('productcategory', $count_data + 1);
        $this->assertDatabaseHas('product_category', [
            'product_category_name' => "PRODUCTCATEGORY TEST UPDATE " . $count_data,
        ]);
    }
    public function testDeleteProductCategory()
    {
        $user = User::find(1);
        $productcategory = ProductCategory::latest()->first();
        $this->actingAs($user);
        $this->delete(route('product_category.destroy', $productcategory->product_category_code))
            ->assertRedirect("/product/product_category");
        // ->assertSessionHas("success", "Data Product has been deleted!");
        // cek apakah data sudah kosong setelah dihapus
        $this->assertEmpty(ProductCategory::find($productcategory->product_category_code));
    }
    public function testGetDataProductCategory()
    {
        $user = User::find(1);
        $productcategory = ProductCategory::latest()->first();
        $count_data = ProductCategory::count();
        $this->actingAs($user);
        $response =  $this->get(route('product_category.data'));

        $this->assertCount($count_data, $response->json());
        // $this->assertEmpty(ProductCategory::find($productcategory->productcategory_code));
    }
    public function testGetDataProductCategoryByCodeExist()
    {
        $user = User::find(1);
        $productcategory = ProductCategory::latest()->first();
        $datakey = ["product_category_code" => $productcategory->product_category_code];
        $count_data = ProductCategory::count();
        $this->actingAs($user);
        $response =  $this->get('product/api/product_category/data?product_category_code=' . $productcategory->product_category_code);
        $this->assertCount(1, $response->json());
        // $this->assertEmpty(ProductCategory::find($productcategory->productcategory_code));
    }
    public function testGetDataProductCategoryByCodeNotExist()
    {
        $user = User::find(1);

        $productcategory_code =  'FAIL';
        $count_data = ProductCategory::count();
        $this->actingAs($user);
        $response =  $this->get('product/api/product_category/data?product_category_code=' . $productcategory_code);
        $this->assertCount(0, $response->json());
        // $this->assertEmpty($response);
    }
}
