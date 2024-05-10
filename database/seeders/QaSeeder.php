<?php

namespace Database\Seeders;

use App\Enums\Teams\Role;
use App\Enums\Via;
use App\Models\Report;
use App\Models\Reports\Atendimento;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Laravel\Fortify\RecoveryCode;

class QaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createUsers();
        $this->createReports();
    }

    public function createUsers()
    {
        User::factory()->admin(Role::Admin)->create([
            'name' => 'Ademir Ultimo',
            'username' => 'admin.isb',
            'email' => 'admin@isb.com',
            'password' => '123',
            'two_factor_secret' => encrypt('NESFD7UNNXAE3JIZ'),
            'two_factor_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                return RecoveryCode::generate();
            })->all())),
            'two_factor_confirmed_at' => now(),
        ]);
    }

    public function createReports()
    {
        $this->recepcao();
    }

    public function recepcao()
    {
        $user = User::factory()->create([
            'id' => '611301c1-bde2-4e72-bbe7-6f9403a0495d',
            'name' => 'Usuário Recepcao',
            'username' => 'recepcao.isb',
        ]);

        $user->teams()->attach(Team::ID_RECEPCAO, ['role' => Role::Member]);

        collect([
            [
                [
                    'via' => Via::Phone,
                    'author_name' => 'Teobaldo Feliciano',
                    'author_contact' => '61903836000',
                    'description' => 'Ontem foi atendido fulano',
                ],
                ['date' => now()->subDay()],
            ],
            [
                [
                    'via' => Via::Phone,
                    'author_name' => 'Deivid Pontes Filho',
                    'author_contact' => '9532105485',
                    'description' => 'Hoje foi atendido ciclano',
                ],
                ['date' => now()],
            ],
        ])->each(fn ($i) => $this->report(
            $user, Atendimento::class, $i[0], $i[1]
        ));
    }

    private function report(User $user, string $relatedClass, array $related, $report): void
    {
        Report::factory()
            ->user($user)
            ->for($relatedClass::factory()->create($related), 'related')
            ->create($report);
    }
}
