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

    public function related(string $related): self
    {
        return $this->state([
            'related_type' => $related,
            'related_id' => $related::factory(),
        ]);
    }
}
