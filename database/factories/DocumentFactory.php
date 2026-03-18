<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
        'client_id' => fake()->numberBetween(1, 50),
        'case_id' => fake()->numberBetween(1, 50),
        'document_type' => fake()->randomElement(['contract', 'invoice', 'letter']),
        'upload_date' => fake()->date(),
        'note' => fake()->sentence(),
        'file' => fake()->filePath(),
        'invoice' => fake()->boolean(),
        'sender' => fake()->name(),
        'receiver' => fake()->name(),
    ];

    }
}
