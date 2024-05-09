<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_doacao';

    const SINGULAR_LABEL = 'Doação';

    const PLURAL_LABEL = 'Doações';

    protected $fillable = [
        'donator',
        'description',
    ];
}
