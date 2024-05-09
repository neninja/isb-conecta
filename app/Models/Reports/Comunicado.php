<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_comunicado';

    const SINGULAR_LABEL = 'Comunicado';

    const PLURAL_LABEL = 'Comunicados';

    protected $fillable = [
        'subject',
        'family_feedback',
    ];
}
