<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Resources\{
    UsuarioResource,
    SetorResource,
};

use Core\UseCases\CadastroUsuario\CadastroUsuario;
use Core\UseCases\CadastroAtendimentoRecepcao\CadastroAtendimentoRecepcao;

use Core\Contracts\Repositories\{
    IAtendimentosRecepcaoRepository,
    IUsuariosRepository,
    ILocaisAtendimentoRepository,
    ISetoresRepository,
};

use Core\Contracts\Providers\{
    ICriptografiaProvider,
};

use App\Infra\Repositories\Eloquent\{
    AtendimentosRecepcaoRepository,
    UsuariosRepository,
    LocaisAtendimentoRepository,
    SetoresRepository,
};

use App\Infra\Providers\{
    BcryptProvider,
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAtendimentosRecepcaoRepository::class, function ($app) {
            return new AtendimentosRecepcaoRepository();
        });

        $this->app->bind(IUsuariosRepository::class, function ($app) {
            return new UsuariosRepository();
        });

        $this->app->bind(ILocaisAtendimentoRepository::class, function ($app) {
            return new LocaisAtendimentoRepository();
        });

        $this->app->bind(ISetoresRepository::class, function ($app) {
            return new SetoresRepository();
        });

        $this->app->bind(ICriptografiaProvider::class, function ($app) {
            return new BcryptProvider();
        });

        $this->app->bind(CadastroUsuario::class, function ($app) {
            return new CadastroUsuario(
                $app->make(IUsuariosRepository::class),
                $app->make(ISetoresRepository::class),
                $app->make(ICriptografiaProvider::class)
            );
        });

        $this->app->bind(CadastroAtendimentoRecepcao::class, function ($app) {
            return new CadastroAtendimentoRecepcao(
                $app->make(IAtendimentosRecepcaoRepository::class),
                $app->make(IUsuariosRepository::class),
                $app->make(ILocaisAtendimentoRepository::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        UsuarioResource::withoutWrapping();
        SetorResource::withoutWrapping();
    }
}
