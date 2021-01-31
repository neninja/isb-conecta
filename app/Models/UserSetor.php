<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserSetor extends Pivot
{
    protected $table = 'users_setores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
}
