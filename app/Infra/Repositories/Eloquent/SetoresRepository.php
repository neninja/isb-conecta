<?php

namespace App\Infra\Repositories\Eloquent;

use Core\Models\Setor;
use App\Models\Setor as M;

class SetoresRepository implements \Core\Contracts\Repositories\ISetoresRepository
{
    protected function m2e(?M $m)
    {
        return $m ? new Setor(
            $m->id,
            $m->nome
        ) : null;
    }

    public function findById(int $id): ?Setor
    {
        $m = M::find($id);
        return $this->m2e($m);
    }
}
