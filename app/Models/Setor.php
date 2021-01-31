<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
    ];

    public function users()
    {
        // return $this->belongsToMany(Setor::class)->using(UserSetor::class);
        return $this->belongsToMany(
            Setor::class,
            'users_setores',
            'setor_id',
            'user_id',
        );
    }
}
