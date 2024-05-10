<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_estoque';

    const SINGULAR_LABEL = 'Estoque';

    const PLURAL_LABEL = 'Estoques';

    protected $fillable = [
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
