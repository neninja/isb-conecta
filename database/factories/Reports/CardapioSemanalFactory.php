<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports\CardapioSemanal>
 */
class CardapioSemanalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'items' => fake()->randomElements(
                [fake()->word(), fake()->word(), fake()->word()],
                fake()->numberBetween(1, 3),
            ),
        ];
    }
}
