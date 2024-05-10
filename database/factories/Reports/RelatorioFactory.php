<?php

namespace Database\Factories\Reports;

use App\Enums\Diary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports\Relatorio>
 */
class RelatorioFactory extends Factory
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
            'diary' => fake()->randomElement(Diary::cases()),
            'description' => fake()->text(),
        ];
    }
}
