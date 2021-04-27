<?php

namespace App\Infra\Repositories\Eloquent;

use Core\Models\Recepcao\Atendimento;
use App\Infra\Repositories\Eloquent\Models\Atendimento as M;

class AtendimentosRecepcaoRepository implements \Core\Contracts\Repositories\IAtendimentosRecepcaoRepository
{
    protected function e2m(?Atendimento $e)
    {
        //$rBase = new \ReflectionClass(Atendimento::class);
        //$pUsuario = $rBase->getProperty('usuario');
        //$pUsuario->setAccessible(true);
        //var_dump($pUsuario->getValue($e));die;

        $m = new M();
        if(!is_null($e->getId())){
            $m->id = $e->getId();
        }
        $m->id_usuario = $e->getUsuario()->getId();
        $m->data = $e->data;
        $m->id_localAtendimento = $e->getOnde()->getId();
        $m->nomePessoaAtendida = $e->nomePessoaAtendida;
        $m->telefone = $e->contato;
        $m->relato = $e->relato;
        return $m;
    }

    public function save(Atendimento $e): Atendimento
    {
        $m = $this->e2m($e);
        $m->save();

        $rObject = new \ReflectionObject($e);
        $rId = $rObject->getProperty('id');
        $rId->setAccessible(true);
        $rId->setValue($e, $m->id);
        return $e;
    }
}
