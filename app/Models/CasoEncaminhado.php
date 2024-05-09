<?php

namespace App\Models;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasoEncaminhado extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_caso-encaminhado';

    const SINGULAR_LABEL = 'Caso encaminhado';

    const PLURAL_LABEL = 'Casos Encaminhados';

    protected $fillable = [
        'tech_name',
        'tech_contact',
        'forwarded_location',
    ];
}
