<?php

namespace App\Infra\Repositories\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class LocalAtendimento extends Model
{
    protected $fillable = [
        'id',
        'descricao',
    ];
    protected $table = "locaisAtendimento";
}
