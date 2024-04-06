<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => fake()->word(),
            'year' => fake()->year(),
            'price' => fake()->numberBetween(5_000, 10_000),
            'images' => [
                '1.png',
                '2.png',
                '3.png',
            ]
        ];
    }
}
