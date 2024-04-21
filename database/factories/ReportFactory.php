<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => now(),
            'user_id' => User::factory(),
        ];
    }

    public function atendimentoAdministracao(): self
    {
        return $this->state([
            'related_type' => \App\Models\AtendimentoRecepcao::class,
            'related_id' => \App\Models\AtendimentoRecepcao::factory(),
        ]);
    }
}
