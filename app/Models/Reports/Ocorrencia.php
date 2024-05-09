<?php

namespace App\Models\Reports;

use App\Enums\Ocorrencia\Type;
use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_ocorrencia';

    const SINGULAR_LABEL = 'Occorrência';

    const PLURAL_LABEL = 'Occorrências';

    protected $fillable = [
        'type',
        'subject',
        'description',
    ];

    protected $casts = [
        'type' => Type::class,
    ];
}
