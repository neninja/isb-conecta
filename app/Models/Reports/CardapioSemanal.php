<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardapioSemanal extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_cardapio-semanal';

    const SINGULAR_LABEL = 'Cardápio Semanal';

    const PLURAL_LABEL = 'Cardápios Semanais';

    protected $fillable = [
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
