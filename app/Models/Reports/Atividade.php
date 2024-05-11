<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_atividade';

    const SINGULAR_LABEL = 'Atividade';

    const PLURAL_LABEL = 'Atividades';

    protected $fillable = [
        'subject',
        'description',
    ];
}
