<?php

namespace App\Models;

use App\Enums\Recepcao\StatusSolicitacao;
use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoRecepcao extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_solicitacao_recepcao';

    public $label = 'Solicitação';

    protected $fillable = [
        'status',
        'author_name',
        'author_contact',
        'description',
        'user_id',
    ];

    protected $casts = [
        'status' => StatusSolicitacao::class,
    ];
}
