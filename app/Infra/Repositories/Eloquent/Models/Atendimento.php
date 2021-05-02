<?php

namespace App\Infra\Repositories\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    protected $fillable = [
        'id_usuario',
        'data',
        'id_localAtendimento',
        'nomePessoaAtendida',
        'telefone',
        'relato'
    ];

    public function usuario(){
        return $this->belongsTo('App\Models\User', 'id_usuario');
    }
    protected $table = "atendimentos";
}
