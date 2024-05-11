<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_reuniao';

    const SINGULAR_LABEL = 'Reunião';

    const PLURAL_LABEL = 'Reuniões';

    protected $fillable = [
        'subject',
        'description',
    ];
}
