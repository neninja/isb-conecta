<?php

namespace App\Infra\Repositories\Eloquent;

use Core\Models\Usuario\Usuario;
use App\Infra\Repositories\Eloquent\Models\Usuario as M;

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

    public function findById(int $id): ?Usuario
    {
        $m = M::find($id);
        // var_dump( $this->m2e($m));die;
        return $this->m2e($m);
    }
}
