<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->createAllTeams();
        if (app()->environment('local')) {
            $this->call(DevSeeder::class);
        }

        if (! app()->environment('production')) {
            $this->call(EndToEndSeeder::class);
        }
    }

    public function createAllTeams()
    {
        $availableTeams = [
            Team::ID_ADMINISTRACAO,
            Team::ID_RECEPCAO,
            Team::ID_SECRETARIA,
            Team::ID_ASSISTENCIA_SOCIAL,
            Team::ID_CONTABILIDADE,
            Team::ID_COORDENACAO_PEDAGOGICA,
            Team::ID_EDUCADORES,
            Team::ID_LIMPEZA,
            Team::ID_COZINHA,
            Team::ID_SERVICO_DE_APOIO,
            Team::ID_JARDINAGEM,
        ];

        foreach ($availableTeams as $teamId) {
            Team::factory()->create([
                'id' => $teamId,
                'name' => Team::label($teamId),
            ]);
        }
    }
}
