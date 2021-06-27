<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('dev:isb:create:user {name} {username} {email} {pwd} {idsetor}', function ($name, $username, $email, $pwd, $idsetor) {
    (new App\Models\User())->create([
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'password' => bcrypt($pwd),
        'active' => true
    ])->setores()->attach($idsetor);
})->purpose('Cria um usuário direto no banco');

Artisan::command('dev:init', function () {
    Artisan::call('migrate:refresh --seed');
    Artisan::call(
        'dev:isb:create:user Felipe felip f@gmail.com 123456 1'
    );

    Artisan::call(
        'dev:isb:create:user "João Pedro" jp jpedro@gmail.com 123456 2'
    );
})->purpose('Cria ambiente de desenvolvimento padrão');
