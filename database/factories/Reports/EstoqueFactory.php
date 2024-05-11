<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports\Estoque>
 */
class EstoqueFactory extends Factory
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
                [
                    [
                        'amount' => fake()->numberBetween(0, 99),
                        'description' => fake()->word(),
                    ],
                    [
                        'amount' => fake()->numberBetween(0, 99),
                        'description' => fake()->word(),
                    ],
                    [
                        'amount' => fake()->numberBetween(0, 99),
                        'description' => fake()->word(),
                    ],
                ],
                fake()->numberBetween(1, 3),
            ),
        ];
    }
}
