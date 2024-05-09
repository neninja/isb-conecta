<?php

namespace App\Models;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacao extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_observacao';

    const SINGULAR_LABEL = 'Observação';

    const PLURAL_LABEL = 'Observações';

    protected $fillable = [
        'subject',
        'description',
    ];
}
