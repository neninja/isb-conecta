<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_tarefa';

    const SINGULAR_LABEL = 'Tarefa';

    const PLURAL_LABEL = 'Tarefas';

    protected $fillable = [
        'requested',
        'subject',
        'description',
    ];

    protected $casts = [
        'requested' => 'boolean',
    ];
}
