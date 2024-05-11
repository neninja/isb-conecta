<?php

namespace App\Models\Reports;

use App\Enums\Diary;
use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_relatorio';

    const SINGULAR_LABEL = 'Relatório';

    const PLURAL_LABEL = 'Relatórios';

    protected $fillable = [
        'subject',
        'diary',
        'description',
    ];

    protected $casts = [
        'diary' => Diary::class,
    ];
}
