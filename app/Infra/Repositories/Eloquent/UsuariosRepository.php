<?php

namespace App\Infra\Repositories\Eloquent;

use Core\Models\Usuario\Usuario;
use App\Infra\Repositories\Eloquent\Models\Usuario as M;

use App\Models\Setor;

class UsuariosRepository implements \Core\Contracts\Repositories\IUsuariosRepository
{
    protected function m2e(?M $m)
    {
        return $m ? new Usuario(
            $m->id,
            $m->name,
            $m->password
        ) : null;
    }

    protected function e2m(?Usuario $e)
    {
        $m = new M();
        if(!is_null($e->getId())){
            $m->id = $e->getId();
        }
        $m->name = $e->getNome();
        $m->password = $e->getSenha();
        $m->email = $e->email->getEmail();
        return $m;
    }

    public function findById(int $id): ?Usuario
    {
        $m = M::find($id);
        // var_dump( $this->m2e($m));die;
        return $this->m2e($m);
    }

    public function save(Usuario $e): Usuario
    {
        // $m = $this->e2m($e);
        if(!is_null($e->getId())){
            $m = M::updateOrCreate(
                ['id' => $e->getId()],
                ['name' => $e->getNome(), 'email' => $e->email->getEmail(), 'password' => $e->getSenha()]
            );

            $m->setores()->attach($e->setor->getId());

            var_dump($m->setores);die;

            return $e;
        }

        $m = M::create(
            ['name' => $e->getNome(), 'email' => $e->email->getEmail(), 'password' => $e->getSenha(), 'active' => $e->getAtivo()]
        );

        $m->setores()->attach($e->setor->getId());

        // $s = new Setor();
        // $s->id = $e->setor->getId();
        // $m->setores()->save($s);

        $rObject = new \ReflectionObject($e);
        $rId = $rObject->getProperty('id');
        $rId->setAccessible(true);
        $rId->setValue($e, $m->id);

        return $e;
    }
}
