<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports\MaterialSolicitado>
 */
class MaterialSolicitadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject' => fake()->sentence(),
            'items' => fake()->randomElements(
                [fake()->word(), fake()->word(), fake()->word()],
                fake()->numberBetween(1, 3),
            ),
            'description' => fake()->text(),
        ];
    }
}
