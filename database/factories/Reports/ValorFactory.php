<?php

namespace Database\Factories\Reports;

use App\Enums\Sponsor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports\Valor>
 */
class ValorFactory extends Factory
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
            'amount' => fake()->numberBetween(1, 10000),
            'sponsor' => fake()->randomElement(Sponsor::cases()),
            'description' => fake()->text(),
        ];
    }
}
