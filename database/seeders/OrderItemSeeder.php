<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        $maxPercentDiscount = 30;
        $products = collect(Product::get()->toArray());
        $orders = Order::get()->toArray();

        foreach ($orders as $order) {
            $productsStock = $products->where('stock', '>', '0');
            $randomProduct = $productsStock[random_int(0, count($productsStock) - 1)];
            $random_count = random_int(1, $randomProduct['stock']);

            $discountPercent = random_int(0, $maxPercentDiscount) / 100;

            $discountMax = ceil($randomProduct['price'] * $discountPercent);
            $discount = (float)random_int(0, (int)$discountMax);
            $finalPrice = $randomProduct['price'] - $discount;

            DB::table('order_items')->insert([
                'order_id' => $order['id'],
                'product_id' => $randomProduct['id'],
                'count' => $random_count,
                'discount' => $discount,
                'cost' => $finalPrice * $random_count,
            ]);
        }
    }
}

