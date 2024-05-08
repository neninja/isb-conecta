<?php

namespace Database\Factories;

use App\Enums\Via;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atendimento>
 */
class AtendimentoFactory extends Factory
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
            'via' => fake()->randomElement(Via::cases()),
            'author_name' => fake()->name(),
            'author_contact' => fake()->phoneNumber(),
            'description' => fake()->text(),
        ];
    }
}
