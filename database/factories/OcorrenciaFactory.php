<?php

namespace Database\Factories;

use App\Enums\Ocorrencia\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ocorrencia>
 */
class OcorrenciaFactory extends Factory
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
            'type' => fake()->randomElement(Type::cases()),
            'subject' => fake()->sentence(),
            'description' => fake()->text(),
        ];
    }
}
