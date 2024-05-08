<?php

namespace Database\Factories;

use App\Models\Team;
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
            'team_id' => function (array $attributes) {
                $related = $attributes['related_type'];
                $mapReports = Team::mapReports();
                $possibleTeams = array_keys($mapReports);
                $teamId = collect($possibleTeams)->shuffle()->first(function ($team) use ($related, $mapReports) {
                    return in_array($related, $mapReports[$team]);
                });

                return $teamId;
            },
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
