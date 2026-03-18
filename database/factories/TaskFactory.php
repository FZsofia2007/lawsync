<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
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
            'deadline' => fake()->date(),
            'task' => fake()->sentence(),
            'attachment' => fake()->word() . '.pdf',
            'sender_name' => fake()->name(),
            'receiver_name' => fake()->name(),
            'work_hours' => fake()->randomFloat(2, 0, 8),
            'completed' => fake()->boolean(),
        ];

    }
}
