<?php

namespace App\Models;

use App\Enums\Ocorrencia\Type;
use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_ocorrencia';

    public $label = 'Occorrência';

    protected $fillable = [
        'type',
        'subject',
        'description',
        'user_id',
    ];

    protected $casts = [
        'type' => Type::class,
    ];
}
