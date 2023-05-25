<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductGalleryService
{
    function create($product_id, $image)
    {
        $number = self::generateImageNumber($product_id);
        $filename = self::createImageName($product_id, $number);
        $path = 'image_products';
        $image->storePubliclyAs($path, $filename, "public");
        $url = $path . '/' . $filename;

        $productGallery = ProductGallery::create([
            'products_id' => $product_id,
            'number' => $number,
            'url' => $url
        ]);
        return $productGallery;
    }
    public function createImageName($product_id, $image_number): string
    {
        $product = Product::find($product_id);
        return $product->name . '-' . $image_number . '.png';
    }
    public function generateImageNumber($products_id)
    {
        $lastProductGallery = ProductGallery::where('products_id', $products_id)->latest('number')->first();
        // return $lastProductGallery;
        return $lastProductGallery != null ? $lastProductGallery->number + 1 : 1;
    }
}