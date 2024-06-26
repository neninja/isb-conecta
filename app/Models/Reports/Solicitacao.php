<?php

namespace App\Models\Reports;

use App\Enums\Status;
use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_solicitacao';

    const SINGULAR_LABEL = 'Solicitação';

    const PLURAL_LABEL = 'Solicitações';

    protected $fillable = [
        'status',
        'author_name',
        'author_contact',
        'description',
    ];

    protected $casts = [
        'status' => Status::class,
    ];
}
