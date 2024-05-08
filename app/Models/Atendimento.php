<?php

namespace App\Models;

use App\Enums\Via;
use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_atendimento';

    const SINGULAR_LABEL = 'Atendimento';
    const PLURAL_LABEL = 'Atendimentos';

    protected $fillable = [
        'via',
        'author_name',
        'author_contact',
        'description',
        'user_id',
    ];

    protected $casts = [
        'via' => Via::class,
    ];
}
