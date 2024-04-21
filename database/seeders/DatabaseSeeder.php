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
        Team::factory()->create([
            'id' => Team::ID_ADMINISTRACAO,
            'name' => 'Administração',
        ]);

        Team::factory()->create([
            'id' => Team::ID_RECEPCAO,
            'name' => 'Recepção',
        ]);

        Team::factory()->create([
            'id' => Team::ID_SECRETARIA,
            'name' => 'Secretaria',
        ]);

        Team::factory()->create([
            'id' => Team::ID_ASSISTENCIA_SOCIAL,
            'name' => 'Assistência Social',
        ]);

        Team::factory()->create([
            'id' => Team::ID_CONTABILIDADE,
            'name' => 'Contabilidade',
        ]);

        Team::factory()->create([
            'id' => Team::ID_COORDENAÇÃO_PEDAGOGICA,
            'name' => 'Coordenação Pedagógica',
        ]);

        Team::factory()->create([
            'id' => Team::ID_EDUCADORES,
            'name' => 'Educadores',
        ]);

        Team::factory()->create([
            'id' => Team::ID_LIMPEZA,
            'name' => 'Limpeza',
        ]);

        Team::factory()->create([
            'id' => Team::ID_COZINHA,
            'name' => 'Cozinha',
        ]);

        Team::factory()->create([
            'id' => Team::ID_SERVICO_DE_APOIO,
            'name' => 'Serviço de Apoio',
        ]);

        Team::factory()->create([
            'id' => Team::ID_JARDINAGEM,
            'name' => 'Jardinagem',
        ]);

    }
}
