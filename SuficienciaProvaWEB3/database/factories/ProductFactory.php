<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->productName ?? $this->faker->word(),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 1, 200),
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}