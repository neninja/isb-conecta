<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;

use Illuminate\Support\Arr;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('pass-with-this-setor', function (User $user, $idSetor) {
            return $this->acceptBySetor($user, intval($idSetor));
        });
    }

    protected function acceptBySetor(User $user, int $idSetor)
    {
        $setorEncontrado = Arr::first(
            $user->setores,
            function($setor) use($idSetor){
                return $setor->id === $idSetor;
            }
        );
        return !is_null($setorEncontrado);
    }
}
