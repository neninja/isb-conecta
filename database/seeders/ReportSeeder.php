<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(Team::mapReports())
            ->flatten()
            ->unique()
            ->values()
            ->each(fn (string $model) => $this->create($model));
    }

    public function create(string $model): void
    {
        Report::factory()
            ->count(24)
            ->state(new Sequence(
                ['date' => now()->subDay()],
                ['date' => now()],
            ))
            ->related($model)
            ->create();
    }
}
