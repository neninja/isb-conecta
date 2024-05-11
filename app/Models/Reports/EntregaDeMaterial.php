<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaDeMaterial extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_entrega-de-material';

    const SINGULAR_LABEL = 'Entrega de material';

    const PLURAL_LABEL = 'Entregas de materiais';

    protected $fillable = [
        'receiver_name',
        'description',
    ];
}
