<?php

namespace App\Infra\Repositories\Eloquent;

use Core\Models\Recepcao\LocalAtendimento;
use App\Infra\Repositories\Eloquent\Models\LocalAtendimento as M;

class LocaisAtendimentoRepository implements \Core\Contracts\Repositories\ILocaisAtendimentoRepository
{
    protected function m2e(?M $m)
    {
        return $m ? new LocalAtendimento(
            $m->id,
            $m->descricao
        ) : null;
    }

    public function findById(int $id): ?LocalAtendimento
    {
        $m = M::find($id);
        return $this->m2e($m);
    }
}
