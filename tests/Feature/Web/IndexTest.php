<?php

use App\Providers\RouteServiceProvider;

it('redirects to login', function () {
    $this->get('/login')->assertRedirect(RouteServiceProvider::Login)->asserOk();
});
