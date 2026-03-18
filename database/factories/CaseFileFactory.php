<?php

namespace Database\Factories;

use App\Models\CaseFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CaseFile>
 */
class CaseFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
            'client_name' => fake()->name(),
            'opposing_party' => fake()->name(),
            'title' => fake()->sentence(3),
            'type' => fake()->randomElement(['Civil', 'Criminal', 'Administrative']),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['Open', 'In Progress', 'Closed']),
            'user_id' => fake()->numberBetween(1, 10),
            'pricing' => fake()->randomElement(['Hourly', 'Fixed', 'Retainer']),
            'total_work_hours' => fake()->randomFloat(2, 0, 200),
            'deadline' => fake()->date(),
            'notification' => fake()->randomElement(['Email', 'SMS', 'None']),
            'date' => fake()->date(),
            'closed' => fake()->boolean(),
            'elapsed_work_hours' => fake()->randomFloat(2, 0, 200),
            'work_start' => fake()->dateTime(),
            'work_end' => fake()->dateTime(),
        ];


    }
}
