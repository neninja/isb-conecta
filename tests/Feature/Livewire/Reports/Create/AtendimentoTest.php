<?php

namespace Tests\Feature\Livewire\Reports\Create;

use App\Enums\Via;
use App\Livewire\Reports\Create\Atendimento;
use App\Models\User;
use App\Services\Reports\AtendimentoService;
use Carbon\CarbonInterface;
use Tests\LivewireComponentTestCase;

class AtendimentoTest extends LivewireComponentTestCase
{
    protected string $component = Atendimento::class;

    public function testCreate()
    {
        $user = User::factory()->recepcao()->create();

        $date = now()->format('Y-m-d');
        $via = fake()->randomElement(Via::cases())->value;
        $authorName = fake()->name();
        $authorContact = fake()->email();
        $description = fake()->text();

        $this->partialMock(AtendimentoService::class)
            ->shouldReceive('setUser')
            ->once()
            ->with($user)
            ->andReturnSelf()
            ->shouldReceive('create')
            ->once()
            ->with(
                \Mockery::on(fn (CarbonInterface $p) => $p->isSameAs('Y-m-d', $date)),
                Via::from($via),
                $authorName,
                $authorContact,
                $description,
            )
            ->andReturnSelf();

        $this->actingAs($user)
            ->testComponent()
            ->set('date', $date)
            ->set('via', $via)
            ->set('authorName', $authorName)
            ->set('authorContact', $authorContact)
            ->set('description', $description)
            ->call('handleCreate')
            ->assertHasNoErrors();
    }
}
