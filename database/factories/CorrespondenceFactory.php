<?php

namespace Database\Factories;

use App\Models\Correspondence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Correspondence>
 */
class CorrespondenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
            'case_id' => fake()->numberBetween(1, 50),
            'status' => fake()->randomElement(['sent', 'received', 'pending']),
            'date' => fake()->date(),
            'letter' => fake()->paragraph(),
        ];


    }
}
