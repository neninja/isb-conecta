<?php

namespace Database\Seeders;

use App\Enums\Teams\Role;
use App\Models\Team;
use App\Models\User;
use Laravel\Fortify\RecoveryCode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->mainTeam(Role::Admin)->create([
            'name' => 'Admin User',
            'email' => 'admin@isb.com',
            'password' => '123',
            'two_factor_secret' => encrypt('NESFD7UNNXAE3JIZ'),
            'two_factor_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                return RecoveryCode::generate();
            })->all())),
            'two_factor_confirmed_at' => now(),
            'current_team_id' => Team::MAIN_TEAM_ID,
        ]);
    }
}