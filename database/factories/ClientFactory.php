<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
            'name' => fake()->name(),
            'birth_date' => fake()->date(),
            'birth_place' => fake()->city(),
            'mother_name' => fake()->name('female'),
            'id_number' => fake()->bothify('ID#######'),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'tax_number' => fake()->bothify('########'),
            'company_registration' => fake()->bothify('CR#######'),
        ];


    }
}
