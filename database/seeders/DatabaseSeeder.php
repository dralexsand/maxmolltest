<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory(113)->create();
        Product::factory(1007)->create();
        $this->call(OrderSeeder::class);
        $this->call(OrderItemSeeder::class);
    }
}
