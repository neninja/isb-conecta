<?php

namespace Tests\Unit\Services\Reports;

use App\Enums\Via;
use App\Exceptions\ReportUnavailableException;
use App\Models\Report;
use App\Models\Reports\Atendimento;
use App\Models\Team;
use App\Models\User;
use App\Services\Reports\AtendimentoService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\TestWith;
use Tests\TestCase;

class AtendimentoServiceTest extends TestCase
{
    use RefreshDatabase;

    private AtendimentoService $sut;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new AtendimentoService();
    }

    public function testCreate()
    {
        $date = now();
        $via = fake()->randomElement(Via::cases());
        $authorName = fake()->name();
        $authorContact = fake()->email();
        $description = fake()->text();

        $user = User::factory()->recepcao()->create();
        $this->sut->setUser($user)->create($date, $via, $authorName, $authorContact, $description);

        $this->assertDatabaseHas(Report::class, [
            'id' => $this->sut->report->id,
            'user_id' => $user->id,
            'team_id' => Team::ID_RECEPCAO,
            'date' => $date->toDateTimeString(),
            'related_type' => 'App\Models\Reports\Atendimento',
            'related_id' => $this->sut->report->related_id,
        ]);

        $this->assertDatabaseHas(Atendimento::class, [
            'id' => $this->sut->report->related_id,
            'via' => $via,
            'author_name' => $authorName,
            'author_contact' => $authorContact,
            'description' => $description,
        ]);
    }

    #[TestWith([Team::ID_SECRETARIA])]
    #[TestWith([Team::ID_CONTABILIDADE])]
    #[TestWith([Team::ID_COORDENACAO_PEDAGOGICA])]
    #[TestWith([Team::ID_EDUCADORES])]
    #[TestWith([Team::ID_SERVICO_DE_APOIO])]
    #[TestWith([Team::ID_JARDINAGEM])]
    public function testAvoidCreationByAnotherTeam(string $incorrectTeamId)
    {
        $user = User::factory()->team($incorrectTeamId)->create();

        $this->expectException(ReportUnavailableException::class);

        $this->sut->setUser($user)->create(
            now(),
            fake()->randomElement(Via::cases()),
            fake()->name(),
            fake()->phone(),
            fake()->text(),
        );

        $this->assertDatabaseEmpty(Report::class);
        $this->assertDatabaseEmpty(Atendimento::class);
    }
}
