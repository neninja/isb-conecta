<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Team::factory()->create([
            'id' => Team::MAIN_TEAM_ID,
            'name' => 'Colaboradores',
        ]);

        if (app()->environment('local')) {
            $this->call(DevSeeder::class);
        }
    }
}
