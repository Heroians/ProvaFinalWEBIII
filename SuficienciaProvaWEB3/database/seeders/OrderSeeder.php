<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'user@example.com')->first();
        $product1 = Product::first();
        $product2 = Product::skip(1)->first();

        $order = Order::create([
            'user_id' => $user->id,
            'total' => 0, // atualizaremos depois
            'status' => 'pending',
        ]);

        $item1 = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product1->id,
            'quantity' => 1,
            'price' => $product1->price,
        ]);

        $item2 = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product2->id,
            'quantity' => 2,
            'price' => $product2->price,
        ]);

        // Atualiza o total do pedido
        $order->total = ($item1->quantity * $item1->price) + ($item2->quantity * $item2->price);
        $order->save();
    }
}
