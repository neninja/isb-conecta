<?php

namespace Database\Factories;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documentacao>
 */
class DocumentacaoFactory extends Factory
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
            'status' => fake()->randomElement(Status::cases()),
            'subject' => fake()->sentence(),
            'description' => fake()->text(),
        ];
    }
}
