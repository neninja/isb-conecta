<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class EndToEndSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->administracaoReports();
    }

    public function administracaoReports()
    {
        Report::factory()
            ->count(12)
            ->atendimentoAdministracao()
            ->create(['date' => now()->subDay()]);

        Report::factory()
            ->count(15)
            ->atendimentoAdministracao()
            ->create();
    }
}
