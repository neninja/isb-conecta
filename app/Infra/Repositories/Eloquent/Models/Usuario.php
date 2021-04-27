<?php

namespace App\Infra\Repositories\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];
    protected $table = "users";
}
