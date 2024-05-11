<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relato extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_relato';

    const SINGULAR_LABEL = 'Relato';

    const PLURAL_LABEL = 'Relatos';

    protected $fillable = [
        'subject',
        'description',
    ];
}
