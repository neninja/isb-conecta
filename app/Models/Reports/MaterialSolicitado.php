<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialSolicitado extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_material-solicitado';

    const SINGULAR_LABEL = 'Material solicitado';

    const PLURAL_LABEL = 'Materiais solicitados';

    protected $fillable = [
        'subject',
        'items',
        'description',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
