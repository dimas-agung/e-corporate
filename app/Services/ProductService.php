<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductService
{
    public function create(array $inputOrder, array $orderItems)
    {
        DB::beginTransaction();
        $Order = Order::create([
            'users_id' => $inputOrder['users_id'],
            'address' => $inputOrder['address'],
            'total_price' => $inputOrder['total_price'],
            'shipping_price' => $inputOrder['shipping_price'],
        ]);
        $this->pushStatus($Order, 1);
        foreach ($orderItems as $orderItem) {
            OrderItem::create([
                'products_id' => $orderItem['product_id'],
                'orders_id' => $Order->id,
                'qty' => $orderItem['qty']
            ]);
            $product = Product::findOrfail($orderItem['product_id']);

            $product->update(['qty' => $product->qty - $orderItem['qty']]);
        }
        DB::commit();
        return $Order;
    }
    public function uploadImage($fileImage)
    {
        $fileImage->storePubliclyAs("pictures", $fileImage->getClientOriginalName(), "public");
        return $fileImage->getClientOriginalName();
    }
    public function decreaseQty(Product $product, $qty = 1)
    {
        $product->update(['qty' => $product->qty - $qty]);
        return $product;
    }
    public function increaseQty(Product $product, $qty = 1)
    {
        $product->update(['qty' => $product->qty + $qty]);
        return $product;
    }
}
