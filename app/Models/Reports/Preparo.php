<?php

namespace App\Models\Reports;

use App\Enums\Preparo\Status;
use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparo extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_preparo';

    const SINGULAR_LABEL = 'Preparo';

    const PLURAL_LABEL = 'Preparos';

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
