<?php

namespace Database\Factories\Reports;

use App\Enums\Via;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports\Atendimento>
 */
class AtendimentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'via' => fake()->randomElement(Via::cases()),
            'author_name' => fake()->name(),
            'author_contact' => preg_replace('/[^0-9]/', '', fake()->phoneNumber()),
            'description' => fake()->text(),
        ];
    }
}
