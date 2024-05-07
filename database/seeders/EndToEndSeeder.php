<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
            ->count(24)
            ->state(new Sequence(
                ['date' => now()->subDay()],
                ['date' => now()],
            ))
            ->related(\App\Models\AtendimentoRecepcao::class)
            ->create();

        Report::factory()
            ->count(24)
            ->state(new Sequence(
                ['date' => now()->subDay()],
                ['date' => now()],
            ))
            ->related(\App\Models\SolicitacaoRecepcao::class)
            ->create();
    }
}
