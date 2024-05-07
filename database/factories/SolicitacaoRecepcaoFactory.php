<?php

namespace Database\Factories;

use App\Enums\Recepcao\StatusSolicitacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SolicitacaoRecepcao>
 */
class SolicitacaoRecepcaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => fake()->randomElement(StatusSolicitacao::cases()),
            'author_name' => fake()->name(),
            'author_contact' => fake()->phoneNumber(),
            'description' => fake()->text(),
        ];
    }
}
