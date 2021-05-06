<?php

namespace App\Infra\Providers;

use Core\Contracts\Providers\ICriptografiaProvider;

class BcryptProvider implements ICriptografiaProvider
{
    public function cifrar(string $senha): string
    {
        return bcrypt($senha);
    }
}
