<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->realText(50);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'thumbnail' => fake()->imageUrl,
            'description' => fake()->realText(5000),
            'category_id' => fake()->numberBetween(1,3),
            'price' => fake()->numberBetween(1000,10000),
            'property_status_id' => 1,
            'user_id' => 1,
            'property_type_id' => fake()->numberBetween(1,3),
            'location_id' => fake()->numberBetween(1,4),
        ];
    }
}
