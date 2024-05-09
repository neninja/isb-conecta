<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sec extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_sec';

    const SINGULAR_LABEL = 'Sec';

    const PLURAL_LABEL = 'Sec';

    protected $fillable = [
        'amount',
        'description',
    ];
}
