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
        $this->create(\App\Models\Atendimento::class);
        $this->create(\App\Models\Solicitacao::class);
        $this->create(\App\Models\Telefonema::class);
        $this->create(\App\Models\Observacao::class);
        $this->create(\App\Models\Ocorrencia::class);
        $this->create(\App\Models\Documentacao::class);
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
