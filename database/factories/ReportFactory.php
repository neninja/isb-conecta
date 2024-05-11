<?php

namespace Database\Factories;

use App\Enums\Teams\Role;
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
            'team_id' => fn (array $attributes) => $this->findMatchedTeam(
                $attributes['related_type']
            ),
            'user_id' => fn (array $attributes) => $this->findOrCreateUserThatMatchWithReportTeam(
                $attributes['related_type']
            ),
        ];
    }

    private function findMatchedTeam(string $relatedType): string
    {
        $mapReports = Team::mapReports();
        $possibleTeams = array_keys($mapReports);
        $teamId = collect($possibleTeams)->shuffle()->first(function ($team) use ($relatedType, $mapReports) {
            return in_array($relatedType, $mapReports[$team]);
        });

        return $teamId;
    }

    private function findOrCreateUserThatMatchWithReportTeam(string $relatedType): string
    {
        $mapReports = Team::mapReports();
        $possibleTeams = array_keys($mapReports);
        $teamId = collect($possibleTeams)->shuffle()->first(function ($team) use ($relatedType, $mapReports) {
            return in_array($relatedType, $mapReports[$team]);
        });

        $user = User::query()->whereHas('teams', function ($query) use ($teamId) {
            $query->where('team_id', $teamId);
        })->inRandomOrder()->firstOr(function () use ($teamId) {
            $newUser = User::factory()->create();
            $newUser->teams()->attach($teamId, ['role' => Role::Member]);

            return $newUser;
        });

        return $user->id;
    }

    public function related(string $related): self
    {
        return $this->state([
            'related_type' => $related,
            'related_id' => $related::factory(),
        ]);
    }

    public function user(User $user): self
    {
        $allTeamsFromUser = $user->teams->pluck('id')->toArray();
        $validTeams = array_keys(Team::mapReports());
        $teamId = collect($validTeams)->shuffle()->first(function ($team) use ($allTeamsFromUser) {
            return in_array($team, $allTeamsFromUser);
        });

        return $this->state([
            'user_id' => $user->id,
            'team_id' => $teamId,
        ]);
    }
}
