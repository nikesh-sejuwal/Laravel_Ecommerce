<?php

namespace Database\Factories;

use App\Models\Category;
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
        $category_id = Category::inRandomOrder()->first()->id;
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(100, 10000),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text(),
            'category_id' => $category_id
        ];
    }
}
