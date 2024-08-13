<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;;
use App\Models\Category;
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
            'name'=> fake()->name(),
            'price' => fake()->randomNumber(),
            'description'=> fake()->sentence(),
            'category_id'=> Category::all()->random()->id,
            'created_at'=>fake()->dateTime,
            'updated_at'=> fake()->dateTime,
        ];
    }
}
