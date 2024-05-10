<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacaoProblema extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_situacao-problema';

    const SINGULAR_LABEL = 'Situação problema';

    const PLURAL_LABEL = 'Situações problemas';

    protected $fillable = [
        'subject',
        'description',
    ];
}
