<?php

namespace Database\Factories;

use App\Models\ProductCountry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "address" => fake()->address(),
            "image" => "example.jpg",
            "is_visible" => fake()->boolean(100),
            "product_country_id" => fake()->numberBetween(1, ProductCountry::count())
        ];
    }
}
