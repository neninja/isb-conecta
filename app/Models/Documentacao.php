<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentacao extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_documentacao';

    const SINGULAR_LABEL = 'Documentação';

    const PLURAL_LABEL = 'Documentações';

    protected $fillable = [
        'status',
        'subject',
        'description',
    ];

    protected $casts = [
        'status' => Status::class,
    ];
}
