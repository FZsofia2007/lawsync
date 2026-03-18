<?php

namespace Database\Factories;

use App\Models\Deadline;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Deadline>
 */
class DeadlineFactory extends Factory
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
            'client_id' => fake()->numberBetween(1, 50),
            'date' => fake()->date(),
            'time' => fake()->time(),
            'description' => fake()->sentence(),
            'location' => fake()->city(),
        ];

    }
}
