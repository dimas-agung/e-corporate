<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderService
{
    private array $inputOrder;
    private ProductService $productService;
    public function __construct()
    {
        $this->productService = new ProductService;
    }
    public function setInputOrder($users_id, $address, $total_price, $shipping_price)
    {
        self::$inputOrder = [
            'users_id' => $users_id,
            'address' => $address,
            'total_price' => $total_price,
            'shipping_price' => $shipping_price
        ];
    }
    public function create(array $inputOrder, array $orderItems)
    {
        DB::beginTransaction();
        $Order = Order::create([
            'users_id' => $inputOrder['users_id'],
            'address' => $inputOrder['address'],
            'total_price' => $inputOrder['total_price'],
            'shipping_price' => $inputOrder['shipping_price'],
        ]);
        self::pushStatus($Order, Order::WAITING_PAYMENT_STATUS);
        foreach ($orderItems as $orderItem) {
            OrderItem::create([
                'products_id' => $orderItem['product_id'],
                'orders_id' => $Order->id,
                'qty' => $orderItem['qty']
            ]);
            $product = Product::findOrfail($orderItem['product_id']);

            $this->productService->decreaseQty($product, $orderItem['qty']);
        }
        DB::commit();
        return $Order;
    }
    public function confirmOrder(Order $order)
    {
        $order->update(['confirm_at' => date('Y-m-d H:i:s')]);
        self::pushStatus($order, Order::CONFIRM_SELLER_STATUS);
    }
    public function prosesOrder(Order $order)
    {
        $order->update(['process_at' => date('Y-m-d H:i:s')]);
        self::pushStatus($order, Order::PROCES_SELLER_STATUS);
    }
    public function pushStatus(Order $order, int $OrderStatusId)
    {
        $order->update(['order_status_id' => $OrderStatusId]);
        return $order;
    }
}
