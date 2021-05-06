<?php

namespace App\Infra\Repositories\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Setor;

class Usuario extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    public function setores()
    {
        // return $this->belongsToMany(Setor::class)->using(UserSetor::class);
        return $this->belongsToMany(
            Setor::class,
            'users_setores',
            'user_id',
            'setor_id'
        );
    }
    protected $table = "users";
}
