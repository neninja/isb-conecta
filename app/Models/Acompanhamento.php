<?php

namespace App\Models;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompanhamento extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_acompanhamento';

    const SINGULAR_LABEL = 'Acompanhamento';

    const PLURAL_LABEL = 'Acompanhamentos';

    protected $fillable = [
        'subject',
        'network',
        'description',
    ];
}
