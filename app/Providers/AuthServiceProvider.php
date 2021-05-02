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

        Gate::define('setor-adm', function (User $user) {
            return $this->acceptBySetor($user, 1);
        });

        Gate::define('setor-recepcao', function (User $user) {
            return $this->acceptBySetor($user, 2);
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
