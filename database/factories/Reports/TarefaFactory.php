<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports\Tarefa>
 */
class TarefaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'requested' => fake()->boolean(),
            'subject' => fake()->sentence(),
            'description' => fake()->text(),
        ];
    }
}
