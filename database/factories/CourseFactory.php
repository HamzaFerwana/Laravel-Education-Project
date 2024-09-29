<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->imageUrl(),
            'category_id' => fake()->numberBetween(1,6),
            'price' => fake()->numberBetween(100, 250),
            'title' => fake()->words(3, true),
            'description' => fake()->paragraph(2, true)
        ];
    }
}
