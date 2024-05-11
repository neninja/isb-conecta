<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastoExtra extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_gasto-extra';

    const SINGULAR_LABEL = 'Gasto Extra';

    const PLURAL_LABEL = 'Gastos Extras';

    protected $fillable = [
        'amount',
        'subject',
        'description',
    ];
}
