<?php

namespace App\Models;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefonema extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_telefonema';

    public $label = 'Telefonema';

    protected $fillable = [
        'status',
        'author_name',
        'author_contact',
        'description',
        'user_id',
    ];
}
