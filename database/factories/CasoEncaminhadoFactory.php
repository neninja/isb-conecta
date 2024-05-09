<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CasoEncaminhado>
 */
class CasoEncaminhadoFactory extends Factory
{
    use IsReport;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tech_name' => fake()->name(),
            'tech_contact' => fake()->phoneNumber(),
            'forwarded_location' => fake()->address(),
        ];
    }
}
