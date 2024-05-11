<?php

namespace App\Models\Reports;

use App\Enums\Sponsor;
use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valor extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_valor';

    const SINGULAR_LABEL = 'Valor';

    const PLURAL_LABEL = 'Valores';

    protected $fillable = [
        'amount',
        'sponsor',
        'description',
    ];

    protected $casts = [
        'sponsor' => Sponsor::class,
    ];
}
