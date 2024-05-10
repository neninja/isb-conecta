<?php

namespace App\Models\Reports;

use App\Enums\PlantioColheita\Status;
use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantioColheita extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_plantio-colheita';

    const SINGULAR_LABEL = 'Plantio e colheita';

    const PLURAL_LABEL = 'Plantio e colheitas';

    protected $fillable = [
        'status',
        'items',
        'description',
    ];

    protected $casts = [
        'status' => Status::class,
        'items' => 'array',
    ];
}
