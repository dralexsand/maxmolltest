<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName() . ' ' . $this->faker->company() . ' Brand Product',
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'stock' => $this->faker->numberBetween(10, 100000),
        ];
    }
}


