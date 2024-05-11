<?php

namespace Database\Factories\Reports;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports\Solicitacao>
 */
class SolicitacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => fake()->randomElement(Status::cases()),
            'author_name' => fake()->name(),
            'author_contact' => fake()->phoneNumber(),
            'description' => fake()->text(),
        ];
    }
}
