<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;
use Laravel\Jetstream\Events\TeamCreated;
use Laravel\Jetstream\Events\TeamDeleted;
use Laravel\Jetstream\Events\TeamUpdated;
use Laravel\Jetstream\Team as JetstreamTeam;

class Team extends JetstreamTeam
{
    use HasFactory;
    use HasUuids;

    public const ID_ADMINISTRACAO = 'dcd0cf8f-9ea8-4e07-bf33-b2f1d189c7b3';

    public const ID_RECEPCAO = 'ed524540-f681-4f74-b2c6-5a704331875f';

    public const ID_SECRETARIA = '7a470407-fc79-4f9e-aa54-84317deb47c2';

    public const ID_ASSISTENCIA_SOCIAL = 'c065be0f-df93-4e06-b1b8-162f16b9501d';

    public const ID_CONTABILIDADE = '3d135747-e1fc-4605-9407-eaefe4324fea';

    public const ID_COORDENACAO_PEDAGOGICA = '4d5a0c17-ddc6-4392-b9f0-8d9dc2a84ec5';

    public const ID_EDUCADORES = 'ac3a2ca0-888c-4fd1-9af5-ddd0744619f7';

    public const ID_LIMPEZA = '5d512a94-701c-414e-8519-66888c17fcf7';

    public const ID_COZINHA = 'c09e4128-dcbd-47d5-b53e-546a59671367';

    public const ID_SERVICO_DE_APOIO = '59f30f82-fbb1-4884-8609-e03840f74f96';

    public const ID_JARDINAGEM = '74a63385-8571-44be-a74b-770e59a4c2fc';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'personal_team',
    ];

    /**
     * The event map for the model.
     *
     * @var array<string, class-string>
     */
    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
        'updated' => TeamUpdated::class,
        'deleted' => TeamDeleted::class,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'personal_team' => 'boolean',
        ];
    }

    public static function label(string $teamId): string
    {
        return match ($teamId) {
            self::ID_ADMINISTRACAO => 'Administração',
            self::ID_RECEPCAO => 'Recepção',
            self::ID_SECRETARIA => 'Secretaria',
            self::ID_ASSISTENCIA_SOCIAL => 'Assistência Social',
            self::ID_CONTABILIDADE => 'Contabilidade',
            self::ID_COORDENACAO_PEDAGOGICA => 'Coordenação Pedagógica',
            self::ID_EDUCADORES => 'Educadores',
            self::ID_LIMPEZA => 'Limpeza',
            self::ID_COZINHA => 'Cozinha',
            self::ID_SERVICO_DE_APOIO => 'Serviço de Apoio',
            self::ID_JARDINAGEM => 'Jardinagem',
        };
    }

    public static function mapReports(): array
    {
        return [
            self::ID_ADMINISTRACAO => [],
            self::ID_RECEPCAO => [
                Atendimento::class,
                Solicitacao::class,
                Telefonema::class,
                Observacao::class,
                Ocorrencia::class,
            ],
            self::ID_SECRETARIA => [
                Solicitacao::class,
                Documentacao::class,
                Tarefa::class,
                Reuniao::class,
                Observacao::class,
                Ocorrencia::class,
            ],
            self::ID_ASSISTENCIA_SOCIAL => [],
            self::ID_CONTABILIDADE => [],
            self::ID_COORDENACAO_PEDAGOGICA => [],
            self::ID_EDUCADORES => [],
            self::ID_LIMPEZA => [],
            self::ID_COZINHA => [],
            self::ID_SERVICO_DE_APOIO => [],
            self::ID_JARDINAGEM => [],
        ];
    }

    public function reportables(): Collection
    {
        $reports = self::mapReports()[$this->id];

        return collect($reports);
    }
}
